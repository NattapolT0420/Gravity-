<?php

function get_connection()
{
    require "../../db/db_podcast.php";
    $dsn;
    $user;
    $passwd;
    $conn = new PDO($dsn, $user, $passwd);
    return $conn;
}
function get_random_name($num = 6)
{
    $characters = 'abcdefghijklmnopqrstuvwxyz01234156789';
    $string = '';
    $max = strlen($characters) - 1;
    for ($i  = 0; $i < $num; $i++) {
        $string .= $characters[mt_rand(0, $max)];
    }
    return $string;
}
function save_media($filename, $file_name, $podcast_id, $episode, $title, $ep_description, $publish_date)
{
    $conn = get_connection();
    $sql = "INSERT INTO media(`file`,`file_name`,`podcast_id`,`episode`,`title`,`ep_description`,`time`) VALUES (?,?,?,?,?,?,?)";
    $query = $conn->prepare($sql);
    $query->execute([$filename, $file_name, $podcast_id, $episode, $title, $ep_description, $publish_date]);
}

function save_playlist($playlist_name, $playlist_description, $imgContent)
{
    $conn = get_connection();
    $sql = "INSERT INTO media_playlist(`playlist_name`,`playlist_description`,`images`) VALUES (?,?,?)";
    $query = $conn->prepare($sql);
    $query->execute([$playlist_name, $playlist_description, $imgContent]);
}

function save_to_playlist($mediaId, $playlistId)
{
    $conn = get_connection();
    $sql = "INSERT INTO media_playlist_files(`media`, `playlist`) VALUES (?,?)";
    $query = $conn->prepare($sql);
    $query->execute([$mediaId, $playlistId]);
}

function get_media()
{
    $pl = isset($_GET['playlist']) ? $_GET['playlist'] : 'all';
    $results = [];
    try {
        $conn = get_connection();
        // is playlist selected
        if ($pl && $pl != "all") {
            $query = $conn->prepare("SELECT * from media 
                WHERE id IN (SELECT media from media_playlist_files WHERE playlist=?)");
            $query->execute([$pl]);
            $results = $query->fetchAll();
        } else {
            // no playlist selected
            $results = $conn->query("SELECT * from media");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $results;
}


function get_playlist()
{
    $results  = [];
    try {
    } catch (Exception  $e) {
        echo $e->getMessage();
    }
    $conn = get_connection();
    $results = $conn->query("SELECT * from media_playlist");
    return $results;
}
function get_play_que()
{
    $mediaFiles = get_media();
    $que = [];
    foreach ($mediaFiles as $media) {
        $que[] = "./upload/" . $media['file'];
    }
    return json_encode($que);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $uploadDir = "./media/";
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {

        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $podcast_name = $id;
        $episode = $_POST['episode'];
        $title = $_POST['title'];
        $ep_description = $_POST['ep_description'];
        $publish_date = $_POST['Publish_date'];
        $newFilename = get_random_name() . "." . pathinfo($filename, PATHINFO_EXTENSION);
        if (file_exists($uploadDir . $newFilename)) {
            echo $filename . 'is already  exits';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $newFilename);
            save_media($newFilename, $filename, $podcast_name, $episode, $title, $ep_description, $publish_date);
            echo "<script>window.history.go(-2);</script>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-playlist'])) {

    //require "connection.php";

    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $playlist_name = $_POST['playlist'];
    $playlist_description = $_POST['playlist_description'];
    //$user = $fetch_info['name'];
    save_playlist($playlist_name, $playlist_description, $imgContent);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add-to-playlist'])) {

    $media = isset($_POST['media']) ?  $_POST['media'] : [];
    $playlistId = isset($_POST['addtoplaylist']) ? $_POST['addtoplaylist'] : null;
    if ($playlistId) {
        if (count($media) > 0) {
            foreach ($media as $mid) {
                save_to_playlist($mid, $playlistId);
            }
        }
    }
}
