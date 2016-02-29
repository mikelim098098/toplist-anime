<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model extends CI_Model
{
  public function g_animes(){
    $query =
      "SELECT Animes.id, status, title, description, release_year, total_episodes, anime_id, user_id, likes,
      SUM(IF(likes = 1, 1,0)) AS 'likes'
      FROM Animes
      LEFT JOIN Animelikes ON Animes.id = Animelikes.anime_id
      GROUP BY anime_id
      ORDER BY likes DESC";
    return $this->db->query($query)->result_array();
  }

  public function g_anime($anime_id){
    // $query = "SELECT * FROM Animes WHERE id = ?";
    $query =
      "SELECT Animes.id, Animes.title, Animes.description, Animes.release_year, Animes.total_episodes, Animes.status, 
      Animes.picture, Reviews.id, Reviews.anime_id, Reviews.user_id, Reviews.review, Reviews.title, 
      Reviewlikes.id, Reviewlikes.review_id, Reviewlikes.user_id, Reviewlikes.likes 
      FROM Animes
      LEFT JOIN Reviews ON Animes.id = Reviews.anime_id
      LEFT JOIN Reviewlikes ON Reviews.id = Reviewlikes.review_id
      WHERE Animes.id = ?";
    $value = array($anime_id);
    return $this->db->query($query, $value)->row_array();
  }

  public function p_animelikes($post){
    $query =
      "INSERT IGNORE INTO Animelikes(anime_id, user_id, likes) VALUES (?,?,?)";
    $values = array($post['anime_id'], $post['user_id'], $post['likes']);
    $this->db->query($query, $values);
  }

  public function c_anime($post){
    $query = 
      "INSERT INTO Animes(title, description, status, release_year, total_episodes) VALUES(?,?,?,?,?)";
    $values = array($post['title'], $post['description'], $post['status'], $post['release_year'], $post['total_episodes']);
    $this->db->query($query, $values);
    return $last_item = $this->db->insert_id();
  }

  public function u_anime($post){
    $query = 
      "UPDATE Animes
      SET title = ?, description = ?, status = ?, release_year = ?, 
      total_episodes = ?, updated_at = NOW()
      WHERE id = ?";
    $values = array(
      $post['title'], $post['description'], $post['status'], 
      $post['release_year'], $post['total_episodes'], $post['anime_id']);
    return $this->db->query($query, $values);
  }

  public function g_e_anime($post){
    $query = "SELECT * FROM Animes WHERE id = ?";
    $value = $post['anime_id'];
    return $this->db->query($query, $value)->row_array();
  }

  public function g_reviews($anime_id){
    // $query = "SELECT * FROM Reviews WHERE anime_id = ?";
    $query = "SELECT Reviews.id, Reviews.review, Reviews.title, Reviews.anime_id, Reviews.user_id, 
      SUM(IF(likes = 1, 1,0)) AS 'likes'
      FROM Reviews 
      LEFT JOIN Reviewlikes ON Reviews.id = Reviewlikes.review_id
      LEFT JOIN Users on Users.id = Reviewlikes.user_id
      GROUP BY review_id
      ORDER BY likes DESC";
    // $value = $anime_id;
    return $this->db->query($query)->result_array();
  }

  public function g_review($review_id){
    $query = "SELECT * FROM Reviews WHERE id = ?";
    $value = array($review_id);
    return $this->db->query($query, $value)->row_array();
  }

  public function p_review($post){
    $query = "INSERT INTO Reviews(anime_id, user_id, review, title) VALUES(?,?,?,?)";
    $values = array(
      $post['anime_id'],
      $post['user_id'],
      $post['review'],
      $post['title']
    );
    $this->db->query($query, $values);
    return $last_id = $this->db->insert_id();
  }

  public function g_reviewlikes($review_id){
    $query = "SELECT * FROM Reviewlikes WHERE id = ?";
    $value = $review_id;
    $reviewlikes = $this->db->query($query, $value)->row_array();
    // var_dump($reviewlikes);
    
  }

  // public function g_reviewlikes($review_id){
  //   $query = "SELECT * FROM Reviewlikes WHERE anime_id = ?";
  //   $value = $review_id;
  //   return $this->db->query($query, $value)->result_array();
  // }

}

?>
