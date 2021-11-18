<?php require("./assets/php/checklogin.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PODCASTS Gravity Developmemt</title>
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/font.css">
    <link rel="shortcut icon" href="assets/img/image_1.svg">
</head>

<body id="page-top">

    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php require("./assets/php/nav.php"); ?>
                <!-- content -->

                <div class="container-md" style="margin-top: 30px;">

                    <div class="row" style="margin-bottom: 5%;">
                        <div class="row mb-3">
                            <div class="col-xl-8 col-lg-8 col-md-10 col-8">
                                <h2>เพลย์ลิตส์ของฉัน</h2>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-outline-info" onclick="location.href='create_podcast_playlist.php'">สร้าง Playlist</button>
                                </div>
                            </div>
                        </div>
                        <?php

                        $i = 1;
                        include_once('../../db/CRUD.php');
                        $fetchdata = new CRUD();
                        $id = $fetch_info['id'];
                        $sql = $fetchdata->playlist_all($id, $text_search);
                        while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {

                        ?>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-6" style=" padding: 1%;" onclick="location.href='viewplaylist.php?id=<?php echo $row['id']; ?>'">
                                <!-- Colum channel-->
                                <div class="card shadow" data-bss-hover-animate="pulse" style="padding: 0; ">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" class="card-img-top" style="width:100%; height: auto;">
                                    <div class="card-body">
                                        <div class="cut-text"><strong><span><?php echo $row['playlist_name']; ?></span></strong><br></div>
                                        <div class="cut-text">
                                            <span><?php echo $row['playlist_description']; ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php

                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
    <?php
    mysqli_close($con);
    ?>
</body>


</html>