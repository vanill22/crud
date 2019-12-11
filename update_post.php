<?php
include_once "include/header.php";
?>
<div class="container">
  <header class="jumbotron my-4">
    <h1 class="display-3">Редактировать товар</h1>
    <?php
          if (isset($_GET['update'])) {
            $post_id = $_GET['update'];
            $getPost = $post->getPostById($post_id);
          }
          while($result = $getPost->fetch_object()) {
            $id = $result->id;
            $title = $result->name;
            $price = $result->price;
            $content = $result->description;
            $content_full = $result->description_full;
            $cat_id = $result->cat_id;
          }
     ?>


  </header>
  <div class="row">
    <div class="col-md-6">
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
              $updatePost = $post->updatePost($_POST, $id);
            }

            if(isset($updatePost)) {
              echo $updatePost;
            }
        ?>


      <form action="#" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Название товара:</label>
            <input type="text" name="title" value="<?php echo $title;?>" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="name">Цена:</label>
            <input type="text" name="price" value="<?php echo $price;?>" class="form-control" id="price">
          </div>
          <div class="form-group">
            <label for="sel1">Выбор категории:</label>
            <select class="form-control" name="cat_id">

              <?php
                  $getCat = $post->getCategoryById($cat_id);
                    while($result = $getCat->fetch_object()) {
                      $cat_id = $result->cat_id;
                      $cat_title = $result->name;
                      echo "<option value='$cat_id'>$cat_title</option>";

                  $getCat = $post->getAllCategories();
                  while($result = $getCat->fetch_object()) {
                      $cat_id = $result->cat_id;
                      $cat_title = $result->name;
                      echo "<option value='$cat_id'>$cat_title</option>";
                }
                    }
              ?>


            </select>
          </div>


          <div class="form-group">
            <label for="content">Описание:</label>
            <textarea name="content" rows="8" cols="80" class="form-control" id="content"><?php echo $content;?></textarea>
          </div>
          <div class="form-group">
            <label for="content">Описание полное:</label>
            <textarea name="description_full" rows="8" cols="80" class="form-control" id="description_full"><?php echo $content_full;?></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-5">Сохранить</button>
      </form>




    </div>
  </div>
</div>
<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
