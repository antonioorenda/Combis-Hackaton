<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function index(){
        $administrator = $this->load->view("administrator", $data, true);
        $data["body"] = $administrator;
        $this->load->view("template", $data);
    }
    
}