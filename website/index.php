<?php 
session_start();
include('../connect.php');
include('../function.php');
$msg="";

$sql="Select * from category";
$res=mysqli_query($con,$sql);

if(isset($_POST['submit']))
{
  $name=get_safe_value($_POST['name']);
  $email=get_safe_value($_POST['email']);
  $phone=get_safe_value($_POST['phone']);
  $date=get_safe_value($_POST['date']);
  $time=get_safe_value($_POST['time']);
  $people=get_safe_value($_POST['people']);
  $message=get_safe_value($_POST['message']);
  
  $sql3="Select * from reservation where time = '$time' and date ='$date'";
  $res3=mysqli_query($con,$sql3);
  if(mysqli_num_rows($res3)>3)
  {
    $msg="NO Table available";
  }
  else if(strlen($phone)!=10)
  {
    $msg="Enter correct Phone number";
  }
  else 
  {
    mysqli_query($con,"insert into reservation(name,email,phone,date,time,message,people) values('$name','$email','$phone','$date','$time','$message','$people')");
    $msg="Table Booked";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>XOXOs CAFE</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="icon" href="assets/images/logo.jpg">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!--table css-->
  <style>
    .intro {
      height: 100%;
    }

    table td,
    table th {
      text-overflow: ellipsis;
      white-space: nowrap;
      overflow: hidden;
    }

    thead th,
    tbody th {
      color: #fff;
    }

    tbody td {
      font-weight: 500;
      color: rgba(255,255,255,.65);
    }

    .card {
      border-radius: .5rem;
    }

    .m{
      margin-top: 20px;
    }

    .ermsg{
      color:red;
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+91 9211234565</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sat: 10:00 AM - 22:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.php">XOXOS</a></h1>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>XOXOS</span> CAFE</h2>
                <p class="animate__animated animate__fadeInUp">Established in 2022, XOXOS Cafe is a tradition in NCR life. It is one of the friendliest restaurants and bars to enjoy an eclectic menu that offers something for everyone.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Start the day with great taste.</h2>
                <p class="animate__animated animate__fadeInUp">We opened our first cafe in 2021 at St. Joseph's School in Greater Noida – the adolescent and the youthful on a fundamental level quickly took to the cafe, and it keeps on being a standout amongst the most happening spots in the city.</p>
                <div>
                  <a href="#menu" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                  <a href="#book-a-table" class="btn-book animate__animated animate__fadeInUp scrollto">Book a Table</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= About Section ======= -->
<header class="bg-primary text-center py-5 mb-4" id="about">
  <div class="container">
    <h1 class="fw-light text-white">Meet the Team</h1>
  </div>
</header>
<style>
.full-width-image {
  height: 300px; 
  background: url("your-image.jpg") no-repeat center center fixed;
  background-size: cover;
}
</style>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Team Member 1 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="images/harshit.jpg" class="card-img-top full-width-image" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Harshit Singh</h5>
          <div class="card-text text-black-50">Team Member</div>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="images/neha.jpg" class="card-img-top full-width-image" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Neha Mittal</h5>
          <div class="card-text text-black-50">Team Member</div>
        </div>
      </div>
    </div>
    <!-- Team Member 3 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="images/shaily.jpg" class="card-img-top full-width-image" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Shaily Sharma</h5>
          <div class="card-text text-black-50">Team Member</div>
        </div>
      </div>
    </div>
    <!-- Team Member 4 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="images/harsh.jpg" class="card-img-top full-width-image" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Harsh Sharma</h5>
          <div class="card-text text-black-50">Team Member</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
    <!-- End About Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <!--cards section in menu-->
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <?php 
          while($row=mysqli_fetch_assoc($res)){ 
            $category=$row['category'];
          ?>
            <div class="col">
              <div class="card">
                
                <div class="card-body">
                  <h3 class="card-title"><?php echo $row['category']?></h3>
                  <?php
                  $sql1="select dish.* from dish,category where dish.category_id=category.id and category='$category' and dish.status=1 order by dish.id desc"; 
                  $res1=mysqli_query($con,$sql1);
                  ?>
                  <section class="intro">                    
                        <div class="container">
                          <div class="row justify-content-center">
                            <div class="col-12">
                              <div class="card bg-dark shadow-2-strong">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                      <thead>
                                        <tr>
                                          <th scope="col">S.NO. #</th>
                                          <th scope="col">DISH</th>
                                          <th scope="col">Price</th>                                         
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          $i=1;
                                          while($row1=mysqli_fetch_assoc($res1))
                                          {
                                        ?>
                                        <tr>
                                          <td scope="row"><?php echo $i?></th>
                                          <td><?php echo $row1['dish']?></td>                                         
                                          <td><?php echo $row1['price']?></td>
                                        </tr>
                                        <?php
                                          $i++; }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>                                          
                  </section>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <!--end of cards section in menu-->

            

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Book a <span>Table</span></h2>
          <p>Reserve a table at our cafe for to get a premium service.</p>
        </div>

        <form method="post" >
          <div class="row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control"  placeholder="Your Name" required>
              
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email"  placeholder="Your Email" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="phone"  placeholder="Your Phone" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="date" name="date" class="form-control"  placeholder="Date" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="time" class="form-control" name="time"  placeholder="Time" required>
            </div>
            <div class="col-lg-4 col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="people"  placeholder="# of people" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="ermsg"><?php echo $msg?></div>
          </div>
          <div class="text-center m"><input type="submit" value="Book Table" name="submit"></div>
        </form>

      </div>
    </section>
    <!-- End Book A Table Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2><span>Contact</span> Us</h2>
        </div>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Sector-62 <br>Noida, 201309</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-clock"></i>
              <h4>Open Hours:</h4>
              <p>Monday-Saturday:<br>10:00 AM - 22:00 PM</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com<br>contact@example.com</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+91 9211234565<br>+91 9211234565</p>
            </div>
          </div>
        </div>

        <form action="mailto:info@example.com" method="post"  class="">
          <div class="row m">
            <div class="col-md-6 form-group ">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0 ">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3 m">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3 m">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="text-center m"><input type="submit" value="Send Message"></div>
        </form>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
         Copyright &copy;<strong><span>XOXOS</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>