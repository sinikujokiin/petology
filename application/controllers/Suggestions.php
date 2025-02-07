<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestions extends CI_Controller {

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
		$data = [
			'title' => 'Kritik & Saran',
			'breadcrumb' => 'Kritik & Saran',
			'suggestions' => Suggestion::get()
		];

		$this->template->load('templates/cms','cms/suggestions', $data,FALSE);
	}
}
