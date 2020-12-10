<?php

namespace Fir\Controllers;

use Aws\S3\S3Client;

class Admin extends Controller
{
    /**
     * This would be your http://localhost/project-name/ index page
     *
     * @return array
     */
    protected $admin;

    public function index() {
        if (isset($this->url[1]) && $this->url[1] == 'lang') {
            $this->updateLanguage($this->url[2]);
        }
        redirect('admin/login');
    }
	
    public function login()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
			
		$validation = "";	

		/* Use Admin Library */
        $admin = $this->library('Admin');
		if($admin->isLoggedIn() === true):
		 redirect('admin/dashboard');
		endif;
		
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
					$auth = $admin->login(
						 $email,
						 $password,
						 $remember
					  );

					// If the user has been logged-in
					if($auth) {
						redirect('admin/dashboard');
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

        return ['content' => $this->view->render($data, 'admin/login')];
    }

    public function dashboard() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();

		/* Is logged-in */
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Admin Model */
        $adminModel = $this->model('Admin');
		$data['count_projects'] = $adminModel->count_projects();
		$data['count_freelancers'] = $adminModel->count_freelancers();
		$data['count_clients'] = $adminModel->count_clients();
		$data['sum_revenue'] = $adminModel->sum_revenue();
		$data['freelancer_payments'] = $adminModel->freelancer_payments();
		$data['clients_funds'] = $adminModel->clients_funds();
		
		
		$data['themes'] = $this->getThemes();
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		
		//Edit Profile Data
		if(isset($_POST['post_theme'])){
		 if ($input->exists()) {
				
				
				$update = $settingsModel->theme($input->get('name'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['theme_selected_successfully']];
				    redirect('admin/dashboard');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made_theme']];
				    redirect('admin/dashboard');
				}
				
         }
		}			
		
