<?php
include('../../../../db/CRUD.php');
$updatedata = new CRUD();
if (isset($_POST['update_podcast'])) {

    $id = $_POST['id_pc'];
    $podcast_name = $_POST['podcast_name'];
    $podcast_description = $_POST['podcast_description'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    $sql = $updatedata->update_podcast($podcast_name, $category, $podcast_description, $status, $id);
    if ($sql) {
        echo "<script>alert('แก้ไข Podcast สำเร็จ');</script>";
        echo "<script>window.history.go(-2);</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.history.go(-2);</script>";
    }
}
