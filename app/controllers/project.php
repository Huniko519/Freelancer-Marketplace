<?php

namespace Fir\Controllers;

class Project extends Controller
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

		
		/* Use Project Model */
		$projectModel = $this->model('Project');
		
		$has = $projectModel->hasProject($this->url[1]);

            // If exists
            if($has === true) {
				
				$slug = $projectModel->slug($this->url[2]);

				// If exists
				if($slug === true) {

					/*Use User Library*/
					$user = $this->library('User');
					$data['user'] = $user->data();
					$data['user_isloggedin'] = $user->isLoggedIn();
				
					/* Product data */
					$data["project"] = $projectModel->getProject($this->url[1]);
					$data["client"] = $projectModel->getclient($this->url[1]);
					$data['project_proposal'] = $projectModel->project_proposal($this->url[1]);
					
					return ['content' => $this->view->render($data, 'home/project')];
				}else {
					redirect('home');
				}
			}else {
                redirect('home');
            }
    }
	

	

}