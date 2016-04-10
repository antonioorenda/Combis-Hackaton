<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prijevoznik extends CI_Controller {

    public function index(){
        $home = $this->load->view("mapa", '', true);
        $data["body"] = $home;
        $this->load->view("template", $data);
    }
}