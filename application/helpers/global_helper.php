<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// getting the dsm function
if (!function_exists('dsm'))
{
  function dsm($var) {
    print '<pre clas="spit">';
    print_r($var);
    print '</pre>';
  }
}

// getting the var_dump and die function
if (!function_exists('dd'))
{
  function dd($var) {
    var_dump($var);die();
  }
}

// checking the user
if (!function_exists('auth_user'))
{
  function auth_user() {
    // getting the CI instance
    $ci =& get_instance();
    $auth = $ci->session->userdata('auth');
    if (!$auth) {
      redirect('users/login');
    }
  }
}