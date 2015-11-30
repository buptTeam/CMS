<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['help']=$this->db_model->get_help_category();
		$this->load->view('index',$data);
	}
	public function getpage($help_categoty=0,$first_title=0,$second_title=0,$third_title=0)
	{
		$data['second']=array();
		$data['content']=array();
		$data['first']=$this->db_model->get_up_side($help_categoty);
		$data['help_name']=$this->db_model->get_help_name($help_categoty);
		$data['help']=$this->db_model->get_help_category();
		$data['second']=$this->db_model->get_left_side($help_categoty,$first_title);
		
		if($third_title!=0){
			$data['content']=$this->db_model->get_content($help_categoty,$first_title,$second_title,$third_title);
		}
		$this->load->view('help',$data);
	}
	public function getsource($first_title=0,$second_title=0)
	{
		$data['source_nav']=$this->db_model->get_source_nav();
		$data['content']=array();
		if($second_title!=0){
			$data['content']=$this->db_model->get_source_content($first_title,$second_title);
		}
		$this->load->view('source',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */