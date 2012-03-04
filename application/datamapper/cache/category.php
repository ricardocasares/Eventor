<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'categories',
  'fields' => 
  array (
    0 => 'id',
    1 => 'name',
    2 => 'color',
    3 => 'created',
    4 => 'updated',
  ),
  'validation' => 
  array (
    'name' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'unique',
      ),
      'field' => 'name',
    ),
    'color' => 
    array (
      'rules' => 
      array (
        0 => 'required',
        1 => 'unique',
      ),
      'field' => 'color',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
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
    'event' => 
    array (
      'field' => 'event',
      'rules' => 
      array (
      ),
    ),
  ),
  'has_one' => 
  array (
  ),
  'has_many' => 
  array (
    'event' => 
    array (
      'class' => 'event',
      'other_field' => 'category',
      'join_self_as' => 'category',
      'join_other_as' => 'event',
      'join_table' => '',
      'reciprocal' => false,
      'auto_populate' => NULL,
      'cascade_delete' => true,
    ),
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