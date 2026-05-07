<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/mdb.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">
  <title>Home</title>
</head>

<body>

  <!-- Modal Register 
  <div class="modal fade  md-register" id="modalRegister" tabindex="-1" aria-labelledby="modalRegister" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-left p-5">
          <div class="row">
            <div class="col-xl-12">
              <h2 class="text-center"> <b>Register</b> สมัครสมาชิก</h2>
              <div class="custom-line mx-auto mt-2 mb-3"></div>
              <label class="mb-1 mt-2">ชื่อผู้ใช้</label>
              <input type="text" class="form-control" placeholder="Username">
              <label class="mb-1 mt-2">อีเมล</label>
              <input type="text" class="form-control" placeholder="Email">
              <label class="mb-1 mt-2">รหัสผ่าน</label>
              <input type="password" class="form-control" placeholder="Password">
              <label class="mb-1 mt-2" class="mt-3">ยืนยันรหัสผ่าน</label>
              <input type="password" class="form-control" placeholder="Password Confirm">
              <a class="btn-dark d-block py-2 text-center mt-5" onclick="submit_register();"> <i class="mdi mdi-login"></i>
                สมัครสมาชิก</a>
              <p class="mt-4 text-center">ลงทะเบียนแล้ว <a href="#"> เข้าสู่ระบบ</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   Modal Register end -->

  <nav class="navbar navbar-expand-lg bg-tran <?php if (empty($_GET["page"]) || $_GET["page"] == "home") {
                                                echo 'navbar-dark';
                                              } else {
                                                echo 'navbar-light';
                                              } ?> fixed-top py-3 navbar-fixed-top animated fadeInDown <?php if (empty($_GET["page"]) || $_GET["page"] == "home") {
                                                                                                                                                                                                                      echo '';
                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                      echo 'box';
                                                                                                                                                                                                                    } ?> ">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h2 class="inline-block">Solu<b class="text-info">tions</b>
          <img src="img/a7.png" class="inline-block" alt="" height="50">
        </h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-4">
            <a class="nav-link" href="#">Jobs</a>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <!-- <li class="nav-item mx-4 mt-0">
            <button class="btn-dark py-2 px-4" onClick="$('.md-register').modal('show')">Register</button>
          </li> -->
          <li class="nav-item mx-4 mt-0">
            <a class="nav-link btn-dark py-2 px-4" href="login/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  error_reporting(0);
  switch ($_GET["page"]) {
    case 'home':
      require("page/home.php");
      break;
    case 'login':
      require("page/login.php");
      break;
    case 'register':
      require("page/register.php");
      break;

    default:
      require("page/home.php");
      break;
  }
  ?>
  <footer class="mt-5">

  </footer>
  <script src="js/function.js"></script>
  <script src="js/mdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      new WOW().init();
    });

    $(function() {
      $(document).scroll(function() {
        var $nav = $(".navbar-fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        var $nav = $(".navbar-light");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
      });
    });
  </script>
</body>

</html>