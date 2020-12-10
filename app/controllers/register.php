<?php

namespace Fir\Controllers;

class Register extends Controller
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
		if(isset($_POST['register'])) {
		 if ($input->exists()) {
		
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'name' => [
					 'required' => true,
					 'minlength' => 2,
				   ],
				  'email' => [
					 'required' => true,
					 'email' => true,
					 'minlength' => 2,
				  ],		
				   'password' => [
					 'required' => true,
				   ],
				   'confirmPassword' => [
					 'match' => 'password'
				   ]
			]);
				 
			if (!$validation->fails()) {
				
				$has = $userModel->hasEmail($input->get('email'));
				if($has === false):
		
					/* Hass Password */
					$password = password_hash($input->get('password'), PASSWORD_DEFAULT);
					
					/* Unique ID */	
					$userid = $this->uniqueid();	
					$slug = $this->slugify($input->get('name'));	
					
					$remember = null;			
			
					$Insert = $userModel->add($userid, $input->get('name'), $slug, $input->get('email'), $password, $input->get('user_type')); 
					
					if ($Insert == 1) {

						// Attempt to auth the user
						$auth = $user->login(
							 $input->get('email'),
							 $input->get('password'),
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
						
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect('register');
					}
				elseif($has === true):
						$_SESSION['message'][] = ['warning', $this->lang['email_is_available']];
						redirect('register');
                endif;				
					

			}else {
			 foreach ($validation->errors()->all() as $err) {
				$str = implode(" ",$err);
				 foreach ($err as $r) {
					$_SESSION['errors'][] = ['error', $r];
				 }	
			 }
						redirect('register');
			}
		 }	
		}

        return ['content' => $this->view->render($data, 'home/register')];
    }


	
	//Random String
	function uniqueid()
	{
		$un = substr(number_format(time() * rand(),0,'',''),0,12);
		return $un;
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
}