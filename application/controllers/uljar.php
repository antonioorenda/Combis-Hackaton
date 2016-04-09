<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uljar extends CI_Controller {

    public function index(){
        
        $hour = 00;
        $today = strtotime($hour . ':00:00');
        $tomorrow = strtotime('+1 day', $today);
                
        $datatable = $this->db->query("SELECT * FROM predbiljezbe JOIN kooperanti ON kooperanti.id = predbiljezbe.kooperant WHERE predbiljezbe.vrijeme BETWEEN $today and $tomorrow")->result();
                
        $data['datatable'] = $datatable;
                
        $uljar = $this->load->view("uljar", $data, true);
        $data["body"] = $uljar;
        $this->load->view("template", $data);
    }
}