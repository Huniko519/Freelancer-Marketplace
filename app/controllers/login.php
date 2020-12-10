<?php

namespace Fir\Controllers;

class Login extends Controller
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

        $user = $this->library('User');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();

        // If the user tries to log-in
			if(isset($_POST['login'])) {
		
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'email' => [
				 'required' => true,
				 'minlength' => 2,
				 'maxlength' => 200
			   ],
			  'password' => [
				 'required' => true,
				 'minlength' => 2,
				 'maxlength' => 200
			   ]
			]);
				 
			if (!$validation->fails()) {
					$email = $_POST['email'];
					$password = $_POST['password'];
					$remember = null;
					
					if(isset($_POST['remember'])) {
					  $remember = ($_POST['remember'] === 'on') ? true : false;
					}

					// Attempt to auth the user
					$auth = $user->login(
						 $email,
						 $password,
						 $remember
					  );

					// If the user has been logged-in
					if($auth) {
						
						 if($user->data()["user_type"] === "1"){
							redirect(FREELANCER_URL.'/dashboard');
						 }elseif($user->data()["user_type"] === "2"){
							redirect(CLIENT_URL.'/dashboard');
						 }
					}
					// If the user could not be logged-in
					elseif(isset($_POST['login'])) {
						$_SESSION['message'][] = ['error', $this->lang['invalid_user_pass']];
					}

				}
			else {
			 foreach ($validation->errors()->all() as $err) {
				$str = implode(" ",$err);
				 foreach ($err as $r) {
					$_SESSION['errors'][] = ['error', $r];
				 }	
			 }
			}
		}	

        return ['content' => $this->view->render($data, 'home/login')];
    }
	

}