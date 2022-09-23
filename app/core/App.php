<?php

class App
{

    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        
        // cek url (Controller)
        if (file_exists('../app/controllers/' . $url[0]. '.php')) {
            // menjadikan controller yang baru
            $this->controller = $url[0];
            
            // hilangkan controller dari elemen arraynya
            unset($url[0]);
        }

        // panggil controller
        require_once '../app/controllers/' . $this->controller . '.php';

        // instansiasi class
        $this->controller = new $this->controller;

        // untuk method
        if (isset($url[1])) {
            // cek method dalam controller
            if (method_exists($this->controller, $url[1])) {
                // kalo ada, ganti
                $this->method = $url[1];
                unset($url[1]);
                
            }
        }

        // kelola parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // jalankan controller & method, dan param jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /*
    Menampung URL
    */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // remove / in url
            $url = rtrim($_GET['url'], '/');

            // bersihkan url dari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // pecah url dalam tanda /
            $url = explode('/', $url);
            return $url;
        }
    }
}