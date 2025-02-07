<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
		$setting = Setting::first();
		$data = [
			'title' => 'Pengaturan',
			'breadcrumb' => 'Pengaturan Website',
			'setting'  => $setting,
		];

		$this->template->load('templates/cms','cms/settings', $data,FALSE);
	}

	function save()
	{
		$request = $this->input->post();
		$id = encrypt_decrypt("decrypt", $request['id']);

		$setting = Setting::find($id);

		$this->form_validation->set_rules('name', 'Nama Website', 'trim|xss_clean|required', messageError());
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|valid_email', messageError());
		$this->form_validation->set_rules('phone', 'No Telepon', 'trim|required|xss_clean|numeric', messageError());
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required|xss_clean', messageError());

		$this->form_validation->set_rules('ig_name', 'Nama Instagram', 'trim', messageError());
		$this->form_validation->set_rules('ig_link', 'Link Instagram', 'trim', messageError());
		$this->form_validation->set_rules('fb_name', 'Nama Facebook', 'trim', messageError());
		$this->form_validation->set_rules('fb_link', 'Link Facebook', 'trim', messageError());

		$this->form_validation->set_rules('text_home', 'Text Home', 'trim', messageError());
		$this->form_validation->set_rules('text_profile', 'Text Profile', 'trim', messageError());

		$this->form_validation->set_rules('seo_tag[]', 'SEO Tag', 'trim', messageError());
		$this->form_validation->set_rules('seo_description', 'SEO Deskripsi', 'trim', messageError());
		if ($_FILES['icon']['name'] != '') {
			$this->form_validation->set_rules('icon', 'Icon', 'trim|callback_upload_icon', messageError());
		}

		if ($_FILES['logo']['name'] != '') {
			$this->form_validation->set_rules('logo', 'Logo', 'trim|callback_upload_logo', messageError());
		}
		$this->form_validation->set_error_delimiters('<small class="text-danger"> <i class="fa fa-exclamation-circle"></i> ', '</small>');

		if ($this->form_validation->run()) {
			$setting->name = $request['name'];
			$setting->email = $request['email'];
			$setting->phone = $request['phone'];
			$setting->address = $request['address'];
			$setting->address_link = $request['address_link'];
			$setting->ig_name = $request['ig_name'];
			$setting->ig_link = $request['ig_link'];
			$setting->fb_name = $request['fb_name'];
			$setting->fb_link = $request['fb_link'];
			$setting->seo_tag = implode(",", $request['seo_tag']);
			$setting->seo_description = $request['seo_description'];
			$setting->text_home = $request['text_home'];
			$setting->text_profile = $request['text_profile'];

			if ($_FILES['icon']['name'] != '') {
				$icon = $setting->icon;
				$setting->icon = $this->session->userdata('icon');
				dd($this->session->userdata('icon'));
				$this->session->unset_userdata('icon');

				unlink(".$icon");
			}

			if ($_FILES['logo']['name'] != '') {
				$logo = $setting->logo;
				$setting->logo = $this->session->userdata('logo');
				$this->session->unset_userdata('logo');

				unlink(".$logo");
			}

			$setting->save();

			$this->session->set_flashdata('alert', '
				<div class="alert alert-success d-flex align-items-center" role="alert">
				<i class="bi bi-check-circle"></i> 
				  <div >
				   Berhasil memperbarui pengaturan website
				  </div>
				</div>
				');
			redirect(base_url('settings'));

		} else {
			$error = getErrorValidation();
			$error['icon'] = strip_tags(form_error('icon'));
			$error['logo'] = strip_tags(form_error('logo'));

			if (form_error('icon') && $_FILES['icon']['name']) {
				unlink($this->session->userdata('icon'));
			}

			if (form_error('logo') && $_FILES['logo']['name']) {
				unlink($this->session->userdata('logo'));
			}
			dd($error);

			$this->session->set_flashdata('error', $error);
			redirect(base_url('settings'));
		}

	}

	function upload_icon()
	{
		$path = '/uploads/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = '.'.$path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = uniqid().'-'.date('y-m-d').'-'.$_FILES['icon']['name'];
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('icon')){
			$this->form_validation->set_message('upload_icon', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode('.', $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			if ($ext != 'webp') {
				$webp = covertToWebp('.'.$path, $this->upload->data('file_name'));
			}
			$file = $this->session->set_userdata('icon', $path.$webp);
			return TRUE;
		}
	}
	function upload_logo()
	{
		$path = '/uploads/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}
		$config['upload_path'] = '.'.$path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
		$config['file_name'] = uniqid().'-'.date('y-m-d').'-'.$_FILES['logo']['name'];
		$config['overwrite'] = true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('logo')){
			$this->form_validation->set_message('upload_logo', $this->upload->display_errors());
			return FALSE;
		}else{
			$ext = explode('.', $this->upload->data('file_name'));
			$ext = end($ext);
			$webp = $this->upload->data('file_name');
			if ($ext != 'webp') {
				$webp = covertToWebp('.'.$path, $this->upload->data('file_name'));
			}
			$file = $this->session->set_userdata('logo', $path.$webp);
			return TRUE;
		}
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */

 ?>