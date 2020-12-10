<?php

namespace Fir\Controllers;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Forgot extends Controller
{
    /**
     * This would be your http://localhost/project-name/ index page
     *
     * @return array
     */
    protected $admin;
	
    public function index()
    {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
			
		$validation = "";	
		
		/* Use User Model */
        $user = $this->library('User');
		if($user->isLoggedIn() === true):
		 redirect('user/dashboard');
		endif;
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

        // If the user tries to log-in
		if(isset($_POST['forgot'])) {
		 if ($input->exists()) {
		
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'email' => [
					 'required' => true,
					 'email' => true,
					 'minlength' => 2,
				  ],		
			]);
				 
			if (!$validation->fails()) {
				
				$has = $userModel->hasEmail($input->get('email'));
				if($has === true):
				
					$token = md5(uniqid());
				
					$m = $userModel->getEmail($input->get('email'));
					$Update = $userModel->token($m['userid'], $token); 
					
					if ($Update == 1) {


						$id = base64_encode($m["userid"]);
					
						$mail = new PHPMailer;
						 
						//Server settings
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = $data['settings']['smtp_host'];  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = $data['settings']['smtp_username'];                 // SMTP username
						$mail->Password = $data['settings']['smtp_password'];                           // SMTP password
						$mail->SMTPSecure = $data['settings']['smtp_encryption'];                                  // Enable TLS encryption, `ssl` also accepted				
						$mail->Port = $data['settings']['smtp_port'];                                    // TCP port to connect to	
			
						 $mail->setFrom($data['settings']['smtp_username'], $data['settings']['sitename']);
						 $mail->addAddress($m["email"], $m["name"]);
						 $mail->Subject = "Forgot password - " .$data['settings']['sitename'];
						 $mail->isHTML(true);
						 $mail->Body = "
							   <p>Hello ". $m["name"] ."</p>
							   <p>You have requested to reset your password from our website ". $data['settings']['sitename'] .",.</p>
							   <p>Click Following Link To Reset Your Password</p> 
							   <a href='". URL_PATH ."/password/$id/$token'>click here to reset your password</a>
							   <p>Thank you.</p>
						 ";
						 $mail->send();			
					 
						$_SESSION['message'][] = ['success', $this->lang['email_sent']];
						redirect('forgot');		
						
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect('forgot');
					}
				elseif($has === false):
						$_SESSION['message'][] = ['warning', $this->lang['email_not_available']];
						redirect('forgot');
                endif;				
					

			}else {
			 foreach ($validation->errors()->all() as $err) {
				$str = implode(" ",$err);
				 foreach ($err as $r) {
					$_SESSION['errors'][] = ['error', $r];
				 }	
			 }
						redirect('forgot');
			}
		 }	
		}


        return ['content' => $this->view->render($data, 'home/forgot')];
    }


	
	//Random String
	function uniqueid()
	{
		$un = substr(number_format(time() * rand(),0,'',''),0,12);
		return $un;
	}
}