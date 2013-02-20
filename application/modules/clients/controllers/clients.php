<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {

  }

  // sending the list of json of current client
  public function getjson() {
    $ajax = $this->input->is_ajax_request();

    $this->load->model('clients/client_model', 'client');
    $data = $this->client->get_clients();
    print json_encode($data);
  }
}