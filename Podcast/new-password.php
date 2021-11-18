<?php require_once "./assets/php/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
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
            <form action="new-password.php" method="POST" autocomplete="off" style="margin-left: 7%; margin-right: 7%; margin-top: 10%;" novalidate>
                <h2 class="text-center" style="margin-top: 50px; margin-bottom: 30px;">กำหนดรหัสผ่านใหม่</h2>
                <?php
                if (isset($_SESSION['info'])) {
                ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                <?php
                }
                ?>
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
                <div class="wrap-input100" style="margin-bottom: 20px; margin-top: 20px;">
                    <input class="input100" type="password" name="password" placeholder="กำหนดรหัสผ่านใหม่" required id="password">
                </div>
                <p id="pw"></p>
                <div class="wrap-input100" style="margin-bottom: 20px; margin-top: 20px;">
                    <input class="input100" type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน" required id="cpassword">
                </div>
                <p id="cpw"></p>
                <div class="btn-center">
                    <input class="login100-form-btn" type="submit" name="change-password" value="เปลี่ยนรหัสผ่าน" style="margin-top: 30px;">
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
            $result.append($("<p> กรุณากรอกรหัสผ่านตามเงื่อนไข ดังนี้ :<p> <ul><li>รหัสผ่านต้องมีความยาว 8-15 ตัวอักษร</li><li>รหัสผ่านต้องขึ้นต้นด้วยตัวอักษรภาษาอังกฤษพิมพ์ใหญ่ A-Z</li><li>รหัสผ่านต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้น a-z 0-9</li><li>รหัสผ่านต้องไม่มีตัวอักษรพิเศษ<br>! # $ % & ' * + - / = ? ^ ' | { } [ ] ( ) ~</li></ul>"));
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