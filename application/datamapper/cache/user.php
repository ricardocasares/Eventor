<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'users',
  'fields' => 
  array (
    0 => 'id',
    1 => 'admin',
    2 => 'username',
    3 => 'password',
    4 => 'email',
    5 => 'language',
  ),
  'validation' => 
  array (
    'username' => 
    array (
      'label' => 'lang:global_username',
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
        2 => 'unique',
      ),
      'field' => 'username',
    ),
    'email' => 
    array (
      'label' => 'lang:global_email',
      'rules' => 
      array (
        0 => 'required',
        1 => 'valid_email',
        2 => 'unique',
      ),
      'field' => 'email',
    ),
    'password' => 
    array (
      'label' => 'lang:global_password',
      'rules' => 
      array (
        0 => 'encrypt',
        1 => 'required',
        'min_length' => 6,
      ),
      'field' => 'password',
    ),
    'password_confirm' => 
    array (
      'label' => 'lang:global_password_confirm',
      'rules' => 
      array (
        0 => 'encrypt',
        'matches' => 'password',
      ),
      'field' => 'password_confirm',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'admin' => 
    array (
      'field' => 'admin',
      'rules' => 
      array (
      ),
    ),
    'language' => 
    array (
      'field' => 'language',
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
  ),
  '_field_tracking' => 
  array (
    'get_rules' => 
    array (
    ),
    'matches' => 
    array (
      'password_confirm' => 'password',
    ),
    'intval' => 
    array (
      0 => 'id',
    ),
  ),
);