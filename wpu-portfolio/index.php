<?php 
function get_CURL($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyD-MsgWYxBR4lwB9XcsxlYDuRKldAzYcQk');

$profilyutub = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$namayutub = $result['items'][0]['snippet']['title'];
$Subscriber = $result['items'][0]['statistics']['subscriberCount'];

// video terakhir
$url_video_terakhir = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyD-MsgWYxBR4lwB9XcsxlYDuRKldAzYcQk&channelId=UC5IA7MpYcbhbA28RgyQrV0A&maxResult=1&order=date&part=snippet';
$result = get_CURL($url_video_terakhir);
$video_terakhir = $result['items'][0]['id']['videoId'];

// INSTAGRAM
$akses_token = '1557304490.ef87376.619e87bc87c8472d837dbd7af09836e1';
$klien_id = 'ef873760c0894446af6d22385e4c21d3';

$result = get_CURL('https://api.instagram.com/v1/users/self/?access_token=1557304490.ef87376.619e87bc87c8472d837dbd7af09836e1');
$username_ig = $result['data']['username'];
$profi_ig = $result['data']['profile_picture'];
$followers = $result['data']['counts']['followed_by'];

// foto terakshir ig
$result = get_CURL('https://api.instagram.com/v1/users/self/media/recent/?access_token=1557304490.ef87376.619e87bc87c8472d837dbd7af09836e1&count=8');
$photos = [];
foreach ($result['data'] as $photo) {
  $photos[] = $photo['images']['thumbnail']['url'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap4.3/css/bootstrap.min.css">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>My Portfolio</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">Sandhika Galih</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Portfolio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <div class="jumbotron" id="home">
    <div class="container">
      <div class="text-center">
        <img src="img/profile1.png" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Sandhika Galih</h1>
        <h3 class="lead">Lecturer | Programmer | Youtuber</h3>
      </div>
    </div>
  </div>


  <!-- About -->
  <section class="about" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
        </div>
        <div class="col-md-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sosial Media Yutub & Instagram -->
  <section id="social" class="social bg-light">
    <div class="container">
      <div class="row pt-4 mb-4  ">
        <div class="col text-center">
          <h2>Social Media</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
              <img src="<?= $profilyutub; ?>" width="200" class="img-thumbnail rounded-circle">
            </div>
            <div class="col-md-8">
              <h5><?= $namayutub; ?></h5>
              <p><?= $Subscriber; ?> Subscribers.</p>
              <div class="g-ytsubscribe" data-channelid="UC5IA7MpYcbhbA28RgyQrV0A" data-layout="default" data-count="default"></div>
            </div>
          </div>
          <div class="row mt-3 pb-3">
            <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video_terakhir; ?>?rel=0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="row">
            <div class="col-md-4">
             <img src="<?= $profi_ig; ?>" width="200" class="img-thumbnail rounded-circle">
           </div>
           <div class="col-md-8">
            <h5><?= $username_ig; ?></h5>
            <p><?= $followers; ?> Followers.</p>
          </div>
        </div>
        <dov class="row mt-3 pb-3">
         <div class="col">
           <?php foreach ($photos as $photo): ?>  
             <div class="ig-thumbnail">
               <img src="<?= $photo; ?>">
             </div>
           <?php endforeach; ?>

         </div>
       </dov>
     </div>
   </div>
 </div>
</section>


<!-- Portfolio -->
<section class="portfolio" id="portfolio">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Portfolio</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>   
    </div>

    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div> 
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Contact -->
<section class="contact bg-light" id="contact">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Contact</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="card bg-primary text-white mb-4 text-center">
          <div class="card-body">
            <h5 class="card-title">Contact Me</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>

        <ul class="list-group mb-4">
          <li class="list-group-item"><h3>Location</h3></li>
          <li class="list-group-item">My Office</li>
          <li class="list-group-item">Jl. Setiabudhi No. 193, Bandung</li>
          <li class="list-group-item">West Java, Indonesia</li>
        </ul>
      </div>

      <div class="col-lg-6">

        <form>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary">Send Message</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>


<!-- footer -->
<footer class="bg-dark text-white mt-5">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <p>Copyright &copy; 2018.</p>
      </div>
    </div>
  </div>
</footer>







<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bootstrap4.3/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="bootstrap4.3/js/bootstrap.min.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>
</body>
</html>