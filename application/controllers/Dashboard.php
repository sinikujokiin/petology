<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		user();
		$user 		= User::count();
		$disease 	= Disease::count();
		$symptom 	= Symptom::count();
		$rule 		= Rule::count();
		$suggestion = Suggestion::count();
		$history 	= History::count();
		$data = [
			'title' => 'Dashboard',
			'breadcrumb' => 'Dashboard',
			'user'  => $user,
			'disease'  => $disease,
			'symptom'  => $symptom,
			'rule'  => $rule,
			'suggestion'  => $suggestion,
			'history'  => $history,
		];

		$this->template->load('templates/cms','cms/dashboard', $data,FALSE);
	}

	public function analisa()
	{
		redirect('dashboard');
		$id = $this->input->post('id');
		$disease_id = $this->input->post('disease_id');

		if ($disease_id) {
			$disease = Disease::find($disease_id);
			$choice = $this->session->userdata('choice');
			$choice[] = $id;
			$choice = array_unique($choice);
			$this->session->set_userdata('choice', $choice);
			$choice = $this->session->userdata('choice');
			dd($choice);
			$selected_symptoms = Symptom::whereIn('id', $choice)->get(); 

			var_dump($selected_symptoms->toArray());
			var_dump('----------------------');
			dd($disease->toArray());
			
		}else{
			if (!$id) {
				$where = ['parent_id' => null];
				$this->session->unset_userdata('choice');
			}else{
				$next = explode("-", $this->input->post('next'));
				$field = $next[0];
				$next_id = $next[1];

				if ($field == 'yes') {
					$choice = $this->session->userdata('choice');
					$choice[] = $id;
					$choice = array_unique($choice);
					$this->session->set_userdata('choice', $choice);
					$choice = $this->session->userdata('choice');
					var_dump($choice);
				}

				$where = ['parent_id' => $id,'symptom_id' => $next_id];
			}


			$flow = Rule_flow::with('symptom')->where($where)->get();
			$data = [
				'title' => 'Analisa',
				'breadcrumb' => 'Analisa',
				'flow' => $flow,
				'flows' => Rule_flow::with(['child','symptom', 'disease'])->where('parent_id', null)->get()
			];

			// dd($data['flows']->toArray());


			$this->template->load('templates/cms','cms/analisa', $data,FALSE);
		}

	}
}
