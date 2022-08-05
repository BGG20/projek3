<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index(){
        $user_email = $this->session->userdata("email");
        echo "Halo admin!<br>Email : " . $user_email;
    }
}