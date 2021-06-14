<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO - SIGN UP </title>
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
                    <img src="../Img/280.png" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 ms-auto">
                    <br>
                    <br>
                    
                    <h4 class="text-center">REGISTER YOUR ACCOUNT</h4>
                    <br>
                    <form class="row ms-3 needs-validation" novalidate action="actions.php" method="post">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please Enter Your Fullname.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password1" title="Password must contain: Minimum 8 characters." pattern=".{8,}"  id="password1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password2" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password2" id="password2" pattern="{8,}" required>
                        </div>
                        <div class="col-12">
                            <br>
                            <button type="submit" name="create" id="submit" class="btn btn-primary form-control">Sign in</button>
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
    <script>
        jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#password1").val();
        var checkVal = $("#password2").val();
        var len= passwordVal.length;
        if (passwordVal == '') {
            $("#password1").after('<span class="error text-danger">Please enter a password.</span>');
            hasError = true;
        }else if (len <8) {
            $("#password1").after('<span class="error text-danger">Please enter atleast 8 characters.</span>');
            hasError = true;
        }
         else if (checkVal == '') {
            $("#password2").after('<span class="error text-danger">Please re-enter your password.</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#password2").after('<span class="error text-danger">Passwords do not match.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});
    </script>
</body>
</html>
