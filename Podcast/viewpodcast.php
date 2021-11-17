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
    <title>Podcast</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        $sql = $fetchdata->viewpodcast($id);
        while ($row = mysqli_fetch_array($sql)) {

        ?>

            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php require("./assets/php/nav.php");  ?>
                    <div class="container" style="padding-right: 35px; margin-top: 30px;" id="container-podcast">
                        <div class="row mb-3">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <img class="float-start align-self-center" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" width="100%" height="auto">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-0" style="margin-top: 30px;">
                                <h1><?php echo $row['podcast_name']; ?></h1>
                                <p class="justify-content-evenly align-items-start align-content-stretch flex-wrap" style="padding: 0px;padding-right: 31px;margin-bottom: 0px;">Creator: <img class="rounded-circle" width="20px" height="20px" src="assets/img/avatars/avatar5.jpeg">&nbsp;<?php echo $row['user']; ?></p>
                                <p class="justify-content-evenly align-items-start align-content-stretch flex-wrap category" style="margin-bottom: 5px;">Category:&nbsp;&nbsp;<?php echo $row['category']; ?></p>
                            </div>
                            <?php $type = "hidden"; ?>

                            <div class="col-xl-3 col-lg-3 col-md-2 col-5" style="margin-top: 30px;" <?php if (!isset($_SESSION['email'])) {
                                                                                                        echo  $type;
                                                                                                    } ?>>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-outline-success" onclick="location.href='add_to_playlist.php?id=<?php echo $row['id']; ?>'">Add to playlist</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="justify-content-evenly align-items-start align-content-stretch flex-wrap" style="padding: 5px;padding-right: 35px;margin-bottom: 10px;">
                                    <?php echo $row['podcast_description']; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        include_once('../../db/CRUD.php');
                        include_once('assets/library/getid3/getid3.php');
                        $fetchdata = new CRUD();
                        $sql = $fetchdata->episodepodcast($id);
                        date_default_timezone_set("Asia/Bangkok");
                        // print_r(mysqli_num_rows($sql));
                        ?>
                        <div class="row ">
                            <div class="col">
                                <h5 style="margin-top: 13px;padding-left: 20px; padding-bottom: 10px;">All Episode (<?php echo mysqli_num_rows($sql) ?>)</h5>
                            </div>

                        </div>
                        <?php
                        $getID3 = new getID3;
                        $i = 0;
                        while ($row = mysqli_fetch_array($sql)) {
                            if (date("Y-m-d H:i:s") >= $row['time']) {
                                $file_path = 'media/' . $row['file'];
                                $file = $getID3->analyze($file_path);
                                $duration = $file['playtime_string'];

                        ?>

                                <div class="row" onclick="get_media_form_file(<?php echo $i; ?>)">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">

                                        <div class="eplistbg" style="background-color: #f0f2f5; padding: 20px; margin-bottom: 20px; border-radius: 10px; margin-right: 3%;">
                                            <div class="d-flex media">
                                                <!-- <input type="checkbox" name="media[]" value="<?php echo $row[0]; ?>" /> -->
                                                <div style="margin-right: 15px;">

                                                    <img class="float-start align-self-center" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" width="80px" height="auto">
                                                </div>
                                                <div class="media-body">


                                                    <h4><a class="episodetitle" href="#"><?php echo $row['title']; ?></a>
                                                        <a data-bs-toggle="collapse" href="#description">
                                                            <i class="fa fa-chevron-down episodetitle"></i></a>

                                                    </h4>
                                                    <div class="collapse" id="description">
                                                        <p class="text-start episodedesc" style="margin-bottom: 0;"><?php echo $row['ep_description']; ?>
                                                            <i class="fa fa-envelope fa-li text-primary"></i>
                                                        </p>
                                                    </div>
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
                            }
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php require("./assets/php/playing_bar.php");
            require("./assets/php/play_function.php");  ?>

        <?php

        }
        ?>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>

</body>
<script>
    $(function() {
        $('#content').height($('#container-podcast').height() + $('footer').height() + 100);
    });
</script>


</html>