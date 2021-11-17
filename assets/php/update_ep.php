<?php
include('../../../../db/CRUD.php');
$updatedata = new CRUD();
if (isset($_POST['update'])) {

    $id = $_POST['id_ep'];
    $episode = $_POST['episode'];
    $title = $_POST['title'];
    $description = $_POST['ep_description'];
    $time = $_POST['Publish_date'];
    $sql = $updatedata->update_ep($episode, $title, $description, $time, $id);
    if ($sql) {
        echo "<script>alert('แก้ไข EP สำเร็จ');</script>";
        echo "<script>window.history.go(-2);</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
