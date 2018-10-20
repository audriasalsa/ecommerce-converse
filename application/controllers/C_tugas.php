<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tugas extends CI_Controller {

	public function nilai()
	{
		$nilai = array(
			'Dina' => array(
				'Pemrograman Web' => 78,
				'Matematika Informatika' => 60,
				'Multimedia' => 81
			),
			'Qadir' => array(
				'Pemrograman Web' => 82,
				'Matematika Informatika' => 76,
				'Multimedia' => 78
			),
			'Zara' => array(
				'Pemrograman Web' => 84,
				'Matematika Informatika' => 88,
				'Multimedia' => 74
			),
			'Bahdim' => array(
				'Pemrograman Web' => 66,
				'Matematika Informatika' => 70,
				'Multimedia' => 72
			),
			'Sultan' => array(
				'Pemrograman Web' => 80,
				'Matematika Informatika' => 78,
				'Multimedia' => 80 
				// nambah sultan
			)
		);
		$data['nilai'] = $nilai;
		$this->load->view('nilai',$data); //seharusnya $data sebelumnya $nilai
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
}