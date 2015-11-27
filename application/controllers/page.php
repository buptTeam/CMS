<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

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