<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index(){

        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Password", "required|trim");

        if ($this->form_validation->run() == false){
            $this->load->view("auth/login");
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user){
                if (password_verify($password, $user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];

                    $this->session->set_userdata($data);
                    $role = $user['role'];
                    if ($role == "user"){
                        redirect('user');
                    }

                    if ($role == "admin"){
                        redirect('admin');
                    }
                }else{
                    $this->session->set_flashdata('message', 'Email or password is incorrect!');
                    redirect("auth");
                }    
            }else{
                $this->session->set_flashdata('message', 'Email or password is incorrect!');
                redirect("auth");
            }
        }
        
    }

    public function register(){

        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[user.email]", [
            "is_unique" => "Email is already exist!"
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[3]|matches[password2]");
        $this->form_validation->set_rules("password2", "Password", "required|trim|matches[password1]");

        if ($this->form_validation->run() == false){
            $this->load->view("auth/register");
        }else{
            $data = [
                "name" => $this->input->post('name'),
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                "role" => "user",
                "date_created" => time()
            ];
            

            // if ($data['email'] == "admin@gmail.com"){
            //     $data['role'] = "admin";
            // }
            
            $this->db->insert('user', $data);
            redirect("auth");
        }
    }
}

?>