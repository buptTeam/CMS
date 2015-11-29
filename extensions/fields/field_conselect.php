<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
/**
 * DiliCMS
 *
 * 一款基于并面向CodeIgniter开发者的开源轻型后端内容管理系统.
 *
 * @package     DiliCMS
 * @author      DiliCMS Team
 * @copyright   Copyright (c) 2011 - 2012, DiliCMS Team.
 * @license     http://www.dilicms.com/license
 * @link        http://www.dilicms.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * DiliCMS 扩展字段演示
 *
 * 本字段用于内容模型的下拉菜单，与分类模型用法相同，但调用的是内容模型的数据。
 * 
 * DiliCMS 版本需求:2.0Final(317214a)或者以上(注意：2.0Final还在不停更新，请保证为最新版.)
 * 使用方法：
 * 1. 将该文件放到extensions/fields/即可
 * 2. 更新字段类型缓存
 *
 * 特殊字段表单项利用说明
 * 1. 数据源，填写 内容模型的表名 和字段名 字段名用于显示 实际存储调用的ID
 * 2. 支持验证规则
 * 3. 支持搜索
 *
 * @package     DiliCMS
 * @subpackage  extensions
 * @category    fields
 * @author      Jeongee
 * @link        http://www.dilicms.com
 */
class field_conselect
{

  /**
   * _ci
   * CI超级类的句柄
   *
   * @var object
   * @access  private
   **/
  private $_ci = NULL;

  /**
   * $k
   * 自定义的字段标识，需要唯一, 非官方开发请自由加上前缀
   * 
   * @var string
   * @access  public
   **/
  public $k = 'conselect';
  
  /**
   * $v
   * 自定义的字段名称
   *
   * @var string
   * @access  public
   **/
  public $v = '下拉菜单(内容模型数据)(INT)';
  
  /**
   * 构造函数
   *
   * @access  public
   * @return  void
   */
  public function __construct()
  {
    //可以根据需求初始化数据
    $this->_ci = & get_instance();
  }
  
  /**
   * 生成字段的创建信息
   *
   * @access  public
   * @param   array  $data 该值为新建或修改字段时候表单提交的POST数组 
   * @return  array 
   */
  public function  on_info($data)
  {
    return array('type' => 'INT', 'constraint' => $data['length'] ? $data['length'] : 10 , 'default' => 0);
  }

  /**
   * 生成字段的表单控件
   *
   * @access  public
   * @param   array  $field 该值为字段的基本信息，结构见settings/model下的缓存文件，或者查看数据库表结构
   * @param   string $default 默认值，用于提供默认值，或者表单回填所需
   * @param   bool   $tip 是否显示,若是，则输出字段的验证规则
   * @return  void
   */
  public function on_form($field, $default= '', $has_tip = TRUE)
  {
    if ( ! $this->_get_data_from_model($field, TRUE))
    {
      echo '获取数据源时出错了!';
    } else {
      echo $this->_select($field, $default);
    }
  }
  
  /**
   * 生成字段的列表的控件
   *
   * @access  public
   * @param   array  $field 同上
   * @param   object  $record 一条数据库记录
   * @return  void 
   */
  public function on_list($field, $record)
  {
    if (count($options = explode('|', $field['values'])) != 2 )
    {
      echo '模型调用错误';
    } else {
      $model_data = $this->_ci->db->select('id, '.$options[1])->where('id', $record->$field['name'])->get('u_m_'.$options[0])->row_array();
      echo $model_data[$options[1]];
    }
  }
  
  /**
   * 生成字段的搜索表单的控件
   *
   * @access  public
   * @param   array $field 同上
   * @param   string $default 同上上
   * @return  void
   */
  public function on_search($field, $default)
  {
    if ( ! $this->_get_data_from_model($field, TRUE))
    {
      echo '获取数据源时出错了!';
    } else {
      echo $this->_select($field, $default);
    }
  }
  
  /**
   * 执行字段在搜索操作的行为
   *
   * @access  public
   * @param   array $field 同上
   * @param   array $condition ,引用传递，记录搜索条件的数组，此数组直接用于$this->db->where(),区别于下面的$where
   * @param   array $where, 引用传递， 简单的对于GET数据的过滤后的产物，用于回填搜索的表单
   * @param   string $suffix 引用传递，用于拼接搜索条件，此货的产生现在看来完全没有必要，下个版本必将消失
   * @return  void
   */
  public function on_do_search($field, & $condition, & $where, & $suffix )
  {
    if ($keyword = $this->_ci->input->get_post($field['name'], TRUE))
    {
      $condition[$field['name'] . ' ='] = $keyword;
      $where[$field['name']] = $keyword;
      $suffix .= '&'. $field['name'] . '=' . $keyword;
    }
  }
  
  
  /**
   * 执行字段提交的行为
   *
   * @access  public
   * @param   array $field 同上
   * @param   array $post 引用传递, 用于记录post过来的值，用于插入数据库，处理请小心
   * @return  void
   */
  public function on_do_post($field, & $post)
  {
    $post[$field['name']] = $this->_ci->input->post($field['name']);  
  }

  /**
   * 生成SELECT类型控件HTML
   *
   * @access  private
   * @param   array
   * @param   string
   * @return  string
   */
  private function _select($field, $default)
  {
    $return = '<select name="' . $field['name'] . '" id="' . $field['name'] . '">'.
                  '<option value="">请选择</option>';
      foreach ($field['values'] as $key=>$v)
    {
      $pre_fix = '';
      $return .=  '<option value="' . $key . '" ' . ($default == $key ? 'selected="selected"' : '') . '>' . $pre_fix . $v . '</option>';
    }
    $return .= '</select>';
    return $return;
  }

  /**
   * 获取数据并处理，返回处理状态
   *
   * @access  private
   * @param   array
   * @param   bool
   * @return  bool
   */
  private function _get_data_from_model( & $field , $need_level = FALSE)
  {
    if ( ! $field['values'])
    {
      return FALSE;
    }
    if (count($options = explode('|', $field['values'])) != 2 )
    {
      return FALSE;
    }
    if ( ! $this->_ci->platform->cache_exists(DILICMS_SHARE_PATH . 'settings/model/' . $options[0] . EXT))
    {
      return FALSE;
    }
    $model_data = $this->_ci->db->select('id, '.$options[1])->get('u_m_'.$options[0])->result_array();
    $field['values'] = array();
    foreach ($model_data as $v)
    {
      $field['values'][$v['id']] = $v[$options[1]];
    }
    return TRUE;
  }

}

/* End of file field_file.php */
/* Location: ./extensions/fields/field_file.php */