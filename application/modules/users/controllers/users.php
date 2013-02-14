<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  // everyone will be redirected to profile.
  public function index() {
    redirect('users/profile');
  }

  // user profile page
  public function profile() {
    $data['view']['layout'] = 'login_view';
    $data['view']['data']['content'] = array(1,2,3);
    $this->load->view('layouts/page_view', $data);
  }

  // login form
  public function login() {

  }

  // post login
  public function dologin() {

  }

  // logout the user, destory session
  public function logout() {

  }
}