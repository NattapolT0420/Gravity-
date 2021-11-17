<?php
include_once('../../db/CRUD.php');
include_once('assets/php/checklogin.php');
$insertdata = new CRUD();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-to-playlist'])) {

    $media = isset($_POST['media']) ?  $_POST['media'] : [];
    $playlistId = isset($_POST['addtoplaylist']) ? $_POST['addtoplaylist'] : null;
    if ($playlistId) {
        if (count($media) > 0) {
            foreach ($media as $mid) {
                $sql = $insertdata->save_to_playlist($mid, $playlistId);
            }
        }
    }
}
