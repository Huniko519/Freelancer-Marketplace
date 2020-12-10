<?php

namespace Fir\Models;

class Settings extends Model
{
    /**
     * Gets the site `settings`
     *
     * @return    array
     */
    public function get()
    {

        $settings = $this->db->select('settings', '*', ["id" => 1]);
        foreach ($settings as $row) {}

        return $row;
    }
	
    /**
     * Update the Theme
     *
     */
    public function theme($theme) {

		$Update = $this->db->update('settings',[
		   'theme' => $theme,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Gets Currency
     *
     */
    public function getCurrency()
    {

        $settings = $this->db->select('settings', '*', ["id" => 1]);
        foreach ($settings as $row) {}
		
        $q1 = $this->db->select('currency', '*', ["id" => $row["currency"]]);
        foreach ($q1 as $r1) {}

        return $r1["currency_symbol"];
    }
	
    /**
     * Gets Currency code
     *
     */
    public function currency_code()
    {

        $settings = $this->db->select('settings', '*', ["id" => 1]);
        foreach ($settings as $row) {}
		
        $q1 = $this->db->select('currency', '*', ["id" => $row["currency"]]);
        foreach ($q1 as $r1) {}

        return $r1["currency_code"];
    }
	
    /**
     * Update the Site Details
     *
     */
    public function siteDetails($sitename, $title, $description, $keywords, $timezone) {

		$Update = $this->db->update('settings',[
		   'sitename' => $sitename,
		   'title' => $title,
		   'description' => $description,
		   'keywords' => $keywords,
		   'timezone' => $timezone
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Site Logo
     *
     */
    public function siteLogo($filename) {

		$Update = $this->db->update('settings',[
		   'logo' => $filename,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Site Favicon
     *
     */
    public function siteFavicon($filename) {

		$Update = $this->db->update('settings',[
		   'favicon' => $filename,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }	
	
    /**
     * Update the Site Analytics
     *
     */
    public function siteAnalytics($analytics) {

		$Update = $this->db->update('settings',[
		   'analytics' => $analytics,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Contact Settings
     *
     */
    public function contact($contact_email, $contact_phone, $contact_location) {

		$Update = $this->db->update('settings',[
		   'contact_email' => $contact_email,
		   'contact_phone' => $contact_phone,
		   'contact_location' => $contact_location
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Social Settings
     *
     */
    public function social($facebook, $instagram, $twitter) {

		$Update = $this->db->update('settings',[
		   'facebook' => $facebook,
		   'instagram' => $instagram,
		   'twitter' => $twitter
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the email settings
     *
     */
    public function email($smtp_host, $smtp_username, $smtp_password, $smtp_encryption, $smtp_port) {

		$Update = $this->db->update('settings',[
		   'smtp_host' => $smtp_host,
		   'smtp_username' => $smtp_username,
		   'smtp_password' => $smtp_password,
		   'smtp_encryption' => $smtp_encryption,
		   'smtp_port' => $smtp_port,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
	
    /**
     * Update the Paypal settings
     *
     */
    public function paypal($paypal_active, $sandbox, $paypal_email) {

		$Update = $this->db->update('settings',[
		   'paypal_active' => $paypal_active,
		   'sandbox' => $sandbox,
		   'paypal_email' => $paypal_email,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Stripe settings
     *
     */
    public function stripe($stripe_active, $stripe_secret_key, $stripe_public_key) {

		$Update = $this->db->update('settings',[
		   'stripe_active' => $stripe_active,
		   'stripe_secret_key' => $stripe_secret_key,
		   'stripe_public_key' => $stripe_public_key,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Razorpay settings
     *
     */
    public function razorpay($razorpay_active, $razorpay_key_id) {

		$Update = $this->db->update('settings',[
		   'razorpay_active' => $razorpay_active,
		   'razorpay_key_id' => $razorpay_key_id,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Paystack settings
     *
     */
    public function paystack($paystack_active, $paystack_key) {

		$Update = $this->db->update('settings',[
		   'paystack_active' => $paystack_active,
		   'paystack_key' => $paystack_key,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the Bank settings
     *
     */
    public function bank($bank_active, $bank_description) {

		$Update = $this->db->update('settings',[
		   'bank_active' => $bank_active,
		   'bank_description' => $bank_description,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the How Client settings
     *
     */
    public function how_client($description) {

		$Update = $this->db->update('settings',[
		   'how_client' => $description,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the How Freelancer settings
     *
     */
    public function how_freelancer($description) {

		$Update = $this->db->update('settings',[
		   'how_freelancer' => $description,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the How Client Image
     *
     */
    public function how_client_image($filename) {

		$Update = $this->db->update('settings',[
		   'how_client_image' => $filename,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the How Freelancer Image
     *
     */
    public function how_freelancer_image($filename) {

		$Update = $this->db->update('settings',[
		   'how_freelancer_image' => $filename,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update Refund Policy
     *
     */
    public function updateRefund($description) {

		$Update = $this->db->update('settings',[
		   'refund_policy' => $description,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update Terms
     *
     */
    public function updateTerms($description) {

		$Update = $this->db->update('settings',[
		   'terms' => $description,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update Privacy
     *
     */
    public function updatePrivacy($description) {

		$Update = $this->db->update('settings',[
		   'privacy_policy' => $description,
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
	
    /**
     * Update the revenue settings
     *
     */
    public function revenue($revenue, $transaction_fee, $pay_freelancers, $withdrawal_limit) {

		$Update = $this->db->update('settings',[
		   'revenue' => $revenue,
		   'transaction_fee' => $transaction_fee,
		   'pay_freelancers' => $pay_freelancers,
		   'withdrawal_limit' => $withdrawal_limit
		],[
		    'id' => 1
		  ]);
		  
		return $Update->rowCount();  
    }
}