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
		if($first_title!=0){
			$data['second']=$this->db_model->get_left_side($help_categoty,$first_title);
		}
		if($third_title!=0){
			$data['content']=$this->db_model->get_content($help_categoty,$first_title,$second_title,$third_title);
		}
		$this->load->view('help',$data);
	}

	public function monitorIndex()
	{
		$this->load->view('help');
	}
	public function monitorapi()
	{
		$this->load->view('api');
	}
	public function monitorexplain()
	{
		$this->load->view('explain');
	}
	public function monitormainave()
	{
		$this->load->view('mainnav');
	}
	public function monitortop()
	{
		$this->load->view('top');
	}
	public function monitorlog()
	{
		$this->load->view('log');
	}
	public function monitormonitor()
	{
		$this->load->view('monitor');
	}
	public function monitoronline()
	{
		$this->load->view('online');
	}
	public function monitorquestion()
	{
		$this->load->view('question');
	}
	public function monitorsource()
	{
		$this->load->view('source');
	}
	public function monitorterm()
	{
		$this->load->view('term');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */