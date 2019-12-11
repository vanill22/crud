<?php
class Post {
  private $db;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }

  public function getAllCategories(){
    $query = "SELECT * FROM categories";
    $getCat = $this->db->select($query);
    return $getCat;
  }

  public function getAllProducts(){
    $query = "SELECT * FROM products";
    $getproducts = $this->db->select($query);
    return $getproducts;
  }

  public function insertNewPost($post) {
    $title = mysqli_real_escape_string($this->db->link, $post['title']);
    $cat_id = mysqli_real_escape_string($this->db->link, $post['cat_id']);
    $price = mysqli_real_escape_string($this->db->link, $post['price']);
    $content = mysqli_real_escape_string($this->db->link, $post['content']);
    $description_full = mysqli_real_escape_string($this->db->link, $post['description_full']);

    $query = "INSERT INTO products(name, price, description, cat_id, description_full) VALUES ('$title', '$price', '$content', '$cat_id', '$description_full')";
    $insert = $this->db->insert($query);

    if($insert) {
      $msg = "<span style='color:green;font-size:20px;'>Товар добавлен</span>";
      return $msg;
    } else {
      $msg = "<span style='color:red;font-size:20px;'>Ошибка добавления товара!</span>";
      return $msg;
    }

  }

    public function getPostById($post_id){
      $query = "SELECT * FROM products WHERE id = '$post_id'";
      $getpost = $this->db->select($query);
      return $getpost;
    }
    public function getCategoryById($cat_id) {
      $query = "SELECT * FROM categories WHERE id = '$cat_id'";
      $getCat = $this->db->select($query);
      return $getCat;
    }

    public function updatePost($post, $id){
      $title = mysqli_real_escape_string($this->db->link, $post['title']);
      $cat_id = mysqli_real_escape_string($this->db->link, $post['cat_id']);
      $price = mysqli_real_escape_string($this->db->link, $post['price']);
      $content = mysqli_real_escape_string($this->db->link, $post['content']);
      $description_full = mysqli_real_escape_string($this->db->link, $post['description_full']);

      $query = "UPDATE products SET
                name = '$title',

                price = '$price',
                description = '$content',
                description_full = '$description_full'
                WHERE id ='$id'";

                $update = $this->db->update($query);

                if($update) {
                  $msg = "<span style='color:green;font-size:20px;'>Товар обновлен</span>";
                  return $msg;
                } else {
                  $msg = "<span style='color:red;font-size:20px;'>Ошибка редактирования товара!</span>";
                  return $msg;
                }
    }

    public function delPostByID($id){
      $query = "DELETE FROM products WHERE id = '$id'";
      $delPost = $this->db->delete($query);

      if($delPost) {
        $msg = "<span style='color:green;font-size:20px;'>Товар удален</span>";
        return $msg;
      } else {
        $msg = "<span style='color:red;font-size:20px;'>Ошибка товар НЕ удален!</span>";
        return $msg;
      }

    }




}
