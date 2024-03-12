<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../lib/top.php' ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center bg-primary">
                                        <!-- <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1> -->
                                        <img src="../img/logo/logo.png" width="200" height="200">
                                    </div>
                                    <form class="user mt-4" action="../actions/signup.php" method="post">
                                        <div class="form-group">
                                            <label for="username">Login:</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" 
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control form-control-user" name="email" id="email"
                                                placeholder="Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password2">Confirm Password:</label>
                                            <input type="password2" id="password2" name="password2" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Confirm Password">
                                        </div>
                                        <button type="submit" name="signup" id="signup" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="../">Login an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php include '../lib/bot.php' ?>

</body>

</html>