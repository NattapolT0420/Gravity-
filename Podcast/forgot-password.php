<?php require_once "./assets/php/controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
    <link rel="shortcut icon" href="assets/img/image_1.svg">
</head>

<body>
    <div class="container-login100">
        <div class="login" style="margin-top: 40px;">
            <div class="d-flex justify-content-center" style="margin-top:7%;">
                <img src=".\assets\img\logo.svg" alt="logo" width="80%">
            </div>
            <form action="forgot-password.php" method="POST" autocomplete="" style="margin-left: 7%; margin-right: 7%; margin-top: 10%;" novalidate>
                <h2 class="text-center" style="margin-top: 50px; margin-bottom: 30px;">ลืมรหัสผ่าน</h2>
                <?php
                if (count($errors) > 0) {
                ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach ($errors as $error) {
                            echo $error;
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <div class="wrap-input100" style="margin-bottom: 20px; margin-top: 20px;">
                    <input class="input100" type="email" name="email" placeholder="อีเมล" required value="<?php echo $email ?>">
                </div>
                <div class="invalid" name="invalid-email" style="margin-bottom: 15px;">
                    กรุณาระบุ Email
                </div>
                <div class="btn-center">
                    <input class="login100-form-btn" type="submit" name="check-email" value="ยืนยัน" style="margin-top: 30px;">
                </div>
            </form>
        </div>
    </div>

</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    $("input[name='email']").keyup(function() {
        $("input[name='email']").prop('classList').remove('is-invalid')
        $("div[name='invalid-email']").prop('classList').remove('d-block')
    })
    $("form").submit(function() {

        if ($("input[name='email']").val() == "") {
            $("input[name='email']").prop('classList').add('is-invalid')
            $("div[name='invalid-email']").prop('classList').add('d-block')
            event.preventDefault();
        }
    });
</script>

</html>