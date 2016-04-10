<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function index(){
        
        $datum1 = $this->input->post('datum1');
        
        if(isset($datum1)){
            
            $datum1 = $this->input->post('datum1');
            $datum2 = $this->input->post('datum2');

            $datum1_array = explode("/", $datum1);
            $datum2_array = explode("/", $datum2);

            $timestamp1 = mktime(0, 0, 0, (int)$datum1_array[1], (int)$datum1_array[0], (int)$datum1_array[2]);
            $timestamp2 = mktime(0, 0, 0, (int)$datum2_array[1], (int)$datum2_array[0], (int)$datum2_array[2]);

            $kilogrami = $this->db->query("SELECT kolicina_maslina, pocetak_obrade, kraj_obrade, kolicina_ulja FROM prerada_maslina WHERE pocetak_obrade > '$timestamp1' AND kraj_obrade < '$timestamp2'")->result();

            $kg = 0;
            $min = 0;
            $l = 0;

            foreach($kilogrami as $row){
                $kg += + $row->kolicina_maslina;
                $min += $row->kraj_obrade - $row->pocetak_obrade;
                $l += $row->kolicina_ulja;
            }

            $min = $min/60;
            $l = (int)($l*0.916);

            $data['kilogrami'] = $kg;
            $data['minute'] = $min;
            $data['litre'] = $l;
            
        }
        
        $hour = 00;
        $today = strtotime($hour . ':00:00');
        $tomorrow = strtotime('+1 day', $today);
        
        $datatable = $this->db->query("SELECT *, predbiljezbe.kooperant as pravi_koop  FROM predbiljezbe JOIN kooperanti ON kooperanti.id = predbiljezbe.kooperant LEFT JOIN prerada_maslina ON prerada_maslina.kooperant = predbiljezbe.kooperant WHERE predbiljezbe.vrijeme BETWEEN $today and $tomorrow")->result();
        
        $data['datatable'] = $datatable;
        
        $kooperanti = $this->db->query("SELECT * FROM kooperanti")->result();
        
        $data['kooperanti'] = $kooperanti;
        
        $administrator = $this->load->view("home", $data, true);
        $data["body"] = $administrator;
        $this->load->view("template", $data);
    }
    
    public function predbiljezba(){
        
        $kooperant = $this->input->post('kooperant');
        $kolicina = $this->input->post('kolicina');
        $adresa = $this->input->post('adresa');
        $mjesto = $this->input->post('mjesto');
        $datum = $this->input->post('datum');
        $vrijeme = $this->input->post('vrijeme');
        $prijevoz = (int)$this->input->post('prijevoz');
        if(!isset($prijevoz)){
            $prijevoz = 0;
        }
        
        $datum_array = explode("/", $datum);
        
        $vrijeme_array = explode(":", $vrijeme);
        
        $timestamp = mktime((int)$vrijeme_array[0], (int)$vrijeme_array[1], 0, (int)$datum_array[1], (int)$datum_array[0], (int)$datum_array[2]);
        
        $this->db->query("INSERT INTO predbiljezbe(vrijeme, adresa, mjesto, kolicina, prijevoz, kooperant) VALUES('$timestamp', '$adresa', '$mjesto', '$kolicina', '$prijevoz', $kooperant)");
        
        redirect("administrator");
    }
    
    public function kooperant(){
        
        $ime = $this->input->post('ime');
        $prezime = $this->input->post('prezime');
        $tvrtka = $this->input->post('tvrtka');
        $oib = $this->input->post('oib');
        $adresa = $this->input->post('adresa');
        $mjesto = $this->input->post('mjesto');
        $telefon = $this->input->post('telefon');
        $mobitel = $this->input->post('mobitel');
        $email = $this->input->post('email');
        $napomena = $this->input->post('napomena');
        
        $this->db->query("INSERT INTO kooperanti(ime, prezime, naziv_tvrtke, oib, adresa, mjesto, kontakt_fix, kontakt_mob, email, napomena) VALUES('$ime', '$prezime', '$tvrtka', '$oib', '$adresa', '$mjesto', '$telefon', '$mobitel', '$email', '$napomena')");
        
        redirect("administrator");
    }
    
    public function izvjestaj(){
        
        $datum1 = $this->input->post('datum1');
        $datum2 = $this->input->post('datum2');
        
        $datum1_array = explode("/", $datum1);
        $datum2_array = explode("/", $datum2);
        
        $timestamp1 = mktime(0, 0, 0, (int)$datum1_array[1], (int)$datum1_array[0], (int)$datum1_array[2]);
        $timestamp2 = mktime(0, 0, 0, (int)$datum2_array[1], (int)$datum2_array[0], (int)$datum2_array[2]);
        
        $kilogrami = $this->db->query("SELECT kolicina_maslina, pocetak_obrade, kraj_obrade, kolicina_ulja FROM prerada_maslina WHERE pocetak_obrade > '$timestamp1' AND kraj_obrade < '$timestamp2'")->result();
        
        $kg = 0;
        $min = 0;
        $l = 0;
        
        foreach($kilogrami as $row){
            $kg += + $row->kolicina_maslina;
            $min += $row->kraj_obrade - $row->pocetak_obrade;
            $l += $row->kolicina_ulja;
        }
        
        $min = $min/60;
        $l = (int)($l*0.916);
        
        $data['kilogrami'] = $kg;
        $data['minute'] = $min;
        $data['litre'] = $l;
        
        
        $home = $this->load->view("home", $data, true);
        $data["body"] = $home;
        $this->load->view("template", $data);

    }
    
}