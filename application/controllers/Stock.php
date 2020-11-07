<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *	@author : Imran Shah
 *  @support: shahmian@gmail.com
 *	date	: 18 April, 2018
 *	Kandi Inventory Management System
 * website: kelextech.com
 *  version: 1.0
 */
class Stock extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user_id')) {
        } else {


            redirect(base_url() . 'index.php/Users/login');

        }

    }


    // company detail form

    public function list_stock()
    {

        $data['stock'] = $this->Main_model->stock_cat();
        $data['category'] = $this->Main_model->select('category');
        $this->header();
        $this->load->view('stock/list_stock', $data);
        $this->footer();

    }

    // produit defectueux 
	public function produit_defectueux()
	{
		$data['defectueux'] = $this->Main_model->select('produit_defectueux');
		$data['products'] = $this->Main_model->select('item');
        $this->header();
        $this->load->view('stock/defectueux', $data);
        $this->footer();
	}

	// insert produit defectueux
	public function insert_defectueux()
	{	$item_id = $this->input->post('products');
		$qty = $this->input->post('qty');
		$date = $this->input->post('date');
		$query = $this->Main_model->items_detail($item_id);
        foreach ($query as $data) {
			$item_name = $data['item_name'];
			$item_category =$data['category_name'];
			$size = $data['size'];
			$purchase_rate = $data['purchase_rate'];
		}
		$date_transform =date('Y-m-d', strtotime($date));
		$data = array(
			'item_id' => $item_name." ".$size,
			'category_id' => $item_category,
			'prix' => $purchase_rate,
			'qty' => $qty,
			'date' => $date_transform
		);

		$this->db->insert('produit_defectueux',$data);
		
		$stock_qte = $this->Main_model->get_quantite($item_id);
		foreach($stock_qte as $s){
			$ss = $s['stock_qty']-$qty;
		}

		$this->Main_model->retour_stock($item_id,$ss);

		$data['defectueux'] = $this->Main_model->select('produit_defectueux');
		$data['products'] = $this->Main_model->select('item');
        $this->header();
        $this->load->view('stock/defectueux', $data);
        $this->footer();
		
	}


    public function update_stock()
    {
        error_reporting(E_ALL);
        $stock_id = $this->input->post('stock_no');

        $stock = array(
            'stock_qty' => $this->input->post('stock_qty'),
            'purchase_rate' => $this->input->post('purchase_rate'),
            'stock_rate' => $this->input->post('stock_rate'),
        );
        $where = array('stock_no' => $stock_id);
        $this->load->model('Main_model');
        $response = $this->Main_model->update_record('stock', $stock, $where);
        if ($response) {
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
   <button type="button" class="close" data-dismiss="alert"
      aria-hidden="true">
      &times;
   </button>
   <span>Enregistrement mis à jour avec succés..!</span>
</div>');

        }
        redirect(base_url() . 'index.php/Stock/list_stock');
    }


}