<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends CI_Controller {

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
		$rules = Disease::with(['symptoms'])->get();
		$data = [
			'title' => 'Aturan',
			'breadcrumb' => 'List Aturan',
			'rules'  => $rules,
		];

		$this->template->load('templates/cms','cms/rules', $data,FALSE);
	}

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$rules = Disease::with(['symptoms'])->find($id);
		if (!$rules) {
			danger('Data aturan tidak ditemukan');
			redirect('rules','refresh');
		}

		$selected = Rule::where('disease_id', $id)->pluck('symptom_id')->all();


		$data = [
			'title' => 'Aturan',
			'breadcrumb' => 'Detail Data Aturan',
			'rules' => $rules,
			'symptom'		=> Symptom::whereNotIn('id',  $selected)->get()
		];

		$this->template->load('templates/cms','cms/rules-show', $data,FALSE);
	}

	function store($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::find($id);
		if (!$disease) {
			danger('Data aturan tidak ditemukan');
			redirect('rules','refresh');
		}

		$symptom_ids = $this->input->post('symptom_id');
		if (!$symptom_ids) {
			danger('Gejala belum dipilih');
			redirect('rules/show/'.encrypt_decrypt('encrypt', $id),'refresh');
		}
		$data = [];

		foreach ($symptom_ids as $symptom_id) {
			$data[] = ['disease_id' => $id, 'symptom_id' => $symptom_id];
		}

		Rule::insert($data);

		success('Berhasil menambahkan data aturan');
		redirect('rules/show/'.encrypt_decrypt('encrypt', $id),'refresh');

	}


	function destroy($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$rule = Rule::find($id);
		if (!$rule) {
			danger('Data aturan tidak ditemukan');
			redirect('rules','refresh');
		}

		$rule->delete();

		success('Berhasil menghapus data aturan');
		redirect('rules/show/'.encrypt_decrypt('encrypt', $rule->disease_id),'refresh');
	}

	

}
