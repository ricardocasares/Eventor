<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'events',
  'fields' => 
  array (
    0 => 'id',
    1 => 'category_id',
    2 => 'title',
    3 => 'description',
    4 => 'cost',
    5 => 'address',
    6 => 'coords',
    7 => 'start',
    8 => 'end',
    9 => 'approved',
    10 => 'created',
    11 => 'updated',
  ),
  'validation' => 
  array (
    'title' => 
    array (
      'label' => 'lang:event_title',
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
      ),
      'field' => 'title',
    ),
    'category_id' => 
    array (
      'label' => 'lang:event_category',
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
      ),
      'field' => 'category_id',
    ),
    'description' => 
    array (
      'label' => 'lang:event_description',
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
      ),
      'field' => 'description',
    ),
    'cost' => 
    array (
      'label' => 'lang:event_cost',
      'rules' => 
      array (
        0 => 'trim',
      ),
      'field' => 'cost',
    ),
    'address' => 
    array (
      'label' => 'lang:event_address',
      'rules' => 
      array (
        0 => 'trim',
      ),
      'field' => 'address',
    ),
    'coords' => 
    array (
      'label' => 'lang:event_coords',
      'rules' => 
      array (
        0 => 'trim',
      ),
      'field' => 'coords',
    ),
    'start' => 
    array (
      'label' => 'lang:event_start',
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
        2 => 'valid_date',
      ),
      'field' => 'start',
    ),
    'end' => 
    array (
      'label' => 'lang:event_end',
      'rules' => 
      array (
        0 => 'trim',
        1 => 'valid_date',
      ),
      'field' => 'end',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'approved' => 
    array (
      'field' => 'approved',
      'rules' => 
      array (
      ),
    ),
    'created' => 
    array (
      'field' => 'created',
      'rules' => 
      array (
      ),
    ),
    'updated' => 
    array (
      'field' => 'updated',
      'rules' => 
      array (
      ),
    ),
    'category' => 
    array (
      'field' => 'category',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
    'category' => 
    array (
      'class' => 'category',
      'other_field' => 'event',
      'join_self_as' => 'event',
      'join_other_as' => 'category',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
  ),
  'has_many' => 
  array (
  ),
  '_field_tracking' => 
  array (
    'get_rules' => 
    array (
    ),
    'matches' => 
    array (
    ),
    'intval' => 
    array (
      0 => 'id',
    ),
  ),
);