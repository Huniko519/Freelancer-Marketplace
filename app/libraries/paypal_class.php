<?php

namespace Fir\Libraries;

/**
 * PHP Paypal IPN Integration Class
 * 6.25.2008 - Eric Wang, http://code.google.com/p/paypal-ipn-class-php/
 * 
 * This file provides neat and simple method to validate the paid result with Paypal IPN. 
 * It's NOT intended to make the paypal integration "plug 'n' play". 
 * It still requires the developer to understand the paypal process and know the variables 
 * you want/need to pass to paypal to achieve what you want.
 * 
 * @author		Eric Wang <eric.wzy@gmail.com>
 * @copyright  (C) 2008 - 2009 Eric.Wang
 * 
 */

/** filename of the IPN log */
define('LOG_FILE', '.ipn_results.log');

define('SSL_P_URL', 'https://www.paypal.com/cgi-bin/webscr');
define('SSL_SAND_URL','https://www.sandbox.paypal.com/cgi-bin/webscr');

class paypal_class {
	
	private $ipn_status;                // holds the last status
	public $admin_mail; 				// receive the ipn status report pre transaction
	public $paypal_mail;				// paypal account, if set, class need to verify receiver
	public $txn_id;						// array: if the txn_id array existed, class need to verified the txn_id duplicate
	public $ipn_log;                    // bool: log IPN results to text file?
	private $ipn_response;              // holds the IPN response from paypal   
	public $ipn_data = array();         // array contains the POST values for IPN
	private $fields = array();          // array holds the fields to submit to paypal
	private $ipn_debug; 				// ipn_debug
	
	// initialization constructor.  Called when class is created.
	function __construct() {

		$this->ipn_status = '';
		$this->admin_mail = null;
		$this->paypal_mail = null;
		$this->txn_id = null;
		$this->tax = null;
		$this->ipn_log = true;
		$this->ipn_response = '';
		$this->ipn_debug = false;
	}

	// adds a key=>value pair to the fields array, which is what will be 
	// sent to paypal as POST variables. 
	public function add_field($field, $value) {
		$this->fields["$field"] = $value;
	}


	// this function actually generates an entire HTML page consisting of
	// a form with hidden elements which is submitted to paypal via the 
	// BODY element's onLoad attribute.  We do this so that you can validate
	// any POST vars from you custom form before submitting to paypal.  So 
	// basically, you'll have your own form which is submitted to your script
	// to validate the data, which in turn calls this function to create
	// another hidden form and submit to paypal.
		
