<?php
    session_start();
    include "db.php";
    if (isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $country = $_POST['country'];
        $photo = $_POST['photo'];

        $check_base = "SELECT email FROM `users` WHERE email = '$email'  LIMIT 1";
        $check_base_run = mysqli_query($db, $check_base);
        if (mysqli_num_rows($check_base_run) > 0)
        {
            $_SESSION['status'] = "Email avval ro'yhatdan o'tgan";
            header("Location: index.php");
        } else {
            $add_user = "INSERT INTO users(name,email,mobile,country) VALUES('$name', '$email', '$mobile', '$country')";
            $add_user_run = mysqli_query($db, $add_user);
            if ($add_user_run)
            {
                $_SESSION['status'] = "Foydalanuvchi muvofaqqiyatli qo'shildi";
                header("Location: index.php");
            } else {
                $_SESSION['status'] = "Foydalanuvchi qo'shilmadi";
                header("Location: index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Add User - Ajax Search - CodingBender</title>
</head>
<body>
    <div class="container mt-5">
        <div class="border border-light p-3">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Email" name="email" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Mobile" name="mobile" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="County" name="country" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" placeholder="Photo" name="photo" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>