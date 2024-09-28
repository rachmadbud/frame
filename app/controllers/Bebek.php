<?php

class Bebek extends Controller
{
  public function index()
  {
    $data['judul'] = 'Bebek';
    // $data['mhs'] = $this->model('MahasiswaModel')->getAllMahasiswa(); // Call the model

    $this->view('templates/header', $data);
    $this->view('bebek/index', $data);
    $this->view('templates/footer');
  }
}
