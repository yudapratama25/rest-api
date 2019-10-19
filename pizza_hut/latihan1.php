<?php 

$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu["menu"];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PIZZA HUT</title>
  <link rel="stylesheet" href="bootstrap4.3/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="img/logo.png" width="120"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> 
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">All Menu</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h1>All Menu</h1>
      </div>
    </div>

    <div class="row">
      <?php foreach ($menu as $row) { ?>
      <div class="col-md-4">
        <div class="card mb-3">
          <img src="img/menu/<?= $row["gambar"]; ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?= $row["nama"]; ?></h5>
            <p class="card-text"><?= $row["deskripsi"]; ?></p>
            <h5 class="card-title">Rp. <?= $row["harga"]; ?></h5>
            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>

  <script src="bootstrap4.3/jquery/jquery.min.js"></script>
  <script src="bootstrap4.3/js/bootstrap.min.js"></script>
 <!--  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/jquery.min.js"></script> -->
</body>
</html>