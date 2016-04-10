<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skripta extends CI_Controller {

    public function index(){
        $tomorrow = mktime(0, 0, 0, date("n"), date("j")+1, date("Y"));
        $query = "SELECT kooperanti.id as id_koop, predbiljezbe.kooperant as id_pred, predbiljezbe.kolicina, kooperanti.adresa, kooperanti.mjesto, predbiljezbe.vrijeme  
                    FROM predbiljezbe JOIN 
                    kooperanti ON predbiljezbe.kooperant = kooperanti.id
                    WHERE predbiljezbe.vrijeme > $tomorrow
                    ORDER BY predbiljezbe.vrijeme ASC";
        $rez = $this->db->query($query)->result();
        
        $mapping = array();
        $forUrlArray = array();
        foreach ($rez AS $nar){
            array_push($forUrlArray, urlencode($nar->adresa.", ".$nar->mjesto)); 
            array_push($mapping, $nar->id_koop);
        }
        
        $mappingString = "";
        foreach ($mapping AS $key => $value){
            $mappingString .= $value." ".$key." ";
        }
        $dataForCurl['mapping'] = $mappingString;
        
        $forUrl = implode("|", $forUrlArray);        
        
        $brojNarudzbi = count($rez);
        $dataForCurl['brojNarudzbi'] = $brojNarudzbi;
        $dataForCurl['kapacitetKamiona'] = 1500;
        
        
        $cSession = curl_init();        
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$forUrl&destinations=$forUrl&key=AIzaSyCnlEGtbz-iiGSqzsDO8IWTxRBb51sHE3A";
        curl_setopt($cSession,CURLOPT_URL,$url);
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false);
        curl_setopt($cSession,CURLOPT_SSL_VERIFYPEER, false);
        $result=curl_exec($cSession);
        //var_dump(curl_error($cSession));
        curl_close($cSession);
        
        $curlResp = json_decode($result);
        //var_dump($curlResp);
        
        $i = 0;
        $j = 0;
        $matrica = array();
        foreach($curlResp->rows AS $row){            
            foreach($row->elements AS $element){                
                $sekunde = $element->duration->value;
                $minute = $sekunde/60;
                $matrica[$i][$j] = $minute;
                $j++;
            }
            $j = 0;
            $i++;
        }
        
        //var_dump($matrica);
        $dataForCurl['matrica'] = $matrica;
        
        
        $zadnjiArray = array();
        foreach ($rez AS $nar){
            $red = $nar->id_pred." ".date("H:i", $nar->vrijeme)." ".$nar->id_koop." ".$nar->kolicina;
            array_push($zadnjiArray, $red);
        }
        
        //var_dump($zadnjiArray);
        $dataForCurl['zadnji'] = $zadnjiArray;
        
        
        
        //var_dump($dataForCurl);die();
        
        //$data = array("name" => "Hagrid", "age" => "36");                                                                    
        $data_string = json_encode($dataForCurl);  
        //var_dump($data_string);die();

        $ch = curl_init();  
        $url = "http://tomislavbradac.from.hr/hackaton/skripta.php";
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   

        $result = curl_exec($ch);
        var_dump($result);
        
        die();
        
        $data['user'] = $_SESSION['user'];
        $home = $this->load->view("home", $data, true);
        $data["body"] = $home;
        $this->load->view("template", $data);
    }
}