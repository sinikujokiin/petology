<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Symptoms extends CI_Controller {

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

		$symptoms = Symptom::all();
		$data = [
			'title' => 'Gejala',
			'breadcrumb' => 'List Gejala',
			'symptoms'  => $symptoms,
		];

		$this->template->load('templates/cms','cms/symptoms', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$symptoms = Symptom::with(['rules'])->find($id);
		if (!$symptoms) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data gejala tidak ditemukan
				  </div>
				</div>
				');
			redirect('symptoms','refresh');
		}

		$data = [
			'title' => 'Gejala',
			'breadcrumb' => 'Detail Data Gejala',
			'symptoms' => $symptoms
		];

		$this->template->load('templates/cms','cms/symptoms-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Gejala',
			'breadcrumb' => 'Tambah Data Gejala',
		];

		$this->template->load('templates/cms','cms/symptoms-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		if (!$request) {
			redirect('symptoms/create','refresh');
		}

		$this->form_validation->set_rules('code', 'Kode Gejala', 'trim|required|is_unique[symptoms.code]', messageError());
		$this->form_validation->set_rules('name', 'Nama Gejala', 'trim|required', messageError());
		$this->form_validation->set_rules('question', 'Pertanyaan', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$symptoms = new Symptom;
			$symptoms->code = $request['code'];
			$symptoms->name = $request['name'];
			$symptoms->question = $request['question'];
			$symptoms->save();

			$this->session->set_flashdata('alert', '
				<div class="alert alert-success d-flex align-items-center" role="alert">
				<i class="fa fa-check-circle"></i>
				  <div>
				  Berhasil menambahkan data gejala
				  </div>
				</div>
				');
			redirect('symptoms');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect('symptoms/create','refresh');
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$symptoms = Symptom::find($id);
		if (!$symptoms) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data gejala tidak ditemukan
				  </div>
				</div>
				');
			redirect('symptoms','refresh');
		}

		$data = [
			'title' => 'Gejala',
			'breadcrumb' => 'Ubah Data Gejala',
			'symptoms' => $symptoms
		];

		$this->template->load('templates/cms','cms/symptoms-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$symptoms = Symptom::find($id);

		// dd($request);

		if (!$symptoms) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data gejala tidak ditemukan
				  </div>
				</div>
				');
			redirect('symptoms', 'refresh');
		}

		if (!$request) {
			redirect('symptoms/edit/'.$id,'refresh');
		}


		$is_unique = '';

		if($symptoms->code != $request['code']){
			$is_unique = '|is_unique[symptoms.code]';
		}

		$this->form_validation->set_rules('code', 'Kode Gejala', 'trim|required'.$is_unique, messageError());
		$this->form_validation->set_rules('name', 'Nama Gejala', 'trim|required', messageError());
		$this->form_validation->set_rules('question', 'Pertanyaan', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			// $symptoms = new Symptom;
			$symptoms->code = $request['code'];
			$symptoms->name = $request['name'];
			$symptoms->question = $request['question'];
			$symptoms->save();


			$this->session->set_flashdata('alert', '
				<div class="alert alert-success d-flex align-items-center" role="alert">
				<i class="fa fa-check-circle"></i>
				  <div>
				  Berhasil memperbarui data gejala
				  </div>
				</div>
				');
			redirect('symptoms');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect('symptoms/edit/'.encrypt_decrypt('encrypt',$id),'refresh');
			// $this->edit(encrypt_decrypt('encrypt',$id));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$symptoms = Symptom::find($id);
		if (!$symptoms) {
			$this->session->set_flashdata('alert', '
				<div class="alert alert-danger d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Data gejala tidak ditemukan
				  </div>
				</div>
				');
			redirect('symptoms','refresh');
		}

		$symptoms->delete();
		$this->session->set_flashdata('alert', '
				<div class="alert alert-success d-flex align-items-center" role="alert">
				<i class="bi bi-exclamation-octagon-fill"></i>
				  <div>
				   Berhasil menghapus data gejala
				  </div>
				</div>
				');
		redirect('symptoms','refresh');
	}


}
