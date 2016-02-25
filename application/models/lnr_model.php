<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class lnr_model extends CI_Model
{
  public function p_login($post){
    $query = "SELECT * FROM Users WHERE email=?";
    $value = array($post['email']);
    $user = $this->db->query($query, $value)->row_array();

    if($user){
      if(md5($post['password']) == $user['password']){
        $this->session->set_userdata('logged_in', true);
        $this->session->set_userdata('id', $user['id']);
        $this->session->set_userdata('first_name', $user['first_name']);
        $this->session->set_userdata('last_name', $user['last_name']);
        $this->session->set_userdata('email', $user['email']);
        $this->session->set_userdata('ip', $user['ip']);
      }
    } else {
      $this->session->set_flashdata('lerrors', "Your email address/password was incorrect!");
    }

    if($user['role'] == '1337') {
      $this->session->set_userdata('role', 'admin');
    } 
  }

  public function p_registration($post){
    $this->load->library("form_validation");
    $this->load->helper('date');
    $this->form_validation->set_rules("first_name", "First Name", 'trim|required|min_length[3]|max_length[15]');
    $this->form_validation->set_rules("last_name", "Last Name", 'trim|required|min_length[2]|max_length[15]');
    $this->form_validation->set_rules("email", "Email", 'trim|required|valid_email|is_unique[Users.email]');
    $this->form_validation->set_rules("password", "Password", 'trim|required|matches[confirm_password]|md5');
    $this->form_validation->set_rules("confirm_password", "Confirm Password", 'trim|required|matches[password]|md5');
    $this->form_validation->set_rules("country", "Country", "trim|required");
    $this->form_validation->set_rules("dobmonth", "Birth Month", "trim|required");
    $this->form_validation->set_rules("dobday", "Birth Month", "trim|required");
    $this->form_validation->set_rules("dobyear", "Birth Year", "trim|required");
    $this->form_validation->set_rules("sex", "Sex", "trim|required");

    if($this->form_validation->run()){
      //insert user into db.
      $query = "INSERT INTO Users(first_name, last_name, email, password, country, dobmonth, dobday, dobyear, sex, ip, created_at, updated_at) VALUES(?,?,?,?,?,?,?,?,?,?,NOW(),NOW())";
      // var_dump($post['dobmonth']);
      $values = 
        array(
          $post['first_name'], 
          $post['last_name'], 
          $post['email'], 
          md5($post['password']), 
          $post['country'], 
          $post['dobmonth'], 
          $post['dobday'], 
          $post['dobyear'], 
          $post['sex'],
          $post['ip']
        );
      $result = $this->db->query($query, $values);
      if($result){
        $query = "SELECT * FROM Users WHERE email = ?";
        $value = array($post['email']);
        $user = $this->db->query($query, $value)->row_array();
        if($user){
          if(md5($post['password']) == $user['password']){
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('id', $user['id']);
            $this->session->set_userdata('first_name', $user['first_name']);
            $this->session->set_userdata('last_name', $user['last_name']);
            $this->session->set_userdata('email', $user['email']);
            $this->session->set_userdata('ip', $user['ip']);
          } else {
            console.log('There was an error logging you in after registration');
          }
        } else {
          console.log('Could not find the user after registration');
        }
        if($user['role'] == '1337'){
          $this->session->set_userdata('role', 'admin');
        }
      } else {
        console.log('The registration process has failed');
      }
    } else {
      $this->session->set_flashdata('rerrors', validation_errors());
    }
  }

  public function logout(){
    
  }
}

?>
