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
  /**
   * This function will create a CI instance,
   * check the session for auth key and validate.
   * If failed, will redirect to login page.
   */
  function auth_user() {
    // getting the CI instance
    $ci =& get_instance();
    $auth = $ci->session->userdata('auth');
    if (!$auth) {
      redirect('users/login');
    }
  }
}

if (!function_exists('check_if_post'))
{
  /**
   * This function will check if the page has POST data
   * and return true or false accordingly.
   * @return bool
   */
  function check_if_post() {
    if (!empty($_POST) && is_array($_POST))
      return true;
    else
      return false;
  }
}