<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
	}

	public function index()
	{	
		$data['datas'] = $this->menu_model->getallmenus();
		
		$this->load->view('menu/menu', $data);
	}

	public function detail($id)
	{
		$data['data'] = $this->menu_model->getmenu($id);
		$this->load->view('menu/menu_detail', $data);
	}

	public function add()
	{
		$this->load->view('menu/menu_add');
	}

	public function insert()
	{
		$insert_id = $this->menu_model->insertmenu();
		redirect('menu/index');
	}

	public function edit($id)
	{
		$data['data'] = $this->menu_model->getmenu($id);
		$this->load->view('menu/menu_edit', $data);
	}

	public function update()
	{
		$this->menu_model->updatemenu();
		redirect('menu/edit/'. $this->input->post('id'));
	}

	public function delete($id)
	{
		$this->menu_model->deletemenu($id);
		redirect('menu/index');
	}
}
