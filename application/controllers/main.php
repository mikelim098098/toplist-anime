<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent::__construct();
    $this->load->model('model');
		// $this->output->enable_profiler();
	}

	public function index(){
    $this->load->view('index');
	}

  public function g_animes(){
    if($this->session->userdata('logged_in')){
      $animes = $this->model->g_animes();
      $this->load->view('g_animes', array('animes' => $animes));
    } else {
      redirect('/lnr/g_login');
    }
  }

  public function g_anime(){
    $anime_id = $this->uri->segment(3);
    $anime = $this->model->g_anime($anime_id);
    $reviews = $this->model->g_reviews($anime_id);
    // var_dump($reviews);
    // $reviewlikes = $this->model->g_reviewlikes($anime_id);
    // var_dump($reviewlikes);
    $this->load->view('g_anime', array('anime' => $anime, 'reviews' => $reviews));
  }

  public function g_n_anime(){
    $this->load->view('g_n_anime');
  }

  public function c_anime(){
    $anime_id = $this->model->c_anime($this->input->post());
    redirect('/main/g_anime/'.$anime_id);
  }

  public function g_e_anime(){
    $anime = $this->model->g_e_anime($this->input->post());
    $this->load->view('g_e_anime', array('anime' => $anime));
  }

  public function u_anime(){
    $this->model->u_anime($this->input->post());
    // $id = $this->uri->segment(3);
    // var_dump($id);
    redirect('/main/g_anime/'.$this->input->post('anime_id'));
  }

  public function p_animes(){
    $this->model->p_animes($this->input->post());
  }

  public function g_user(){
    if($this->session->userdata('logged_in')){
      $this->load->view('g_user');
    } else {
      redirect('/lnr/g_login');
    }
  }

  public function p_animelikes(){
    $this->model->p_animelikes($this->input->post());
    redirect('/main/g_animes');
  }

  public function g_n_review(){
    $anime_id = $this->uri->segment(3);
    $anime = $this->model->g_anime($anime_id);
    $this->load->view('g_n_review', 
      array(
        'anime_id' => $anime_id,
        'anime' => $anime
      ));
  }

  public function g_review(){
    $review_id = $this->uri->segment(3);
    $review = $this->model->g_review($review_id);
    $reviewlikes = $this->model->g_reviewlikes($review_id);
    $anime = $this->model->g_anime($review['anime_id']);
    $this->load->view('g_review', array('anime' => $anime, 'review' => $review));
  }

  public function p_review(){
    $review_id = $this->model->p_review($this->input->post());
    redirect('/main/g_review/'.$review_id);
  }
}

//end of main controller
