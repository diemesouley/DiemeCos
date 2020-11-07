<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
*	@author : Souleymane DIEME Shah
*  version: 1.0
*/
/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property Main_model Main_model
 */
//Extending all Controllers from Core Controller (MY_Controller)
class Depense extends MY_Controller
{

  public function __construct()
  {
      parent::__construct();
      //Check if user is logged in or id exists in session
      if ($this->session->userdata('user_id')) {

      } else {

          redirect(base_url() . 'index.php/Users/login');

      }
  }

  public function creer()
  {
    $this->load->model('Depense_model');
     $this->form_validation->set_rules('nomComplet','nomComplet','required');
     $this->form_validation->set_rules('montant','montant','required');
    if($this->form_validation->run() == FALSE)
    {
      $this->header();
      $this->load->view('depense/creer');
      $this->footer();
    }
    else
    {
      // enregistrement dans la base ()
      $formArray=array();
      $formArray['nomComplet']= $this->input->post('nomComplet');
      $formArray['telephone']= $this->input->post('telephone');
      $formArray['montant']= $this->input->post('montant');
      $this->Depense_model->save($formArray);
      $this->session->set_flashdata('success','Depot ajouter avec succes');
      redirect(base_url().'index.php/depense/index');

    }
    
  }

  public function edit($id)
  {  
      $data['depense'] = $this->Depense_model->getDepenseById($id);
      $this->header();
      $this->load->view('Depense/edit', $data);
      $this->footer();
       
  }

    function update(){
      $results = $this->Depense_model->update();
      if ($results) {
        $this->session->set_flashdata('success','Depense mise à jour avec succes');
      }else {
        $this->session->set_flashdata('error','réessayer echec mise à jour');
      }
      redirect(base_url().'index.php/depense/index');
    }
   

  public function index()
  {
    $this->load->model('Depense_model');
    $depense = $this->Depense_model->selectAll();
    $data = array();
    $data['depense']=$depense;
    $this->header();
      $this->load->view('depense/liste',$data);
    $this->footer();
    
  }

    

  

    


  public function supprimer($id)
  {
    $this->load->model('Depense_model');
    $depense = $this->Depense_model->getDepense($id);
    if(empty($depense))
    {
      $this->session->set_flashdata('failure','Depense non trouver');
      redirect(base_url().'index.php/depense/index');
    }
    $this->Depense_model->supprimerDepense($id);
    $this->session->set_flashdata('success','Depense supprimer avec success');
    redirect(base_url().'index.php/depense/index');
  }

}




/* End of file Dette.php */
/* Location: ./application/controllers/Dette.php */