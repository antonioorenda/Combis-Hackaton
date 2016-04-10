<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prijevoznik extends CI_Controller {

    public function index(){
        
        $prijevoznik = $this->load->view("prijevoznik", '', true);
        $data["body"] = $prijevoznik;
        $this->load->view("template", $data);
    }
    
}