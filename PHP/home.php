<?php

    include'config.php';
    include'homeactions.php';
    if(isset($_SESSION['username'])==null){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="p-2 pt-4 pl-5">
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card border-primary shadow-lg" style="width: 16em;">
                            <img
                                src="../Img/bottts.png"
                                class="card-img-top"
                                alt="..."
                            />
                            <div class="card-body">
                                <p class="card-text text-center"><strong><?php echo $fullname;?></strong></p>
                                <p class="card-text text-start">COMPLETED : <?php echo $numofcompletedtask;?></p>
                                <p class="card-text text-start">To Do : <?php echo $numoftasktodo; ?></p>
                                <p class="card-text text-start">ALL : <?php echo $numoftask; ?></p>
                                <p class="card-text text-center"><a href="logout.php"><span class="material-icons">logout</span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="p-2 pt-4">
                    <div class="col-12">
                        <br>
                        <h3 class="b ms-3">Create Task</h3>
                        <br>
                            <?php if(isset($_SESSION['message'])):?>
                            <div class="alert alert-<?php echo$_SESSION['message_type']; ?>"><?php echo$_SESSION['message'];?></div>
                            <?php echo "<br>"?>
                            <?php unset($_SESSION['message']);?>
                            <?php endif;?>
                        <div class="">

                            <form class="row g-3 needs-validation" novalidate action="homeactions.php" method="post">
                                <input type="hidden" value="<?php echo $id;?>" name="id">
                                <div class="row ms-3">
                                    <div class="col">
                                        <input type="text" class="form-control shadow" id="task" value="<?php echo $task;?>" name="task" placeholder="Enter Your Task Here" required>
                                        <div class="invalid-feedback">
                                            Please Enter Your Task.
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php if($update==true):?>
                                            <button type="submit" name="updatetask" class="btn btn-primary shadow">UPDATE</button>
                                        <?php else: ?>
                                            <button type="submit" name="addtask" class="btn btn-primary shadow">ADD</button> 
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                                <br>
                                <br>
                                <h3 class="ms-3">Your Taks</h3>
                                <div class="ms-3">
                                    <table class="table table-bordered border-primary shadow">
                                        <thead>
                                            <tr>
                                                <th scope="col">TODO</th>
                                                <th scope="col">ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                while($rowresult=$resultview->fetch_assoc()):
                                            ?>
                                            <tr>
                                                <td><?php echo $rowresult['todo'];?></td>
                                                <td>
                                                    <a href="https://todo-php1.herokuapp.com/PHP/home.php?edit=<?php echo $rowresult['todo_id'];?>"><span class="material-icons">create</span></a> &nbsp;
                                                    <a href="https://todo-php1.herokuapp.com/PHP/home.php?done=<?php echo $rowresult['todo_id'];?>"><span class="material-icons">check_circle_outline</span></a>&nbsp;
                                                    <a href="https://todo-php1.herokuapp.com/PHP/home.php?delete=<?php echo $rowresult['todo_id'];?>"><span class="material-icons">delete</span></a>&nbsp;
                                                </td>
                                            </tr>
                                            <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div>
                            <br>
                            <br>
                            <h3 class="ms-3">Marked As Completed</h3>
                            <div class="ms-3">
                                    <table class="table table-bordered border-primary shadow">
                                        <thead>
                                            <tr>
                                                <th scope="col">TODO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                while($rowresultcompleted=$resultviewcompleted->fetch_assoc()):
                                            ?>
                                            <tr>
                                                <td><?php echo $rowresultcompleted['todo'];?></td>
                                            </tr>
                                            <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
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
