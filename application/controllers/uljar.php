<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uljar extends CI_Controller {

    public function index(){
                    
        $uljar = $this->load->view("uljar", '', true);
        $data["body"] = $uljar;
        $this->load->view("template", $data);
    }
}