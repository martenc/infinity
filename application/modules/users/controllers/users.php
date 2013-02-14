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

  }

  // login form
  public function login() {
    $data['view']['layout'] = 'login_view';
    $data['view']['data']['content'] = array(1,2,3);
    $this->load->view('layouts/page_view', $data);
  }

  // post login
  public function dologin() {
    if ($_POST && $_POST['login'] == 'login') {
      $this->load->model('users/user_model', 'user');

      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $auth = $this->user->validate_login($username, $password);

      if ($auth) {
        redirect('users/profile');
      } else {
        redirect('users/login');
      }

    } else {
      redirect('users/login');
    }
  }

  // logout the user, destory session
  public function logout() {

  }
}