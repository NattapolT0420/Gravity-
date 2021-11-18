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
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="bodyregister">
    <div class="container-login100">
        <div class="login" style="margin-top: 40px; margin-bottom: 40px;">
            <div class="d-flex justify-content-center" style="margin-top:7%;">
                <img src=".\assets\img\logo.svg" alt="logo" width="80%">
            </div>
            <form style="margin-left: 7%; margin-right: 7%; margin-top: 10%;" action="sign-up.php" method="POST" novalidate>
                <?php
                if (count($errors) == 1) {
                ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach ($errors as $showerror) {
                            echo $showerror;
                        }
                        ?>
                    </div>
                <?php
                } elseif (count($errors) > 1) {
                ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($errors as $showerror) {
                        ?>
                            <li><?php echo $showerror; ?></li>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <div class="wrap-input100 " style="margin-bottom: 16px;">
                    <label for="Name" style="margin-bottom: 16px;">ชื่อ-สกุล :</label>
                    <input class="input100" type="text" name="name" placeholder="ชื่อ-สกุล" required autocomplete="off">
                    <p style="margin-top: 10%;"></p>
                    <div class="invalid" name="invalid-name" style="margin-top: 15px;">
                        กรุณาระบุชื่อ-สกุล
                    </div>
                </div>
                <div class="wrap-input100 " style="margin-bottom: 16px;">
                    <label for="Email" style="margin-bottom: 16px;">อีเมล :</label>
                    <input class="input100" type="email" name="email" id="email" placeholder="example@email.com" required autocomplete="off">
                    <p id="em" style="margin-top: 10%;"></p>
                    <div class="invalid" name="invalid-email" style="margin-top: 15px;">
                        <p>กรุณากรอกอีเมล</p>
                    </div>
                </div>
                <div class="wrap-input100 " style="margin-bottom: 16px;">
                    <label for="Email" style="margin-bottom: 16px;">รหัสผ่าน :</label>
                    <input class="input100" type="password" name="password" placeholder="Password1234" required autocomplete="off" id="password" minlength="8">
                    <p id="pw" style="margin-top: 10%;"></p>
                    <div class="invalid" name="invalid-password" style="margin-top: 15px;">
                        กรุณากรอกรหัสผ่าน
                    </div>
                </div>
                <div class="wrap-input100 " style="margin-bottom: 16px;">
                    <label for="Password" style="margin-bottom: 16px;">ยืนยันรหัสผ่าน :</label>
                    <input class="input100" type="password" name="cpassword" id="cpassword" placeholder="ยืนยันรหัสผ่าน" required autocomplete="off" minlength="8">
                    <p id="cpw" style="margin-top: 10%;"></p>
                    <div class="invalid" name="invalid-cpassword" style="margin-top: 15px;">
                        กรุณากรอกรหัสผ่านอีกครั้ง
                    </div>
                </div>
                <div style="margin-top:18%">
                </div>

                <div class="btn-center" style="margin-bottom: 16px;">
                    <button class="login100-form-btn" type="submit" name="signup" value="Signup">ยืนยัน
                </div>
            </form>
            <div>

            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>

</body>
<script>
    $("input[name='name']").keyup(function() {
        $("input[name='name']").prop('classList').remove('is-invalid')
        $("div[name='invalid-name']").prop('classList').remove('d-block')
    })
    $("input[name='email']").keyup(function() {
        $("input[name='email']").prop('classList').remove('is-invalid')
        $("div[name='invalid-email']").prop('classList').remove('d-block')
    })
    $("input[name='password']").keyup(function() {
        $("input[name='password']").prop('classList').remove('is-invalid')
        $("div[name='invalid-password']").prop('classList').remove('d-block')
    })
    $("input[name='cpassword']").keyup(function() {
        $("input[name='cpassword']").prop('classList').remove('is-invalid')
        $("div[name='invalid-cpassword']").prop('classList').remove('d-block')
    })
    $("form").submit(function() {


        if ($("input[name='name']").val() == "") {
            $("input[name='name']").prop('classList').add('is-invalid')
            $("div[name='invalid-name']").prop('classList').add('d-block')
            event.preventDefault();
        }
        if ($("input[name='email']").val() == "") {
            $("input[name='email']").prop('classList').add('is-invalid')
            $("div[name='invalid-email']").prop('classList').add('d-block')
            event.preventDefault();
        }

        function validatePassword(password) {
            const re_pw = /^[A-Z][A-Za-z0-9]{7,14}$/;
            return re_pw.test(password);
        }
        const $re_pw = /^[A-Z][A-Za-z0-9]{7,14}$/;
        const $result = $("#pw");
        const password = $("#password").val();
        $result.text("");

        if (validatePassword(password)) {
            $result.text("คุณสามารถใช้รหัสผ่านนี้ได้");
            $result.css("color", "green");
        }
        if ($("input[name='password']").val() == "") {
            $("input[name='password']").prop('classList').add('is-invalid')
            $("div[name='invalid-password']").prop('classList').add('d-block')
            event.preventDefault();
        }
        if ($("input[name='cpassword']").val() == "") {
            $("input[name='cpassword']").prop('classList').add('is-invalid')
            $("div[name='invalid-cpassword']").prop('classList').add('d-block')
            event.preventDefault();
        }

    });

    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function validateMail() {
        const $result = $("#em");
        const email = $("#email").val();
        $result.text("");

        if (validateEmail(email)) {
            $result.text("คุณสามารถใช้อีเมลนี้ได้");
            $result.css("color", "green");
        } else {
            $result.append("<p>กรุณาใส่อีเมลให้ถูกต้องตามรูปแบบ ดังนี<p> <ul><li>อีเมลต้องไม่มีตัวอักษรพิเศษ<br>! # $ % & ' * + - / = ? ^ ' | { } [ ] ( ) ~</li><li>อีเมลต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น A-Z a-z 0-9</li><li>ห้ามใส่ . ติดกันในอีเมล</li><li>ต้องมี @ ในอีเมล</li></ul>");
            $result.css("color", "red");
        }
        return false;
    }

    $("#email").on("input", validateMail);

    function validatePassword(password) {
        const re_pw = /^[A-Z][A-Za-z0-9]{7,14}$/;
        return re_pw.test(password);
    }

    function validatePW() {
        const $result = $("#pw");
        const password = $("#password").val();
        $result.text("");

        if (validatePassword(password)) {
            $result.text("คุณสามารถใช้รหัสผ่านนี้ได้");
            $result.css("color", "green");
        } else {
            $result.append("<p> กรุณากรอกรหัสผ่านตามเงื่อนไข ดังนี้ : <p><ul><li> รหัสผ่านต้องมีความยาว 8 - 15 ตัวอักษร </li> <li > รหัสผ่านต้องขึ้นต้นด้วยตัวอักษรภาษาอังกฤษพิมพ์ใหญ่ A - Z </li> <li> รหัสผ่านต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้ น a - z 0 - 9 </li> <li> รหัสผ่านต้องไม่มีตัวอักษรพิเศษ <br> !# $ % & ' * + - / = ? ^ ' | {} []() ~ </li> </ul>");
            $result.css("color", "red");
        }
        return false;
    }

    $("#password").on("input", validatePW);

    let password = document.querySelector('#password');
    let check_password = document.querySelector('#cpassword');
    let result = document.querySelector('#cpw');

    function checkPassword() {
        if (password.value == check_password.value) {
            result.innerText = 'รหัสผ่านตรงกัน';
            result.style.color = "green";
        } else {
            result.innerText = 'รหัสผ่านไม่ตรงกัน';
            result.style.color = "red";
        }
    }
    password.addEventListener('keyup', () => {
        if (check_password.value.length != 0) checkPassword();
    })
    check_password.addEventListener('keyup', checkPassword);
</script>


</html>