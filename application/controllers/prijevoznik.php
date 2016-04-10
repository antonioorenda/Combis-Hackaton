<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prijevoznik extends CI_Controller {

    public function index(){
        
        $tomorrow = mktime(0, 0, 0, date("n"), date("j")+1, date("Y"));
        
        $routes = $this->db->query("SELECT * FROM maps WHERE daystamp = '$tomorrow'")->result()[0]->ruta;
        
        $routes_explode = explode("$", $routes);
        
        $arrayRuta = array();
        $rutaBr = 0;
        foreach ($routes_explode as $ruta){
            $ids = explode(",", $ruta);
            $br2 = 0;
            foreach($ids as $id){
                $rez = '';
                $address = $this->db->query("SELECT kooperanti.mjesto, kooperanti.adresa "
                        . "FROM predbiljezbe JOIN "
                        . "kooperanti on predbiljezbe.kooperant = kooperanti.id "
                        . "WHERE predbiljezbe.id = $id")->result();
                    if(array_key_exists('0', $address)){
                        $lokacija = $address[0]->adresa.", ".$address[0]->mjesto;

                        $cSession = curl_init(); 
                        $lokacija = urlencode($lokacija);
                        $url = "http://maps.google.com/maps/api/geocode/json?address=$lokacija&sensor=false";
                        curl_setopt($cSession,CURLOPT_URL,$url);
                        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                        curl_setopt($cSession,CURLOPT_HEADER, false);
                        curl_setopt($cSession,CURLOPT_SSL_VERIFYPEER, false);

                        $result=curl_exec($cSession);
                        curl_close($cSession);

                        $curlResp = json_decode($result);

                        $lokacijaArray = $curlResp->results[0]->geometry->location;
                        //$lokacijaArray = $curlResp->results[0];

                        //var_dump($lokacijaArray);die();
                        $arrayRuta[$rutaBr][$br2] = array(urldecode($lokacija), $lokacijaArray);

                    }
                    $br2++;
                }
                $rutaBr++;
            }
            
            //var_dump($arrayRuta);    die();
            $data['rute'] = $arrayRuta;
            $prijevoznik = $this->load->view("prijevoznik", '', true);
            $data["body"] = $prijevoznik;
            $this->load->view("template", $data);
            
        }
        
        
        
    }
    
