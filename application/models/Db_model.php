<?php
class Db_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_help_name($help_categoty)
	{
		$query=$this->db->get_where('u_c_help', array('classid' => $help_categoty));
		$arr=$query->result_array();
		//echo var_dump($arr);
		return $arr;
	}
	public function get_up_side($help_categoty)
	{
		$query=$this->db->get_where('u_c_help', array('parentid' => $help_categoty));
		$arr=$query->result_array();
		//echo var_dump($arr);
		return $arr;
	}
	public function get_left_side($help_categoty,$first_title)
	{
		$query=$this->db->get_where('u_c_help', array('parentid' => $first_title));
		$arr=$query->result_array();
		$i=0;
		foreach ($arr as $arr_item):
		$query=$this->db->get_where('u_c_help', array('parentid' => $arr_item["classid"]));
		$arr[$i]["mes"]=$query->result_array();
		$i++;
		endforeach;
		//echo var_dump($arr);
		return $arr;
	}
	public function get_content($help_categoty,$first_title,$second_title,$third_title)
	{
		$sql="select * from u_m_content where category like '%".$help_categoty."-".$first_title."-".$second_title."-".$third_title."%'";
		$query=$this->db->query($sql);
		$arr=$query->result_array();
		//echo var_dump($arr);
		return $arr;
	}
	public function get_help_category()
	{
		$query=$this->db->get_where('u_c_help', array('parentid' => 0));
		$arr=$query->result_array();
		//echo var_dump($arr);
		return $arr;
	}
	/*  public function set_news()
	 {
	$this->load->helper('url');

	$slug = url_title($this->input->post('title'), 'dash', TRUE);

	$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
	);

	return $this->db->insert('news', $data);
	}
	*/
}

