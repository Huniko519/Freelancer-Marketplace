<?php

namespace Fir\Controllers;

class Search_Projects extends Controller
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
		
		/* Use Input Library */
		$input = $this->library('Input');
		
		if (!$input->exists()) {
			redirect('home');
		}
		
		if (empty($input->get('category'))) {
			redirect('home');
		}
		
		$search = $input->get('category');
		
		/*Use Project Model*/
        $projectModel = $this->model('Project');
        $data['search_projects'] = $search;
		
        $data['has_projects'] = $projectModel->hasProjects();
        $data['projects_pagination'] = $projectModel->search();
		$data['projects_timeago'] = $projectModel->projects_timeago();
		$data['projects_proposals'] = $projectModel->projects_proposals();
		

        return ['content' => $this->view->render($data, 'home/search_projects')];
    }
	
	
}