	// The user will briefly see a message on the screen that reads:
	// "Please wait, your order is being processed..." and then immediately
	// is redirected to paypal.
	public function submit_paypal_post() {

		$paypal_url = ($_GET['sandbox'] == 1) ? SSL_SAND_URL : SSL_P_URL;
		echo "<script type=\"text/javascript\">$('form:paypal_form').submit();</script>\n";
		echo "<form method=\"post\" name=\"paypal_form\" ";
		echo "action=\"".$paypal_url."\">\n";
		if (isset($this->paypal_mail))echo "<input type=\"hidden\" name=\"business\" value=\"$this->paypal_mail\"/>\n";
		foreach ($this->fields as $name => $value) {
			echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
		}
		echo '<button type="submit" class="ui fluid paypal button kafe-btn kafe-btn-danger"><span class="paypal-stadart">Proceed</span> to <svg xmlns="http://www.w3.org/2000/svg" width="72" height="20" viewBox="0 0 208 58"><path fill="#fff" d="M142.544 16.975c-.88 5.782-5.296 5.782-9.57 5.782h-2.43l1.706-10.796c.102-.65.665-1.13 1.326-1.13h1.115c2.91 0 5.66 0 7.07 1.66.85.99 1.11 2.46.79 4.49M140.69 1.9h-16.11c-1.1 0-2.04.8-2.21 1.89l-6.512 41.307c-.127.814.504 1.55 1.327 1.55h8.266c.77 0 1.43-.56 1.55-1.32l1.85-11.713c.17-1.09 1.11-1.89 2.21-1.89h5.1c10.61 0 16.74-5.134 18.34-15.313.72-4.45.03-7.94-2.05-10.39-2.29-2.69-6.35-4.12-11.74-4.12M27.65 16.98c-.88 5.782-5.296 5.782-9.57 5.782h-2.43l1.705-10.8c.105-.65.668-1.13 1.33-1.13H19.8c2.907 0 5.652 0 7.07 1.657.846.99 1.102 2.46.782 4.49M25.784 1.89H9.674c-1.1 0-2.04.8-2.21 1.89L.95 45.084c-.127.814.502 1.552 1.327 1.552H9.97c1.1 0 2.037-.802 2.21-1.888L13.94 33.6c.17-1.088 1.108-1.89 2.21-1.89h5.096c10.61 0 16.736-5.134 18.336-15.313.72-4.45.03-7.948-2.055-10.397-2.29-2.692-6.35-4.116-11.74-4.116M63.185 31.8c-.746 4.408-4.243 7.368-8.707 7.368-2.237 0-4.03-.72-5.18-2.08-1.14-1.35-1.57-3.277-1.21-5.418.695-4.37 4.25-7.422 8.646-7.422 2.19 0 3.97.727 5.142 2.102 1.182 1.385 1.648 3.32 1.31 5.454m10.75-15.015h-7.714c-.66 0-1.224.48-1.328 1.13l-.338 2.15-.538-.79c-1.672-2.43-5.396-3.24-9.114-3.24-8.522 0-15.802 6.46-17.218 15.52-.738 4.52.31 8.83 2.872 11.85 2.353 2.77 5.712 3.92 9.714 3.92 6.87 0 10.68-4.41 10.68-4.41l-.345 2.14c-.128.81.5 1.55 1.328 1.55h6.945c1.103 0 2.04-.8 2.212-1.89l4.17-26.41c.13-.816-.502-1.55-1.326-1.55M178.084 31.8c-.746 4.407-4.243 7.367-8.707 7.367-2.237 0-4.03-.72-5.18-2.08-1.142-1.35-1.57-3.276-1.21-5.417.695-4.37 4.25-7.422 8.646-7.422 2.19 0 3.97.73 5.142 2.104 1.182 1.385 1.648 3.32 1.31 5.454m10.75-15.015h-7.714c-.66 0-1.22.48-1.32 1.14l-.34 2.16-.54-.78c-1.67-2.42-5.39-3.23-9.11-3.23-8.52 0-15.8 6.46-17.22 15.52-.74 4.52.31 8.84 2.87 11.85 2.36 2.77 5.71 3.93 9.72 3.93 6.87 0 10.68-4.41 10.68-4.41l-.34 2.14c-.13.814.5 1.55 1.33 1.55h6.95c1.104 0 2.04-.8 2.21-1.89l4.174-26.405c.13-.81-.502-1.55-1.326-1.55m-73.82-.002h-7.753c-.74 0-1.435.37-1.85.985l-10.7 15.744L90.2 18.4c-.283-.948-1.156-1.598-2.144-1.598h-7.62c-.92 0-1.57.906-1.27 1.776l8.54 25.06-8.03 11.33c-.63.89.01 2.12 1.1 2.12h7.74c.73 0 1.42-.36 1.84-.963L116.14 18.9c.616-.89-.02-2.106-1.104-2.106m82.9-13.77l-6.61 42.063c-.13.815.5 1.552 1.324 1.552h6.66c1.1 0 2.04-.81 2.21-1.89l6.52-41.31c.127-.82-.5-1.55-1.33-1.55h-7.44c-.662 0-1.225.48-1.327 1.13"></path></svg></button>';
		echo "</form>\n";
	}
	
	public function submit_formnull_post() {

		$paypal_url = ($_GET['sandbox'] == 1) ? SSL_SAND_URL : SSL_P_URL;
		echo "<script type=\"text/javascript\">$('form:paypal_form').submit();</script>\n";
		echo "<form method=\"post\" name=\"paypal_form\" ";
		echo "action=\"".$paypal_url."\">\n";
		if (isset($this->paypal_mail))echo "<input type=\"hidden\" name=\"business\" value=\"$this->paypal_mail\"/>\n";
		foreach ($this->fields as $name => $value) {
			echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
		}
		echo '';
		echo "</form>\n";
	}
   
/**
 * validate the	IPN
 * 
 * @return bool IPN validation result
 */
	public function validate_ipn() {
		
		$hostname = gethostbyaddr ( $_SERVER ['REMOTE_ADDR'] );
		if (! preg_match ( '/paypal\.com$/', $hostname )) {
			$this->ipn_status = 'Validation post isn\'t from PayPal';
			$this->log_ipn_results ( false );
			return false;
		}
		
		if (isset($this->paypal_mail) && strtolower ( $_POST['receiver_email'] ) != strtolower(trim( $this->paypal_mail ))) {
			$this->ipn_status = "Receiver Email Not Match";
			$this->log_ipn_results ( false );
			return false;
		}
		
		if (isset($this->txn_id)&& in_array($_POST['txn_id'],$this->txn_id)) {
			$this->ipn_status = "txn_id have a duplicate";
			$this->log_ipn_results ( false );
			return false;
		}

		// parse the paypal URL
		$paypal_url = ($_POST['test_ipn'] == 1) ? SSL_SAND_URL : SSL_P_URL;
		$url_parsed = parse_url($paypal_url);        
		
		// generate the post string from the _POST vars aswell as load the
		// _POST vars into an arry so we can play with them from the calling
		// script.
		$post_string = '';    
		foreach ($_POST as $field=>$value) { 
			$this->ipn_data["$field"] = $value;
			$post_string .= $field.'='.urlencode(stripslashes($value)).'&'; 
		}
		$post_string.="cmd=_notify-validate"; // append ipn command
		
		// open the connection to paypal
		if (isset($_POST['test_ipn']) )
			$fp = fsockopen ( 'ssl://www.sandbox.paypal.com', "443", $err_num, $err_str, 60 );
		else
			$fp = fsockopen ( 'ssl://www.paypal.com', "443", $err_num, $err_str, 60 );
 
		if(!$fp) {
			// could not open the connection.  If loggin is on, the error message
			// will be in the log.
			$this->ipn_status = "fsockopen error no. $err_num: $err_str";
			$this->log_ipn_results(false);       
			return false;
		} else { 
			// Post the data back to paypal
			fputs($fp, "POST $url_parsed[path] HTTP/1.1\r\n"); 
			fputs($fp, "Host: $url_parsed[host]\r\n"); 
			fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n"); 
			fputs($fp, "Content-length: ".strlen($post_string)."\r\n"); 
			fputs($fp, "Connection: close\r\n\r\n"); 
			fputs($fp, $post_string . "\r\n\r\n"); 
		
			// loop through the response from the server and append to variable
			while(!feof($fp)) { 
		   	$this->ipn_response .= fgets($fp, 1024); 
		   } 
		  fclose($fp); // close connection
		}
		
		// Invalid IPN transaction.  Check the $ipn_status and log for details.
		if (! eregi("VERIFIED",$this->ipn_response)) {
			$this->ipn_status = 'IPN Validation Failed';
			$this->log_ipn_results(false);   
			return false;
		} else {
			$this->ipn_status = "IPN VERIFIED";
			$this->log_ipn_results(true); 
			return true;
		}
	} 
   
