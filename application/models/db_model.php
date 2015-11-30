<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
		
		if($first_title==0){
			$query=$this->db->get_where('u_c_help', array('parentid' => $help_categoty));
			$arr=$query->result_array();
			if(count($arr)>0)
				$first_title=$arr[0]["classid"];
			else $first_title=-1;
		}
		
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
	public function get_source_nav()
	{
		$sql="select * from u_c_source_nav where level = 1 order by classid";
		$query=$this->db->query($sql);
		$arr=$query->result_array();
		for($i=0;$i<count($arr);$i++){
			$sql="select * from u_c_source_nav where parentid = ".$arr[$i]["classid"]." order by classid";
			$arr[$i]["mes"]=$this->db->query($sql)->result_array();
		}
		//echo var_dump($arr);
		return $arr;
		
	}
	public function get_source_content($first_title,$second_title)
	{
		$sql="select * from u_c_source_type where level = 1 order by classid";
		$query=$this->db->query($sql);
		$arr=$query->result_array();
		for($i=0;$i<count($arr);$i++){
			$sql="select * from u_m_source_content where source_nav like '%".$first_title."-".$second_title."%' and source_type = ',".$arr[$i]["classid"].",'";
			$arr[$i]["mes"]=$this->db->query($sql)->result_array();
		}
	//	echo var_dump($arr);
		return $arr;
	
	}
	public function get_source_search_list()
	{
		$sql="select * from u_c_source_search order by classid";
		$query=$this->db->query($sql);
		$arr=$query->result_array();
		//	echo var_dump($arr);
		return $arr;
	
	}
	public function get_source_search($search_type)
	{
		$sql="select * from u_c_source_type where level = 1 order by classid";
		$query=$this->db->query($sql);
		$arr=$query->result_array();
		for($i=0;$i<count($arr);$i++){
			$sql="select * from u_m_source_content where source_type = ',".$arr[$i]["classid"].",' ";
			if($search_type!=0){
				$sql.="and search_type= ',".$search_type.",'";
			}
			$arr[$i]["mes"]=$this->db->query($sql)->result_array();
		}
		//	echo var_dump($arr);
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

