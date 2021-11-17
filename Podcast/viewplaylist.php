<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Playlist</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
    <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styleplay.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/image_1.svg">
    <link rel="stylesheet" href="assets/css/font.css">
</head>

<body id="page-top">


    <div id="wrapper">
        <?php

        $i = 1;
        include_once('../../db/CRUD.php');
        $fetchdata = new CRUD();
        $sql = $fetchdata->view_playlist($id);
        while ($row = mysqli_fetch_array($sql)) {

        ?>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php require("./assets/php/nav.php"); ?>
                    <div class="container" style="padding-right: 35px; margin-top: 30px;" id="container-playlist">
                        <div class="row">
                            <div class="col-4 col-lg-2 col-xl-2 col-md-4 ">
                                <img class="float-start align-self-center" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" width="100%" height="auto">
                            </div>
                            <div class="col" style="margin-bottom: 20px;">
                                <h1><?php echo $row['playlist_name']; ?></h1>
                                <p class="justify-content-evenly align-items-start align-content-stretch flex-wrap" style="padding: 5px;padding-right: 35px;margin-bottom: 10px;">
                                    <?php echo $row['playlist_description']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            include_once('../../db/CRUD.php');
                            include_once('assets/library/getid3/getid3.php');
                            $fetchdata = new CRUD();
                            $sql = $fetchdata->episodeplaylist($id);
                            ?>
                            <div class="col">
                                <h5 style="margin-top: 13px;padding-left: 20px; padding-bottom: 10px;">All media in Playlist (<?php echo mysqli_num_rows($sql) ?>)</h5>
                            </div>

                        </div>
                        <?php


                        $i = 0;
                        $getID3 = new getID3;
                        while ($row = mysqli_fetch_array($sql)) {
                            $file_path = 'media/' . $row['file'];
                            $file = $getID3->analyze($file_path);
                            $duration = $file['playtime_string'];
                        ?>
                            <div class="row">
                                <div class="col-10 col-lg">
                                    <div class="eplistbg" style="background-color: #f0f2f5; padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-right: 3%;">
                                        <div class="d-flex media" onclick="get_media_form_playlist(<?php echo $i; ?>)">
                                            <div style="margin-right: 15px;">

                                                <img class="float-start align-self-center" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" width="80px" height="auto">
                                            </div>
                                            <div class="media-body">


                                                <h4><a class="episodetitle" href="#"><?php echo $row['title']; ?></a>
                                                    <a data-bs-toggle="collapse" href="#description">
                                                        <i class="fa fa-chevron-down episodetitle"></i></a>

                                                </h4>
                                                <span class="text-start episodedesc" style="margin-bottom: 0;">เผยแพร่เมื่อ <?php echo $row['time']; ?>
                                                    <i class="fa fa-envelope fa-li text-primary"></i>
                                                </span>
                                                <br />
                                                <span class="text-start episodedesc" style="margin-bottom: 0px;">เวลา:&nbsp;<i class="fa fa-clock-o"></i>&nbsp; <?php echo $duration; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>

                    </div>

                </div>


            </div>

        <?php

        }
        ?>

    </div>
    <?php require("./assets/php/playing_bar.php"); ?>
    <?php require("./assets/php/play_play_list.php"); ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="assets/js/main.js"></script> -->
</body>
<script>
    $(function() {
        $('#content').height($('#container-playlist').height() + $('footer').height() + 100);
    });
</script>

</html>