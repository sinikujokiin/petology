<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isLogin()) {
			danger("Anda belum login, silahkan login terlebih dahulu");
			redirect('login');
		}
	}

	public function index()
	{

		$users = User::all();
		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'List Pengguna',
			'users'  => $users,
		];

		$this->template->load('templates/cms','cms/users', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		if (!$users) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data pengguna tidak ditemukan
				  </div>
				</div>
				');
			redirect('users','refresh');
		}

		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'Detail Data Pengguna',
			'users' => $users
		];

		$this->template->load('templates/cms','cms/users-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'Tambah Data Pengguna',
		];

		$this->template->load('templates/cms','cms/users-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		if (!$request) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data pengguna tidak ditemukan
				  </div>
				</div>
				');
			redirect('users/create','refresh');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]', messageError());
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required', messageError());
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', messageError());
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'trim|required|matches[password]', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$users = new User;
			$users->fullname = $request['fullname'];
			$users->username = $request['username'];
			$users->password = password_hash($request['password'], PASSWORD_DEFAULT);
			$users->save();

			$this->session->set_flashdata('alert', '
				<div class="alert alert-success d-flex align-items-center" role="alert">
				<i class="fa fa-check-circle"></i>
				  <div>
				  Berhasil menambahkan data pengguna
				  </div>
				</div>
				');
			redirect('users');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			$this->create();
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		if (!$users) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data pengguna tidak ditemukan
				  </div>
				</div>
				');
			redirect('users','refresh');
		}

		$data = [
			'title' => 'Pengguna',
			'breadcrumb' => 'Ubah Data Pengguna',
			'users' => $users
		];

		$this->template->load('templates/cms','cms/users-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$users = User::find($id);

		if (!$users) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data pengguna tidak ditemukan
				  </div>
				</div>
				');
			redirect('users', 'refresh');
		}

		if (!$request) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data yang dimasukkan tidak valid
				  </div>
				</div>
				');
			redirect('users/edit/'.$id,'refresh');
		}


		$is_unique = '';

		if($users->username != $request['username']){
			$is_unique = '|is_unique[users.username]';
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required'.$is_unique, messageError());
		$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required', messageError());
		$this->form_validation->set_rules('password', 'Password', 'trim|', messageError());
		$this->form_validation->set_rules('conf_password', 'Konfirmasi Password', 'trim|matches[password]', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			// $users = new User;
			$users->fullname = $request['fullname'];
			$users->username = $request['username'];
			if ($request['password']) {
				$users->password = password_hash($request['password'], PASSWORD_DEFAULT);
			}
			$users->save();

			$this->session->set_flashdata('alert', '
				<div class="alert alert-success d-flex align-items-center" role="alert">
				<i class="fa fa-check-circle"></i>
				  <div>
				  Berhasil memperbarui data pengguna
				  </div>
				</div>
				');
			redirect('users');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			$this->edit(encrypt_decrypt('encrypt',$id));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$users = User::find($id);
		if (!$users) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data pengguna tidak ditemukan
				  </div>
				</div>
				');
			redirect('users','refresh');
		}

		$users->delete();
		redirect('users','refresh');
	}


}
