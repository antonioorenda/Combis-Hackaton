<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->db->query("SELECT * FROM korisnici, uloge WHERE korisnicko_ime = '$username' and lozinka = '$password' AND korisnici.uloga = uloge.id")->result()[0];
        
        if(!empty($user)){
            
            $data['user'] = $user;
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['ime'] = $user->ime;
            $_SESSION['prezime'] = $user->prezime;
            $_SESSION['korisnicko_ime'] = $user->korisnicko_ime;
            $_SESSION['uloga'] = $user->naziv;
            
            
            $home = $this->load->view("home", $data, true);
            $data["body"] = $home;
            $this->load->view("template", $data);
        }
        else{
            redirect("login");
        }
    }
    
    public function logout(){
        session_destroy();
        
        redirect("login");
    }
}