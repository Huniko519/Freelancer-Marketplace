<?php

namespace Fir\Controllers;
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class User extends Controller
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
		if($user->isLoggedIn() === false):
		 redirect('login');
		endif;
		
		/* Use Product Model */
		$productModel = $this->model('Product');
        $data['freebies'] = $productModel->freebies();
		
		/* Totals */
        $data['total_products'] = $productModel->total();
        $data['total_freebies'] = $productModel->totalFreebies();
        $userModel = $this->model('User');
        $data['total_users'] = $userModel->cusers();
		$downloadsModel = $this->model('Downloads');	
        $data['total_downloads'] = $downloadsModel->countD();


        return ['content' => $this->view->render($data, 'user/dashboard')];
    }
	
    public function logout() {
        $user = $this->library('User');
		
		$user->logout();
		
		redirect('login');
    }
	
    public function purchases()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		/*Use Transactions Model*/
		$transactions = $this->model('Transactions');
		$data['transactions'] = $transactions->getProducts($user->data()['userid']);
		$data['has_transactions'] = $transactions->has($user->data()['userid']);
		

        return ['content' => $this->view->render($data, 'user/purchases')];
    }
	
    public function download()
    {

		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		$data['user_isloggedin'] = $user->isLoggedIn();
		
		if($user->isLoggedIn() === true):	
			
			/* Use Product Model */
			$productModel = $this->model('Product');
			$product = $productModel->get($this->url[2]);
			$filepath = $product["s3_link"];	
			
			/* Use Downloads Model */
			$downloadsModel = $this->model('Downloads');			
			$downloadsModel->add($product["productid"],$user->data()["userid"]);
			
			// Process download
			header('Content-Type: application/octet-stream');
			header("Content-Transfer-Encoding: Binary"); 
			header("Content-disposition: attachment; filename=\"" . basename($filepath) . "\""); 
			readfile($filepath);  
			exit;
			
		
		else:
			$_SESSION['message'][] = ['warning', $this->lang['please_login_to_download']];
			redirect('login');	
		endif;
    }
	
    public function transactions()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		/*Use Transactions Model*/
		$transactions = $this->model('Transactions');
		$data['transactions'] = $transactions->getProducts($user->data()['userid']);
		$data['has_transactions'] = $transactions->has($user->data()['userid']);
		

        return ['content' => $this->view->render($data, 'user/transactions')];
    }
	
    public function verify()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		/* Use User Model */
		$userModel = $this->model('User');
		
		if($user->isLoggedIn() != true):
		 redirect('login');
		endif;
		
        // Edit
        if(isset($this->url[2]) && $this->url[2] == 'sendemail') {


			$token = md5(uniqid());
			
			$Update = $userModel->verifyEmail(2, $token, $data['user']['userid']); 
			
			if ($Update == 1) {
				$id = base64_encode($data['user']["userid"]);
			
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
				 $mail->addAddress($data['user']["email"], $data['user']["name"]);
				 $mail->Subject = "Forgot password - " .$data['settings']['sitename'];
				 $mail->isHTML(true);
				 $mail->Body = "
					   <p>Hello ". $data['user']["name"] .",</p>
					   <p>You have requested to reset your password from our website ". $data['settings']['sitename'] .",.</p>
					   <p>Click Following Link To Reset Your Password</p> 
					   <a href='". URL_PATH ."/verify/$id/$token'>click here to reset your password</a>
					   <p>Thank you.</p>
				 ";
				 $mail->send();	
				 
				redirect('user/verify');
			}	 
		}	
		

        return ['content' => $this->view->render($data, 'user/verify')];
    }
	
    public function profile()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		/*Use User Model*/
        $userModel = $this->model('User');
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		//Edit Profile Data
		if(isset($_POST['profile'])){
		 if ($input->exists()) {
			
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'name' => [
				 'required' => true,
			  ],
			  'email' => [
				 'required' => true,
				 'email' => true
			   ]
			]);
				 
			if (!$validation->fails()) {
				
				
				$update = $userModel->update($input->get('name'), $input->get('email'), $data['user']['userid']);
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
				    redirect('user/profile');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
				    redirect('user/profile');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				    redirect('user/profile');
		   }
         }
		}

        return ['content' => $this->view->render($data, 'user/profile')];
    }
	
    public function image()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		/*Use User Model*/
        $userModel = $this->model('User');
		
		/* Use Input Library */
		$input = $this->library('Input');
		

		/*Edit Image Data*/
		if(isset($_POST['picture'])){
		 if ($input->exists()) {
			
			$valid_formats = array("jpg", "png", "gif", "bmp");
		   
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
				
					$update = $userModel->changeImage($fileName, $data['user']['userid']);
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('user/image');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('user/image');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('user/image');
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('user/image');	
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('user/image');
			  }	
			
		 }	
		}

        return ['content' => $this->view->render($data, 'user/image')];
    }
	
    public function password()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/*Use User Library*/
        $user = $this->library('User');
		$data['user'] = $user->data();
		
		/*Use User Model*/
        $userModel = $this->model('User');
		
		/* Use Input Library */
		$input = $this->library('Input');

		
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
						redirect('user/password');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('user/password');
					}
					
				} else {
					
					$_SESSION['message'][] = ['error', $this->lang['current_password_does_not_match']];
						redirect('user/password');
				 
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
						redirect('user/password');
		   }

		 }
		}	

        return ['content' => $this->view->render($data, 'user/password')];
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
}