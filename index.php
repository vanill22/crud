<?php
include_once "include/header.php";
?>



  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 class="display-3">Продукты</h1>
    </header>
    <?php
        if(isset($_GET['delpost'])){
          $id = $_GET['delpost'];
          $delPost = $post->delPostByID($id);
        }
     ?>
     <?php
        if(isset($delPost)){
          echo $delPost;
        }
      ?>
    <!-- Page Features -->
    <div class="row text-center">


      <?php

        $getProducts = $post->getAllProducts();
          while($result = $getProducts->fetch_object()){

      ?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">Название: <?php echo $result->name ?></h4>
            <p class="card-text">Описание: <?php echo $result->description ?></p>
            <p class="card-text">Характеристики товара: <?php echo $result->description_full ?></p>
            <p class="card-text">Цена: <?php echo $result->price ?> ₽</p>
          </div>
          <div class="card-footer">
            <a href="update_post.php?update=<?php echo $result->id ?>" class="btn btn-primary">Edit</a>
            <a onclick="return confirm('Действительно хотите удалить?')" href="?delpost=<?php echo $result->id ?>" class="btn btn-danger ">Del</a>
          </div>
        </div>
      </div>
    <?php }?>


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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
