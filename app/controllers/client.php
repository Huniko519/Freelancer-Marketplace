<?php

namespace Fir\Controllers;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Client extends Controller
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use Project Model*/
        $projectModel = $this->model('Project');
		$data['has'] = $projectModel->has($data['user']['userid']);
		$data['projects_has_open'] = $projectModel->hasOpenProject($data['user']['userid']);
		$data['projects_count_open'] = $projectModel->countOpenProject($data['user']['userid']);
		$data['projects'] = $projectModel->get($data['user']['userid']);
		$data['projects_timeago'] = $projectModel->timeago($data['user']['userid']);
		$data['projects_proposals'] = $projectModel->countProposals($data['user']['userid']);
		
		/* Project In Progress */
		$data['projects_has_closed'] = $projectModel->hasClosedProject($data['user']['userid']);
		$data['projects_count_closed'] = $projectModel->countClosedProject($data['user']['userid']);
		$data['projects_closed'] = $projectModel->getClosed($data['user']['userid']);
		$data['projects_escrow'] = $projectModel->escrow($data['user']['userid']);
		$data['get_conversation'] = $projectModel->get_conversation_user($data['user']['userid']);
		
		/* Project In Completed */
		$data['projects_has_completed'] = $projectModel->hasCompletedProject($data['user']['userid']);
		$data['projects_count_completed'] = $projectModel->countCompletedProject($data['user']['userid']);
		$data['projects_completed'] = $projectModel->getCompleted($data['user']['userid']);
		$data['projects_payments'] = $projectModel->payments($data['user']['userid']);
		
		/* Project In Dispute */
		$data['has_disputed_projects'] = $projectModel->has_disputed_projects($data['user']['userid']);
		$data['count_disputed_projects'] = $projectModel->count_disputed_projects($data['user']['userid']);
		$data['disputed_projects'] = $projectModel->disputed_projects($data['user']['userid']);
		$data['get_dispute_conversation'] = $projectModel->get_dispute_conversation($data['user']['userid']);
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data["projects_user"] = $userModel->details();
		
		/*Use Category Model*/
        $categoryModel = $this->model('Category');
		$data['categories'] = $categoryModel->details();
		
		/*Use Skills Model*/
        $skillsModel = $this->model('Skill');
		$data['skills'] = $skillsModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
        // Add
        if(isset($this->url[2]) && $this->url[2] == 'add') {

			/*Add Portfolio*/
			if(isset($_POST['add_project'])){
			 if ($input->exists()) {

				$validator = $this->library('Validator');
				
				$validation = $validator->check($_POST, [
						  'title' => [
							 'required' => true
						  ],
						   'budget' => [
							 'required' => true
						   ],
						   'category' => [
							 'required' => true
						   ],
						   'skills[]' => [
							 'required' => true
						   ],
						   'description' => [
							 'required' => true
						   ],
				]);
					 
				if (!$validation->fails()) {
					
					$projectid = $this->rando();
					$slug = $this->slugify($input->get('title'));
			   
				    $skills = $input->get('skills');
				    $choice2 =implode(',',$skills);
				

					$insert = $projectModel->add($projectid,
												   $data['user']['userid'],
					                               $input->get('title'),
					                               $slug,
					                               $input->get('budget'),
					                               $input->get('category'),
					                               $choice2,
					                               $input->get('description')); 
					
					if ($insert == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_added']];
						redirect(CLIENT_URL.'/dashboard/add');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect(CLIENT_URL.'/dashboard/add');
					}		  
									
						
				 } else {

					 foreach ($validation->errors()->all() as $err) {
						$str = implode(" ",$err);
						 foreach ($err as $r) {
							$_SESSION['errors'][] = ['error', $r];
						 }	
					 }
					 
						redirect(CLIENT_URL.'/dashboard/add');
			   }
				
			 }	
			}	
			
			return ['content' => $this->view->render($data, 'client/project_add')];	
			
        }elseif(isset($this->url[2]) && $this->url[2] == 'edit') {	
			
            $has = $projectModel->hasProjectNo($this->url[3], $data['user']['userid']);

            // If the currency requested exists
            if($has === true) {
				
				
				/* User data */
                $data["project"] = $projectModel->getProjectNo($this->url[3]);
		
				/*Use Skills Model*/
				$skillModel = $this->model('Skill');
				$data['skills_array'] = $skillModel->getarray();
		
				//Edit
				if(isset($_POST['edit_project'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'title' => [
							 'required' => true
						  ],
						   'budget' => [
							 'required' => true
						   ],
						   'category' => [
							 'required' => true
						   ],
						   'skills[]' => [
							 'required' => true
						   ],
						   'description' => [
							 'required' => true
						   ],
					]);
						 
					if (!$validation->fails()) {
						
						
					$slug = $this->slugify($input->get('title'));
			   
				    $skills = $input->get('skills');
				    $choice2 =implode(',',$skills);
							
				
						$update = $projectModel->updateProject(
					                               $input->get('title'),
					                               $slug,
					                               $input->get('budget'),
					                               $input->get('category'),
					                               $choice2,
					                               $input->get('description'),
												  $input->get('id'));
						
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect(CLIENT_URL.'/dashboard/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(CLIENT_URL.'/dashboard/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(CLIENT_URL.'/dashboard/edit/'. $input->get('id'));
				   }

				 }
				}			
				
                return ['content' => $this->view->render($data, 'client/project_edit')];
				
            } else {
						 
				redirect(CLIENT_URL.'/dashboard');
            }
        }elseif(isset($this->url[2]) && $this->url[2] == 'in-progress') {
				
                return ['content' => $this->view->render($data, 'client/in_progress')];
				
        }elseif(isset($this->url[2]) && $this->url[2] == 'completed') {	
				
                return ['content' => $this->view->render($data, 'client/completed')];
				
        }elseif(isset($this->url[2]) && $this->url[2] == 'disputed') {	
				
                return ['content' => $this->view->render($data, 'client/disputed')];
        }		


        return ['content' => $this->view->render($data, 'client/dashboard')];
    }
	
    public function logout() {
        $user = $this->library('User');
		
		$user->logout();
		
		redirect('login');
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		$clientModel->read_notifications($data['user']['userid']);
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_notifications'] = $clientModel->has_notifications($data['user']['userid']);
        $data['notifications_pagination'] = $clientModel->notifications_pagination($startpoint, $limit, $data['user']['userid']);
        $data['notifications_projects'] = $clientModel->projects($data['user']['userid']);
        $data['notifications_timeago'] = $clientModel->notifications_timeago($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_notifications($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/notifications/');	
		

        return ['content' => $this->view->render($data, 'client/notifications')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_messages'] = $clientModel->has_messages($data['user']['userid']);
        $data['messages_pagination'] = $clientModel->messages_pagination($startpoint, $limit, $data['user']['userid']);
        $data['messages_projects'] = $clientModel->projects($data['user']['userid']);
        $data['unread_conversations'] = $clientModel->unread_conversations($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_messages($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/messages/');
		

        return ['content' => $this->view->render($data, 'client/messages')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		
		if(isset($this->url[2]) && $this->url[2] == 'view') {	
		
			$has = $clientModel->has_conversation($this->url[4]);

            // If exists
            if($has === true) {
				
				$slug = $clientModel->has_user($this->url[3]);

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
					
					$clientModel->update_conversation_reply($this->url[4], $data['user']['userid']);
					$data['conversation'] = $clientModel->get_conversation($this->url[4]);
					$data['total_conversation_reply'] = $clientModel->total_conversation_reply($data['conversation']['cid']);
					$data['conversation_reply_pagination'] = $clientModel->conversation_reply_pagination($startpoint, $limit, $data['conversation']['cid']);
					$data['pagination'] = $this->Pagination($data['total_conversation_reply'], $limit, $page, URL_PATH.'/'.CLIENT_URL.'/chat/view/'.$this->url[3].'/'.$this->url[4].'/');
					$data['project'] = $clientModel->get_project($data['conversation']['projectid']);
					$data['freelancer'] = $clientModel->get_freelancer($data['conversation']['freelancerid']);
					$data['conversation_reply_timeago'] = $clientModel->conversation_reply_timeago($data['conversation']['cid']);
					
					
					return ['content' => $this->view->render($data, 'client/chat_view')];
				}else {
						redirect(CLIENT_URL.'/messages');
				}
			}else {
						redirect(CLIENT_URL.'/messages');
            }
        }	
    }
	
	
    /**
     * proposals
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[3])){
			$pg = 1;
		}else{
			$pg = $this->url[3];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '12';
		$startpoint = ($page * $limit) - $limit;
        $data['has_project'] = $clientModel->has_project($this->url[2]);
        $data['project'] = $clientModel->get_project_no($this->url[2], $data['user']['userid']);
        $data['has_proposals'] = $clientModel->has_proposals($data['project']['projectid']);
        $data['proposals_pagination'] = $clientModel->proposals_pagination($startpoint, $limit, $data['project']['projectid']);
        $data['has_conversation'] = $clientModel->has_conversation_user($data['project']['projectid'], $data['user']['userid']);
		if($data['has_conversation'] === true):
			$data['get_conversation'] = $clientModel->get_conversation_user($data['project']['projectid'], $data['user']['userid']);
		endif;
        $data['freelancers_ratings'] = $clientModel->freelancers_ratings();
		$data['pagination'] = $this->Pagination($clientModel->total_messages($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/proposals/'.$this->url[2].'/');
		

        return ['content' => $this->view->render($data, 'client/proposals')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_invites'] = $clientModel->has_invites($data['user']['userid']);
        $data['invites_pagination'] = $clientModel->invites_pagination($startpoint, $limit, $data['user']['userid']);
        $data['invites_projects'] = $clientModel->projects($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_invites($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/invites/');	
		

        return ['content' => $this->view->render($data, 'client/invites')];
    }	
	
	
    /**
     * invite
     */
    public function invite()
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		
		$has = $clientModel->has_user($this->url[2]);

		// If exists
		if($has === true) {
				
			$slug = $clientModel->has_slug($this->url[3]);

			// If exists
			if($slug === true) {
				
					
				$data['freelancer'] = $clientModel->get_freelancer($this->url[2]);
				$data['projects'] = $clientModel->projects($data['user']['userid']);
				
				//Invite freelancer
				if(isset($_POST['invite_freelancer'])){
				 if ($input->exists()) {
					
					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
					  'message' => [
						 'required' => true,
					  ],
					]);
						 
					if (!$validation->fails()) {
				
						$has_invite = $clientModel->has_invite($input->get('projectid'), $input->get('freelancerid'), $data['user']['userid']);

						// If exists
						if($has_invite === false) {
				
							$has_proposal = $clientModel->has_proposal($input->get('projectid'), $input->get('freelancerid'), $data['user']['userid']);

							// If exists
							if($has_proposal === false) {
								
								
								$Insert = $clientModel->add_invite($input->get('projectid'), $input->get('freelancerid'), $data['user']['userid'], $input->get('message')); 
								
								if ($Insert == 1) {
									$_SESSION['message'][] = ['success', $this->lang['invited_successfully']];
									redirect(CLIENT_URL.'/invite/'.$input->get('freelancerid').'/'.$input->get('freelancer_slug'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
									redirect(CLIENT_URL.'/invite/'.$input->get('freelancerid').'/'.$input->get('freelancer_slug'));
								}
							
							
								
							} else {
									$_SESSION['message'][] = ['error', $this->lang['already_posted_a_proposal_to_the_project']];
									redirect(CLIENT_URL.'/invite/'.$input->get('freelancerid').'/'.$input->get('freelancer_slug'));
							}
							
						
							
						} else {
								$_SESSION['message'][] = ['error', $this->lang['already_invited_to_do_the_project']];
								redirect(CLIENT_URL.'/invite/'.$input->get('freelancerid').'/'.$input->get('freelancer_slug'));
					    }
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect(CLIENT_URL.'/invite/'.$input->get('freelancerid').'/'.$input->get('freelancer_slug'));
				   }
				 }
				}			
				
				
				return ['content' => $this->view->render($data, 'client/invite')];
				
			}else {
					redirect(CLIENT_URL.'/invites');
			}
				
		}else {
					redirect(CLIENT_URL.'/invites');
		}
    }	
	
	
	
    /**
     * Funds
     */
    public function funds()
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
        $session = $this->library('Session');
		$session->delete('checkout_funds');
		$session->delete('paymentid');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_funds'] = $clientModel->has_funds($data['user']['userid']);
        $data['funds_pagination'] = $clientModel->funds_pagination($startpoint, $limit, $data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_funds($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/funds/');	
		

        return ['content' => $this->view->render($data, 'client/funds')];
    }	
	
	
    /**
     * Add Funds
     */
    public function addfunds()
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
        $session = $this->library('Session');
		$session->delete('checkout_funds');
		$session->delete('paymentid');
		
		//Edit Profile Data
		if(isset($_POST['add_funds'])){
		 if ($input->exists()) {
			
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'amount' => [
					 'required' => true,
					 'digit' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
		
				/* Use Settings Model */
				$settingsModel = $this->model('Settings');
				$data['settings'] = $settingsModel->get();
				
				$amount = $input->get('amount') + $data['settings']['transaction_fee'];
				
				/*Use Session Library*/
				$session = $this->library('Session');
				$session->put("checkout_funds", $amount);
				 
				redirect(CLIENT_URL.'/checkout');
		
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				    redirect(CLIENT_URL.'/addfunds');
		   }
         }
		}
		

        return ['content' => $this->view->render($data, 'client/funds_add')];
    }	

	
	
    /**
     * Checkout
     */
    public function checkout()
    {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
        $data['currency_code'] = $settingsModel->currency_code();
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		$data['user_isloggedin'] = $user->isLoggedIn();
		
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		
		/*Use User Library*/
		$paymentid = $this->rando();
        $session = $this->library('Session');
		
			if(!$session->exists('checkout_funds')){
				$_SESSION['message'][] = ['error', $this->lang['add_funds']];
				redirect(CLIENT_URL.'/addfunds');
			}
			
		$amount = $session->get('checkout_funds');
		$data['amount'] = $amount;
		$session->put("paymentid", $paymentid);
		
		/*PayStack*/
		$data['paystack_id'] = $this->rando();
		$session->put("paystack_id", $data['paystack_id']);
		$data['payment_paystack'] = $data['amount'] * 100;
		
        $_GET['sandbox'] = $data['settings']['sandbox'];  
		
		/* PayPal Section */
		// Setup class
		$p = $this->library('paypal_class');					// initiate an instance of the class.
			$this_script = URL_PATH;
			  $user_email = $user->data()["email"];
			  $usern = $user->data()["name"];
			$p->add_field('business', $data['settings']['paypal_email']); //don't need add this item. if your set the $p -> paypal_mail.
			$p->add_field('return', $this_script.'/'.CLIENT_URL.'/paypal/success/'.$paymentid);
			$p->add_field('cancel_return', $this_script.'/'.CLIENT_URL.'/paypal/cancel');
			$p->add_field('notify_url', $this_script.'/'.CLIENT_URL.'/paypal/ipn');
			$p->add_field('item_name', "Funds Checkout");
			$p->add_field('item_number', '');
			$p->add_field('amount', $amount);
			$p->add_field('currency_code',$data['currency_code']);
			$p->add_field('usern', $usern);
			$p->add_field('user_email', $user_email);
			$p->add_field('cmd', '_xclick');
			$p->add_field('rm', '2');	// Return method = POST

			// 0 � all shopping cart payments use the GET method
			// 1 � the buyer's browser is redirected to the return URL by using the GET method, but no payment variables are included
			// 2 � the buyer's browser is redirected to the return URL by using the POST method, and all payment variables are included The default is 0.

			$data['paypal_form'] = $p; // submit the fields to paypal		

		// Setup class
        $p = $this->library('paypal_class');
			$this_script = URL_PATH;
			  $user_email = $user->data()["email"];
			  $usern = $user->data()["name"];
			$p->add_field('business', $data['settings']['paypal_email']); //don't need add this item. if your set the $p -> paypal_mail.
			$p->add_field('return', $this_script.'/'.CLIENT_URL.'/paypal/success/'.$paymentid);
			$p->add_field('cancel_return', $this_script.'/'.CLIENT_URL.'/paypal/cancel');
			$p->add_field('notify_url', $this_script.'/'.CLIENT_URL.'/paypal/ipn');
			$p->add_field('item_name', "Funds Checkout");
			$p->add_field('item_number', '');
			$p->add_field('amount', $amount);
			$p->add_field('currency_code',$data['currency_code']);
			$p->add_field('usern', $usern);
			$p->add_field('user_email', $user_email);
			$p->add_field('cmd', '_xclick');
			$p->add_field('rm', '2');	// Return method = POST

			// 0 � all shopping cart payments use the GET method
			// 1 � the buyer's browser is redirected to the return URL by using the GET method, but no payment variables are included
			// 2 � the buyer's browser is redirected to the return URL by using the POST method, and all payment variables are included The default is 0.

			$data['paypal_form'] = $p; // submit the fields to paypal		

		
		/* Stripe Section */
		$stripe = [
		  "secret_key"      => $data['settings']["stripe_secret_key"],
		  "publishable_key" => $data['settings']["stripe_public_key"],
		];

		\Stripe\Stripe::setApiKey($stripe['secret_key']);
 		
		/* Amount in Cents */
		$data['amount_cents'] = $this->getMoneyAsCents($amount);	
		
    	

        return ['content' => $this->view->render($data, 'client/checkout')];
    }	
	
    public function paypal()
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Session Library */
        $session = $this->library('Session');
		$paymentid = $session->get('paymentid');
		$checkout_funds = $session->get('checkout_funds');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		$amount = $checkout_funds - $data['settings']['transaction_fee'];
	
		if($this->url[2] === "success"):	
		
			if($this->url[3] != $paymentid){
				$_SESSION['message'][] = ['error', $this->lang['please_proceed_to_paypal']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/addfunds');
			}
			
			/* Use Funds Model */
			$fundsModel = $this->model('Funds');
			
			$type = "PayPal";
			
			$Insert = $fundsModel->add($paymentid, $user->data()["userid"], $user->data()["credit_account"], $type, $amount, $data['settings']['transaction_fee']);
							
			if ($Insert == 1) {
				$_SESSION['message'][] = ['success', $this->lang['paid_successfully']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			} else {
				$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			}
		
		elseif($this->url[2] === "cancel"):	
		
			$_SESSION['message'][] = ['warning', $this->lang['you_canceled_the_transaction']];
			$session->delete('checkout_funds');
			$session->delete('paymentid');
			redirect(CLIENT_URL.'/addfunds');
		
		elseif($this->url[2] === "ipn"):	
		
			$_SESSION['message'][] = ['warning', $this->lang['instant_payment_notification_not_set']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
			redirect(CLIENT_URL.'/addfunds');
			
		endif;	
    }
	
    public function stripe()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
        $data['currency_code'] = $settingsModel->currency_code();
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Session Library */
        $session = $this->library('Session');
		$checkout_funds = $session->get('checkout_funds');
		$amount = $checkout_funds - $data['settings']['transaction_fee'];
		/* Amount in Cents */
		$data['amount_cents'] = $this->getMoneyAsCents($checkout_funds);	
		
		$paymentid = $this->rando();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Stripe Section */
		$stripe = [
		  "secret_key"      => $data['settings']["stripe_secret_key"],
		  "publishable_key" => $data['settings']["stripe_public_key"],
		];

		\Stripe\Stripe::setApiKey($stripe['secret_key']);
		
	
		if($this->url[2] === "success"):
		
			if(!isset($_POST['stripeToken'])){
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/addfunds');
			}
			
			$token = $_POST['stripeToken'];
			$email = $_POST["stripeEmail"];

			  $customer = \Stripe\Customer::create([
				  'email' => $email,
				  'source'  => $token,
			  ]);

			  $charge = \Stripe\Charge::create([
				  'customer' => $customer->id,
				  'amount'   => $data['amount_cents'],
				  'currency' => $data['currency_code'],
			  ]);
			
			
			/* Use Funds Model */
			$fundsModel = $this->model('Funds');
			
			$type = "Stripe";
			
			$Insert = $fundsModel->add($paymentid, $user->data()["userid"], $user->data()["credit_account"], $type, $amount, $data['settings']['transaction_fee']);
							
			if ($Insert == 1) {
				$_SESSION['message'][] = ['success', $this->lang['paid_successfully']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			} else {
				$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			}
		
		elseif($this->url[2] === "cancel"):	
		
			$_SESSION['message'][] = ['warning', $this->lang['you_canceled_the_transaction']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/addfunds');
			
		endif;	
    }
	

	
    public function razorpay()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
        $data['currency_code'] = $settingsModel->currency_code();
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Session Library */
        $session = $this->library('Session');
		$checkout_funds = $session->get('checkout_funds');
		$amount = $checkout_funds - $data['settings']['transaction_fee'];
		
		/* Amount in Cents */
		$data['amount_cents'] = $this->getMoneyAsCents($checkout_funds);
		
		$paymentid = $this->rando();
		
		if($this->url[2] === "success"):
			
			/* Use Funds Model */
			$fundsModel = $this->model('Funds');
			
			$type = "Razorpay";
			
			$Insert = $fundsModel->add($paymentid, $user->data()["userid"], $user->data()["credit_account"], $type, $amount, $data['settings']['transaction_fee']);
							
			if ($Insert == 1) {
				$_SESSION['message'][] = ['success', $this->lang['paid_successfully']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			} else {
				$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			}
		
		elseif($this->url[2] === "cancel"):	
		
			$_SESSION['message'][] = ['warning', $this->lang['you_canceled_the_transaction']];
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/addfunds');
			
		endif;	
    }	
	

	
    public function paystack()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
        $data['currency_code'] = $settingsModel->currency_code();
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Session Library */
        $session = $this->library('Session');
		$paystack_id = $session->get('paystack_id');
		$checkout_funds = $session->get('checkout_funds');
		$amount = $checkout_funds - $data['settings']['transaction_fee'];
		
		if($this->url[2] != $paystack_id){
			$_SESSION['message'][] = ['error', 'Invalid Paystack Reference Code'];
				$session->delete('paystack_id');
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
		}else{	
		
			$paymentid = $this->rando();
			
			/* Use Funds Model */
			$fundsModel = $this->model('Funds');
			
			$type = "PayStack";
			
			$Insert = $fundsModel->add($paymentid, $user->data()["userid"], $user->data()["credit_account"], $type, $amount, $data['settings']['transaction_fee']);
							
			if ($Insert == 1) {
				$_SESSION['message'][] = ['success', $this->lang['paid_successfully']];
				$session->delete('paystack_id');
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			} else {
				$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
				$session->delete('paystack_id');
				$session->delete('checkout_funds');
				$session->delete('paymentid');
				redirect(CLIENT_URL.'/funds');
			}
			
		}

		
    }
	
    public function bank()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
        $data['currency_code'] = $settingsModel->currency_code();
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		if(!$user->isLoggedIn()):
			redirect('login');
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Session Library */
        $session = $this->library('Session');
		$checkout_funds = $session->get('checkout_funds');
		$amount = $checkout_funds - $data['settings']['transaction_fee'];
		
			
		/* Use Funds Model */
		$fundsModel = $this->model('Funds');
		
		$type = "Bank Transfer";
		
		/* Use Input Library */
		$input = $this->library('Input');
		

		//Edit Bank Details
		if(isset($_POST['post_bank'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'transaction_id' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
			
				$Insert = $fundsModel->add_bank($input->get('transaction_id'), 
				                           $user->data()["userid"], 
										   $user->data()["credit_account"], 
										   $type, 
										   $amount, 
										   $data['settings']['transaction_fee']);
								
				if ($Insert == 1) {
					$_SESSION['message'][] = ['success', $this->lang['paid_successfully']];
					$session->delete('checkout_funds');
					$session->delete('paymentid');
					redirect(CLIENT_URL.'/funds');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
					$session->delete('checkout_funds');
					$session->delete('paymentid');
					redirect(CLIENT_URL.'/funds');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(CLIENT_URL.'/checkout');
		   }

		 }
		}		
			

		
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_escrow'] = $clientModel->has_escrow($data['user']['userid']);
        $data['escrow_pagination'] = $clientModel->escrow_pagination($startpoint, $limit, $data['user']['userid']);
        $data['escrow_projects'] = $clientModel->projects($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_escrow($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/escrow/');	
		

        return ['content' => $this->view->render($data, 'client/escrow')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		$clientModel->read_files($data['user']['userid']);
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_files'] = $clientModel->has_files($data['user']['userid']);
        $data['files_pagination'] = $clientModel->files_pagination($startpoint, $limit, $data['user']['userid']);
        $data['files_projects'] = $clientModel->projects($data['user']['userid']);
        $data['files_timeago'] = $clientModel->files_timeago($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_files($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/files/');	
		

        return ['content' => $this->view->render($data, 'client/files')];
    }	
	
    public function download()
    {

		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		$data['user_isloggedin'] = $user->isLoggedIn();
		
		if($user->isLoggedIn() === true):	
			
			/* Use Client Model */
			$clientModel = $this->model('Client');
			$has_file = $clientModel->has_file($this->url[2], $data['user']['userid']);
			if($has_file === true):
			
				$file = $clientModel->get_file($this->url[2]);
				$filepath = URL_PATH.'/'.PUBLIC_PATH.'/'.UPLOADS_PATH.'/admin/files/'.$file["fileupload"];	
				
				
				// Process download
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-disposition: attachment; filename=\"" . basename($filepath) . "\""); 
				readfile($filepath);  
				exit;
				
			else:
				$_SESSION['message'][] = ['warning', $this->lang['no_such_file_found']];
				redirect(CLIENT_URL.'/files');
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
        $data['files_projects'] = $clientModel->projects_closed($data['user']['userid']);
		
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
						  
						$insert = $clientModel->add_file($fileName, $input->get('projectid'), $data['user']['userid'], $type, $fileFormat, $new_size);
						
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_saved']];
							redirect(CLIENT_URL.'/addfiles');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
							redirect(CLIENT_URL.'/addfiles');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect(CLIENT_URL.'/addfiles');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect(CLIENT_URL.'/addfiles');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['file_not_selected']];
							redirect(CLIENT_URL.'/addfiles');
				  }
		
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				    redirect(CLIENT_URL.'/addfiles');
		   }
         }
		}
		

        return ['content' => $this->view->render($data, 'client/file_add')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_payments'] = $clientModel->has_payments($data['user']['userid']);
        $data['payments_pagination'] = $clientModel->payments_pagination($startpoint, $limit, $data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_payments($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/payments/');	
		

        return ['content' => $this->view->render($data, 'client/payments')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_ratings'] = $clientModel->has_ratings($data['user']['userid']);
        $data['ratings_pagination'] = $clientModel->ratings_pagination($startpoint, $limit, $data['user']['userid']);
        $data['ratings_projects'] = $clientModel->projects($data['user']['userid']);
        $data['ratings_timeago'] = $clientModel->ratings_timeago($data['user']['userid']);
        $data['ratings_value'] = $clientModel->ratings_value($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_ratings($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/ratings/');	
		

        return ['content' => $this->view->render($data, 'client/ratings')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		$has = $clientModel->has_project($this->url[2]);

		// If exists
		if($has === true) {
			
			$data['project'] = $clientModel->get_project($this->url[2]);
			$data['freelancer'] = $clientModel->get_freelancer($data['project']['freelancerid']);
			$has_rating = $clientModel->has_rating($data['project']['freelancerid'], $data['project']['projectid']);

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
						
						
						$insert = $clientModel->add_rating($input->get('projectid'), 
						                             $data['user']['userid'],
													 $input->get('freelancerid'), 
													 $input->get('rate'), 
													 $input->get('description'));
							
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_saved']];
							redirect(CLIENT_URL.'/ratings');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
							redirect(CLIENT_URL.'/addrating/'. $input->get('projectid'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
							 
							redirect(CLIENT_URL.'/addrating/'. $input->get('projectid'));
				   }
				 }
				}
			
		
			 return ['content' => $this->view->render($data, 'client/rating_add')];
			 
			 
			} else {
				redirect(CLIENT_URL.'/ratings');
			}
		} else {
			redirect(CLIENT_URL.'/ratings');
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		$has = $clientModel->has_rating_no($this->url[2], $data['user']['userid']);

		// If exists
		if($has === true) {
			
			$data['rating'] = $clientModel->get_rating($this->url[2]);
			$data['project'] = $clientModel->get_project($data['rating']['projectid']);
			$data['freelancer'] = $clientModel->get_freelancer($data['rating']['user_receiving']);

		
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
							redirect(CLIENT_URL.'/editrating/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(CLIENT_URL.'/editrating/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
							 
							redirect(CLIENT_URL.'/editrating/'. $input->get('id'));
				   }
				 }
				}
			
		
			 return ['content' => $this->view->render($data, 'client/rating_edit')];
			 
			 

		} else {
			redirect(CLIENT_URL.'/ratings');
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_disputes'] = $clientModel->has_disputes($data['user']['userid']);
        $data['disputes_pagination'] = $clientModel->disputes_pagination($startpoint, $limit, $data['user']['userid']);
        $data['disputes_projects'] = $clientModel->projects($data['user']['userid']);
        $data['unread_disputes_conversations'] = $clientModel->unread_disputes_conversations($data['user']['userid']);
		$data['pagination'] = $this->Pagination($clientModel->total_disputes($data['user']['userid']), $limit, $page, URL_PATH.'/'.CLIENT_URL.'/disputes/');
		

        return ['content' => $this->view->render($data, 'client/disputes')];
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		
		if(isset($this->url[2]) && $this->url[2] == 'view') {	
		
			$has = $clientModel->has_dispute_conversation($this->url[4]);

            // If exists
            if($has === true) {
				
				$slug = $clientModel->has_user($this->url[3]);

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
					
					$clientModel->update_dispute_conversation_reply($this->url[4]);
					$data['conversation'] = $clientModel->get_dispute_conversation($this->url[4]);
					$data['total_conversation_reply'] = $clientModel->total_dispute_conversation_reply($data['conversation']['cid']);
					$data['conversation_reply_pagination'] = $clientModel->dispute_conversation_reply_pagination($startpoint, $limit, $data['conversation']['cid']);
					$data['pagination'] = $this->Pagination($data['total_conversation_reply'], $limit, $page, URL_PATH.'/'.CLIENT_URL.'/dispute/view/'.$this->url[3].'/'.$this->url[4].'/');
					$data['project'] = $clientModel->get_project($data['conversation']['projectid']);
					$data['freelancer'] = $clientModel->get_freelancer($data['conversation']['freelancerid']);
					$data['admin'] = $clientModel->get_admin($data['conversation']['adminid']);
					$data['conversation_reply_timeago'] = $clientModel->dispute_conversation_reply_timeago($data['conversation']['cid']);
					
					
					return ['content' => $this->view->render($data, 'client/dispute_view')];
				}else {
						redirect(CLIENT_URL.'/disputes');
				}
			}else {
						redirect(CLIENT_URL.'/disputes');
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Client Model */
		$clientModel = $this->model('Client');
		$has = $clientModel->has_project($this->url[3]);

		// If exists
		if($has === true) {
				
			$slug = $clientModel->has_user($this->url[2]);

			// If exists
			if($slug === true) {
			
				$data['project'] = $clientModel->get_project($this->url[3]);
				$data['freelancer'] = $clientModel->get_freelancer($data['project']['freelancerid']);
			
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
				
							$has_conversation = $clientModel->has_dispute_user($input->get('projectid'), $data['user']['userid'], $input->get('freelancerid'));

							// If exists
							if($has_conversation === false) {
							
							
								$insert = $clientModel->start_dispute($input->get('projectid'), 
															 $data['user']['userid'],
															 $input->get('freelancerid'), 
															 $input->get('message'));
									
								if ($insert == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_saved']];
									redirect(CLIENT_URL.'/disputes');
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
									redirect(CLIENT_URL.'/disputes');
								}				 
			 
							} else {
								$_SESSION['message'][] = ['success', $this->lang['already_started_a_dispute']];
								redirect(CLIENT_URL.'/disputes');
							}
								
						 } else {

							 foreach ($validation->errors()->all() as $err) {
								$str = implode(" ",$err);
								 foreach ($err as $r) {
									$_SESSION['errors'][] = ['error', $r];
								 }	
							 }
								 
								redirect(CLIENT_URL.'/startdispute/'. $input->get('freelancerid') .'/'. $input->get('projectid'));
					   }
					 }
					}
				
			
				 return ['content' => $this->view->render($data, 'client/dispute_add')];
				 
			 
			} else {
				redirect(CLIENT_URL.'/dashboard/in-progress');
			}
		} else {
				redirect(CLIENT_URL.'/dashboard/in-progress');
		}
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
		elseif($data['user']['user_type'] != 2):
			redirect('login');
		endif;
		
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
			  'website' => [
				 'required' => true,
			   ],
			]);
				 
			if (!$validation->fails()) {
				
			   $slug = $this->slugify($input->get('name'));
				
				
				$update = $userModel->updateClient($input->get('name'), 
				                             $slug, 
				                             $input->get('title'), 
											 $input->get('email'), 
											 $input->get('country'), 
											 $input->get('website'), 
											 $data['user']['userid']);
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
				    redirect(CLIENT_URL.'/editprofile');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
				    redirect(CLIENT_URL.'/editprofile');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				    redirect(CLIENT_URL.'/editprofile');
		   }
         }
		}
		

        return ['content' => $this->view->render($data, 'client/editprofile')];
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
		elseif($data['user']['user_type'] != 2):
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
							redirect(CLIENT_URL.'/image');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(CLIENT_URL.'/image');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect(CLIENT_URL.'/image');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect(CLIENT_URL.'/image');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
							redirect(CLIENT_URL.'/image');
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
							redirect(CLIENT_URL.'/image');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect(CLIENT_URL.'/image');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect(CLIENT_URL.'/image');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect(CLIENT_URL.'/image');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
							redirect(CLIENT_URL.'/image');
				  }	
					
			
		 }	
		}	
			
		

        return ['content' => $this->view->render($data, 'client/image')];
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
		elseif($data['user']['user_type'] != 2):
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
						redirect(CLIENT_URL.'/password');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect(CLIENT_URL.'/password');
					}
					
				} else {
					
					$_SESSION['message'][] = ['error', $this->lang['current_password_does_not_match']];
					redirect(CLIENT_URL.'/password');
				 
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(CLIENT_URL.'/password');
		   }

		 }
		}	
			
		

        return ['content' => $this->view->render($data, 'client/password')];
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
		elseif($data['user']['user_type'] != 2):
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
						redirect(CLIENT_URL.'/request');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect(CLIENT_URL.'/request');
					}
				}elseif($has === true){
					
					$_SESSION['message'][] = ['error', $this->lang['already_requested']];
					redirect(CLIENT_URL.'/request');
					
				}	
					
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(CLIENT_URL.'/request');
		   }

		 }
		}	
			
		

        return ['content' => $this->view->render($data, 'client/request')];
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
		elseif($data['user']['user_type'] != 2):
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
						redirect(CLIENT_URL.'/email');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect(CLIENT_URL.'/email');
					}	
					
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect(CLIENT_URL.'/email');
		   }

		 }
		}	
			
		

        return ['content' => $this->view->render($data, 'client/email')];
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
	
	//Time Ago
	function ago($i){
		$m = time()-$i; $o='just now';
		$t = array('year'=>31556926,'month'=>2629744,'week'=>604800, 'day'=>86400,'hour'=>3600,'minute'=>60,'second'=>1);
		foreach($t as $u=>$s){
			if($s<=$m){$v=floor($m/$s); $o="$v $u".($v==1?'':'s').' ago'; break;}
		}
		return $o;
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
	
	//Money As Cents
	private function getMoneyAsCents($value)
	{
		// strip out commas
		$value = preg_replace("/\,/i","",$value);
		// strip out all but numbers, dash, and dot
		$value = preg_replace("/([^0-9\.\-])/i","",$value);
		// make sure we are dealing with a proper number now, no +.4393 or 3...304 or 76.5895,94
		if (!is_numeric($value))
		{
			return 0.00;
		}
		// convert to a float explicitly
		$value = (float)$value;
		return round($value,2)*100;
	}	
}