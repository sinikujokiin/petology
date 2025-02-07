<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule_flows extends CI_Controller {

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

		// dd(Rule_flow::withCount('child')->where('parent_id', null)->get()->toArray());
		$flows = Rule_flow::with([
			'parent' => function($query){
				// $query->join('symptoms', 'symptoms.id', '=', 'rule_flows.symptom_id');
			}, 'symptom', 'next_yes', 'next_no', 'disease'
		])->get();
		// dd($flows->toArray());
		$data = [
			'title' => 'Alur Aturan',
			'breadcrumb' => 'Alur Aturan',
			'flows'  => $flows,
			'structure' => Rule_flow::with(['child','symptom', 'disease'])->where('parent_id', null)->get()
		];



		



		$this->template->load('templates/cms','cms/flows', $data,FALSE);
	}

	

	function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::with(['symptoms'])->find($id);
		if (!$disease) {
			danger('Data alur aturan tidak ditemukan');
			redirect('rule_flows','refresh');
		}

		// dd($disease->toArray());

		$selected = Rule::where('disease_id', $id)->pluck('symptom_id')->all();

		$data = [
			'title' 		=> 'Alur Aturan',
			'breadcrumb' 	=> 'Detail Data Alur Aturan',
			'disease' 		=> $disease,
			'symptom'		=> Symptom::whereNotIn('id',  $selected)->get()
		];


		$this->template->load('templates/cms','cms/flows-show', $data,FALSE);
	}

	public function create()
	{
		$data = [
			'title' => 'Alur Aturan',
			'breadcrumb' => 'Tambah Data Alur Aturan',
			'parents' => Rule_flow::with('symptom')->get(),
			'symptoms' => Symptom::get(),
			'diseases' => Disease::get()
		];

		$this->template->load('templates/cms','cms/flows-create', $data,FALSE);
	}

	public function store()
	{

		$request = $this->input->post();
		if (!$request) {
			danger('Data alur aturan tidak ditemukan');
			redirect('rule_flows/create','refresh');
		}

		// dd($request);

		$this->form_validation->set_rules('parent_id', 'Parent', 'trim', messageError());
		$this->form_validation->set_rules('symptom_id', 'Gejala', 'trim|required', messageError());
		$this->form_validation->set_rules('yes', 'Pertanyaan Selanjutnya (Jika Ya)', 'trim', messageError());
		$this->form_validation->set_rules('no', 'Pertanyaan Selanjutnya (Jika Tidak)', 'trim', messageError());
		$this->form_validation->set_rules('disease_id', 'Penyakit', 'trim', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$flows = new Rule_flow;
			$flows->parent_id = $request['parent_id'] != ''? $request['parent_id'] :null;
			$flows->symptom_id = $request['symptom_id'];
			$flows->yes = $request['yes'] != ''? $request['yes'] :null;
			$flows->no = $request['no'] != ''? $request['no'] :null;
			$flows->disease_id = $request['disease_id'] != ''? $request['disease_id'] :null;
			$flows->save();

			success('Berhasil menambahkan data alur');
			redirect('rule_flows');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			$this->create();
		}

	}

	function edit($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$flow = Rule_flow::find($id);
		if (!$flow) {
			danger('Data alur aturan tidak ditemukan');
			redirect('rule_flows','refresh');
		}

		$data = [
			'title' => 'Alur Aturan',
			'breadcrumb' => 'Ubah Data Alur Aturan',
			'flow' => $flow,
			'parents' => Rule_flow::with('symptom')->get(),
			'symptoms' => Symptom::get(),
			'diseases' => Disease::get()
		];

		$this->template->load('templates/cms','cms/flows-edit', $data,FALSE);

	}

	public function update($id)
	{

		$request = $this->input->post();
		$id =  encrypt_decrypt('decrypt', $id);
		$flows = Rule_flow::find($id);
		// dd($request);

		if (!$flows) {
			danger('Data alur aturan tidak ditemukan');
			redirect('rule_flows', 'refresh');
		}

		if (!$request) {
			danger('Data alur aturan tidak ditemukan');
			redirect('rule_flows/edit/'.$id,'refresh');
		}

		$this->form_validation->set_rules('parent_id', 'Parent', 'trim', messageError());
		$this->form_validation->set_rules('symptom_id', 'Gejala', 'trim|required', messageError());
		$this->form_validation->set_rules('yes', 'Pertanyaan Selanjutnya (Jika Ya)', 'trim', messageError());
		$this->form_validation->set_rules('no', 'Pertanyaan Selanjutnya (Jika Tidak)', 'trim', messageError());
		$this->form_validation->set_rules('flow_id', 'Penyakit', 'trim', messageError());
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$flows->parent_id = isset($request['parent_id']) ? $request['parent_id'] :null;
			$flows->symptom_id = isset($request['symptom_id']) ? $request['symptom_id'] :null;
			$flows->yes = isset($request['yes']) ? $request['yes'] :null;
			$flows->no = isset($request['no']) ? $request['no'] :null;
			$flows->disease_id = isset($request['disease_id']) ? $request['disease_id'] :null;
			$flows->save();

			success('Berhasil memperbarui  data alur aturan');
			redirect('rule_flows');
		} else {
			$error = getErrorValidation();
			$this->session->set_flashdata('error', $error);
			$this->edit(encrypt_decrypt('encrypt',$id));
		}

	}

	function destroy($id){
		$id = encrypt_decrypt('decrypt', $id);
		$disease = Disease::find($id);
		if (!$disease) {
			danger('Data alur aturan tidak ditemukan');
			redirect('rule_flows','refresh');
		}

		$disease->delete();

		success('Berhasil menghapus  data alur aturan');
		redirect('rule_flows','refresh');
	}

}
