<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    redirect('users/profile');
  }

  public function profile() {

  }

  public function login() {

  }

  public function dologin() {

  }

  public function logout() {

  }
}