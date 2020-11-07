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
class Dette extends MY_Controller
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
    $this->load->model('Dette_model');
     $this->form_validation->set_rules('nomClient','nomClient','required');
     $this->form_validation->set_rules('telephone','telephone','required');
     $this->form_validation->set_rules('description','description','required');
     $this->form_validation->set_rules('montant','montant','required');
    if($this->form_validation->run() == FALSE)
    {
      $this->header();
      $this->load->view('dette/creer');
      $this->footer();
    }
    else
    {
      // enregistrement dans la base ()
      $formArray=array();
      $formArray['nomClient']= $this->input->post('nomClient');
      $formArray['telephone']= $this->input->post('telephone');
      $formArray['description']= $this->input->post('description');
      $formArray['montant']= $this->input->post('montant');
      $this->Dette_model->save($formArray);
      $this->session->set_flashdata('success','Dette ajouter avec succes');
      redirect(base_url().'index.php/dette/index');

    }
    
  }

  
  public function edit($id)
  {  
      $data['dette'] = $this->Dette_model->getDetteById($id);
      $this->header();
      $this->load->view('dette/edit', $data);
      $this->footer();
       
      /**$this->load->model('Dette_model');
      if(isset($_POST['update'])){
        if($this->Dette_model->updateDette($id)){
          $this->session->set_flashdata('success','Dette Mise à jour avec succes');
          redirect(base_url().'dette/edit/' . $id);
        }else {
          $this->session->set_flashdata('success','la mise ajour a echouée');
      redirect(base_url().'index.php/dette/index');
        }
      }*/
  }

    function update(){
      $results = $this->Dette_model->update();
      if ($results) {
        $this->session->set_flashdata('success','Dette mise à jour avec succes');
      }else {
        $this->session->set_flashdata('error','réessayer echec mise à jour');
      }
      redirect(base_url().'index.php/dette/index');
    }
  

  public function index()
  {
    $this->load->model('Dette_model');
    $dette = $this->Dette_model->selectAll();
    $data = array();
    $data['dette']=$dette;
    $this->header();
      $this->load->view('dette/liste',$data);
    $this->footer();
    
  }

  public function supprimer($id)
  {
    $this->load->model('Dette_model');
    $dette = $this->Dette_model->getDette($id);
    if(empty($dette))
    {
      $this->session->set_flashdata('failure','Dette no trouver');
      redirect(base_url().'index.php/dette/index');
    }
    $this->Dette_model->supprimerDette($id);
    $this->session->set_flashdata('success','Dette supprimer avec success');
    redirect(base_url().'index.php/dette/index');
  }

}




/* End of file Dette.php */
/* Location: ./application/controllers/Dette.php */