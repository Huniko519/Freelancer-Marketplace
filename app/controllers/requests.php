<?php

namespace Fir\Controllers;

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Requests extends Controller {

    /**
     * @var object
     */
    protected $model;

    public function index() {
        redirect();
    }

    public function search() {
        $model = $this->model('Requests');

        // Get the available locations
		$adminModel = $this->model('Admin');
        $data['currency'] = $adminModel->currencyDetails();
		
        return ['results' => $this->view->render($data, 'requests/search')];
    }

    public function postmessage() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		$settingsModel = $this->model('Settings');
		$data['settings'] = $settingsModel->get();
		
        $cid = $input->get('cid');
        $userid = $input->get('userid');
        $message = $input->get('message');

		if($message == ''):
		
			return ['results' => $this->view->render($data, 'requests/empty_message')];
		
		else:
		
			$clientModel = $this->model('Client');
			$data['conversation'] = $clientModel->get_conversation_id($cid);
			$data['project'] = $clientModel->get_project($data['conversation']['projectid']);
			$data['freelancer'] = $clientModel->get_freelancer($data['conversation']['freelancerid']);
			$data['client'] = $clientModel->get_freelancer($data['conversation']['clientid']);
			$Insert_n = $clientModel->addNotification($data['conversation']['projectid'], $userid, $data['conversation']['freelancerid'], 2); 
			$data['latest_notification'] = $clientModel->getLatestNotification($data['conversation']['projectid']); 
			$Insert_p = $clientModel->post_message($data['conversation']['cid'], $data['conversation']['projectid'], $data['latest_notification']['id'], $userid, $message);
			$data['message'] = $clientModel->get_latest_message($data['conversation']['projectid']);  
			$data['conversation_reply_timeago'] = $clientModel->conversation_reply_timeago($data['conversation']['cid']);
					
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
			 $mail->addAddress($data['freelancer']["email"], $data['freelancer']["name"]);
			 $mail->Subject = "New Message posted in - " .$data['settings']['sitename'];
			 $mail->isHTML(true);
			 $mail->Body = "
				   <p>Hello ". $data['freelancer']["name"] ."</p>
				   <p>Client ". $data['client']["name"] ." has sent you a message in website ". $data['settings']['sitename'] .".</p>
				   <p>Click following link to login and read the message.</p> 
				   <a href='". URL_PATH ."/'>". $data['settings']['sitename'] ."</a>
				   <p>Thank you.</p>
			 ";
			 $mail->send();	
			 
			return ['results' => $this->view->render($data, 'requests/post_message')];
		endif;
    }

    public function f_postmessage() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		$settingsModel = $this->model('Settings');
		$data['settings'] = $settingsModel->get();
		
        $cid = $input->get('cid');
        $userid = $input->get('userid');
        $message = $input->get('message');

		if($message == ''):
		
			return ['results' => $this->view->render($data, 'requests/empty_message')];
		
		else:
		
			$freelancerModel = $this->model('Freelancer');
			$data['conversation'] = $freelancerModel->get_conversation_id($cid);
			$data['project'] = $freelancerModel->get_project($data['conversation']['projectid']);
			$data['client'] = $freelancerModel->get_client($data['conversation']['clientid']);
			$data['freelancer'] = $freelancerModel->get_client($data['conversation']['freelancerid']);
			$Insert_n = $freelancerModel->addNotificationNo($data['conversation']['projectid'], $userid, $data['conversation']['clientid'], 2); 
			$data['latest_notification'] = $freelancerModel->getLatestNotificationNo($data['conversation']['projectid']); 
			$Insert_p = $freelancerModel->post_message($data['conversation']['cid'], $data['conversation']['projectid'], $data['latest_notification']['id'], $userid, $message);
			$data['message'] = $freelancerModel->get_latest_message($data['conversation']['projectid']);  
			$data['conversation_reply_timeago'] = $freelancerModel->conversation_reply_timeago($data['conversation']['cid']);
					
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
			 $mail->addAddress($data['client']["email"], $data['client']["name"]);
			 $mail->Subject = "New Message posted in - " .$data['settings']['sitename'];
			 $mail->isHTML(true);
			 $mail->Body = "
				   <p>Hello ". $data['client']["name"] ."</p>
				   <p>Freelancer ". $data['freelancer']["name"] ." has sent you a message in website ". $data['settings']['sitename'] .".</p>
				   <p>Click following link to login and read the message.</p> 
				   <a href='". URL_PATH ."/'>". $data['settings']['sitename'] ."</a>
				   <p>Thank you.</p>
			 ";
			 $mail->send();	

			
			return ['results' => $this->view->render($data, 'requests/post_message_freelancer')];
		endif;
    }

    public function post_dispute() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
        $cid = $input->get('cid');
        $userid = $input->get('userid');
        $message = $input->get('message');

		if($message == ''):
		
			return ['results' => $this->view->render($data, 'requests/empty_message')];
		
		else:
		
			$clientModel = $this->model('Client');
			
			$data['conversation'] = $clientModel->get_dispute_conversation_id($cid);
			
			$Insert_p = $clientModel->post_dispute($data['conversation']['cid'], $data['conversation']['projectid'], $userid, $message);
			
			$data['message'] = $clientModel->get_dispute_message($data['conversation']['cid'], $data['user']['userid']);  
			
			$data['conversation_reply_timeago'] = $clientModel->dispute_conversation_reply_timeago($data['conversation']['cid']);

			
			return ['results' => $this->view->render($data, 'requests/post_dispute')];
		endif;
    }

    public function f_post_dispute() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
        $cid = $input->get('cid');
        $userid = $input->get('userid');
        $message = $input->get('message');

		if($message == ''):
		
			return ['results' => $this->view->render($data, 'requests/empty_message')];
		
		else:
		
			$freelancerModel = $this->model('Freelancer');
			
			$data['conversation'] = $freelancerModel->get_dispute_conversation_id($cid);
			
			$Insert_p = $freelancerModel->post_dispute($data['conversation']['cid'], $data['conversation']['projectid'], $userid, $message);
			
			$data['message'] = $freelancerModel->get_dispute_message($data['conversation']['cid'], $data['user']['userid']);  
			
			$data['conversation_reply_timeago'] = $freelancerModel->dispute_conversation_reply_timeago($data['conversation']['cid']);

			
			return ['results' => $this->view->render($data, 'requests/post_dispute_freelancer')];
		endif;
    }

    public function admin_post_dispute() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		
        $cid = $input->get('cid');
        $userid = $input->get('userid');
        $message = $input->get('message');

		if($message == ''):
		
			return ['results' => $this->view->render($data, 'requests/empty_message')];
		
		else:
		
			$adminModel = $this->model('Admin');
			
			$data['conversation'] = $adminModel->get_dispute_conversation_id($cid);
			
			$Insert_p = $adminModel->post_dispute($data['conversation']['cid'], $data['conversation']['projectid'], $userid, $message);
			
			$data['message'] = $adminModel->get_dispute_message($data['conversation']['cid'], $data['admin']['adminid']);  
			
			$data['conversation_reply_timeago'] = $adminModel->dispute_conversation_reply_timeago($data['conversation']['cid']);

			
			return ['results' => $this->view->render($data, 'requests/post_dispute_admin')];
		endif;
    }

    public function hire_freelancer() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		$settingsModel = $this->model('Settings');
		$data['settings'] = $settingsModel->get();
		
        $id = $input->get('id');
		
		$clientModel = $this->model('Client');
		$data['proposal'] = $clientModel->get_proposal($id);
		$data['project'] = $clientModel->get_project($data['proposal']['projectid']);
		$data['freelancer'] = $clientModel->get_freelancer($data['proposal']['freelancerid']);
		$data['client'] = $clientModel->get_freelancer($data['proposal']['clientid']);
		$Insert_n = $clientModel->addNotification($data['proposal']['projectid'], $data['proposal']['clientid'], $data['proposal']['freelancerid'], 4); 
		$data['latest_notification'] = $clientModel->get_latest_notification_client($data['proposal']['projectid'], $data['proposal']['clientid']); 
		$Insert_p = $clientModel->addescrow($data['proposal']['id'], 
		                                    $data['proposal']['projectid'], 
											$data['proposal']['freelancerid'], 
											$data['proposal']['clientid'], 
											$data['latest_notification']['id'], 
											$data['proposal']['budget']);
		
		$amount_new = $data['user']["credit_account"] - $data['proposal']['budget']; 									
		$update_a = $clientModel->update_credit_account($amount_new, $data['proposal']['clientid']); 
		$update_b = $clientModel->update_project($data['proposal']['projectid'], $data['proposal']['freelancerid']); 
		$update_c = $clientModel->update_proposal($id, $data['proposal']['freelancerid']); 
					
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
		 $mail->addAddress($data['freelancer']["email"], $data['freelancer']["name"]);
		 $mail->Subject = "You got Hired to work on - " . $data['project']['title'];
		 $mail->isHTML(true);
		 $mail->Body = "
			   <p>Hello ". $data['freelancer']["name"] ."</p>
			   <p>Client ". $data['client']["name"] ." has hired you to work on ". $data['project']['title'] .".</p>
			   <p>Click following link to login and see the project.</p> 
			   <a href='". URL_PATH ."/'>". $data['settings']['sitename'] ."</a>
			   <p>Thank you.</p>
		 ";
		 $mail->send();	
			 
		$has = $clientModel->has_other_proposals($data['proposal']['projectid'], $data['proposal']['freelancerid']);
        if($has === true){
			$update_d = $clientModel->update_proposals($data['proposal']['projectid'], $data['proposal']['freelancerid']); 
		}
		
		 if ($update_c == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['hired_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_hire'];
		 }	

        return $response;
    }

    public function complete_project() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		$settingsModel = $this->model('Settings');
		$data['settings'] = $settingsModel->get();
		
        $id = $input->get('id');
		
		$clientModel = $this->model('Client');
		
		$data['project'] = $clientModel->get_project_id($id, $data['user']['userid']);
		
		$data['escrow'] = $clientModel->get_escrow($data['project']['projectid'], $data['user']['userid']);
		
		$Insert_n = $clientModel->addNotification($data['project']['projectid'], $data['project']['userid'], $data['project']['freelancerid'], 7); 
		
		$data['latest_notification'] = $clientModel->get_latest_notification_client($data['project']['projectid'], $data['project']['userid']); 
		
		$company_money = $data['escrow']["budget"] * ($data['settings']['revenue'] / 100); 
		$freelancer_money = $data['escrow']["budget"] - $company_money; 		
		
		$Insert_p = $clientModel->addpayments($data['escrow']['id'], 
		                                    $data['escrow']['projectid'], 
											$data['escrow']['freelancerid'], 
											$data['escrow']['clientid'], 
											$data['latest_notification']['id'], 
											$data['escrow']["budget"], 
											$freelancer_money, 
											$company_money);	
											
		$data['freelancer'] = $clientModel->get_freelancer($data['project']['freelancerid']);
		$data['client'] = $clientModel->get_freelancer($data['project']['userid']);
								
		$amount_new = $data['freelancer']["credit_account"] + $freelancer_money; 											
											
		$update_a = $clientModel->update_credit_account($amount_new, $data['escrow']['freelancerid']); 
		
		$update_b = $clientModel->update_project_complete($data['escrow']['projectid']); 
		
					
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
		 $mail->addAddress($data['freelancer']["email"], $data['freelancer']["name"]);
		 $mail->Subject = "Project has been made complete - " . $data['project']['title'];
		 $mail->isHTML(true);
		 $mail->Body = "
			   <p>Hello ". $data['freelancer']["name"] ."</p>
			   <p>Client ". $data['client']["name"] ." has made this project complete ". $data['project']['title'] .".</p>
			   <p>And the funds has been released to your account.</p> 
			   <p>Click following link to login and see the funds.</p> 
			   <a href='". URL_PATH ."/'>". $data['settings']['sitename'] ."</a>
			   <p>Thank you.</p>
		 ";
		 $mail->send();
		
		
		$update_c = $clientModel->update_escrow($data['escrow']['id']); 
		

		
		 if ($update_c == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['hired_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_hire'];
		 }	

        return $response;
    }

    public function award_freelancer() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		
		$settingsModel = $this->model('Settings');
		$data['settings'] = $settingsModel->get();
		
        $id = $input->get('id');
		
		$adminModel = $this->model('Admin');
		
		$data['project'] = $adminModel->get_project_id($id);
		
		$data['escrow'] = $adminModel->get_escrow($data['project']['projectid'], $data['project']['userid']);
		
		$Insert_n = $adminModel->addNotification($data['project']['projectid'], $data['project']['userid'], $data['project']['freelancerid'], 7); 
		
		$data['latest_notification'] = $adminModel->get_latest_notification_client($data['project']['projectid'], $data['project']['userid']); 
		
		$company_money = $data['escrow']["budget"] * ($data['settings']['revenue'] / 100); 
		$freelancer_money = $data['escrow']["budget"] - $company_money; 		
		
		$Insert_p = $adminModel->addpayments($data['escrow']['id'], 
		                                    $data['escrow']['projectid'], 
											$data['escrow']['freelancerid'], 
											$data['escrow']['clientid'], 
											$data['latest_notification']['id'], 
											$data['escrow']["budget"], 
											$freelancer_money, 
											$company_money);	
											
		$data['freelancer'] = $adminModel->get_freelancer($data['project']['freelancerid']);
								
		$amount_new = $data['freelancer']["credit_account"] + $freelancer_money; 											
											
		$update_a = $adminModel->update_credit_account($amount_new, $data['escrow']['freelancerid']); 
		
		$update_b = $adminModel->update_project_complete($data['escrow']['projectid']); 
		
		$update_c = $adminModel->update_escrow($data['escrow']['id']); 
		
		$update_d = $adminModel->update_dispute_conversation($data['project']['projectid'], $data['project']['userid'], $data['project']['freelancerid']); 
		

		
		 if ($update_d == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['awarded_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_award'];
		 }	

        return $response;
    }

    public function award_client() {
		$input = $this->library('Input');
		
		/*Use User Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		
		$settingsModel = $this->model('Settings');
		$data['settings'] = $settingsModel->get();
		
        $id = $input->get('id');
		
		$adminModel = $this->model('Admin');
		
		$data['project'] = $adminModel->get_project_id($id);
		
		$data['escrow'] = $adminModel->get_escrow($data['project']['projectid'], $data['project']['userid']);
		
		$Insert_n = $adminModel->award_client($data['project']['projectid'], 
		                                      $data['project']['userid'], 
											  $data['project']['freelancerid'],
											  $data['escrow']["budget"],
											  $data['escrow']['id']); 
		

		
		 if ($Insert_n == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['awarded_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_award'];
		 }	

        return $response;
    }

    public function deletecurrency() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->currencyDelete($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function deleteauthor() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->authorDelete($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }

    public function delete_user() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->userDelete($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }


    public function delete_faq() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_faq($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_category() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_category($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_skill() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_skill($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_workexperience() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_workexperience($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_education() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_education($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_portfolio() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_portfolio($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }
	
	

    public function delete_project() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_project($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }
	

    public function delete_proposal() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_proposal($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }	

    public function delete_chat() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_chat($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function decline_invite() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->decline_invite($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['declined_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_decline'];
		 }	

        return $response;
    }

    public function delete_file() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_file($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_rating() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_rating($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function delete_dispute() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_dispute($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }	

        return $response;
    }

    public function verify_user() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->verify_user($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['verified_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_verify'];
		 }	

        return $response;
    }

    public function decline_user() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->decline_user($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['declined_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_decline'];
		 }	

        return $response;
    }

    public function unverify_user() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->unverify_user($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['unverified_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_unverify'];
		 }	

        return $response;
    }

    public function pay_freelancer() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->pay_freelancer($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['paid_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_pay'];
		 }	

        return $response;
    }
	
    public function delete_how_section() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_how_section($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }	
	
    public function delete_customer() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_customer($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }
	
    public function delete_team() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->delete_team($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }	
	
    public function complete_bank() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->complete_bank($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }	
	
    public function in_complete_bank() {
        $model = $this->model('Requests');
		$input = $this->library('Input');
		
        $id = $input->get('id');
						
		 $delete = $model->in_complete_bank($id);
		
		 if ($delete == 1) {
				$response['status']  = $this->lang['success'];
				$response['message'] = $this->lang['deleted_successfully'];
		 } else {
				$response['status']  = $this->lang['error'];
				$response['message'] = $this->lang['unable_to_delete'];
		 }

        return $response;
    }



    public function get_projects() {
        $p_Model = $this->model('Project');
		$input = $this->library('Input');
		
        $id = $input->get('id');
        $pg = $input->get('pg');
		
		$data['id'] = $id;

		$data['p_total'] = $p_Model->total();
		$data['p_categories'] = $p_Model->details();
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '12';
		$startpoint = ($page * $limit) - $limit;
        $data['has_projects'] = $p_Model->hasProjects();
        $data['p_pagination'] = $p_Model->pagination_category($startpoint, $limit, $id);
		$data['pagination'] = $this->Pagination($data['p_total'], $limit, $page, URL_PATH.'/projects/');
		$data['projects_timeago'] = $p_Model->projects_timeago();
		$data['projects_proposals'] = $p_Model->projects_proposals();
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
			
		$data['has_p'] = $p_Model->has_p_category($id);
		if($data['has_p'] == true):
			
			return ['results' => $this->view->render($data, 'requests/projects')];
		else:
			
			return ['results' => $this->view->render($data, 'requests/no_data')];
		endif;
    }	
	
	//Random String
	public function rando($length = 14){
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
	


	
	function Pagination($total, $per_page = 10,$page = 1, $url){  
			$total = $total;
			$adjacents = "2"; 

			$page = ($page == 0 ? 1 : $page);  
			$start = ($page - 1) * $per_page;								
			
			$prev = $page - 1;							
			$next = $page + 1;
			$lastpage = ceil($total/$per_page);
			$lpm1 = $lastpage - 1;
			
			$pagination = "";
			if($lastpage > 1)
			{
				$pagination .= "<div class='paginationCommon blogPagination text-center'>
			 <nav aria-label='Page navigation'>
			  <ul class='pagination'>";
						$pagination .= "<li class='details'>Page $page of $lastpage</li>";
						
				if ($page > 1)
					$pagination.= "<li><a href='{$url}1'> <i class='fa  fa-angle-double-left'></i> </a></li>
								   <li><a href='{$url}$prev'> <i class='fa fa-angle-left'></i> </a></li>";
				else
					$pagination.= "<li class='disabled'><a href='#'><i class='fa fa-angle-left'></i> </a></li>";
				
				if ($lastpage < 7 + ($adjacents * 2))
				{	
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<li class='active'><a>$counter</a></li>";
						else
							$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))
				{
					if($page < 1 + ($adjacents * 2))		
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<li class='active'><a>$counter</a></li>";
							else
								$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
						}
						$pagination.= "<li class='dot'>...</li>";
						$pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";		
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<li><a href='{$url}1'>1</a></li>";
						$pagination.= "<li><a href='{$url}2'>2</a></li>";
						$pagination.= "<li class='dot'>...</li>";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<li class='active'><a>$counter</a></li>";
							else
								$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
						}
						$pagination.= "<li class='dot'>..</li>";
						$pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>";		
					}
					else
					{
						$pagination.= "<li><a href='{$url}1'>1</a></li>";
						$pagination.= "<li><a href='{$url}2'>2</a></li>";
						$pagination.= "<li class='dot'>..</li>";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<li class='active'><a>$counter</a></li>";
							else
								$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>";					
						}
					}
				}
				
				if ($page < $counter - 1){ 
					$pagination.= "<li><a href='{$url}$next'><i class='fa fa-angle-right'></i></a></li>";
					$pagination.= "<li><a href='{$url}$lastpage'><i class='fa fa-angle-double-right'></i></a></li>";
				}else{
					$pagination.= "<li class='disabled'><a><i class='fa fa-angle-right'></i></a></li>";
					$pagination.= "<li class='disabled'><a><i class='fa fa-angle-double-right'></i></a></li>";
				}
				$pagination.= "</ul>\n</nav>\n</div>";		
			}
		
		
			return $pagination;
	}


	function is_divisible_by_2($number){ 
		if($number % 2 == 0){ 
			return true;  
		} 
		else{ 
			return false; 
		} 
	}	
	
	function is_divisible_by_3($n){
	  $digits = str_split($n);
	  $total = 0;
	  foreach ($digits as $digit) {
		$total += $digit;
	  }
	  if ($total == 3 || ($total % 3 == 0) ){
		return true;
	  }
	  return false;
	}	
		
}