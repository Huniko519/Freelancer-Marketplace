<?php

namespace Fir\Controllers;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Freelancer extends Controller
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
			
		if(isset($this->url[2])){	
			$data['url'] = $this->url[2];
        }else{
			$data['url'] = $this->url[1];
		}
		
		/* Use User Model */
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use Project Model*/
        $projectModel = $this->model('Project');
        $freelancerModel = $this->model('Freelancer');
		$data['f_has'] = $projectModel->f_has($data['user']['userid']);
		
		/* Project In Progress */
		$data['f_projects_has_closed'] = $projectModel->f_hasClosedProject($data['user']['userid']);
		$data['f_projects_count_closed'] = $projectModel->f_countClosedProject($data['user']['userid']);
		$data['f_projects_closed'] = $projectModel->f_getClosed($data['user']['userid']);
		$data['f_projects_escrow'] = $projectModel->f_escrow($data['user']['userid']);
		$data['f_get_conversation'] = $projectModel->f_get_conversation($data['user']['userid']);
		
		/* Project In Completed */
		$data['f_projects_has_completed'] = $projectModel->f_hasCompletedProject($data['user']['userid']);
		$data['f_projects_count_completed'] = $projectModel->f_countCompletedProject($data['user']['userid']);
		$data['f_projects_completed'] = $projectModel->f_getCompleted($data['user']['userid']);
		$data['f_projects_payments'] = $projectModel->f_payments($data['user']['userid']);
		
		/* Project In Dispute */
		$data['has_disputed_projects'] = $freelancerModel->has_disputed_projects($data['user']['userid']);
		$data['count_disputed_projects'] = $freelancerModel->count_disputed_projects($data['user']['userid']);
		$data['disputed_projects'] = $freelancerModel->disputed_projects($data['user']['userid']);
		$data['get_dispute_conversation'] = $freelancerModel->get_dispute_conversation_user($data['user']['userid']);
		
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data["projects_user"] = $userModel->details();
		
		if(isset($this->url[2]) && $this->url[2] == 'completed') {	
				
                return ['content' => $this->view->render($data, 'freelancer/completed')];
				
        }elseif(isset($this->url[2]) && $this->url[2] == 'disputed') {	
				
                return ['content' => $this->view->render($data, 'freelancer/disputed')];
        }


        return ['content' => $this->view->render($data, 'freelancer/dashboard')];
    }
	
    public function logout() {
        $user = $this->library('User');
		
		$user->logout();
		
		redirect('login');
    }
	
    /**
     * Proposals
     */
    public function proposals()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use Proposal Model*/
        $proposalModel = $this->model('Proposal');
		$data['hasProposal'] = $proposalModel->has($data['user']['userid']);
		$data['proposals'] = $proposalModel->get($data['user']['userid']);
		$data['projects'] = $proposalModel->getProjects();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');
		
		/*Use Freelancer Model*/
        $freelancerModel = $this->model('Freelancer');

        // Edit
        if(isset($this->url[2]) && $this->url[2] == 'add') {
			
            $has = $proposalModel->hasProject($this->url[3]);

            // If exists
            if($has === true) {
				
				$data['project'] = $proposalModel->getProject($this->url[3]);
			
				$has_proposal = $freelancerModel->hasProposal($this->url[3], $data['user']['userid']);

				// If exists
				if($has_proposal === false) {
				
					$data['client'] = $proposalModel->getUser($data['project']['userid']);

					/*Add Workexperience*/
					if(isset($_POST['add_proposal'])){
					 if ($input->exists()) {

						$validator = $this->library('Validator');
						
						$validation = $validator->check($_POST, [
							   'budget' => [
								 'required' => true,
								 'float' => true,
							   ],
							  'message' => [
								 'required' => true,
							  ],
						]);
							 
						if (!$validation->fails()) {
							
									
						
								$Insert_n = $freelancerModel->addNotification($input->get('projectid'), $data['user']['userid'], $input->get('clientid'), 1); 
								$data['latest_notification'] = $freelancerModel->getLatestNotification($input->get('projectid')); 
								$Insert_p = $freelancerModel->addProposal($input->get('projectid'), 
								                                          $data['user']['userid'], 
																		  $input->get('clientid'),
                  														  $data['latest_notification']['id'],
																		  $input->get('budget')); 
								$insert = $freelancerModel->proposal_conversation($input->get('projectid'), $data['user']['userid'], $input->get('clientid'), $input->get('message'));
								
								if ($insert == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_saved']];
									redirect(FREELANCER_URL.'/proposals');
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
									redirect(FREELANCER_URL.'/proposals');
								}		
								
						 } else {

							 foreach ($validation->errors()->all() as $err) {
								$str = implode(" ",$err);
								 foreach ($err as $r) {
									$_SESSION['errors'][] = ['error', $r];
								 }	
							 }
							 
									redirect(FREELANCER_URL.'/proposals/add/'. $input->get('projectid'));
					   }
						
					 }	
					}
			
					return ['content' => $this->view->render($data, 'freelancer/proposal_add')];	
					
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['already_posted_a_proposal']];
					redirect(FREELANCER_URL.'/proposals');
				}
				
            } else {
                redirect(FREELANCER_URL.'/proposals');
            }	
			
        }elseif(isset($this->url[2]) && $this->url[2] == 'edit') {	
			
            $has = $freelancerModel->has_proposal_no($this->url[3], $data['user']['userid']);

            // If the currency requested exists
            if($has === true) {
				
				
				/* proposal data */
                $data["proposal"] = $freelancerModel->get_proposal_no($this->url[3]);
		
				//Edit
				if(isset($_POST['edit_proposal'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					   'budget' => [
						 'required' => true,
						 'float' => true,
					   ],
					]);
						 
					if (!$validation->fails()) {
				
						$update = $freelancerModel->updateProposal($input->get('budget'), $input->get('id'));
						
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/proposals/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/proposals/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(FREELANCER_URL.'/proposals/edit/'. $input->get('id'));
				   }

				 }
				}			
				
                return ['content' => $this->view->render($data, 'freelancer/proposal_edit')];
				
            } else {
                redirect(FREELANCER_URL.'/proposals');
            }
        }
		

        return ['content' => $this->view->render($data, 'freelancer/proposals')];
    }	
	
	
    /**
     * Notifications
     */
    public function notifications()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$freelancerModel->read_notifications($data['user']['userid']);
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '14';
		$startpoint = ($page * $limit) - $limit;
        $data['has_notifications'] = $freelancerModel->has_notifications($data['user']['userid']);
        $data['notifications_pagination'] = $freelancerModel->notifications_pagination($startpoint, $limit, $data['user']['userid']);
        $data['notifications_projects'] = $freelancerModel->projects();
        $data['notifications_timeago'] = $freelancerModel->notifications_timeago($data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_notifications($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/notifications/');	
		

        return ['content' => $this->view->render($data, 'freelancer/notifications')];
    }	
	
    /**
     * Messages
     */
    public function messages()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_messages'] = $freelancerModel->has_messages($data['user']['userid']);
        $data['messages_pagination'] = $freelancerModel->messages_pagination($startpoint, $limit, $data['user']['userid']);
        $data['messages_projects'] = $freelancerModel->projects();
        $data['unread_conversations'] = $freelancerModel->unread_conversations($data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_messages($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/messages/');
		

        return ['content' => $this->view->render($data, 'freelancer/messages')];
    }	
	
	
    /**
     * chat
     */
    public function chat()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$freelancerModel = $this->model('Freelancer');
		
		if(isset($this->url[2]) && $this->url[2] == 'view') {	
		
			$has = $freelancerModel->has_conversation_no($this->url[4]);

            // If exists
            if($has === true) {
				
				$slug = $freelancerModel->has_user($this->url[3]);

				// If exists
				if($slug === true) {
					
					if(!isset($this->url[5])){
						$pg = 1;
					}else{
						$pg = $this->url[5];
					}
					
					$page = (int) (!isset($pg) ? 1 : $pg);
					$limit = '14';
					$startpoint = ($page * $limit) - $limit;
					
					$freelancerModel->update_conversation_reply($this->url[4], $data['user']['userid']);
					$data['conversation'] = $freelancerModel->get_conversation($this->url[4]);
					$data['total_conversation_reply'] = $freelancerModel->total_conversation_reply($data['conversation']['cid']);
					$data['conversation_reply_pagination'] = $freelancerModel->conversation_reply_pagination($startpoint, $limit, $data['conversation']['cid']);
					$data['pagination'] = $this->Pagination($data['total_conversation_reply'], $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/chat/view/'.$this->url[3].'/'.$this->url[4].'/');
					$data['project'] = $freelancerModel->get_project($data['conversation']['projectid']);
					$data['client'] = $freelancerModel->get_client($data['conversation']['clientid']);
					$data['conversation_reply_timeago'] = $freelancerModel->conversation_reply_timeago($data['conversation']['cid']);
					
					
					return ['content' => $this->view->render($data, 'freelancer/chat_view')];
				}else {
						redirect(FREELANCER_URL.'/messages');
				}
			}else {
						redirect(FREELANCER_URL.'/messages');
            }
        }	
    }
	

	
	
    /**
     * Invites
     */
    public function invites()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$freelancerModel->read_invites($data['user']['userid']);
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_invites'] = $freelancerModel->has_invites($data['user']['userid']);
        $data['invites_pagination'] = $freelancerModel->invites_pagination($startpoint, $limit, $data['user']['userid']);
        $data['invites_projects'] = $freelancerModel->projects();
		$data['pagination'] = $this->Pagination($freelancerModel->total_invites($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/invites/');	
		

        return ['content' => $this->view->render($data, 'freelancer/invites')];
    }	
	

	
    /**
     * files
     */
    public function files()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$freelancerModel->read_files($data['user']['userid']);
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_files'] = $freelancerModel->has_files($data['user']['userid']);
        $data['files_pagination'] = $freelancerModel->files_pagination($startpoint, $limit, $data['user']['userid']);
        $data['files_projects'] = $freelancerModel->get_projects_freelancer($data['user']['userid']);
        $data['files_timeago'] = $freelancerModel->files_timeago($data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_files($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/files/');	
		

        return ['content' => $this->view->render($data, 'freelancer/files')];
    }	
	
	
    public function download()
    {

		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		$data['user_isloggedin'] = $user->isLoggedIn();
		
		if($user->isLoggedIn() === true):	
			
			/* Use Freelancer Model */
			$freelancerModel = $this->model('Freelancer');
			$has_file = $freelancerModel->has_file($this->url[2], $data['user']['userid']);
			if($has_file === true):
			
				$file = $freelancerModel->get_file($this->url[2]);
				$filepath = URL_PATH.'/'.PUBLIC_PATH.'/'.UPLOADS_PATH.'/admin/files/'.$file["fileupload"];	
				
				
				// Process download
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-disposition: attachment; filename=\"" . basename($filepath) . "\""); 
				readfile($filepath);  
				exit;
				
			else:
				$_SESSION['message'][] = ['warning', $this->lang['no_such_file_found']];
				redirect(FREELANCER_URL.'/files');
			endif;
				
			
		else:
			$_SESSION['message'][] = ['warning', $this->lang['please_login_to_download']];
			redirect('login');	
		endif;
    }	

	
	
    /**
     * Add Files
     */
    public function addfiles()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
        $data['files_projects'] = $freelancerModel->get_projects_freelancer($data['user']['userid']);
		
		//Edit Profile Data
		if(isset($_POST['add_file'])){
		 if ($input->exists()) {
			
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'projectid' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
		

				$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
			   
				$name = $_FILES['photoimg']['name'];
				$size = $_FILES['photoimg']['size'];
				$type = $_FILES['photoimg']['type']; 
				// new file size in KB
				$new_size = $size/1024; 

				if(!empty($name))
				{
				  
				  $fileFormat = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);
				  
				  // If there is no error during upload and the file is PNG
				  if($_FILES['photoimg']['error'] == 0)
				   {
					 $fileName = $this->rando().'.'.$fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/files/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {
						  
						$insert = $freelancerModel->add_file($fileName, $input->get('projectid'), $data['user']['userid'], $type, $fileFormat, $new_size);
						
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_saved']];
							redirect(FREELANCER_URL.'/addfiles');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
							redirect(FREELANCER_URL.'/addfiles');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect(FREELANCER_URL.'/addfiles');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect(FREELANCER_URL.'/addfiles');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['file_not_selected']];
							redirect(FREELANCER_URL.'/addfiles');
				  }
		
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				    redirect(FREELANCER_URL.'/addfiles');
		   }
         }
		}
		

        return ['content' => $this->view->render($data, 'freelancer/file_add')];
    }
	



	
	
    /**
     * Escrow
     */
    public function escrow()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$freelancerModel->read_escrow($data['user']['userid']);
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_escrow'] = $freelancerModel->has_escrow($data['user']['userid']);
        $data['escrow_pagination'] = $freelancerModel->escrow_pagination($startpoint, $limit, $data['user']['userid']);
        $data['escrow_projects'] = $freelancerModel->get_projects_freelancer($data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_escrow($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/escrow/');	
		

        return ['content' => $this->view->render($data, 'freelancer/escrow')];
    }	

	

    /**
     * Payments
     */
    public function payments()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_payments'] = $freelancerModel->has_payments($data['user']['userid']);
        $data['payments_pagination'] = $freelancerModel->payments_pagination($startpoint, $limit, $data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_payments($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/payments/');	
		

        return ['content' => $this->view->render($data, 'freelancer/payments')];
    }	
	



		
	
    /**
     * ratings
     */
    public function ratings()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_ratings'] = $freelancerModel->has_ratings($data['user']['userid']);
        $data['ratings_pagination'] = $freelancerModel->ratings_pagination($startpoint, $limit, $data['user']['userid']);
        $data['ratings_projects'] = $freelancerModel->get_projects_freelancer($data['user']['userid']);
        $data['ratings_timeago'] = $freelancerModel->ratings_timeago($data['user']['userid']);
        $data['ratings_value'] = $freelancerModel->ratings_value($data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_ratings($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/ratings/');	
		

        return ['content' => $this->view->render($data, 'freelancer/ratings')];
    }


	
	
    /**
     * Add Rating
     */
    public function addrating()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$has = $freelancerModel->has_project_freelancer($this->url[2], $data['user']['userid']);

		// If exists
		if($has === true) {
			
			$data['project'] = $freelancerModel->get_project($this->url[2]);
			$data['client'] = $freelancerModel->get_client($data['project']['userid']);
			$has_rating = $freelancerModel->has_rating($data['project']['userid'], $data['project']['projectid']);

			// If exists
			if($has_rating === false) {
		
				//Add rating
				if(isset($_POST['add_rating'])){
				 if ($input->exists()) {
					
					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'rate' => [
						 'required' => true,
					  ],
					  'description' => [
						 'required' => true,
					   ],
					]);
						 
					if (!$validation->fails()) {
						
						
						$insert = $freelancerModel->add_rating($input->get('projectid'), 
						                             $data['user']['userid'],
													 $input->get('clientid'), 
													 $input->get('rate'), 
													 $input->get('description'));
							
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_saved']];
							redirect(FREELANCER_URL.'/ratings');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
							redirect(FREELANCER_URL.'/addrating/'. $input->get('projectid'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
							 
							redirect(FREELANCER_URL.'/addrating/'. $input->get('projectid'));
				   }
				 }
				}
			
		
			 return ['content' => $this->view->render($data, 'freelancer/rating_add')];
			 
			 
			} else {
				redirect(FREELANCER_URL.'/ratings');
			}
		} else {
			redirect(FREELANCER_URL.'/ratings');
		}
    }
	
	
    /**
     * Edit Rating
     */
    public function editrating()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$has = $freelancerModel->has_rating_no($this->url[2], $data['user']['userid']);

		// If exists
		if($has === true) {
			
			$data['rating'] = $freelancerModel->get_rating($this->url[2]);
			$data['project'] = $freelancerModel->get_project($data['rating']['projectid']);
			$data['client'] = $freelancerModel->get_client($data['rating']['user_receiving']);

		
				//Add rating
				if(isset($_POST['edit_rating'])){
				 if ($input->exists()) {
					
					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'rate' => [
						 'required' => true,
					  ],
					  'description' => [
						 'required' => true,
					   ],
					]);
						 
					if (!$validation->fails()) {
						
						
						$insert = $clientModel->update_rating($input->get('rate'), 
													 $input->get('description'),
													 $input->get('id'));
							
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/editrating/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/editrating/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
							 
							redirect(FREELANCER_URL.'/editrating/'. $input->get('id'));
				   }
				 }
				}
			
		
			 return ['content' => $this->view->render($data, 'freelancer/rating_edit')];
			 
			 

		} else {
			redirect(FREELANCER_URL.'/ratings');
		}
    }
	

	
	
	
    /**
     * Disputes
     */
    public function disputes()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_disputes'] = $freelancerModel->has_disputes($data['user']['userid']);
        $data['disputes_pagination'] = $freelancerModel->disputes_pagination($startpoint, $limit, $data['user']['userid']);
        $data['disputes_projects'] = $freelancerModel->projects($data['user']['userid']);
        $data['unread_disputes_conversations'] = $freelancerModel->unread_disputes_conversations($data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_disputes($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/disputes/');
		

        return ['content' => $this->view->render($data, 'freelancer/disputes')];
    }
	
	
	
    /**
     * dispute
     */
    public function dispute()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		
		if(isset($this->url[2]) && $this->url[2] == 'view') {	
		
			$has = $freelancerModel->has_dispute_conversation($this->url[4]);

            // If exists
            if($has === true) {
				
				$slug = $freelancerModel->has_user($this->url[3]);

				// If exists
				if($slug === true) {
					
					if(!isset($this->url[5])){
						$pg = 1;
					}else{
						$pg = $this->url[5];
					}
					
					$page = (int) (!isset($pg) ? 1 : $pg);
					$limit = '14';
					$startpoint = ($page * $limit) - $limit;
					
					$freelancerModel->update_dispute_conversation_reply($this->url[4]);
					$data['conversation'] = $freelancerModel->get_dispute_conversation($this->url[4]);
					$data['total_conversation_reply'] = $freelancerModel->total_dispute_conversation_reply($data['conversation']['cid']);
					$data['conversation_reply_pagination'] = $freelancerModel->dispute_conversation_reply_pagination($startpoint, $limit, $data['conversation']['cid']);
					$data['pagination'] = $this->Pagination($data['total_conversation_reply'], $limit, $page, URL_PATH.'/'.CLIENT_URL.'/dispute/view/'.$this->url[3].'/'.$this->url[4].'/');
					$data['project'] = $freelancerModel->get_project($data['conversation']['projectid']);
					$data['client'] = $freelancerModel->get_client($data['conversation']['clientid']);
					$data['admin'] = $freelancerModel->get_admin($data['conversation']['adminid']);
					$data['conversation_reply_timeago'] = $freelancerModel->dispute_conversation_reply_timeago($data['conversation']['cid']);
					
					
					return ['content' => $this->view->render($data, 'freelancer/dispute_view')];
				}else {
						redirect(FREELANCER_URL.'/disputes');
				}
			}else {
						redirect(FREELANCER_URL.'/disputes');
            }
        }	
    }

	

	
	
    /**
     * Start Dispute
     */
    public function startdispute()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Freelancer Model */
		$freelancerModel = $this->model('Freelancer');
		$has = $freelancerModel->has_project($this->url[3]);

		// If exists
		if($has === true) {
				
			$slug = $freelancerModel->has_user($this->url[2]);

			// If exists
			if($slug === true) {
			
				$data['project'] = $freelancerModel->get_project($this->url[3]);
				$data['client'] = $freelancerModel->get_client($data['project']['userid']);
			
					//Add rating
					if(isset($_POST['start_dispute'])){
					 if ($input->exists()) {
						
						$validator = $this->library('Validator');
						
						$validation = $validator->check($_POST, [
						  'message' => [
							 'required' => true,
						  ],
						]);
							 
						if (!$validation->fails()) {
				
							$has_conversation = $freelancerModel->has_dispute_user($input->get('projectid'), $input->get('clientid'), $data['user']['userid']);

							// If exists
							if($has_conversation === false) {
							
							
								$insert = $freelancerModel->start_dispute($input->get('projectid'),
															 $input->get('clientid'), 
															 $data['user']['userid'], 
															 $input->get('message'));
									
								if ($insert == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_saved']];
									redirect(FREELANCER_URL.'/disputes');
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
									redirect(FREELANCER_URL.'/disputes');
								}				 
			 
							} else {
								$_SESSION['message'][] = ['success', $this->lang['already_started_a_dispute']];
								redirect(FREELANCER_URL.'/disputes');
							}
								
						 } else {

							 foreach ($validation->errors()->all() as $err) {
								$str = implode(" ",$err);
								 foreach ($err as $r) {
									$_SESSION['errors'][] = ['error', $r];
								 }	
							 }
								 
								redirect(FREELANCER_URL.'/startdispute/'. $input->get('clientid') .'/'. $input->get('projectid'));
					   }
					 }
					}
				
			
				 return ['content' => $this->view->render($data, 'freelancer/dispute_add')];
				 
			 
			} else {
				redirect(FREELANCER_URL.'/dashboard');
			}
		} else {
				redirect(FREELANCER_URL.'/dashboard');
		}
    }	
	
	
	

    /**
     * Withdrawals
     */
    public function withdrawals()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use Portfolio Model*/
        $freelancerModel = $this->model('Freelancer');
		
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		

		if(!isset($this->url[2])){
			$pg = 1;
		}elseif(is_numeric($this->url[2])){
			$pg = $this->url[2];
		}elseif(isset($this->url[2]) && $this->url[2] == 'request') {

		
				//Edit
				if(isset($_POST['add_request'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'amount' => [
						 'required' => true,
						 'float' => true
					  ],
					]);
						 
					if (!$validation->fails()) {
					
					    if($data['user']['paypal_email'] == ''):
								$_SESSION['message'][] = ['warning', $this->lang['paypal_email_empty']];
								redirect(FREELANCER_URL.'/withdrawals/request');
                        else:					
						
							if($input->get('amount') >= $data['settings']['withdrawal_limit']):	
						
								if($input->get('amount') <= $data['user']['credit_account']):						
				
									$update = $freelancerModel->add_request($input->get('amount'), 
															  $data['user']['credit_account'], 
															  $data['user']['paypal_email'], 
															  $data['user']['userid'],
															  $data['settings']['transaction_fee'],
															  $data['settings']['pay_freelancers']);
									
										
									if ($update == 1) {
										$_SESSION['message'][] = ['success', $this->lang['details_saved']];
										redirect(FREELANCER_URL.'/withdrawals/request');
									} else {
										$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
										redirect(FREELANCER_URL.'/withdrawals/request');
									}
								
								else:
									$_SESSION['message'][] = ['warning', $this->lang['credit_account_error']];
									redirect(FREELANCER_URL.'/withdrawals/request');
								endif;
								
							else:
								$_SESSION['message'][] = ['warning', $this->lang['withdrawal_limit_error']];
								redirect(FREELANCER_URL.'/withdrawals/request');
                            endif;							
							
						endif;
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(FREELANCER_URL.'/withdrawals/request');
				   }

				 }
				}
				
			return ['content' => $this->view->render($data, 'freelancer/withdrawals_request')];	
			
        }elseif(isset($this->url[2]) && $this->url[2] == 'method') {	

		
				//Edit
				if(isset($_POST['add_method'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'paypal_email' => [
						 'required' => true,
						 'email' => true
					  ],
					]);
						 
					if (!$validation->fails()) {					
				
						$update = $freelancerModel->update_paypal_email($input->get('paypal_email'), $data['user']['userid']);
						
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/withdrawals/method');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/withdrawals/method');
						}
				
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(FREELANCER_URL.'/withdrawals/method');
				   }

				 }
				}
					
				
                return ['content' => $this->view->render($data, 'freelancer/withdrawals_method')];
        }
		
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_withdrawals'] = $freelancerModel->has_withdrawals($data['user']['userid']);
        $data['withdrawals_pagination'] = $freelancerModel->withdrawals_pagination($startpoint, $limit, $data['user']['userid']);
		$data['pagination'] = $this->Pagination($freelancerModel->total_withdrawals($data['user']['userid']), $limit, $page, URL_PATH.'/'.FREELANCER_URL.'/withdrawals/');
				
        return ['content' => $this->view->render($data, 'freelancer/withdrawals')];
	}	
	
	
    /**
     * Edit Profile
     */
    public function editprofile()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use Category Model*/
        $categoryModel = $this->model('Category');
		$data['categories_array'] = $categoryModel->getarray();
		
		/*Use Skills Model*/
        $skillModel = $this->model('Skill');
		$data['skills_array'] = $skillModel->getarray();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');
		
		//Edit Profile Data
		if(isset($_POST['edit_profile'])){
		 if ($input->exists()) {
			
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'name' => [
				 'required' => true,
			  ],
			  'title' => [
				 'required' => true,
			   ],
			  'email' => [
				 'required' => true,
				 'email' => true
			   ],
			  'country' => [
				 'required' => true,
			   ],
			  'categories[]' => [
				 'required' => true,
			   ],
			  'skills[]' => [
				 'required' => true,
			   ],
			  'about' => [
				 'required' => true,
			   ],
			]);
				 
			if (!$validation->fails()) {
				
			   $categories = $input->get('categories');
               $choice1 =implode(',',$categories);
			   
			   $skills = $input->get('skills');
               $choice2 =implode(',',$skills);
			   $slug = $this->slugify($input->get('name'));
				
				
				$update = $userModel->updateFreelancer($input->get('name'), 
				                             $slug, 
				                             $input->get('title'), 
											 $input->get('email'), 
											 $input->get('country'), 
											 $choice1, 
											 $choice2, 
											 $input->get('about'), 
											 $data['user']['userid']);
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
				    redirect(FREELANCER_URL.'/editprofile');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
				    redirect(FREELANCER_URL.'/editprofile');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				    redirect(FREELANCER_URL.'/editprofile');
		   }
         }
		}
		

        return ['content' => $this->view->render($data, 'freelancer/editprofile')];
    }
	

    /**
     * Work Experience
     */
    public function workexperience()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use About Model*/
        $aboutModel = $this->model('About');
		$data['hasWorkExperience'] = $aboutModel->hasWorkExperience($data['user']['userid']);
		$data['WorkExperience'] = $aboutModel->getWorkExperience($data['user']['userid']);
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

        // Edit
        if(isset($this->url[2]) && $this->url[2] == 'add') {

			/*Add Workexperience*/
			if(isset($_POST['add_work_experience'])){
			 if ($input->exists()) {

				$validator = $this->library('Validator');
				
				$validation = $validator->check($_POST, [
					  'year' => [
						 'required' => true,
					  ],
					  'company' => [
						 'required' => true,
					  ],
					  'title' => [
						 'required' => true,
					  ],
					  'description' => [
						 'required' => true,
					  ],
				]);
					 
				if (!$validation->fails()) {
					
					    $type = 1;		
				
						$Insert = $aboutModel->add(
						                          $input->get('year'), 
												  $input->get('company'), 
												  $input->get('title'), 
												  $input->get('description'), 
												  $type, 
												  $data['user']['userid']); 
						
						if ($Insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_saved']];
							redirect(FREELANCER_URL.'/workexperience/add');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
							redirect(FREELANCER_URL.'/workexperience/add');
						}		
						
				 } else {

					 foreach ($validation->errors()->all() as $err) {
						$str = implode(" ",$err);
						 foreach ($err as $r) {
							$_SESSION['errors'][] = ['error', $r];
						 }	
					 }
					 
							redirect(FREELANCER_URL.'/workexperience/add');
			   }
				
			 }	
			}
			
			return ['content' => $this->view->render($data, 'freelancer/workexperience_add')];	
			
        }elseif(isset($this->url[2]) && $this->url[2] == 'edit') {	
			
            $has = $aboutModel->hasWork($this->url[3], $data['user']['userid']);

            // If the currency requested exists
            if($has === true) {
				
				
				/* User data */
                $data["WorkExperience"] = $aboutModel->getWork($this->url[3]);
		
				//Edit
				if(isset($_POST['edit_work_experience'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'year' => [
						 'required' => true,
					  ],
					  'company' => [
						 'required' => true,
					  ],
					  'title' => [
						 'required' => true,
					  ],
					  'description' => [
						 'required' => true,
					  ],
					]);
						 
					if (!$validation->fails()) {
					
					    $type = 1;		
				
						$update = $aboutModel->updateWorkExperience(
						                          $input->get('year'), 
												  $input->get('company'), 
												  $input->get('title'), 
												  $input->get('description'), 
												  $type, 
												  $input->get('id'));
						
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/workexperience/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/workexperience/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(FREELANCER_URL.'/workexperience/edit/'. $input->get('id'));
				   }

				 }
				}			
				
                return ['content' => $this->view->render($data, 'freelancer/workexperience_edit')];
				
            } else {
                redirect(FREELANCER_URL.'/workexperience');
            }
        }
		

        return ['content' => $this->view->render($data, 'freelancer/workexperience')];
    }
	

    /**
     * Education Experience
     */
    public function education()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use About Model*/
        $aboutModel = $this->model('About');
		$data['hasEducation'] = $aboutModel->hasEducation($data['user']['userid']);
		$data['education'] = $aboutModel->getEducation($data['user']['userid']);
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

        // Edit
        if(isset($this->url[2]) && $this->url[2] == 'add') {

			/*Add Workexperience*/
			if(isset($_POST['add_education'])){
			 if ($input->exists()) {

				$validator = $this->library('Validator');
				
				$validation = $validator->check($_POST, [
					  'year' => [
						 'required' => true,
					  ],
					  'degree' => [
						 'required' => true,
					  ],
					  'course' => [
						 'required' => true,
					  ],
					  'description' => [
						 'required' => true,
					  ],
				]);
					 
				if (!$validation->fails()) {
					
					    $type = 2;		
				
						$Insert = $aboutModel->addEducation(
						                          $input->get('year'), 
												  $input->get('degree'), 
												  $input->get('course'), 
												  $input->get('description'), 
												  $type, 
												  $data['user']['userid']); 
						
						if ($Insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_saved']];
							redirect(FREELANCER_URL.'/education/add');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
							redirect(FREELANCER_URL.'/education/add');
						}		
						
				 } else {

					 foreach ($validation->errors()->all() as $err) {
						$str = implode(" ",$err);
						 foreach ($err as $r) {
							$_SESSION['errors'][] = ['error', $r];
						 }	
					 }
					 
							redirect(FREELANCER_URL.'/education/add');
			   }
				
			 }	
			}
			
			return ['content' => $this->view->render($data, 'freelancer/education_add')];	
			
        }elseif(isset($this->url[2]) && $this->url[2] == 'edit') {	
			
            $has = $aboutModel->hasEducationNo($this->url[3], $data['user']['userid']);

            // If the currency requested exists
            if($has === true) {
				
				
				/* User data */
                $data["education"] = $aboutModel->getEducationNo($this->url[3]);
		
				//Edit
				if(isset($_POST['edit_education'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'year' => [
						 'required' => true,
					  ],
					  'degree' => [
						 'required' => true,
					  ],
					  'course' => [
						 'required' => true,
					  ],
					  'description' => [
						 'required' => true,
					  ],
					]);
						 
					if (!$validation->fails()) {
					
					    $type = 2;		
				
						$update = $aboutModel->updateEducation(
						                          $input->get('year'), 
												  $input->get('degree'), 
												  $input->get('course'), 
												  $input->get('description'), 
												  $type, 
												  $input->get('id'));
						
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/education/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/education/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(FREELANCER_URL.'/education/edit/'. $input->get('id'));
				   }

				 }
				}			
				
                return ['content' => $this->view->render($data, 'freelancer/education_edit')];
				
            } else {
                redirect(FREELANCER_URL.'/education');
            }
        }
		

        return ['content' => $this->view->render($data, 'freelancer/education')];
    }
	

    /**
     * Portfolio
     */
    public function portfolio()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/*Use Portfolio Model*/
        $portfolioModel = $this->model('Portfolio');
		$data['has'] = $portfolioModel->has($data['user']['userid']);
		$data['portfolio'] = $portfolioModel->get($data['user']['userid']);
		$data['p'] = $portfolioModel->countPortfolio($data['user']['userid']);
		$data['is_divisible_by_3'] = $this->is_divisible_by_3($data['p']);
		
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

        // Add
        if(isset($this->url[2]) && $this->url[2] == 'add') {

			/*Add Portfolio*/
			if(isset($_POST['add_portfolio'])){
			 if ($input->exists()) {

				$validator = $this->library('Validator');
				
				$validation = $validator->check($_POST, [
					  'description' => [
						 'required' => true,
					  ],
				]);
					 
				if (!$validation->fails()) {
				
					$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
				   
					$name = $_FILES['photoimg']['name'];
					$size = $_FILES['photoimg']['size'];

					if(!empty($name))
					{
					  
					  $fileFormat = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);
					  
					  // If there is no error during upload and the file is PNG
					  if($_FILES['photoimg']['error'] == 0 && in_array($fileFormat, $valid_formats))
					   {
						 $fileName = $this->rando().'.'.$fileFormat;
						 // If the file can't be written on the disk (will return 0)
						 $path = sprintf('%s/../../%s/%s/admin/portfolio/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
						 

						 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
						  {

							$insert = $portfolioModel->add($input->get('description'), $fileName, $data['user']['userid']); 
							
							if ($insert == 1) {
								$_SESSION['message'][] = ['success', $this->lang['details_added']];
								redirect(FREELANCER_URL.'/portfolio/add');
							} else {
								$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
								redirect(FREELANCER_URL.'/portfolio/add');
							}		  
									
						  }else{
							$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
								redirect(FREELANCER_URL.'/portfolio/add');
						  }
					   }else{
							$_SESSION['message'][] = ['error', $this->lang['format_error']];
								redirect(FREELANCER_URL.'/portfolio/add');	
					   }
					  }else{
							$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
								redirect(FREELANCER_URL.'/portfolio/add');
					  }	
						
				 } else {

					 foreach ($validation->errors()->all() as $err) {
						$str = implode(" ",$err);
						 foreach ($err as $r) {
							$_SESSION['errors'][] = ['error', $r];
						 }	
					 }
					 
						redirect(FREELANCER_URL.'/portfolio/add');
			   }
				
			 }	
			}	
			
			return ['content' => $this->view->render($data, 'freelancer/portfolio_add')];	
			
        }elseif(isset($this->url[2]) && $this->url[2] == 'edit') {	
			
            $has = $portfolioModel->hasPortfolio($this->url[3], $data['user']['userid']);

            // If the currency requested exists
            if($has === true) {
				
				
				/* Portfolio data */
                $data["portfolio"] = $portfolioModel->getPortfolio($this->url[3]);

				/*	Edit Portfolio*/
				if(isset($_POST['edit_portfolio'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'description' => [
							 'required' => true,
						  ],
					]);
						 
					if (!$validation->fails()) {
					
						$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
					   
						$name = $_FILES['photoimg']['name'];
						$size = $_FILES['photoimg']['size'];

						if(!empty($name))
						{
						  
						  $fileFormat = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);
						  
						  // If there is no error during upload and the file is PNG
						  if($_FILES['photoimg']['error'] == 0 && in_array($fileFormat, $valid_formats))
						   {
							 $fileName = $this->rando().'.'.$fileFormat;
							 // If the file can't be written on the disk (will return 0)
							 $path = sprintf('%s/../../%s/%s/admin/portfolio/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
							 

							 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
							  {

								// Get the old image
								$oldFileName = $input->get('imagelocation') ?? null;

								// Remove the old variant of the image
								if($oldFileName && $oldFileName != $fileName) {
									unlink($path.$oldFileName);
								}

								$update = $portfolioModel->update($input->get('description'), $fileName, $input->get('id')); 
								
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect(FREELANCER_URL.'/portfolio/edit/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect(FREELANCER_URL.'/portfolio/edit/'. $input->get('id'));
								}		  
										
							  }else{
								$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
									redirect(FREELANCER_URL.'/portfolio/edit/'. $input->get('id'));
							  }
						   }else{
								$_SESSION['message'][] = ['error', $this->lang['format_error']];
									redirect(FREELANCER_URL.'/portfolio/edit/'. $input->get('id'));
						   }
						  }else{
								$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
									redirect(FREELANCER_URL.'/portfolio/edit/'. $input->get('id'));
						  }	
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
									redirect(FREELANCER_URL.'/portfolio/edit/'. $input->get('id'));
				   }
					
				 }	
				}
					
				
                return ['content' => $this->view->render($data, 'freelancer/portfolio_edit')];
				
            } else {
                redirect(FREELANCER_URL.'/portfolio');
            }
        }
				
        return ['content' => $this->view->render($data, 'freelancer/portfolio')];
	}

    /**
     * Image
     */
    public function image()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

		/*Bg Image*/
		if(isset($_POST['post_bg_image'])){
		 if ($input->exists()) {
			
				$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
			   
				$name = $_FILES['photoimg']['name'];
				$size = $_FILES['photoimg']['size'];

				if(!empty($name))
				{
				  
				  $fileFormat = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);
				  
				  // If there is no error during upload and the file is PNG
				  if($_FILES['photoimg']['error'] == 0 && in_array($fileFormat, $valid_formats))
				   {
					 $fileName = $this->rando().'.'.$fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/users/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {

						// Get the old image
						$oldFileName = $data['user']['bg_imagelocation'] ?? null;

						// Remove the old variant of the image
						if($data['user']['bg_imagelocation'] != "wave.jpg"):
							if($oldFileName && $oldFileName != $fileName) {
								unlink($path.$oldFileName);
							}
						endif;

						$update = $userModel->freelancerBgImage($fileName, $data['user']['userid']); 
						
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/image');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/image');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect(FREELANCER_URL.'/image');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect(FREELANCER_URL.'/image');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
							redirect(FREELANCER_URL.'/image');
				  }	
					
			
		 }	
		}	

		/*Image*/
		if(isset($_POST['post_image'])){
		 if ($input->exists()) {
			
				$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
			   
				$name = $_FILES['photoimg']['name'];
				$size = $_FILES['photoimg']['size'];

				if(!empty($name))
				{
				  
				  $fileFormat = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);
				  
				  // If there is no error during upload and the file is PNG
				  if($_FILES['photoimg']['error'] == 0 && in_array($fileFormat, $valid_formats))
				   {
					 $fileName = $this->rando().'.'.$fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/users/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {

						// Get the old image
						$oldFileName = $data['user']['imagelocation'] ?? null;

						// Remove the old variant of the image
						if($data['user']['imagelocation'] != "default.png"):
							if($oldFileName && $oldFileName != $fileName) {
								unlink($path.$oldFileName);
							}
						endif;

						$update = $userModel->freelancerImage($fileName, $data['user']['userid']); 
						
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(FREELANCER_URL.'/image');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(FREELANCER_URL.'/image');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect(FREELANCER_URL.'/image');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect(FREELANCER_URL.'/image');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
							redirect(FREELANCER_URL.'/image');
				  }	
					
			
		 }	
		}	
			
		

        return ['content' => $this->view->render($data, 'freelancer/image')];
    }

    /**
     * Password
     */
    public function password()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

		//Edit
		if(isset($_POST['edit_password'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'password_current' => [
					 'required' => true,
				  ],
				   'password' => [
					 'required' => true,
				   ],
				   'confirmPassword' => [
					 'required' => true,
					 'match' => 'password'
				   ]
			]);
				 
			if (!$validation->fails()) {

				if (password_verify($input->get('password_current'), $data['user']['password'])) {
					
					/* Hash Password */
					$password = password_hash($input->get('password'), PASSWORD_DEFAULT);
					
					$update = $userModel->password($password, $data['user']['userid']);
						
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect(FREELANCER_URL.'/password');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect(FREELANCER_URL.'/password');
					}
					
				} else {
					
					$_SESSION['message'][] = ['error', $this->lang['current_password_does_not_match']];
					redirect(FREELANCER_URL.'/password');
				 
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(FREELANCER_URL.'/password');
		   }

		 }
		}	
			
		

        return ['content' => $this->view->render($data, 'freelancer/password')];
    }
	

    /**
     * Request Verification
     */
    public function request()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');
		
		/* Use Request Model */
		$requestModel = $this->model('Request');

		//post_request
		if(isset($_POST['post_request'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'number' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$has = $requestModel->has($data['user']['userid']);

				if ($has === false) {
					
					$insert = $requestModel->add($input->get('number'), $data['user']['userid']);
					$update = $userModel->updateRequest($data['user']['userid']);
						
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect(FREELANCER_URL.'/request');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect(FREELANCER_URL.'/request');
					}
				}elseif($has === true){
					
					$_SESSION['message'][] = ['error', $this->lang['already_requested']];
					redirect(FREELANCER_URL.'/request');
					
				}	
					
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(FREELANCER_URL.'/request');
		   }

		 }
		}	
			
		

        return ['content' => $this->view->render($data, 'freelancer/request')];
    }	

    /**
     * Email Settings
     */
    public function email()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 1):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');
		

		//post_request
		if(isset($_POST['post_email'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			]);
				 
			if (!$validation->fails()) {
				
					
					$update = $userModel->updateEmail($input->get('email_settings'), $data['user']['userid']);
						
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect(FREELANCER_URL.'/email');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect(FREELANCER_URL.'/email');
					}	
					
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(FREELANCER_URL.'/email');
		   }

		 }
		}	
			
		

        return ['content' => $this->view->render($data, 'freelancer/email')];
    }	
	
	//Random String
	private function rando($length = 14){
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
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
	function is_divisible_by_2($number){ 
		if($number % 2 == 0){ 
			return true;  
		} 
		else{ 
			return false; 
		} 
	}	
	/**
	 * Return the slug of a string to be used in a URL.
	 *
	 * @return String
	 */
	function slugify($text){
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicated - symbols
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
		  return 'n-a';
		}

		return $text;
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
}