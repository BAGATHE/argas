<?php defined('BASEPATH') OR exit('No direct script access allowed');
Class AuthentificationController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('AuthentificationModel');
    }

    public function checkLogin(){	
        $data = [
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('tel'),
            'password' => $this->input->post('password')
        ];
        $model = new AuthentificationModel($data);
        $result = $model->checkUser();
        
        if($result["profil"]=="administrator"){
            $session_data = array(
                'user_type' => 'administrator',
                'userdata' => $result,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
        }else if($result["profil"]=="citizen"){
            $session_data = array(
                'user_type' => 'citizen',
                'userdata' => $result,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
        }
        echo json_encode($result);     
    }


    public function accessHomePage(){	
        $data = [
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'password' => $this->input->post('password')
        ];
        $model = new AuthentificationModel($data);
        $result = $model->checkUser();
        var_dump($result);
        if($result["profil"]=="administrator"){
            redirect('AdministratorController');
        }else{
            redirect('CitizenController');
        }      
      }




}