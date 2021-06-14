<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO - LOG IN </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- CSS File -->
    <link href="../CSS/index.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="row">
            <div class="col-6 me-auto">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand">TODO</a>
                    </div>
                </nav>
            </div>
            <div class="col-6 ms-auto">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="navbar-brand" href="https://todo-php1.herokuapp.com/index.php">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand" href="signup.php">SIGN UP</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand" href="login.php">LOG IN</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 me-auto">
                    <div class="m-3">
                        <h3 class="me-5 text-center">Welcome Back!</h3>
                    </div>
                    <br>
                    <img src="../Img/welcome.png" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 ms-auto">
                    <br>
                    <br>
                    
                    <h4 class="text-center">Login To Your Account</h4>
                    <br>
                    <form class="row ms-3 needs-validation" novalidate action="actions.php" method="post">
                        <div class="col-md-12">
                            <label for="fullname" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="username" id="fullname" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter Your Username.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter Your Password.
                            </div>
                        </div>
                        <div class="col-12">
                            <br>
                            <button type="submit" name="login" id="submit" class="btn btn-primary form-control">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- JQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <!-- -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
    </script>
</body>
</html>
     
