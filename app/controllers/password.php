<?php

namespace Fir\Controllers;
 

class Password extends Controller
{
    /**
     * This would be your http://localhost/project-name/ index page
     *
     * @return array
     */
    protected $admin;
	
    public function index()
    {
        // Edit
        if(!isset($this->url[1]) && !isset($this->url[2])) {
		 redirect('forgot');
		}

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		$data['url_one'] = $this->url[1];
		$data['url_two'] = $this->url[2];
		
		/* Use User Model */
        $user = $this->library('User');
		if($user->isLoggedIn() === true):
		 redirect('user/dashboard');
		endif;
			
		/* Use User Model */
		$userModel = $this->model('User');
		
		/* Check Token */
		$has = $userModel->hasToken($this->url[2]);
		if($has === false):
		 $_SESSION['message'][] = ['warning', $this->lang['token_mismatch']];
		 redirect('forgot');
		endif;
		
		$m = $userModel->getwithToken($this->url[2]);
		
		/* Use Input Library */
		$input = $this->library('Input');
		

        // If the user tries to log-in
		if(isset($_POST['reset'])) {
		 if ($input->exists()) {
		
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				   'password' => [
					 'required' => true,
				   ],
				   'confirmPassword' => [
					 'match' => 'password'
				   ]	
			]);
				 
			if (!$validation->fails()) {
				
				/* Hass Password */
				$password = password_hash($input->get('password'), PASSWORD_DEFAULT);

				$update = $userModel->updatePassword($password, $m['userid']); 
				
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('login');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
					redirect('login');
				}			
					

			}else {
			 foreach ($validation->errors()->all() as $err) {
				$str = implode(" ",$err);
				 foreach ($err as $r) {
					$_SESSION['errors'][] = ['error', $r];
				 }	
			 }
					redirect('password/'. $this->url[1] .'/'. $this->url[2]);
			}
		 }	
		}


        return ['content' => $this->view->render($data, 'home/password')];
    }


	
	//Random String
	function uniqueid()
	{
		$un = substr(number_format(time() * rand(),0,'',''),0,12);
		return $un;
	}
}