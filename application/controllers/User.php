<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function index(){
        $user_email = $this->session->userdata("email");
        echo "Berhasil login user!<br>Email : " . $user_email;
    }
}