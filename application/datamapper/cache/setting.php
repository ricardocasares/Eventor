<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
$cache = array (
  'table' => 'settings',
  'fields' => 
  array (
    0 => 'id',
    1 => 'appname',
    2 => 'language',
    3 => 'per_page',
    4 => 'mail_protocol',
    5 => 'mailpath',
    6 => 'smtp_host',
    7 => 'smtp_user',
    8 => 'smtp_pass',
    9 => 'smtp_port',
  ),
  'validation' => 
  array (
    'appname' => 
    array (
      'label' => 'lang:global_username',
      'rules' => 
      array (
        0 => 'required',
        1 => 'trim',
      ),
      'field' => 'appname',
    ),
    'language' => 
    array (
      'label' => 'lang:global_email',
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'language',
    ),
    'per_page' => 
    array (
      'label' => 'lang:global_password',
      'rules' => 
      array (
        0 => 'numeric',
        1 => 'required',
      ),
      'field' => 'per_page',
    ),
    'mail_protocol' => 
    array (
      'label' => 'lang:global_password_confirm',
      'rules' => 
      array (
        0 => 'required',
      ),
      'field' => 'mail_protocol',
    ),
    'mailpath' => 
    array (
      'label' => 'Sendmail path',
      'rules' => 
      array (
        0 => 'trim',
      ),
      'field' => 'mailpath',
    ),
    'smtp_host' => 
    array (
      'label' => 'SMTP Host',
      'rules' => 
      array (
        0 => 'trim',
      ),
      'field' => 'smtp_host',
    ),
    'smtp_user' => 
    array (
      'label' => 'SMTP username',
      'rules' => 
      array (
        0 => 'valid_email',
      ),
      'field' => 'smtp_user',
    ),
    'id' => 
    array (
      'field' => 'id',
      'rules' => 
      array (
        0 => 'integer',
      ),
    ),
    'smtp_pass' => 
    array (
      'field' => 'smtp_pass',
      'rules' => 
      array (
      ),
    ),
    'smtp_port' => 
    array (
      'field' => 'smtp_port',
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
    ),
    'intval' => 
    array (
      0 => 'id',
    ),
  ),
);