<?php require_once "./assets/php/controllerUserData.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
    <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/font.css">
</head>

<body>

    <div class="container-login100">
        <div class="login" style="margin-top: 40px;">
            <div class="d-flex justify-content-center" style="margin-top:7%;">
                <img src=".\assets\img\logo.svg" alt="logo" width="80%">
            </div>
            <?php
            if (count($errors) > 0) {
            ?>
                <div class="alert alert-danger text-center">
                    <?php
                    foreach ($errors as $showerror) {
                        echo $showerror;
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            <form style="margin-left: 7%; margin-right: 7%; margin-top: 10%;" action="login.php" method="POST" novalidate>
                <div class="invalid" name="invalid-email" style="margin-bottom: 15px;">
                    กรุณากรอก Email
                </div>
                <div class="wrap-input100 " style="margin-bottom: 16px;">
                    <input class="input100" type="text" name="email" placeholder="อีเมล" required value="<?php echo $email ?>">
                </div>
                <div class="invalid" name="invalid-password" style="margin-bottom: 15px;">
                    กรุณากรอก Password
                </div>
                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" placeholder="รหัสผ่าน" id="password" required>
                </div>

                <div style="margin-top:18%">
                </div>

                <div class="btn-center">
                    <button class="login100-form-btn" type="submit" name="login" value="Login">เข้าสู่ระบบ
                    </button>
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#forgot_password" style="margin-left: 30%;" onclick="location.href='forgot-password.php';">
                        ลืมรหัสผ่าน
                    </button>
                </div>
                <hr>
                <div style="margin-left: 5%; margin-right: 20%;">
                    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='sign-up.php'">สร้างบัญชีใหม่</button>
                </div>
            </form>
            <div>
            </div>
        </div>
    </div>
</body>


<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
</body>
<script>
    $("input[name='email']").keyup(function() {
        $("input[name='email']").prop('classList').remove('is-invalid')
        $("div[name='invalid-email']").prop('classList').remove('d-block')
    })
    $("input[name='password']").keyup(function() {
        $("input[name='password']").prop('classList').remove('is-invalid')
        $("div[name='invalid-password']").prop('classList').remove('d-block')
    })
    $("form").submit(function() {


        if ($("input[name='email']").val() == "") {
            $("input[name='email']").prop('classList').add('is-invalid')
            $("div[name='invalid-email']").prop('classList').add('d-block')
            event.preventDefault();
        }
        if ($("input[name='password']").val() == "") {
            $("input[name='password']").prop('classList').add('is-invalid')
            $("div[name='invalid-password']").prop('classList').add('d-block')
            event.preventDefault();
        }
    });
</script>

</html>