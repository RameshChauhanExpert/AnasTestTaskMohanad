<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Web extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}	
	
	public function index()
	{	    
		

		if($this->session->userdata('category'))
		{
			$cat = $this->session->userdata('category');
			$cond = " and category = '$cat'";
		}
		else
		{
			$cond = "";
		}
		$data['articles'] = $this->MainModel->custom_query("select * from articles where active_status = '1' ".$cond." order by created_at desc");
		$this->load->view('web/index',$data);
	}
	
	public function add_article()
	{
		
		$data['allcategories'] = $this->MainModel->get_result('categories',['1'=>1]);
		$this->load->view('web/add_article',$data);
	}


	public function feeds($cat)
	{
		if($cat==0)
		{
			$this->session->unset_userdata('category');
		}
		else{		 
			$this->session->set_userdata('category',$cat);
		}
		return redirect(site_url());
	}

	public function authorfeeds($cat,$author)
	{
		if($cat==0)
		{
			$this->session->unset_userdata('category');
		}
		else{		 
			$this->session->set_userdata('category',$cat);
		}
		return redirect(site_url('authors/'.$author));
	}

	public function authors($authors)
	{	    
		

		if($this->session->userdata('category'))
		{
			$cat = $this->session->userdata('category');
			$cond = " and category = '$cat'";
		}
		else
		{
			$cond = "";
		}
		$data['articles'] = $this->MainModel->custom_query("select * from articles where active_status = '1' and authors = '$authors' ".$cond." order by created_at desc");
		$this->load->view('web/authors',$data);
	}


	public function approve()
	{
		$data['articles'] = $this->MainModel->get_result('articles',['active_status'=>0]);
		$data['authors'] = $this->MainModel->get_result('authors',['1'=>1]);
		$this->load->view('web/approve',$data);
	}


	public function approve_article()
	{
		$this->MainModel->update_row('articles',['id'=>$_POST['id']],['active_status'=>1,'authors'=>$_POST['authors'] ]);
		return redirect(site_url('approve'));
	}
	
 
}