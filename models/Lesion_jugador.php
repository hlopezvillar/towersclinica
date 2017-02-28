<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesion_jugador extends CI_Model {
 function __construct() {
        $this->userTbl = 'lesiones_jugadores';
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }
		bidJugador=array_key_exists("idJugador",$params);
		bidLesion=array_key_exists("idLesion",$params);
		bidSubtipo=array_key_exists("idSubtipo",$params);
		fechaLesion=array_key_exists("fechaLesion",$params);
        
        if((bidJugador&&bidLesion&&bidSubtipo&&bfechaLesion{
            $this->db->where('idJugador',$params['idJugador']);
            $this->db->where('idLesion',$params['idLesion']);
            $this->db->where('idSubtipo',$params['idSubtipo']);
            $this->db->where('fechaLesion',$params['fechaLesion']);
            $query = $this->db->get();
            $result = $query->row_array();
        }
        return $result;
    }
    
    public function insert($data = array()) {
        $insert = $this->db->insert($this->userTbl, $data);
        
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }

}