<?php

namespace Fir\Controllers;
 

class Verify extends Controller
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
		 redirect('user/verify');
		}

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		$data['url_one'] = $this->url[1];
		$data['url_two'] = $this->url[2];
		
		/* Use User Model */
        $user = $this->library('User');
			
		/* Use User Model */
		$userModel = $this->model('User');
		
		/* Check Token */
		$has = $userModel->hasRegisterToken($this->url[2]);
		if($has === false):
		 $_SESSION['message'][] = ['warning', $this->lang['token_mismatch']];
		 redirect('user/verify');
		endif;
		
		$m = $userModel->getwithRegisterToken($this->url[2]);

			$update = $userModel->updateVerify($m['userid']); 
			
				
			if ($update == 1) {
				$_SESSION['message'][] = ['success', $this->lang['email_is_now_verified']];
				redirect('user/verify');
			} else {
				$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
				redirect('user/verify');
			}


		 redirect('user/verify');
    }


	
	//Random String
	function uniqueid()
	{
		$un = substr(number_format(time() * rand(),0,'',''),0,12);
		return $un;
	}
}