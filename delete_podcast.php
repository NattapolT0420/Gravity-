<?php

include_once('../../db/CRUD.php');

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $deletedata = new CRUD();
    $sql = $deletedata->delete_podcast($id);

    if ($sql) {
        echo "<script>window.history.back();</script>";
    }
}
