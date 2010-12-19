<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todoo extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		isLiveUser();
		if (!$this->session->userdata('user')) redirect('oauth');

		// load model
		$this->load->model('Todo_model', 'todo');

		// load helper
		$this->load->helper('text');

	}

	public function index()
	{
		$data['title'] = "My Todoo - Todoo App";
		$user = $this->session->userdata('user');

		// Ambil Semua Todo Baru
		$new = ['id_status', 4];
		$data['newTodoo'] = $this->todo->ambilTodoByParams($new, $user);

		// Ambil Semua Todo yang sedang Dikerjakan
		$working = ['id_status', 3];
		$data['workTodoo'] = $this->todo->ambilTodoByParams($working, $user);

		// Ambil Semua Todo yang di tunda
		$canceling = ['id_status', 2];
		$data['cancelTodoo'] = $this->todo->ambilTodoByParams($canceling, $user);

		$this->load->view('templates/header', $data);
		$this->load->view('todoo/index', $data);
		$this->load->view('templates/footer');
	}

	public function addtodo()
	{
		$data['title'] = "My New Todoo - Todoo App";
		$user = $this->db->get_where('user', ['nickname' => $this->session->userdata('user')])->row_array();

		$this->form_validation->set_rules('title', 'Todoo Title', 'trim|required');
		$this->form_validation->set_rules('info', 'Todoo Info', 'trim|required');
		$this->form_validation->set_rules('accessibility', 'Accessing Todoo', 'required');

		if ($this->form_validation->run() === false) {

			$this->load->view('templates/header', $data);
			$this->load->view('todoo/tambah', $data);
			$this->load->view('templates/footer');

		} else {

			$title = $this->input->post('title', true);
			$info = $this->input->post('info', true);
			$access = $this->input->post('accessibility', true);
			$slug = url_title($title, '-', true);
			
			$data = [
				'title' => $title,
				'slug' => $slug,
				'info' => nl2br($info),
				'id_user' => $user['id'],
				'id_access' => $access,
				'id_status' => 4,
				'date_created' => now('Asia/Jakarta')
			];

			$this->db->insert('todoo', $data);

			// pesan
			$this->session->set_flashdata('pesan', 'Success Adding New Todoo!!');
			$this->session->set_flashdata('alert', 'success');

			// redirect ke halaman index
			redirect('mytodo');
		}
	}

	public function lihattodo($slug = '')
	{
		$data['title'] = 'Details - Todoo App';

		$user = $this->session->userdata('user');
		$data['todo'] = $this->todo->getDetailsTodoo($slug, $user);

		$this->load->view('templates/header', $data);
		$this->load->view('todoo/detail', $data);
		$this->load->view('templates/footer');
	}

	public function kerjakantodo($id = '')
	{
		// ambil todoo berdarkan id , lakukan pengecekan 
		$user = $this->session->userdata('user');
		$todoo = $this->todo->ambilTodoByParams(['date_created', $id], $user);
		if (empty($todoo)) {

			// pesan
			$this->session->set_flashdata('pesan', 'Your Todo wasn\'t Found');
			$this->session->set_flashdata('alert', 'error');

			// redirect ke halaman index
			redirect('mytodo');
		} else {

			$data = [
				'id_status' => 3
			];

			$this->db->where('date_created', $id);
			$this->db->update('todoo', $data);
			
			// pesan
			$this->session->set_flashdata('pesan', 'Working Your Todo Now!!');
			$this->session->set_flashdata('alert', 'success');

			// redirect ke halaman index
			redirect('mytodo');
		}
	}

	public function tundatodo($id = '')
	{
		// ambil todoo berdarkan id , lakukan pengecekan 
		$user = $this->session->userdata('user');
		$todoo = $this->todo->ambilTodoByParams(['date_created', $id], $user);
		if (empty($todoo)) {

			// pesan
			$this->session->set_flashdata('pesan', 'Your Todo wasn\'t Found');
			$this->session->set_flashdata('alert', 'error');

			// redirect ke halaman index
			redirect('mytodo');
		} else {

			$data = [
				'id_status' => 2
			];

			$this->db->where('date_created', $id);
			$this->db->update('todoo', $data);

			// pesan
			$this->session->set_flashdata('pesan', 'Remember To Work your Todoo!!');
			$this->session->set_flashdata('alert', 'success');

			// redirect ke halaman index
			redirect('mytodo');
		}
	}

	public function selesaitodo($slug = '')
	{
		// ambil todoo berdarkan id , lakukan pengecekan 
		$user = $this->session->userdata('user');
		$todoo = $this->todo->ambilTodoByParams(['slug', $slug], $user);
		if (empty($todoo)) {

			// pesan
			$this->session->set_flashdata('pesan', 'Your Todo wasn\'t Found');
			$this->session->set_flashdata('alert', 'error');

			// redirect ke halaman index
			redirect('mytodo');
		} else {

			$data = [
				'id_status' => 1,
				'date_finished' => now('Asia/Jakarta')
			];

			$this->db->where('slug', $slug);
			$this->db->update('todoo', $data);

			// pesan
			$this->session->set_flashdata('pesan', 'Congratulations!!, Your Todo Have Been Finished');
			$this->session->set_flashdata('alert', 'success');

			// redirect ke halaman index
			redirect('mytodo');
		}
	}

	public function edittodo($slug = '')
	{
		$data['title'] = "Edit Todoo - Todoo App";
		$user = $this->session->userdata('user');

		$data['todo'] = $this->todo->getDetailsTodoo($slug, $user);
		$idTodoo = $data['todo']['id_todoo'];

		$this->form_validation->set_rules('title', 'Todoo Title', 'trim|required');
		$this->form_validation->set_rules('info', 'Todoo Info', 'trim|required');
		$this->form_validation->set_rules('accessibility', 'Accessing Todoo', 'required');

		if ($this->form_validation->run() === false) {

			$this->load->view('templates/header', $data);
			$this->load->view('todoo/edit', $data);
			$this->load->view('templates/footer');
		} else {

			$title = $this->input->post('title', true);
			$info = $this->input->post('info', true);
			$access = $this->input->post('accessibility', true);
			$slug = url_title($title, '-', true);
			// $oldStatus = $this->input->post('old_status', true);

			$data = [
				'title' => $title,
				'slug' => $slug,
				'info' => nl2br($info),
				'id_access' => $access,
				'id_status' => $data['todo']['id_status'],
				'date_created' => now('Asia/Jakarta')
			];

			$this->db->where("id_todoo", $idTodoo);
			$this->db->update('todoo', $data);

			// pesan
			$this->session->set_flashdata('pesan', 'Success Editing Todoo!!');
			$this->session->set_flashdata('alert', 'success');

			// redirect ke halaman index
			redirect('mytodo');
		}
	}

	public function hapustodo($id = '')
	{
		// ambil todoo berdarkan id , lakukan pengecekan 
		$user = $this->session->userdata('user');
		$todoo = $this->todo->ambilTodoByParams(['date_created', $id], $user);
		if (empty($todoo)) {

			// pesan
			$this->session->set_flashdata('pesan', 'Your Todo wasn\'t Found');
			$this->session->set_flashdata('alert', 'error');

			// redirect ke halaman index
			redirect('mytodo');

		}

		$this->db->where('date_created', $id)->delete('todoo');

		// pesan
		$this->session->set_flashdata('pesan',
			'Success Removed Your Todo'
		);
		$this->session->set_flashdata('alert', 'success');

		// redirect ke halaman index
		redirect('mytodo');
		
	}

	public function finishtodo()
	{
		$data['title'] = 'Acomplihed - Todoo App';
		$user = $this->session->userdata('user');

		// Ambil Semua Todo yang sedang Dikerjakan
		$finish = ['id_status', 1];
		$data['finishTodoo'] = $this->todo->ambilTodoByParams($finish, $user);

		$this->load->view('templates/header', $data);
		$this->load->view('todoo/finish', $data);
		$this->load->view('templates/footer');
	}

	public function publictodo()
	{
		$data['title'] = 'All public todo - Todoo App';
		$data['public'] = $this->todo->getAllPublicTodo();

		$this->load->view('templates/header', $data);
		$this->load->view('todoo/public', $data);
		$this->load->view('templates/footer');
	}
}
