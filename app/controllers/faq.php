<?php

namespace Fir\Controllers;

class Faq extends Controller
{
	
    public function index()
    {
        /**
         * The $data array stores all the data that is passed to the views
         */
        $data = [];
		
		/* Use Faq Model */
		$faqModel = $this->model('Faq');
        $data['faq'] = $faqModel->order();
		

        return ['content' => $this->view->render($data, 'home/faq')];
    }
	
}