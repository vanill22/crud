<?php
include_once "include/header.php";
?>
<div class="container">
  <header class="jumbotron my-4">
    <h1 class="display-3">Добавить новый товар</h1>
  </header>
  <div class="row">
    <div class="col-md-6">
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
              $insertPost = $post->insertNewPost($_POST);
            }

            if(isset($insertPost)) {
              echo $insertPost;
            }
        ?>




      <form action="#" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Название товара:</label>
            <input type="text" name="title" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="name">Цена:</label>
            <input type="text" name="price" class="form-control" id="price">
          </div>
          <div class="form-group">
            <label for="sel1">Выбор категории:</label>
            <select class="form-control" name="cat_id">
              <option value="null">Выберите категорию</option>
              <?php
                  $getCat = $post->getAllCategories();
                  while($result = $getCat->fetch_object()) {
                  $cat_id = $result->id;
                  $cat_title = $result->name;
                  echo "<option value='$cat_id'>$cat_title</option>";
                }
              ?>


            </select>
          </div>

          <!-- <div class="form-group">
            <label for="image">Картинка:</label>
            <input type="file" name="post_image" id="image" class="form-control-file">
          </div> -->
          <div class="form-group">
            <label for="content">Описание:</label>
            <textarea name="content" rows="8" cols="80" class="form-control" id="content"></textarea>
          </div>
          <div class="form-group">
            <label for="content">Описание полное:</label>
            <textarea name="description_full" rows="8" cols="80" class="form-control" id="description_full"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary mb-5">Добавить</button>
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
