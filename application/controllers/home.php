<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $data['user'] = $_SESSION['user'];
        $home = $this->load->view("home", $data, true);
        $data["body"] = $home;
        $this->load->view("template", $data);
    }
}