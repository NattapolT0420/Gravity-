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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/font.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">กำหนดรหัสผ่านใหม่</h2>
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
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="กำหนดรหัสผ่านใหม่" required id="password">
                    </div>
                    <p id="pw"></p>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน" required id="cpassword">
                    </div>
                    <p id="cpw"></p>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="เปลี่ยนรหัสผ่าน">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
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