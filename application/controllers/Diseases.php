<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diseases extends CI_Controller {

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

		$diseases = Disease::all();
		$data = [
			'title' => 'Penyakit',
			'breadcrumb' => 'List Penyakit',
			'diseases'  => $diseases,
		];
		$this->template->load('templates/cms','cms/diseases', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::with(['symptoms'])->find($id);
		if (!$disease) {
			danger('Data penyakit tidak ditemukan');
			redirect(base_url('diseases'),'refresh');
		}

		// dd($disease->toArray());

		$selected = Rule::where('disease_id', $id)->pluck('symptom_id')->all();

		$data = [
			'title' 		=> 'Penyakit',
			'breadcrumb' 	=> 'Detail Data Penyakit',
			'disease' 		=> $disease,
			'symptom'		=> Symptom::whereNotIn('id',  $selected)->get()
		];


		$this->template->load('templates/cms','cms/diseases-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Penyakit',
			'breadcrumb' => 'Tambah Data Penyakit',
		];

		$this->template->load('templates/cms','cms/diseases-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		if (!$request) {
			danger('Data penyakit tidak ditemukan');
			redirect('diseases/create','refresh');
		}

		$this->form_validation->set_rules('code', 'Kode Penyakit', 'trim|required|is_unique[diseases.code]', messageError());
		$this->form_validation->set_rules('name', 'Nama Penyakit', 'trim|required', messageError());
		$this->form_validation->set_rules('solution', 'Kode Penyakit', 'trim|required', messageError());
		$this->form_validation->set_rules('reason', 'Kode Penyakit', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$diseases = new Disease;
			$diseases->code = $request['code'];
			$diseases->name = $request['name'];
			$diseases->solution = $request['solution'];
			$diseases->reason = $request['reason'];
			$diseases->save();

			success('Berhasil menambahkan data penyakit');
			redirect(base_url('diseases'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('diseases/create'));
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::find($id);
		if (!$disease) {
			danger('Data penyakit tidak ditemukan');
			redirect(base_url('diseases'),'refresh');
		}

		$data = [
			'title' => 'Penyakit',
			'breadcrumb' => 'Ubah Data Penyakit',
			'disease' => $disease
		];

		$this->template->load('templates/cms','cms/diseases-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$disease = Disease::find($id);

		if (!$disease) {
			danger('Data penyakit tidak ditemukan');
			redirect(base_url('diseases'), 'refresh');
		}

		if (!$request) {
			redirect('diseases/edit/'.$id,'refresh');
		}


		$is_unique = '';

		if($disease->code != $request['code']){
			$is_unique = '|is_unique[diseases.code]';
		}

		$this->form_validation->set_rules('code', 'Kode Penyakit', 'trim|required'.$is_unique, messageError());
		$this->form_validation->set_rules('name', 'Nama Penyakit', 'trim|required', messageError());
		$this->form_validation->set_rules('solution', 'Kode Penyakit', 'trim|required', messageError());
		$this->form_validation->set_rules('reason', 'Kode Penyakit', 'trim|required', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			// $diseases = new Disease;
			$disease->code = $request['code'];
			$disease->name = $request['name'];
			$disease->solution = $request['solution'];
			$disease->reason = $request['reason'];
			$disease->save();

			success('Berhasil memperbarui data penyakit');
			redirect(base_url('diseases'));
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			redirect(base_url('diseases/edit/'.encrypt_decrypt('encrypt',$id)));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::find($id);
		if (!$disease) {

			danger('Data penyakit tidak ditemukan');
			redirect(base_url('diseases'),'refresh');
		}

		$disease->delete();

		success('Berhasil menghapus data penyakit');
		redirect(base_url('diseases'),'refresh');
	}

	function destroyrule($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$rule = Rule::find($id);
		if (!$rule) {
			redirect(base_url('diseases'),'refresh');
		}

		$rule->delete();
		redirect('diseases/show/'.encrypt_decrypt('encrypt', $rule->disease_id),'refresh');
	}

	function storerule($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::find($id);
		if (!$disease) {
			danger('Data aturan tidak ditemukan');
			redirect(base_url('diseases'),'refresh');
		}

		$symptom_ids = $this->input->post('symptom_id');
		if (!$symptom_ids) {
			danger('Data aturan tidak ditemukan');
			redirect('diseases/show/'.encrypt_decrypt('encrypt', $id),'refresh');
		}
		$data = [];

		foreach ($symptom_ids as $symptom_id) {
			$data[] = ['disease_id' => $id, 'symptom_id' => $symptom_id];
		}

		Rule::insert($data);
		success('Berhasil menambahkan aturan');
		redirect('diseases/show/'.encrypt_decrypt('encrypt', $id),'refresh');

	}


}
