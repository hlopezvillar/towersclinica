<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jugador extends CI_Model {
    function get_rows()
    {
        $query = $this->db->get('Jugadores');
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }
}