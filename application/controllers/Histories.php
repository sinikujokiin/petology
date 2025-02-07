<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Histories extends CI_Controller {

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
		$histories =  History::with('disease')->get();
		$data = [
			'title' => 'Riwayat',
			'breadcrumb' => 'Riwayat',
			'history' => $histories
		];

		$this->template->load('templates/cms','cms/histories', $data,FALSE);
	}

	public function show($id)
	{
		$id = encrypt_decrypt('decrypt', $id);
		$history = History::with('disease')->find($id);
		if (!$history) {
			danger('Data riwayat tidak ditemukan');
			redirect('histories','refresh');
		}

		$symptoms = null;
		$percentage = 0;
		if ($history->disease_id) {
			// $rules = Rule::where('disease_id', $history->disease_id)->get(['id'])->toArray();
			// $rules = array_column($rules, 'id'); 
			// $diff = array_diff(json_decode($history->symptoms), $rules);
			// dd($diff);
			$symptoms = Symptom::whereIn('id', json_decode($history->symptoms))->get();
		}

		$data = [
			'title' => 'Riwayat',
			'breadcrumb' => 'Detail Riwayat',
			'history' => $history,
			'symptoms' => $symptoms
		];
		$this->template->load('templates/cms','cms/histories-show', $data,FALSE);		

	}


	public function pdf($id)
	{
		$this->load->library('pdf');
		$id = encrypt_decrypt('decrypt', $id);
		$history = History::with('disease')->find($id);
		if (!$history) {
			danger('Data riwayat tidak ditemukan');
			redirect('histories','refresh');
		}

		$symptoms = null;
		$percentage = 0;
		if ($history->disease_id) {
			// $rules = Rule::where('disease_id', $history->disease_id)->get(['id'])->toArray();
			// $rules = array_column($rules, 'id'); 
			// $diff = array_diff(json_decode($history->symptoms), $rules);
			// dd($diff);
			$symptoms = Symptom::whereIn('id', json_decode($history->symptoms))->get();
		}
		$data = [
			'title' => 'Hasil Diagnosis Penyakit',
			'history' => $history,
			'symptoms' => $symptoms
		];


        $html = $this->load->view('pdf', $data, true);
        $this->pdf->createPDF($html, $data['title']. '-'.$history->code, false);
	}


}

/* End of file Histories.php */
/* Location: ./application/controllers/Histories.php */