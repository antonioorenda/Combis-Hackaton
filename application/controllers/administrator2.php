<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator2 extends CI_Controller {

    public function index(){
        
        $datum1 = $this->input->post('datum1');
        
        $hour = 00;
        $today = strtotime($hour . ':00:00');
        $tomorrow = strtotime('+1 day', $today);
        
        $datatable = $this->db->query("SELECT *, predbiljezbe.kooperant as pravi_koop  FROM predbiljezbe JOIN kooperanti ON kooperanti.id = predbiljezbe.kooperant LEFT JOIN prerada_maslina ON prerada_maslina.kooperant = predbiljezbe.kooperant WHERE predbiljezbe.vrijeme BETWEEN $today and $tomorrow")->result();
        
        $data['datatable'] = $datatable;
        
        $kooperanti = $this->db->query("SELECT * FROM kooperanti")->result();
        
        $data['kooperanti'] = $kooperanti;
        
        $administrator = $this->load->view("administrator", $data, true);
        $data["body"] = $administrator;
        $this->load->view("template", $data);
    }
}