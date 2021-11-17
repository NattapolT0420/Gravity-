<?php
session_start();
require "../../db/db_podcast.php";
$email = "";
$name = "";
$errors = array();

// signup button
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "รหัสผ่านไม่ตรงกัน";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "อีเมลนี้มีการลงทะเบียนอยู่แล้ว ท่านสามารถเข้าสู่ระบบได้ทันที";
    }
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if ($data_check) {
            $subject = "ยืนยัน";
            $message = "รหัสผ่านที่ยืนยันคือ $code";
            $sender = "From: gravity@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "รหัสผ่านที่ยืนยันถูกส่งไปยัง - $email กรุณากรอกรหัสผ่านให้ตรงกับในอีเมลของท่านหากท่านไม่กรอกรหัสผ่านจะไม่สามารถเข้าสู่ระบบได้";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            } else {
                $errors['otp-error'] = "ไม่สามารถส่ง OTP ได้";
            }
        } else {
            $errors['db-error'] = "ไม่สามารถเพิ่มข้อมูลลงไปในฐานข้อมูลได้";
        }
    }
}
//verification code submit button
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: index.php');
            exit();
        } else {
            $errors['otp-error'] = "อัพเดท otp ผิดพลาด";
        }
    } else {
        $errors['otp-error'] = "รหัสยืนยันไม่ถูกต้อง";
    }
}

//click login button
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if ($status == 'verified') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: index.php');
            } else {
                $info = "กรุณายืนยันอีเมลก่อนเข้าสู่ระบบ - $email กรุณากรอกรหัสผ่านที่ได้รับจากทางอีเมลจำนวน 6 ตัว";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        } else {
            $errors['email'] = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $errors['email'] = "หากคุณยังไม่ได้สมัครสมาชิกสามารถเข้าไปสมัครได้ผ่านปุ่มสมัครสมาชิก";
    }
}

//continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM usertable WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if (mysqli_num_rows($run_sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if ($run_query) {
            $subject = "ยืนยันการเปลี่ยนรหัสผ่าน";
            $message = "รหัสยืนยัน $code";
            $sender = "From: gravity@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "กรุณายืนยันการเปลี่ยนรหัสผ่านทางอีเมล - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            } else {
                $errors['otp-error'] = "อัพเดท otp ผิดพลาด";
            }
        } else {
            $errors['db-error'] = "ไม่สามารถเขื่อมต่อฐานข้อมูลได้่";
        }
    } else {
        $errors['email'] = "อีเมลนี้ไม่มีอยู่ในระบบ";
    }
}

//check reset otp button
if (isset($_POST['check-reset-otp'])) {
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "กรุณากำหนดรหัสผ่านใหม่";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "รหัสผ่านไม่ตรงกัน";
    } else {
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if ($run_query) {
            $info = "เปลี่ยนรหัสผ่านเรียบร้อยท่านสามารถลงชื่อเข้าใช่ได้";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        } else {
            $errors['db-error'] = "เปลี่ยนรหัสผ่านไม่ถูกต้อง";
        }
    }
}

//login now button click
if (isset($_POST['login-now'])) {
    header('Location: login.php');
}
