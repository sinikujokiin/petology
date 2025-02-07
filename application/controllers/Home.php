<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = [
			'title' => 'Home'
		];
		$this->template->load('templates/home','home/index', $data,FALSE);
	}

	public function suggestion()
	{
		$request = $this->input->post();
		$data = [
			'title' => 'Kritik & Saran'
		];
		if ($request) {
			$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required', messageError());	
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', messageError());	
			$this->form_validation->set_rules('phone', 'No. Telpon', 'trim|required|numeric', messageError());	
			$this->form_validation->set_rules('message', 'Isi Pesan', 'trim|required', messageError());	
			$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

			if ($this->form_validation->run()) {

				$suggestion = Suggestion::where($request)->first();
				if (!$suggestion) {
					$suggestion = new Suggestion;
					$suggestion->insert($request);
				}



				success('Kritik & Saran berhasil dikirm, <br> Terimakasih atas saran dan masukannya');
				redirect('suggestion');
			} else {
				$error = getErrorValidation();
				$this->session->set_flashdata('error', $error);
			}

		}
		$this->template->load('templates/home','home/suggestion', $data,FALSE);
	}

	function consultation()
	{
		$request = $this->input->post();

		$data = [
			'title' => 'konsultasi'
		];
		$where = ['parent_id' => null];
		if ($request) {
			if (isset($request['owner'])) {

				$this->form_validation->set_rules('owner', 'Nama Pemilik', 'trim|required|xss_clean', messageError());
				$this->form_validation->set_rules('pet_name', 'Nama Hewan', 'trim|required|xss_clean', messageError());
				$this->form_validation->set_rules('pet_gender', 'Jenis Kelamin Hewan', 'trim|required|xss_clean', messageError());
				$this->form_validation->set_rules('phone', 'No. Telepon', 'trim|required|numeric', messageError());
				$this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean', messageError());
				$this->form_validation->set_error_delimiters('<small>', '</small>');
				if ($this->form_validation->run() == FALSE) {
					$error = getErrorValidation();
					$error['pet_gender'] = form_error('pet_gender');
					$err = '<ul>';
					foreach ($error as $value) {

						if ($value != '') {
							$err .= '<li>'.$value.'</li>';
						}
					}

					$err .= '</ul>';


					// $this->session->set_flashdata('error', $error);

					danger('Isian form tidak valid :<br>'.$err);
					redirect('consultation','refresh');
					exit();
				}


				$where = ['parent_id' => null];
				$this->session->unset_userdata('choice');
				$this->session->set_userdata('data_konsultasi', $request);
			}else{
				$id 		= $this->input->post('id');
				$symptom_id 		= $this->input->post('symptom_id');
				$next = explode("-", $this->input->post('next'));
				$field = $next[0];
				$next_id = $next[1];
				$disease_id = $this->input->post('disease_id');

				if ($disease_id && empty($next_id)) {
					$disease = Disease::find($disease_id);
					$choice = $this->session->userdata('choice');
					$choice[] = $symptom_id;
					$choice = array_unique($choice);
					$this->session->set_userdata('choice', $choice);
					$choice = $this->session->userdata('choice');

					$selected_symptoms = Symptom::whereIn('id', $choice)->get(); 

					$data_konsultasi = $this->session->userdata('data_konsultasi');
					$data_konsultasi['code'] = rand();
					$data_konsultasi['disease_id'] = $disease->id;
					$data_konsultasi['symptoms'] = json_encode($choice);

					$history = History::insertGetId($data_konsultasi);
					$this->session->unset_userdata('choice');
					$this->session->unset_userdata('data_konsultasi');
					$this->session->set_userdata('history', $history);

					redirect('consultation-report','refresh');
				}else{
					

					if ($field == 'yes') {
						$choice = $this->session->userdata('choice');
						$choice[] = $symptom_id;
						$choice = array_unique($choice);
						$this->session->set_userdata('choice', $choice);
						$choice = $this->session->userdata('choice');
						// var_dump($choice);
					}

					$where = ['parent_id' => $id,'symptom_id' => $next_id];

				}

			}
		}
		$flow = Rule_flow::with('symptom')->where($where)->get();
		// dd(count($flow) < 1);
		if (count($flow) < 1) {
			$data_konsultasi = $this->session->userdata('data_konsultasi');
			$data_konsultasi['code'] = rand();
			$data_konsultasi['disease_id'] = null;
			$data_konsultasi['symptoms'] = json_encode($this->session->unset_userdata('choice'));
			$history = History::insertGetId($data_konsultasi);
			$this->session->unset_userdata('choice');
			$this->session->unset_userdata('data_konsultasi');
			$this->session->set_userdata('history', $history);

			danger("Mohon Maaf, sistem tidak dapat mendiagnosis penyakit hewan peliharaan Anda. Silahkan kirim pesan melalui kritik dan saran.");
			redirect('consultation-report','refresh');
		}
		$data['flow'] = $flow;
		
		// $this->session->unset_userdata('choice');
		// $this->session->unset_userdata('data_konsultasi');
		$this->template->load('templates/home','home/consultation', $data,FALSE);
	}
	public function consultation_report()
	{
		$id = $this->session->userdata('history');
		if (!$id) {
			danger('Maaf, Anda belum melakukan konsultasi');
			redirect('consultation','refresh');
		}

		$data = ['title' => 'Laporan Hasil Konsultasi'];
		$history = History::with('disease')->find($id);
		// dd($history->toArray());
		$data['symptoms'] = null;
		if ($history->disease_id) {
			$symptom_ids = json_decode($history->symptoms);
			$symptoms = Symptom::whereIn('id', $symptom_ids)->get();
			$data['symptoms'] = $symptoms;
		}

		$data['history'] = $history;
		// dd($data);
		$this->template->load('templates/home','home/consultation-report', $data,FALSE);
	}

	public function consultation_report_pdf($id)
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

	public function profile()
	{
		$data = [
			'title' => 'Profil'
		];
		$this->template->load('templates/home','home/profile', $data,FALSE);
	}

	function contact()
	{
		$data = [
			'title' => 'Kontak'
		];
		$this->template->load('templates/home','home/contact', $data,FALSE);	
	}
}
