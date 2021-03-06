<?php

class Admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Admin_model');	
	}

	public function index()
	{
		$data['adminList'] = $this->Admin_model->getAdmin();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/admin_list', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	$this->form_validation->set_rules('level', 'Level', 'required');

    	if ($this->form_validation->run()==FALSE) {
    		$data['adminList'] = $this->Admin_model->getAdmin();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/admin_tambah');
    	}else {
    		$this->Admin_model->insertAdmin();
    		redirect('index.php/admin/admin', 'refresh');
    	}

	}


	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Admin', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    	$this->form_validation->set_rules('level', 'Level', 'required');

    	$data['admin']=$this->Admin_model->getAdminById($id);

    	if ($this->form_validation->run()==FALSE) {
    		$data['adminList'] = $this->Admin_model->getAdmin();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/admin_edit', $data);

    	}else {
    		$this->Admin_model->editAdmin($id);
    		
    		redirect('index.php/admin/admin', 'refresh');
    	}
	}

	public function hapus($id)
	{
		$this->Admin_model->hapusAdmin($id);
		redirect('index.php/admin/admin', 'refresh');
	}

	public function ubah_pass()
	{
		$this->form_validation->set_rules('pwlama', 'Password Lama', 'required|callback_cekPwLama');
    	$this->form_validation->set_rules('pwbaru', 'Password Baru', 'required');
    	$this->form_validation->set_rules('pwkonfirm', 'Konfirmasi Password', 'required|matches[pwbaru]');
    	if ($this->form_validation->run()==FALSE) {
    		$data['obatmenipis'] = $this->obat_model->getObatMenipis();
    		$this->load->view('admin/header',$data);
			$this->load->view('admin/edit_password');

    	}else {
    		$id = $this->session->userdata('id_User');
    		$this->Admin_model->editPass($id);
    		
    		redirect('index.php/admin/admin', 'refresh');
    	}
	}


	public function cekPwLama()
	{
		$id = $this->session->userdata('id_User');

		$dataAdmin = $this->Admin_model->getAdminById($id);
		// var_dump($dataAdmin[0]->password);
		if ($dataAdmin[0]->password == md5($this->input->post('pwlama'))) {
			return true;
		} else {
			return false;
		}

	}
}

?>