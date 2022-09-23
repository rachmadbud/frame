<?php

class About extends Controller
{
    // method default
    public function index($nama = 'Rachmad', $pekerjaan = 'Gamer', $umur = '32')
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $this->view('about/page');
    }
}