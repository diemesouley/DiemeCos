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

class Depense_model extends CI_Model {

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
      $this->db->insert('depense',$data); // insert into dette(nomclient,telephone,description,dette) values(?,?,?,?);
      $id= $this->db->insert_id();
    }
   return $id;
    
  }
  //-------------------------------------------------
  public function selectAll()
  {
    return $depense = $this->db->get('depense')->result_array(); // select * from dette;
  }
  //------------------------------------------------
 
  public function getDepense($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);
    $this->db->from('depense');
    $query=$this->db->get();
    return $query->result();
  }

  public function getDepenseById($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('depense');
    if($query->num_rows()> 0){
      return $query->row();
    }else {
      return false;
    }
  }

  public function update(){
    $id = $this->input->post('txt_hidden');
    $field= array(
      'nomComplet' =>$this->input->post('nomComplet'),
      'telephone' =>$this->input->post('telephone'),
      'montant' =>$this->input->post('montant'),
      'dateDette' =>date('Y-m-d H:i:s') 
    );
    $this->db->where('id', $id);
    $this->db->update('depense', $field);
    if($this->db->affected_rows()> 0){
      return true;
    }else {
      return false;
    }
  }

  //--------------------------------------------------
  public function supprimerDepense($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('depense');
  }
 
}

/* End of file Dette_model.php */
/* Location: ./application/models/Dette_model.php */