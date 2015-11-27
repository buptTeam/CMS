<?php if ( ! defined('IN_DILICMS')) exit('No direct script access allowed');
$setting['models']['content']=array (
  'id' => '2',
  'name' => 'content',
  'description' => '详细内容',
  'perpage' => '10',
  'hasattach' => '0',
  'built_in' => '0',
  'thumb_preferences' => NULL,
  'fields' => 
  array (
    5 => 
    array (
      'id' => '5',
      'name' => 'category',
      'description' => '帮助类别',
      'model' => '2',
      'type' => 'linked_menu',
      'length' => '0',
      'values' => 'help|help_category|4|1',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '0',
      'editable' => '1',
    ),
    4 => 
    array (
      'id' => '4',
      'name' => 'content',
      'description' => '详细内容',
      'model' => '2',
      'type' => 'wysiwyg',
      'length' => '0',
      'values' => '',
      'width' => '0',
      'height' => '0',
      'rules' => 'required',
      'ruledescription' => '',
      'searchable' => '1',
      'listable' => '1',
      'order' => '1',
      'editable' => '1',
    ),
  ),
  'listable' => 
  array (
    0 => '5',
    1 => '4',
  ),
  'searchable' => 
  array (
    0 => '5',
    1 => '4',
  ),
);