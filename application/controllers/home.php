<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->db->query("SELECT * FROM korisnici WHERE korisnicko_ime = $username and lozinka = $password")->result()[0];
        
        if(!empty($user)){
            
            $data['user'] = $user;

            $home = $this->load->view("home", $data, true);
            $data["body"] = $home;
            $this->load->view("template", $data);
        }
        else{
            redirect("login");
        }
    }
}