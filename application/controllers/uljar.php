<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uljar extends CI_Controller {

    public function index(){
        
        $hour = 00;
        $today = strtotime($hour . ':00:00');
        $tomorrow = strtotime('+1 day', $today);
        //die("SELECT * FROM predbiljezbe JOIN kooperanti ON kooperanti.id = predbiljezbe.kooperant LEFT JOIN prerada_maslina ON prerada_maslina.kooperant = predbiljezbe.kooperant WHERE predbiljezbe.vrijeme BETWEEN $today and $tomorrow");
        $datatable = $this->db->query("SELECT *, predbiljezbe.kooperant as pravi_koop  FROM predbiljezbe JOIN kooperanti ON kooperanti.id = predbiljezbe.kooperant LEFT JOIN prerada_maslina ON prerada_maslina.kooperant = predbiljezbe.kooperant WHERE predbiljezbe.vrijeme BETWEEN $today and $tomorrow")->result();
                
        $data['datatable'] = $datatable;
        
        $uljar = $this->load->view("uljar", $data, true);
        $data["body"] = $uljar;
        $this->load->view("template", $data);
    }
    
    public function prije(){
        
        $id = $this->input->post('kooperant');
        $kvaliteta_prije = $this->input->post('kvaliteta_prije');
        $kolicina_prije = $this->input->post('kolicina_prije');
        $vrijeme_prije = $this->input->post('vrijeme_prije');
        
        $vrijeme = explode(":", $vrijeme_prije);
        
        $timestamp = mktime($vrijeme[0], $vrijeme[1], 0, date("n"), date("j"), date("Y"));
        
        $this->db->query("INSERT INTO prerada_maslina(kvaliteta_maslina, kolicina_maslina, pocetak_obrade, kooperant) VALUES('$kvaliteta_prije', '$kolicina_prije', '$timestamp', $id)");
        
        redirect("uljar");
    }
    
    public function poslije(){
        
        $id = $this->input->post('kooperant');
        $kvaliteta_nakon = $this->input->post('kvaliteta_nakon');
        $kolicina_nakon = $this->input->post('kolicina_nakon');
        $vrijeme_nakon = $this->input->post('vrijeme_nakon');
        
        $vrijeme = explode(":", $vrijeme_nakon);
        
        $timestamp = mktime($vrijeme[0], $vrijeme[1], 0, date("n"), date("j"), date("Y"));
        
        $kolicina_maslina = $this->db->query("SELECT kolicina_maslina FROM prerada_maslina WHERE kooperant = $id")->result[0];
        
        
        
        $randman = (int)($kolicina_nakon/$kolicina_maslina);
                
        $this->db->query("UPDATE prerada_maslina SET kvaliteta_ulja = '$kvaliteta_nakon', kolicina_ulja = '$kolicina_nakon', kraj_obrade = '$timestamp', randman = '$randman' WHERE kooperant = $id");
        
        redirect("uljar");
    }
}