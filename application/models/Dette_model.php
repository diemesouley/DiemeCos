<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Dette_model
 *
 * 
 * @author    Souleymane DIEME
 * 
 *
 */

class Dette_model extends CI_Model {

  function index()
  {

  }

  // ------------------------------------------------------------------------

  /**public function __construct()
  {
    parent::__construct();
  }
*/
  // ------------------------------------------------------------------------
  public function save($data)
  {
    {
      $this->db->insert('dette',$data); // insert into dette(nomclient,telephone,description,dette) values(?,?,?,?);
      $id= $this->db->insert_id();
    }
   return $id;
    
  }
  //-------------------------------------------------
  public function selectAll()
  {
    return $dette = $this->db->get('dette')->result_array(); // select * from dette;
  }
  //------------------------------------------------
 
  public function getDette($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    $this->db->from('dette');
    $query=$this->db->get();
    return $query->result();
  }

  public function getDetteById($id){
    $this->db->where('id', $id);
    $query = $this->db->get('dette');
    if($query->num_rows()> 0){
      return $query->row();
    }else {
      return false;
    }
  }

  public function update(){
    $id = $this->input->post('txt_hidden');
    $field= array(
      'nomClient' =>$this->input->post('nomClient'),
      'telephone' =>$this->input->post('telephone'),
      'description' =>$this->input->post('description'),
      'montant' =>$this->input->post('montant'),
      'dateDette' =>date('Y-m-d H:i:s') 
    );
    $this->db->where('id', $id);
    $this->db->update('dette', $field);
    if($this->db->affected_rows()> 0){
      return true;
    }else {
      return false;
    }
  }

  //--------------------------------------------------
  public function supprimerDette($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('dette');
  }
 
}

/* End of file Dette_model.php */
/* Location: ./application/models/Dette_model.php */