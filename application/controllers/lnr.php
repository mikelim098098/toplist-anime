<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lnr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('lnr_model');
		// $this->output->enable_profiler();
	}

  public function g_login(){
    $this->load->view('login');
  }

  public function p_login(){
    $this->lnr_model->p_login($this->input->post());
    redirect('/main/g_user/'.$this->session->userdata('id'));
  }

  public function g_registration(){
    $this->load->view('registration');
  }

  public function p_registration(){
    $validation_errors = $this->lnr_model->p_registration($this->input->post());

    if(validation_errors()){
      redirect('/lnr/g_registration');
    } else {
      redirect('/main/g_user/'.$this->session->userdata('id'));
    }
  }

  public function p_logout(){
    $this->session->set_userdata('logged_in', false);
    $this->session->set_userdata('role', null);
    $this->session->set_userdata('id', null);
    $this->session->set_userdata('first_name', null);
    $this->session->set_userdata('last_name', null);
    $this->session->set_userdata('email', null);
    $this->session->set_userdata('ip', null);
    redirect('/main/index');
  }
}

//end of main controller
