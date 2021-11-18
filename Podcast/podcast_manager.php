<?php
include_once('../../db/CRUD.php');
include_once('assets/php/checklogin.php');
$insertdata = new CRUD();
$errors = array();
if (isset($_POST['insert'])) {

    if (!empty($_POST['podcast_name']) && !empty($_POST['podcast_description']) && !empty($_FILES['image']['tmp_name']) && !empty($_POST['category'])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        $id = $_POST['id_cp'];
        $user_id =  $fetch_info['id'];
        $podcast_name = $_POST['podcast_name'];
        $category = $_POST['category'];
        $podcast_description = $_POST['podcast_description'];
        $user = $fetch_info['name'];
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $sql = $insertdata->create_podcast($podcast_name, $category, $podcast_description, $user, $imgContent, $id);
        echo "<script>alert('สร้าง Podcast สำเร็จ');</script>";
        echo "<script>window.location.href='uploadtable.php?id=$user_id'</script>";
    } else if (empty($_POST['podcast_name'])) {
        echo "<script>alert('กรุณาระบุคำอธิบายของ Podcast');</script>";
    } else if (empty($_POST['podcast_description'])) {
        echo "<script>alert('กรุณาระบุคำอธิบายของ Podcast');</script>";
        echo "<script>window.location.href='create_podcast.php'</script>";
    } else if (empty($_POST['category'])) {
        echo "<script>alert('กรุณาระบุประเภทของ Podcast');</script>";
        echo "<script>window.location.href='create_podcast.php'</script>";
    } else if (empty($_FILES['image']['tmp_name'])) {
        echo "<script>alert('กรุณาอัพโหลดรูปภาพ');</script>";
        echo "<script>window.location.href='create_podcast.php'</script>";
    } else {
        echo "<script>alert('มีบางอย่างผิดพลาดกรุณาลองใหม่ในภายหลัง!');</script>";
        echo "<script>window.location.href='create_podcast.php'</script>";
    }
}
