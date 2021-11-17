<?php
include_once('../../db/CRUD.php');
include_once('assets/php/checklogin.php');
$insertdata = new CRUD();

if (isset($_POST['add-to-playlist'])) {
    // Get file info 
    $media = $_POST['media'];
    $playlistId = $_POST['addtoplaylist'];
    foreach ($media as $mid) {
        $sql = $insertdata->save_to_playlist($mid, $playlistId);
    }
    if ($sql) {
        echo "<script>alert('เพิ่ม Media ลง Playlist สำเร็จ');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='create_podcast.php'</script>";
    }
}
