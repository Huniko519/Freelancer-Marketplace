<?php

namespace Fir\Controllers;


class Terms_And_Conditions extends Controller
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

        return ['content' => $this->view->render($data, 'home/terms')];
    }
	

}