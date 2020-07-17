<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              TEKWEB
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4><i>Please login first :</i></h4></div>
              
                <?php
                    if(session()->get('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-header="true"> &times; </span>
                            </button>
                            <i> Registration Successful ✓ </i>
                        </div>

                        <script> $(".alert").alert(); </script>
                    <?php endif; ?>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                    <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="login">
                      Login
                    </button>
                  </div>
                </form>

                <?php
                if(isset($_POST['login'])) {
                    include"../koneksi.php";

                    //input data
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    //data email
                    $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

                    //hitung row
                    $row = mysqli_num_rows($cek_email);

                    if($row === 1) {
                        $fetch_password = mysqli_fetch_assoc($cek_email);

                        //fungsi cek password
                        $cek_password = $fetch_password['password'];

                        if ($cek_password <> $password) {
                            echo"<script> alert('Wrong Password') </script>";
                        } else {
                            echo"<script> document.location.href='User_login' </script>";
                        }
                    } else {
                        echo"<script> alert('Email Not Registered') </script>";
                    }
                }
                ?>

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="<?= base_url('User/register') ?>">Create Account</a>
            </div>
            <div class="simple-footer">
              <h7>TEKWEB 2020</h7>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>