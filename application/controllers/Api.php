<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		header('Content-type:application/json');
		header('Access-Control-Allow-Origin: * ');
	}
	
	public function add_post()
	{
	    error_reporting(0); 
	    $data['title'] = $this->input->post('title');
	    $data['content'] = $this->input->post('content');
        $data['category'] = $this->input->post('category');

        if($_FILES['file']['size'] > 0)
	    {
            $file=$_FILES['file']['name'];
    		$ext=@pathinfo($file, PATHINFO_EXTENSION);
    		$file_name='article_'.time().".".$ext;	
    		move_uploaded_file($_FILES["file"]["tmp_name"],"./assets/uploads/articles/".$file_name);
    		$data['image'] = $file_name;
	    }
	    
	    $insert = $this->MainModel->insert_row('articles',$data);
	    
	    if($insert)
	    {
	        $json['status'] = true;
	        $json['message'] = 'Artcle Added Successfully';
	    }
	    else
	    {
	        $json['status'] = false;
	        $json['message'] = 'Error please try again';
	    }
	    echo json_encode($json);
	}
	
	
	
}