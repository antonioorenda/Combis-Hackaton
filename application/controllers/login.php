<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index(){
        $this->load->view("login");
    }
    
    public function enter(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = "SELECT * FROM korisnici, uloge WHERE korisnicko_ime = '$username' and lozinka = '$password' AND korisnici.uloga = uloge.id";
        $user = $this->db->query($query)->result()[0];        
        
        if(!empty($user)){        
            //if (session_status() == PHP_SESSION_NONE) {
                session_start();
            //}
            
            $data['user'] = $user;
            
            $_SESSION['user'] = $user;     
            
            redirect('home');
            /*
            $home = $this->load->view("home", $data, true);
            $data["body"] = $home;
            $this->load->view("template", $data);*/
        }
        else{
            //TODO error prikaz
            redirect("login");
        }
    }
    
    public function logout(){
        session_destroy();
        $_SESSION = array();
        redirect('login');
    }
    
    
    
}