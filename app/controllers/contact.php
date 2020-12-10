<?php

namespace Fir\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Contact extends Controller
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
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();

		//Edit Email
		if(isset($_POST['post_contact'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'name' => [
				 'required' => true,
			  ],
			  'email' => [
				 'required' => true,
				 'email' => true,
			  ],
			  'subject' => [
				 'required' => true,
			  ],
			  'message' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
	
					$name = e($input->get('name'));		
					$email = e($input->get('email'));	
					$subject = e($input->get('subject'));		
					$message = e($input->get('message'));	
					
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
					 $mail->addAddress($data['settings']['contact_email'], $data['settings']['sitename']);
					 $mail->addReplyTo($email, $name);
					 $mail->Subject = $subject;
					 $mail->Body = $message;
					 $mail->send();				 			
				 
					$_SESSION['message'][] = ['success', $this->lang['email_sent']];
					redirect('contact');
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('contact');
		   }

		 }
		}	
		

        return ['content' => $this->view->render($data, 'home/contact')];
    }
}