        return ['content' => $this->view->render($data, 'admin/dashboard')];
    }

    /**
     * Get the available Themes
     */
    private function getThemes() {
        $path = sprintf('%s/../../%s/%s/', __DIR__, PUBLIC_PATH, THEME_PATH);

        $themes = scandir($path);

        $output = [];
        foreach($themes as $theme) {
            // Check if the theme has an info.php file a && file_exists($path.$theme.'/icon.png)nd a thumbnail
            if(file_exists($path.$theme.'/info.php') && file_exists($path.$theme.'/icon.png')) {
                // Store the theme information
                require($path.$theme.'/info.php');
                $output[$theme]['name']     = $name;
                $output[$theme]['author']   = $author;
                $output[$theme]['url']      = $url;
                $output[$theme]['version']  = $version;
                $output[$theme]['bootstrap']  = $bootstrap;
                $output[$theme]['path']     = $theme;
            }
        }

        return $output;
    }
	

    /**
     * Boxcard Theme
     */
    public function boxplace()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* URL */
		$data['m'] = $this->url[2];
		$data['n'] = isset($this->url[3]);

		/* Is logged-in */
        $admin = $this->library('Admin');
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;		
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		/* Use Theme Model */
		$themeModel = $this->model('Theme');
        $data['theme'] = $themeModel->get($data['settings']['theme']);
        $data['how_it_works'] = $themeModel->how_it_works();
        $data['customers'] = $themeModel->customers();
        $data['team'] = $themeModel->team();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		//Details
		if(isset($_POST['edit_details'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'title' => [
					 'required' => true,
				  ],
				  'sub_title' => [
					 'required' => true,
				  ],
				  'project_search' => [
					 'required' => true,
				  ],
				  'freelancer_search' => [
					 'required' => true,
				  ],
				  'categories_title' => [
					 'required' => true,
				  ],
				  'portfolio_title' => [
					 'required' => true,
				  ],
				  'how_it_works_title' => [
					 'required' => true,
				  ],
				  'customers_title' => [
					 'required' => true,
				  ],
				  'join_us_title' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $themeModel->update($input->get('title'), 
				                              $input->get('sub_title'), 
											  $input->get('project_search'), 
											  $input->get('freelancer_search'),
				                              $input->get('categories_title'), 
											  $input->get('portfolio_title'), 
											  $input->get('how_it_works_title'), 
											  $input->get('customers_title'), 
											  $input->get('join_us_title'), 
											  $input->get('id'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/boxplace/details');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/boxplace/details');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/boxplace/details');
		   }

		 }
		}
		


		/*Edit Author Image*/
		if(isset($_POST['edit_bgimage'])){
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
				 $path = sprintf('%s/../../%s/%s/admin/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $input->get('bg_image_one') ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
				
					$update = $themeModel->changeImage($fileName, $input->get('id'));
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/boxplace/bgimage');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/boxplace/bgimage');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
					redirect('admin/boxplace/bgimage');
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
					redirect('admin/boxplace/bgimage');
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
					redirect('admin/boxplace/bgimage');
			  }	
			
		 }	
		}
		


		/*Edit Author Image*/
		if(isset($_POST['edit_bgimage_two'])){
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
				 $path = sprintf('%s/../../%s/%s/admin/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $input->get('bg_image_two') ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
				
					$update = $themeModel->changeImageTwo($fileName, $input->get('id'));
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/boxplace/bgimage_two');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/boxplace/bgimage_two');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
					redirect('admin/boxplace/bgimage_two');
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
					redirect('admin/boxplace/bgimage_two');
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
					redirect('admin/boxplace/bgimage_two');
			  }	
			
		 }	
		}
		
		/*Edit Author Image*/
		if(isset($_POST['post_section'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'title' => [
					 'required' => true,
				  ],
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
					 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/how/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {

						$insert = $themeModel->add_how($input->get('title'),
													   $input->get('description'),
													   $fileName); 
						
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_added']];
						redirect('admin/boxplace/how_it_works');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect('admin/boxplace/how_it_works');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/boxplace/how_it_works');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/boxplace/how_it_works');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/boxplace/how_it_works');
				  }	
			} else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
							redirect('admin/boxplace/how_it_works');
		      }	
		 }	
		}

        // Edit Author
        if(isset($this->url[3]) && $this->url[3] == 'edit_how') {			
			
            $has = $themeModel->has_how($this->url[4]);

            // If the currency requested exists
            if($has === true) {
				
			
				/* Faq data */
                $data["how_section"] = $themeModel->get_how($this->url[4]);
			
				//Add Currency Data
				if(isset($_POST['edit_how_section'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'title' => [
							 'required' => true,
						  ],
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
							 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
							 // If the file can't be written on the disk (will return 0)
							 $path = sprintf('%s/../../%s/%s/admin/how/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
							 

							 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
							  {

								// Get the old image
								$oldFileName = $input->get('image') ?? null;

								// Remove the old variant of the image
								if($oldFileName && $oldFileName != $fileName) {
									unlink($path.$oldFileName);
								}

								$update = $themeModel->update_how($input->get('title'), $input->get('description'), $fileName, $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
								}					  
										
							  }else{
								$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
							  }
						   }else{
								$_SESSION['message'][] = ['error', $this->lang['format_error']];
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
						   }
						  }else{
								
								$update = $themeModel->update_how($input->get('title'), $input->get('description'), $input->get('image'), $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
								}	
						  }	
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
									redirect('admin/boxplace/how_it_works/edit_how/'. $input->get('id'));
				   }

				 }
				}
								
				
                return ['content' => $this->view->render($data, 'admin/boxplace')];
				
            } else {
                redirect('admin/boxplace/how_it_works');
            }
        }		
				
		
		/*Edit Author Image*/
		if(isset($_POST['post_customer'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'name' => [
					 'required' => true,
				  ],
				  'title' => [
					 'required' => true,
				  ],
				  'quote' => [
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
					 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/customer/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {

						$insert = $themeModel->add_customer($input->get('name'),
													   $input->get('title'),
													   $input->get('quote'),
													   $fileName); 
						
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_added']];
						redirect('admin/boxplace/customers');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect('admin/boxplace/customers');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/boxplace/customers');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/boxplace/customers');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/boxplace/customers');
				  }	
			} else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
							redirect('admin/boxplace/customers');
		      }	
		 }	
		}
		
		
        // Edit Customer
        if(isset($this->url[3]) && $this->url[3] == 'edit_customer') {			
			
            $has = $themeModel->has_customer($this->url[4]);

            // If the currency requested exists
            if($has === true) {
				
			
				/* Faq data */
                $data["customer"] = $themeModel->get_customer($this->url[4]);
			
				//Add Currency Data
				if(isset($_POST['edit_customer'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'name' => [
							 'required' => true,
						  ],
						  'title' => [
							 'required' => true,
						  ],
						  'quote' => [
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
							 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
							 // If the file can't be written on the disk (will return 0)
							 $path = sprintf('%s/../../%s/%s/admin/customer/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
							 

							 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
							  {

								// Get the old image
								$oldFileName = $input->get('image') ?? null;

								// Remove the old variant of the image
								if($oldFileName && $oldFileName != $fileName) {
									unlink($path.$oldFileName);
								}

								$update = $themeModel->update_customer($input->get('name'), $input->get('title'), $input->get('quote'), $fileName, $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
								}					  
										
							  }else{
								$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
							  }
						   }else{
								$_SESSION['message'][] = ['error', $this->lang['format_error']];
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
						   }
						  }else{
								
								$update = $themeModel->update_customer($input->get('name'), $input->get('title'), $input->get('quote'), $input->get('image'), $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
								}	
						  }	
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
									redirect('admin/boxplace/customers/edit_customer/'. $input->get('id'));
				   }

				 }
				}
								
				
                return ['content' => $this->view->render($data, 'admin/boxplace')];
				
            } else {
                redirect('admin/boxplace/customers');
            }
        }

		/*Post Team */
		if(isset($_POST['post_team'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'name' => [
					 'required' => true,
				  ],
				  'title' => [
					 'required' => true,
				  ],
				  'facebook' => [
					 'required' => true,
				  ],
				  'twitter' => [
					 'required' => true,
				  ],
				  'instagram' => [
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
					 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/team/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {

						$insert = $themeModel->add_team($input->get('name'),
													   $input->get('title'),
													   $input->get('facebook'),
													   $input->get('twitter'),
													   $input->get('instagram'),
													   $fileName); 
						
						if ($insert == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_added']];
						redirect('admin/boxplace/team');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect('admin/boxplace/team');
						}		  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/boxplace/team');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/boxplace/team');
				   }
				  }else{
						$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/boxplace/team');
				  }	
			} else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
							redirect('admin/boxplace/team');
		      }	
		 }	
		}
		
        // Edit Team
        if(isset($this->url[3]) && $this->url[3] == 'edit_team') {			
			
            $has = $themeModel->has_team($this->url[4]);

            // If the currency requested exists
            if($has === true) {
				
			
				/* Faq data */
                $data["team"] = $themeModel->get_team($this->url[4]);
			
				//Add Currency Data
				if(isset($_POST['edit_team'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'name' => [
							 'required' => true,
						  ],
						  'title' => [
							 'required' => true,
						  ],
						  'facebook' => [
							 'required' => true,
						  ],
						  'twitter' => [
							 'required' => true,
						  ],
						  'instagram' => [
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
							 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
							 // If the file can't be written on the disk (will return 0)
							 $path = sprintf('%s/../../%s/%s/admin/team/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
							 

							 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
							  {

								// Get the old image
								$oldFileName = $input->get('image') ?? null;

								// Remove the old variant of the image
								if($oldFileName && $oldFileName != $fileName) {
									unlink($path.$oldFileName);
								}

								$update = $themeModel->update_team($input->get('name'), 
								                                       $input->get('title'), 
																	   $input->get('facebook'),
																	   $input->get('twitter'),
																	   $input->get('instagram'), 
																	   $fileName, 
																	   $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
								}					  
										
							  }else{
								$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
							  }
						   }else{
								$_SESSION['message'][] = ['error', $this->lang['format_error']];
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
						   }
						  }else{
								
								$update = $themeModel->update_team($input->get('name'), 
								                                       $input->get('title'),
																	   $input->get('facebook'),
																	   $input->get('twitter'),
																	   $input->get('instagram'), 
																	   $input->get('image'), 
																	   $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
								}	
						  }	
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
									redirect('admin/boxplace/team/edit_team/'. $input->get('id'));
				   }

				 }
				}
								
				
                return ['content' => $this->view->render($data, 'admin/boxplace')];
				
            } else {
                redirect('admin/boxplace/team');
            }
        }		
		
		//About
		if(isset($_POST['edit_about'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'title' => [
					 'required' => true,
				  ],
				  'description' => [
					 'required' => true,
				  ],
				  'company' => [
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
					 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
					 // If the file can't be written on the disk (will return 0)
					 $path = sprintf('%s/../../%s/%s/admin/about/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
					 

					 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
					  {

						// Get the old image
						$oldFileName = $input->get('image') ?? null;

						// Remove the old variant of the image
						if($oldFileName && $oldFileName != $fileName) {
							unlink($path.$oldFileName);
						}

						$update = $themeModel->update_about($input->get('title'), $input->get('description'), $input->get('company'), $fileName);
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect('admin/boxplace/about');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect('admin/boxplace/about');
						}					  
								
					  }else{
						$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							redirect('admin/boxplace/about');
					  }
				   }else{
						$_SESSION['message'][] = ['error', $this->lang['format_error']];
							redirect('admin/boxplace/about');
				   }
				  }else{
						
						$update = $themeModel->update_about($input->get('title'), $input->get('description'), $input->get('company'), $input->get('image'));
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect('admin/boxplace/about');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect('admin/boxplace/about');
						}	
				  }	
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
							redirect('admin/boxplace/about');
		   }

		 }
		}		
		

        return ['content' => $this->view->render($data, 'admin/boxplace')];
    }
	

    /**
     * Logout
     */
    public function logout() {
        $admin = $this->library('Admin');
		
		$admin->logout();
		
		redirect('admin/login');
    }
	

    /**
     * @param $language string
     */
    private function updateLanguage($language)
    {
        setcookie('lang', $language, time() + (10 * 365 * 24 * 60 * 60), COOKIE_PATH);
        redirect('admin/dashboard');
    }



    public function profile() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		
		//Edit Profile Data
		if(isset($_POST['profile'])){
		 if ($input->exists()) {
			
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'username' => [
				 'required' => true,
				 'maxlength' => 20,
				 'minlength' => 2
			  ],
			  'name' => [
				 'required' => true,
				 'maxlength' => 100,
				 'minlength' => 2
			  ],
			  'email' => [
				 'required' => true,
				 'maxlength' => 255,
				 'email' => true
			   ]
			]);
				 
			if (!$validation->fails()) {
				
				
				$update = $adminModel->profileDetails($input->get('name'), $input->get('username'), $input->get('email'), $data['admin']['adminid']);
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
				    redirect('admin/profile/details');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
				    redirect('admin/profile/details');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/profile/details');
		   }
         }
		}	

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
                 $path = sprintf('%s/../../%s/%s/admin/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $data['admin']['imagelocation'] ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
					$update = $adminModel->profileImage($fileName, $data['admin']['adminid']); 
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('admin/profile/image');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('admin/profile/image');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/profile/image');	
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/profile/image');			
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/profile/image');
			  }	
			
		 }	
		}

		/*Edit Password Data*/
		if(isset($_POST['password'])){
		 if ($input->exists()) {
		 
			
			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'password_current' => [
				 'required' => true,
				 'maxlength' => 300
			  ],
			   'password_new' => [
				 'required' => true,
				 'minlength' => 2
			   ],
			   'password_new_again' => [
				 'required' => true,
				 'match' => 'password_new'
			   ]
			]);
				 
			if (!$validation->fails()) {

				if (password_verify($input->get('password_current'), $data['admin']['password'])) {
					
					/* Hash Password */
					$password = password_hash($input->get('password_new'), PASSWORD_DEFAULT);
					
					$update = $adminModel->password($password, $data['admin']['adminid']);
						
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('admin/profile/password');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('admin/profile/password');
					}
					
				} else {
					
					$_SESSION['message'][] = ['error', $this->lang['current_password_does_not_match']];
						redirect('admin/profile/password');
				 
				}
			  
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/profile/password');
		     }	
		  
			
		 }
		}		
		
        return ['content' => $this->view->render($data, 'admin/profile')];
    }
	
	
	/**
	 * Settings Function
	 */
    public function settings() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();

		//Edit Site Settings Data
		if(isset($_POST['postsite'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'sitename' => [
				 'required' => true,
				 'minlength' => 2
			  ],
			  'title' => [
				 'required' => true,
				 'minlength' => 2
			  ],
			  'description' => [
				 'required' => true,
				 'minlength' => 3
			   ],
			  'keywords' => [
				 'required' => true,
				 'minlength' => 3
			   ],
			  'timezone' => [
				 'required' => true,
			   ]
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->siteDetails($input->get('sitename'), $input->get('title'), $input->get('description'), $input->get('keywords'), $input->get('timezone'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/settings/site');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/settings/site');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/settings/site');
		   }

		 }
		}		

		/*Edit Image Data*/
		if(isset($_POST['postlogo'])){
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
                 $path = sprintf('%s/../../%s/%s/admin/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $data['settings']['logo'] ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
					$update = $settingsModel->siteLogo($fileName); 
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('admin/settings/logo');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('admin/settings/logo');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/settings/logo');	
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/settings/logo');			
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/settings/logo');
			  }	
			
		 }	
		}

		/*Edit Favicon*/
		if(isset($_POST['postfavicon'])){
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
                 $path = sprintf('%s/../../%s/%s/admin/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $data['settings']['favicon'] ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
					$update = $settingsModel->siteFavicon($fileName); 
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('admin/settings/favicon');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('admin/settings/favicon');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/settings/favicon');	
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/settings/favicon');			
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/settings/favicon');
			  }	
			
		 }	
		}

		//Edit Analytics
		if(isset($_POST['postanalytics'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'analytics' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->siteAnalytics($input->get('analytics'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/settings/analytics');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/settings/analytics');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/settings/analytics');
		   }

		 }
		}

		//Edit Contact
		if(isset($_POST['post_contact'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'contact_email' => [
				 'required' => true,
				 'email' => true,
			  ],
			  'contact_phone' => [
				 'required' => true,
			  ],
			  'contact_location' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->contact($input->get('contact_email'), $input->get('contact_phone'), $input->get('contact_location'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/settings/contact');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/settings/contact');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/settings/contact');
		   }

		 }
		}

		//Edit Social
		if(isset($_POST['post_social'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'facebook' => [
				 'required' => true,
			  ],
			  'instagram' => [
				 'required' => true,
			  ],
			  'twitter' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->social($input->get('facebook'), $input->get('instagram'), $input->get('twitter'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/settings/social');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/settings/social');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/settings/social');
		   }

		 }
		}
				
		
		
        return ['content' => $this->view->render($data, 'admin/settings')];
    }
	
	
	/**
	 * Email Settings Function
	 */
    public function email_settings() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();

		//Edit Email
		if(isset($_POST['post_email'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'smtp_host' => [
				 'required' => true,
			  ],
			  'smtp_username' => [
				 'required' => true,
			  ],
			  'smtp_password' => [
				 'required' => true,
			  ],
			  'smtp_encryption' => [
				 'required' => true,
			  ],
			  'smtp_port' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->email($input->get('smtp_host'), $input->get('smtp_username'), $input->get('smtp_password'), $input->get('smtp_encryption'), $input->get('smtp_port'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/email_settings');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/email_settings');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/email_settings');
		   }

		 }
		}		
		
		
        return ['content' => $this->view->render($data, 'admin/email_settings')];
    }
	
	
	/**
	 * Payment Settings Function
	 */
    public function payment_settings() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();

		//Edit PayPal Details
		if(isset($_POST['postpaypal'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'paypal_active' => [
				 'required' => true,
			  ],
			  'sandbox' => [
				 'required' => true
			  ],
			  'paypal_email' => [
				 'required' => true,
				 'email' => true,
			  ]
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->paypal($input->get('paypal_active'), $input->get('sandbox'), $input->get('paypal_email'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/payment_settings/paypal');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/payment_settings/paypal');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/payment_settings/paypal');
		   }

		 }
		}	

		//Edit Stripe Details
		if(isset($_POST['poststripe'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'stripe_active' => [
				 'required' => true,
			  ],
			  'stripe_secret_key' => [
				 'required' => true
			  ],
			  'stripe_public_key' => [
				 'required' => true,
			  ]
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->stripe($input->get('stripe_active'), $input->get('stripe_secret_key'), $input->get('stripe_public_key'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/payment_settings/stripe');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/payment_settings/stripe');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/payment_settings/stripe');
		   }

		 }
		}

		//Edit Razorpay Details
		if(isset($_POST['postrazorpay'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'razorpay_active' => [
				 'required' => true,
			  ],
			  'razorpay_key_id' => [
				 'required' => true
			  ]
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->razorpay($input->get('razorpay_active'), $input->get('razorpay_key_id'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/payment_settings/razorpay');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/payment_settings/razorpay');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/payment_settings/razorpay');
		   }

		 }
		}		

		//Edit Paystack Details
		if(isset($_POST['post_paystack'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'paystack_active' => [
				 'required' => true,
			  ],
			  'paystack_key' => [
				 'required' => true
			  ]
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->paystack($input->get('paystack_active'), $input->get('paystack_key'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/payment_settings/paystack');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/payment_settings/paystack');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/payment_settings/paystack');
		   }

		 }
		}
		//Edit Bank Details
		if(isset($_POST['post_bank'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'bank_active' => [
				 'required' => true,
			  ],
			  'bank_description' => [
				 'required' => true
			  ]
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->bank($input->get('bank_active'), $input->get('bank_description'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/payment_settings/bank_transfer');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/payment_settings/bank_transfer');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/payment_settings/bank_transfer');
		   }

		 }
		}
		
		
        return ['content' => $this->view->render($data, 'admin/payment_settings')];
    }
	
	
	/**
	 * Settings Function
	 */
    public function currency_settings() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
        $data['currency'] = $adminModel->currencyDetails();
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		//Edit Currency Data
		if(isset($_POST['currency_submit'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'currency_select' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $adminModel->currencySelect($input->get('currency_select'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/currency_settings/default');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/currency_settings/default');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/currency_settings/default');
		   }

		 }
		}	
		
		//Add Currency Data
		if(isset($_POST['postcurrency'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'currency_code' => [
					 'required' => true,
				  ],
				  'currency_name' => [
					 'required' => true,
				  ],
				  'currency_symbol' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$insert = $adminModel->currencyAdd($input->get('currency_code'), $input->get('currency_name'), $input->get('currency_symbol'));
					
				if ($insert == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_added']];
					redirect('admin/currency_settings/currency');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
					redirect('admin/currency_settings/currency');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/currency_settings/currency');
		   }

		 }
		}

        // Edit Page
        if(isset($this->url[2]) && $this->url[2] == 'edit') {			
			
            $has = $adminModel->currencyHas($this->url[3]);

            // If the currency requested exists
            if($has === true) {
				
                $data["currency"] = $adminModel->currencyGet($this->url[3]);
			

		
				//Add Currency Data
				if(isset($_POST['editcurrency'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'currency_code' => [
							 'required' => true,
						  ],
						  'currency_name' => [
							 'required' => true,
						  ],
						  'currency_symbol' => [
							 'required' => true,
						  ],
					]);
						 
					if (!$validation->fails()) {
						
						$update = $adminModel->currencyUpdate($input->get('currency_code'), $input->get('currency_name'), $input->get('currency_symbol'), $input->get('currency_id'));
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect('admin/currency_settings/edit/'. $input->get('currency_id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect('admin/currency_settings/edit/'. $input->get('currency_id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/currency_settings/edit/'. $input->get('currency_id'));
				   }

				 }
				}
				
                return ['content' => $this->view->render($data, 'admin/editcurrency')];
				
            } else {
                redirect('admin/currency_settings/currency');
            }
        }	
        // Delete
        elseif(isset($this->url[2]) && $this->url[2] == 'delete') {			
			
            $has = $adminModel->currencyHas($this->url[3]);

            // If the currency requested exists
            if($has === true) {
				
                $data["currency"] = $adminModel->currencyGet($this->url[3]);
		
				//Delete Data
				if(isset($_POST['deletecurrency'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'currency_id' => [
							 'required' => true,
						  ],
					]);
						 
					if (!$validation->fails()) {
						
						$delete = $adminModel->currencyDelete($input->get('currency_id'));
							
						if ($delete == 1) {
							$_SESSION['message'][] = ['success', $this->lang['deleted_successfully']];
							redirect('admin/currency_settings/currency');
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['unable_to_delete']];
							redirect('admin/currency_settings/currency');
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/currency_settings/currency');
				   }

				 }
				}
			
				
                //return ['content' => $this->view->render($data, 'admin/currency_settings')];
				
            } else {
                redirect('admin/currency_settings/currency');
            }
        }	
		
        return ['content' => $this->view->render($data, 'admin/currency_settings')];
    }

	/**
	 * How Settings Function
	 */
    public function how_settings() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		//Edit How Client
		if(isset($_POST['how_client'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'description' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->how_client($input->get('description'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/how_settings/clients');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/how_settings/clients');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/how_settings/clients');
		   }

		 }
		}
		
		//Edit How Freelancer
		if(isset($_POST['how_freelancer'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'description' => [
				 'required' => true,
			  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->how_freelancer($input->get('description'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/how_settings/freelancers');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/how_settings/freelancers');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/how_settings/freelancers');
		   }

		 }
		}

		/*Edit Client Sidebar Image*/
		if(isset($_POST['post_client_image'])){
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
                 $path = sprintf('%s/../../%s/%s/admin/how/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $data['settings']['how_client_image'] ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
					$update = $settingsModel->how_client_image($fileName); 
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('admin/how_settings/client_image');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('admin/how_settings/client_image');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/how_settings/client_image');
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/how_settings/client_image');
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/how_settings/client_image');
			  }	
			
		 }	
		}

		/*Edit Freelancer Sidebar Image*/
		if(isset($_POST['post_freelancer_image'])){
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
                 $path = sprintf('%s/../../%s/%s/admin/how/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
				 

				 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
				  {

					// Get the old image
					$oldFileName = $data['settings']['how_freelancer_image'] ?? null;

					// Remove the old variant of the image
					if($oldFileName && $oldFileName != $fileName) {
						unlink($path.$oldFileName);
					}
					$update = $settingsModel->how_freelancer_image($fileName); 
					
					if ($update == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						redirect('admin/how_settings/freelancer_image');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						redirect('admin/how_settings/freelancer_image');
					}		  
							
				  }else{
					$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
						redirect('admin/how_settings/freelancer_image');
				  }
			   }else{
					$_SESSION['message'][] = ['error', $this->lang['format_error']];
						redirect('admin/how_settings/freelancer_image');
			   }
			  }else{
					$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
						redirect('admin/how_settings/freelancer_image');
			  }	
			
		 }	
		}	
		
	
		
        return ['content' => $this->view->render($data, 'admin/how_settings')];
    }

    /**
     * Add Faq 
     */
    public function add_faq()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Faq Model */
		$faqModel = $this->model('Faq');	
		
		//Add Faq
		if(isset($_POST['post_faq'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'question' => [
					 'required' => true,
				  ],
				  'answer' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$insert = $faqModel->add($input->get('question'), $input->get('answer'));
						
				if ($insert == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_added']];
					redirect('admin/add_faq');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
					redirect('admin/add_faq');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/add_faq');
		   }

		 }
		}


        return ['content' => $this->view->render($data, 'admin/add_faq')];
    }	
	
    /**
     * Faq Settings
     */
    public function faq_settings()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Faq Model */
		$faqModel = $this->model('Faq');
        $data['faq'] = $faqModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');

        // Edit Author
        if(isset($this->url[2]) && $this->url[2] == 'edit') {			
			
            $has = $faqModel->has($this->url[3]);

            // If the currency requested exists
            if($has === true) {
				
			
				/* Faq data */
                $data["faq"] = $faqModel->get($this->url[3]);
			

		
				//Add Currency Data
				if(isset($_POST['edit_faq'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'question' => [
							 'required' => true,
						  ],
						  'answer' => [
							 'required' => true,
						  ],
					]);
						 
					if (!$validation->fails()) {
						
						$update = $faqModel->update($input->get('question'), $input->get('answer'), $input->get('id'));
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect('admin/faq_settings/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect('admin/faq_settings/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/faq_settings/edit/'. $input->get('id'));
				   }

				 }
				}
								
				
                return ['content' => $this->view->render($data, 'admin/edit_faq')];
				
            } else {
                redirect('admin/faq_settings');
            }
        }	


        return ['content' => $this->view->render($data, 'admin/faq_settings')];
    }


    /**
     * Add Category 
     */
    public function add_category()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Category Model */
		$categoryModel = $this->model('Category');	
		
			//Add Category
			if(isset($_POST['post_category'])){
			 if ($input->exists()) {

				$validator = $this->library('Validator');
				
				$validation = $validator->check($_POST, [
					  'name' => [
						 'required' => true,
					  ]
				]);
					 
				if (!$validation->fails()) {
					
					
					$valid_formats = array("jpg", "png", "gif", "bmp");
				   
					$name = $_FILES['photoimg']['name'];
					$size = $_FILES['photoimg']['size'];

					if(!empty($name))
					{
					  
					  $fileFormat = pathinfo($_FILES['photoimg']['name'], PATHINFO_EXTENSION);
					  
					  // If there is no error during upload and the file is PNG
					  if($_FILES['photoimg']['error'] == 0 && in_array($fileFormat, $valid_formats))
					   {
						 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
						 // If the file can't be written on the disk (will return 0)
						 $path = sprintf('%s/../../%s/%s/admin/categories/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
						 

						 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
						  {
				
							$insert = $categoryModel->add($input->get('name'), $fileName);
									
							if ($insert == 1) {
								$_SESSION['message'][] = ['success', $this->lang['details_added']];
								redirect('admin/add_category');
							} else {
								$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
								redirect('admin/add_category');
							}
					  
									
						  }else{
							$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
								redirect('admin/add_category');
						  }
					   }else{
							$_SESSION['message'][] = ['error', $this->lang['format_error']];
								redirect('admin/add_category');
					   }
					  }else{
							$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
								redirect('admin/add_category');
					  }					

						
				 } else {

					 foreach ($validation->errors()->all() as $err) {
						$str = implode(" ",$err);
						 foreach ($err as $r) {
							$_SESSION['errors'][] = ['error', $r];
						 }	
					 }
					 
						redirect('admin/add_category');
			   }

			 }
			}	


        return ['content' => $this->view->render($data, 'admin/add_category')];
    }	

    /**
     * Categories
     */
    public function categories()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Category Model */
		$categoryModel = $this->model('Category');
        $data['category'] = $categoryModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');

        // Edit Author
        if(isset($this->url[2]) && $this->url[2] == 'edit') {			
			
            $has = $categoryModel->has($this->url[3]);

            // If the currency requested exists
            if($has === true) {
				
			
				/* Category data */
                $data["category"] = $categoryModel->get($this->url[3]);

				
				//Add Currency Data
				if(isset($_POST['edit_category'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'name' => [
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
							 $fileName = date('y.m.d.H.i') . "-" . microtime(true) . "-" . mt_rand(0, 99999999) . '.' . $fileFormat;
							 // If the file can't be written on the disk (will return 0)
							 $path = sprintf('%s/../../%s/%s/admin/categories/', __DIR__, PUBLIC_PATH, UPLOADS_PATH);
							 

							 if(move_uploaded_file($_FILES['photoimg']['tmp_name'], $path.$fileName))
							  {

								// Get the old image
								$oldFileName = $input->get('image') ?? null;

								// Remove the old variant of the image
								if($oldFileName && $oldFileName != $fileName) {
									unlink($path.$oldFileName);
								}

								$update = $categoryModel->update($input->get('name'), $fileName, $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/categories/edit/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/categories/edit/'. $input->get('id'));
								}					  
										
							  }else{
								$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
									redirect('admin/categories/edit/'. $input->get('id'));
							  }
						   }else{
								$_SESSION['message'][] = ['error', $this->lang['format_error']];
									redirect('admin/categories/edit/'. $input->get('id'));
						   }
						  }else{
								
								$update = $categoryModel->update($input->get('name'), $input->get('image'), $input->get('id'));
									
								if ($update == 1) {
									$_SESSION['message'][] = ['success', $this->lang['details_updated']];
									redirect('admin/categories/edit/'. $input->get('id'));
								} else {
									$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
									redirect('admin/categories/edit/'. $input->get('id'));
								}	
						  }	
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
									redirect('admin/categories/edit/'. $input->get('id'));
				   }

				 }
				}				
								
				
                return ['content' => $this->view->render($data, 'admin/edit_category')];
				
            } else {
                redirect('admin/categories');
            }
        }	


        return ['content' => $this->view->render($data, 'admin/categories')];
    }	


    /**
     * Add Skill 
     */
    public function add_skill()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Skill Model */
		$skillModel = $this->model('Skill');	
		
		//Add Faq
		if(isset($_POST['post_skill'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'name' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$insert = $skillModel->add($input->get('name'));
						
				if ($insert == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_added']];
					redirect('admin/add_skill');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
					redirect('admin/add_skill');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/add_skill');
		   }

		 }
		}


        return ['content' => $this->view->render($data, 'admin/add_skill')];
    }

    /**
     * Skills
     */
    public function skills()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Skill Model */
		$skillModel = $this->model('Skill');
        $data['skills'] = $skillModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');

        // Edit Author
        if(isset($this->url[2]) && $this->url[2] == 'edit') {			
			
            $has = $skillModel->has($this->url[3]);

            // If the currency requested exists
            if($has === true) {
				
			
				/* Skill data */
                $data["skill"] = $skillModel->get($this->url[3]);
			

		
				//Add Currency Data
				if(isset($_POST['edit_skill'])){
				 if ($input->exists()) {

					$validator = $this->library('Validator');
					
					$validation = $validator->check($_POST, [
						  'name' => [
							 'required' => true,
						  ],
					]);
						 
					if (!$validation->fails()) {
						
						$update = $skillModel->update($input->get('name'), $input->get('id'));
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect('admin/skills/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect('admin/skills/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/skills/edit/'. $input->get('id'));
				   }

				 }
				}
								
				
                return ['content' => $this->view->render($data, 'admin/edit_skill')];
				
            } else {
                redirect('admin/skills');
            }
        }	


        return ['content' => $this->view->render($data, 'admin/skills')];
    }
	

    /**
     * Add User
     */
    public function adduser()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use User Model */
		$userModel = $this->model('User');

		/*Add Author*/
		if(isset($_POST['add_user'])){
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
				  'password' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
		
					/* Hass Password */
					$password = password_hash($input->get('password'), PASSWORD_DEFAULT);
					
					/* Unique ID */	
                    $userid = $this->uniqueid();	
					$slug = $this->slugify($input->get('name'));				
			
					$Insert = $userModel->add($userid, $input->get('name'), $slug, $input->get('email'), $password, $input->get('user_type')); 
					
					if ($Insert == 1) {
						$_SESSION['message'][] = ['success', $this->lang['details_saved']];
						redirect('admin/adduser');
					} else {
						$_SESSION['message'][] = ['warning', $this->lang['error_when_saving']];
						redirect('admin/adduser');
					}		
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/adduser');
		   }
			
		 }	
		}	


        return ['content' => $this->view->render($data, 'admin/adduser')];
    }		
	
	

    /**
     * User List
     */
    public function users()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use User Model */
		$userModel = $this->model('User');
        $data['user'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');

        // Edit
        if(isset($this->url[2]) && $this->url[2] == 'edit') {			
			
            $has = $userModel->has($this->url[4]);

            // If the currency requested exists
            if($has === true) {
				
				/* URL */
				$data['m'] = $this->url[3];
				
				/* User data */
                $data["user"] = $userModel->get($this->url[4]);
			

		
				//Edit
				if(isset($_POST['edit_details'])){
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
					]);
						 
					if (!$validation->fails()) {
						
						$slug = $this->slugify($input->get('name'));	
						
						$update = $userModel->update_user($input->get('name'), $slug, $input->get('email'), $input->get('user_type'), $input->get('userid'));
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							redirect('admin/users/edit/details/'. $input->get('userid'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							redirect('admin/users/edit/details/'. $input->get('userid'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/users/edit/details/'. $input->get('userid'));
				   }

				 }
				}
				


				/*Edit User Image*/
				if(isset($_POST['edit_image'])){
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
							$oldFileName = $input->get('imagelocation') ?? null;

							// Remove the old variant of the image
							if($input->get('imagelocation') != "default.png"):
								if($oldFileName && $oldFileName != $fileName) {
									unlink($path.$oldFileName);
								}
							endif;	
						
							$update = $userModel->changeImage($fileName, $input->get('userid'));
							
							if ($update == 1) {
								$_SESSION['message'][] = ['success', $this->lang['details_updated']];
							    redirect('admin/users/edit/image/'. $input->get('userid'));
							} else {
								$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
							    redirect('admin/users/edit/image/'. $input->get('userid'));
							}		  
									
						  }else{
							$_SESSION['message'][] = ['error', $this->lang['unable_to_upload_image']];
							    redirect('admin/users/edit/image/'. $input->get('userid'));
						  }
					   }else{
							$_SESSION['message'][] = ['error', $this->lang['format_error']];
							    redirect('admin/users/edit/image/'. $input->get('userid'));
					   }
					  }else{
							$_SESSION['message'][] = ['error', $this->lang['image_not_selected']];
							    redirect('admin/users/edit/image/'. $input->get('userid'));
					  }	
					
				 }	
				}	
		
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
  	
						if (password_verify($input->get('password_current'), $input->get('db_password'))) {
							
							/* Hash Password */
							$password = password_hash($input->get('password'), PASSWORD_DEFAULT);
							
							$update = $userModel->password($password, $input->get('userid'));
								
							if ($update == 1) {
								$_SESSION['message'][] = ['success', $this->lang['details_updated']];
								redirect('admin/users/edit/password/'. $input->get('userid'));
							} else {
								$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
								redirect('admin/users/edit/password/'. $input->get('userid'));
							}
							
						} else {
							
							$_SESSION['message'][] = ['error', $this->lang['current_password_does_not_match']];
							redirect('admin/users/edit/password/'. $input->get('userid'));
						 
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/users/edit/details/'. $input->get('userid'));
				   }

				 }
				}			
				
                return ['content' => $this->view->render($data, 'admin/edit_user')];
				
            } else {
                redirect('admin/users');
            }
        }	


        return ['content' => $this->view->render($data, 'admin/users')];
    }

	/**
     * Pages
     */
    public function pages()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		//Refund
		if(isset($_POST['post_refund'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'description' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->updateRefund($input->get('description'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/pages/refund');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/pages/refund');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/pages/refund');
		   }

		 }
		}
		
		//Terms
		if(isset($_POST['post_terms'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'description' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->updateTerms($input->get('description'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/pages/terms');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/pages/terms');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/pages/terms');
		   }

		 }
		}
		
		//Privacy
		if(isset($_POST['post_privacy'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
				  'description' => [
					 'required' => true,
				  ],
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->updatePrivacy($input->get('description'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/pages/privacy');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/pages/privacy');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
					redirect('admin/pages/privacy');
		   }

		 }
		}
		

        return ['content' => $this->view->render($data, 'admin/pages')];
    }


	
	/**
	 * Revenue Settings Function
	 */
    public function revenue() {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Admin Library */
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		/* Use Settings Model */
		$settingsModel = $this->model('Settings');
        $data['settings'] = $settingsModel->get();

		//Edit Email
		if(isset($_POST['post_revenue'])){
		 if ($input->exists()) {

			$validator = $this->library('Validator');
			
			$validation = $validator->check($_POST, [
			  'revenue' => [
				 'required' => true
			   ], 
			  'transaction_fee' => [
				 'required' => true,
				 'float' => true
			   ], 
			  'pay_freelancers' => [
				 'required' => true,
				 'digit' => true
			   ], 
			  'withdrawal_limit' => [
				 'required' => true,
				 'float' => true
			   ], 
			]);
				 
			if (!$validation->fails()) {
				
				$update = $settingsModel->revenue($input->get('revenue'), $input->get('transaction_fee'), $input->get('pay_freelancers'), $input->get('withdrawal_limit'));
					
				if ($update == 1) {
					$_SESSION['message'][] = ['success', $this->lang['details_updated']];
					redirect('admin/revenue');
				} else {
					$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
					redirect('admin/revenue');
				}
					
			 } else {

				 foreach ($validation->errors()->all() as $err) {
					$str = implode(" ",$err);
					 foreach ($err as $r) {
						$_SESSION['errors'][] = ['error', $r];
					 }	
				 }
				 
				 redirect('admin/revenue');
		   }

		 }
		}		
		
		
        return ['content' => $this->view->render($data, 'admin/revenue')];
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
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		if(!isset($this->url[2])){
			$pg = 1;
		}else{
			$pg = $this->url[2];
		}
		
		$page = (int) (!isset($pg) ? 1 : $pg);
		$limit = '10';
		$startpoint = ($page * $limit) - $limit;
        $data['has_disputes'] = $adminModel->has_disputes();
        $data['disputes_pagination'] = $adminModel->disputes_pagination($startpoint, $limit);
        $data['disputes_projects'] = $adminModel->projects();
        $data['unread_disputes_conversations'] = $adminModel->unread_disputes_conversations();
		$data['pagination'] = $this->Pagination($adminModel->total_disputes(), $limit, $page, URL_PATH.'/admin/disputes/');
		

        return ['content' => $this->view->render($data, 'admin/disputes')];
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
		
		/* URL */
		$data['m'] = $this->url[2];
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		
		if(isset($this->url[2]) && $this->url[2] == 'view') {	
		
			$has = $adminModel->has_dispute_conversation($this->url[3]);

            // If exists
            if($has === true) {
					
					if(!isset($this->url[4])){
						$pg = 1;
					}else{
						$pg = $this->url[4];
					}
					
					$page = (int) (!isset($pg) ? 1 : $pg);
					$limit = '14';
					$startpoint = ($page * $limit) - $limit;
					
					$adminModel->update_dispute_conversation_reply($this->url[3]);
					$data['conversation'] = $adminModel->get_dispute_conversation($this->url[3]);
					$data['total_conversation_reply'] = $adminModel->total_dispute_conversation_reply($data['conversation']['cid']);
					$data['conversation_reply_pagination'] = $adminModel->dispute_conversation_reply_pagination($startpoint, $limit, $data['conversation']['cid']);
					$data['pagination'] = $this->Pagination($data['total_conversation_reply'], $limit, $page, URL_PATH.'/admin/dispute/view/'.$this->url[3].'/');
					$data['project'] = $adminModel->get_project($data['conversation']['projectid']);
					$data['conversation_reply_timeago'] = $adminModel->dispute_conversation_reply_timeago($data['conversation']['cid']);
					
					
					return ['content' => $this->view->render($data, 'admin/disputes_view')];
					
			}else {
						redirect('admin/disputes');
            }
        }elseif(isset($this->url[2]) && $this->url[2] == 'messages') {	
		
			$has = $adminModel->has_dispute_conversation($this->url[3]);

            // If exists
            if($has === true) {
				
					
					if(!isset($this->url[4])){
						$pg = 1;
					}else{
						$pg = $this->url[4];
					}
					
					$page = (int) (!isset($pg) ? 1 : $pg);
					$limit = '14';
					$startpoint = ($page * $limit) - $limit;
					
					$data['conversation'] = $adminModel->get_dispute_conversation($this->url[3]);
					$data['freelancer'] = $adminModel->get_freelancer($data['conversation']['freelancerid']);
					$data['client'] = $adminModel->get_freelancer($data['conversation']['clientid']);
					$data['project'] = $adminModel->get_project($data['conversation']['projectid']);
					
					$data['message_conversation'] = $adminModel->get_conversation($data['project']['projectid'], $data['client']['userid'], $data['freelancer']['userid']);
					$data['total_conversation_reply'] = $adminModel->total_conversation_reply($data['message_conversation']['cid']);
					$data['conversation_reply_pagination'] = $adminModel->conversation_reply_pagination($startpoint, $limit, $data['message_conversation']['cid']);
					$data['pagination'] = $this->Pagination($data['total_conversation_reply'], $limit, $page, URL_PATH.'/admin/dispute/messages/'.$this->url[3].'/');
					$data['conversation_reply_timeago'] = $adminModel->conversation_reply_timeago($data['message_conversation']['cid']);
					
					
					return ['content' => $this->view->render($data, 'admin/disputes_view')];
					
			}else {
						redirect('admin/disputes');
            }
        }elseif(isset($this->url[2]) && $this->url[2] == 'files') {	
		
			$has = $adminModel->has_dispute_conversation($this->url[3]);

            // If exists
            if($has === true) {
				
				if(!isset($this->url[4])){
					$pg = 1;
				}else{
					$pg = $this->url[4];
				}
				
				$page = (int) (!isset($pg) ? 1 : $pg);
				$limit = '10';
				$startpoint = ($page * $limit) - $limit;
					
				$data['conversation'] = $adminModel->get_dispute_conversation($this->url[3]);
				$data['client'] = $adminModel->get_freelancer($data['conversation']['clientid']);
			    $data['project'] = $adminModel->get_project($data['conversation']['projectid']);
				
				$data['has_files'] = $adminModel->has_files($data['client']['userid']);
				$data['files_pagination'] = $adminModel->files_pagination($startpoint, $limit, $data['client']['userid']);
				$data['files_projects'] = $adminModel->projects();
				$data['files_timeago'] = $adminModel->files_timeago($data['client']['userid']);
				$data['pagination'] = $this->Pagination($adminModel->total_files($data['client']['userid']), $limit, $page, URL_PATH.'/admin/dispute/files/'.$this->url[3].'/');
					
					
				return ['content' => $this->view->render($data, 'admin/disputes_view')];
					
			}else {
						redirect('admin/disputes');
            }
        }	
    }	


	
    public function download()
    {

		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		
		if($admin->isLoggedIn() === true):	
			
			/* Use Admin Model */
			$adminModel = $this->model('Admin');
			$has_file = $adminModel->has_file($this->url[2]);
			if($has_file === true):
			
				$file = $adminModel->get_file($this->url[2]);
				$filepath = URL_PATH.'/'.PUBLIC_PATH.'/'.UPLOADS_PATH.'/admin/files/'.$file["fileupload"];	
				
				
				// Process download
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-disposition: attachment; filename=\"" . basename($filepath) . "\""); 
				readfile($filepath);  
				exit;
				
			else:
				$_SESSION['message'][] = ['warning', $this->lang['no_such_file_found']];
				redirect('admin/disputes');
			endif;
				
			
		else:
			$_SESSION['message'][] = ['warning', $this->lang['please_login_to_download']];
			redirect('admin/login');	
		endif;
    }
	
	
	
	
    /**
     * projects
     */
    public function projects()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		$data['projects'] = $adminModel->projects();
		
		/*Use Category Model*/
        $categoryModel = $this->model('Category');
		$data['categories'] = $categoryModel->details();
		
		if(isset($this->url[2]) && $this->url[2] == 'edit') {	
		
            $has = $adminModel->has_project($this->url[3]);

            // If the currency requested exists
            if($has === true) {
				
				
				/* User data */
                $data["project"] = $adminModel->get_project_no($this->url[3]);
		
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
							
				
						$update = $adminModel->updateProject(
					                               $input->get('title'),
					                               $slug,
					                               $input->get('budget'),
					                               $input->get('category'),
					                               $choice2,
					                               $input->get('description'),
												  $input->get('id'));
						
							
						if ($update == 1) {
							$_SESSION['message'][] = ['success', $this->lang['details_updated']];
						 
							redirect('admin/projects/edit/'. $input->get('id'));
						} else {
							$_SESSION['message'][] = ['warning', $this->lang['no_changes_made']];
						 
							redirect('admin/projects/edit/'. $input->get('id'));
						}
							
					 } else {

						 foreach ($validation->errors()->all() as $err) {
							$str = implode(" ",$err);
							 foreach ($err as $r) {
								$_SESSION['errors'][] = ['error', $r];
							 }	
						 }
						 
							redirect('admin/projects/edit/'. $input->get('id'));
				   }

				 }
				}			
				
                return ['content' => $this->view->render($data, 'admin/edit_project')];
				
            } else {
						 
				redirect('admin/projects');
            }
        }
		
		return ['content' => $this->view->render($data, 'admin/projects')];	
    }
	
	
	
	
	
	
    /**
     * requests
     */
    public function requests()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		$adminModel->update_requests();
		$data['requests'] = $adminModel->requests();
		
		
		return ['content' => $this->view->render($data, 'admin/requests')];	
    }	
	
	
	
    /**
     * revenues
     */
    public function revenues()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		$data['revenues'] = $adminModel->revenues();
		
		
		return ['content' => $this->view->render($data, 'admin/revenues')];	
    }	
	
	
	
    /**
     * escrow
     */
    public function escrow()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		$data['escrow'] = $adminModel->escrow();
		
		
		return ['content' => $this->view->render($data, 'admin/escrow')];	
    }	
	
	
	
    /**
     * funds
     */
    public function funds()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		$data['funds'] = $adminModel->funds();
		
		
		return ['content' => $this->view->render($data, 'admin/funds')];	
    }		
	
	
    /**
     * withdrawals
     */
    public function withdrawals()
    {

        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		
		/*Use Admin Library*/
        $admin = $this->library('Admin');
		$data['admin'] = $admin->data();
		if(!$admin->isLoggedIn()):
		 redirect('admin/login');
		endif;
		
		/*Use User Model*/
        $userModel = $this->model('User');
		$data['users'] = $userModel->details();
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		/* Use Admin Model */
		$adminModel = $this->model('Admin');
		$adminModel->update_withdrawals();
		$data['withdrawals'] = $adminModel->withdrawals();
		
		
		return ['content' => $this->view->render($data, 'admin/withdrawals')];	
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
	private function slugify($text){
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