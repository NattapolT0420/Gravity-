<?php
include_once('../../db/CRUD.php');
include_once('assets/php/checklogin.php');
$insertdata = new CRUD();

if (isset($_POST['create_playlist'])) {
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $playlist_name = $_POST['playlist'];
    $playlist_description = $_POST['playlist_description'];
    $user_id = $fetch_info['id'];
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $sql = $insertdata->create_playlist($playlist_name, $playlist_description, $user_id, $imgContent);

    if ($sql) {
        echo "<script>alert('สร้าง Playlist สำเร็จ');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='add_to_playlist.php'</script>";
    }
}