	private function log_ipn_results($success) {
		$hostname = gethostbyaddr ( $_SERVER ['REMOTE_ADDR'] );
		// Timestamp
		$text = '[' . date ( 'm/d/Y g:i A' ) . '] - ';
		// Success or failure being logged?
		if ($success)
			$this->ipn_status = $text . 'SUCCESS:' . $this->ipn_status . "!\n";
		else
			$this->ipn_status = $text . 'FAIL: ' . $this->ipn_status . "!\n";
			// Log the POST variables
		$this->ipn_status .= "[From:" . $hostname . "|" . $_SERVER ['REMOTE_ADDR'] . "]IPN POST Vars Received By Paypal_IPN Response API:\n";
		foreach ( $this->ipn_data as $key => $value ) {
			$this->ipn_status .= "$key=$value \n";
		}
		// Log the response from the paypal server
		$this->ipn_status .= "IPN Response from Paypal Server:\n" . $this->ipn_response;
		$this->write_to_log ();
	}
	
	private function write_to_log() {
		if (! $this->ipn_log)
			return; // is logging turned off?

		// Write to log
		$fp = fopen ( LOG_FILE , 'a' );
		fwrite ( $fp, $this->ipn_status . "\n\n" );
		fclose ( $fp ); // close file
		chmod ( LOG_FILE , 0600 );
	}

	public function send_report($subject) {
		$body .= "from " . $this->ipn_data ['payer_email'] . " on " . date ( 'm/d/Y' );
		$body .= " at " . date ( 'g:i A' ) . "\n\nDetails:\n" . $this->ipn_status;
		mail ( $this->admin_mail, $subject, $body );
	}

	public function print_report(){
		$find [] = "\n";
		$replace [] = '<br/>';
		$html_content = str_replace ( $find, $replace, $this->ipn_status );
		echo $html_content;
	}
	
	public function dump_fields() {
 
		// Used for debugging, this function will output all the field/value pairs
		// that are currently defined in the instance of the class using the
		// add_field() function.
		echo "<h3>paypal_class->dump_fields() Output:</h3>";
		echo "<table width=\"95%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\">
            <tr>
               <td bgcolor=\"black\"><b><font color=\"white\">Field Name</font></b></td>
               <td bgcolor=\"black\"><b><font color=\"white\">Value</font></b></td>
            </tr>"; 
		ksort($this->fields);
		foreach ($this->fields as $key => $value) {echo "<tr><td>$key</td><td>".urldecode($value)."&nbsp;</td></tr>";}
		echo "</table><br>"; 
	}

	private function debug($msg) {
		
		if (! $this->ipn_debug)
			return;
		
		$today = date ( "Y-m-d H:i:s " );
		$myFile = ".ipn_debugs.log";
		$fh = fopen ( $myFile, 'a' ) or die ( "Can't open debug file. Please manually create the 'debug.log' file and make it writable." );
		$ua_simple = preg_replace ( "/(.*)\s\(.*/", "\\1", $_SERVER ['HTTP_USER_AGENT'] );
		fwrite ( $fh, $today . " [from: " . $_SERVER ['REMOTE_ADDR'] . "|$ua_simple] - " . $msg . "\n" );
		fclose ( $fh );
		chmod ( $myFile, 0600 );
	}

}         


 
