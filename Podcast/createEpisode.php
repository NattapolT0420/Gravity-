<?php require("./assets/php/checklogin.php");
require("./assets/php/upload.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Upload Episode</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="assets/css/untitled.css">
        <link rel="stylesheet" href="assets/css/table.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
        <script src="https://kit.fontawesome.com/fe1a0cf523.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/font.css">
        <link rel="stylesheet" href="assets/css/manage.css">
        <link rel="shortcut icon" href="assets/img/image_1.svg">
    </head>
    <style>
        input[type="datetime-local"]::before {
            color: #999999;
            content: attr(placeholder);
        }

        input[type="datetime-local"] {
            color: #ffffff;
        }

        input[type="datetime-local"]:focus,
        input[type="datetime-local"]:valid {
            color: #666666;
        }

        input[type="datetime-local"]:focus::before,
        input[type="datetime-local"]:valid::before {
            content: "" !important;
        }
    </style>

    <body id="page-top">

        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php require("./assets/php/nav.php"); ?>
                    <div class="container">
                        <div style="margin-top: 30px;">
                            <h3 class="text-dark mb-4">Upload Episode</h3>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Create your episode </p>
                            </div>
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" name="upload_media" novalidate>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                            <div class="form-floating" style="margin-bottom: 20px;">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Episode number" name="episode" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                <label for="floatingInput">Episode number</label>
                                                <div class="invalid" name="invalid-episode">
                                                    กรุณาระบุตอนของ Podcast
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-8 col-lg-8 col-md-6 col-6">
                                            <div class="form-floating" style="margin-bottom: 20px;">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Episode title" name="title">
                                                <label for="floatingInput">Episode title</label>
                                                <div class="invalid" name="invalid-title">
                                                    กรุณาระบุชื่อ Episode
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-floating col-xl-12 col-lg-12 col-md-12 col-12" style="margin-bottom: 20px;">
                                        <textarea class="form-control" placeholder="Episode description" id="floatingTextarea2" style="resize: none ; height: 150px;" maxlength="600" name="ep_description"></textarea>
                                        <label for="floatingTextarea2">Episode description</label>
                                        <div class="invalid" name="invalid-ep_description">
                                            กรุณาเขียนคำอธิบาย episode ของท่าน
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 80px">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                            <input class="form-control" type="file" id="formFile" accept="audio/*" name="file">
                                            <div class="invalid" name="invalid-file">
                                                กรุณาอัพโหลดไฟล์
                                            </div>
                                            <div class="invalid" name="invalid-type">
                                                กรุณาอัพโหลดไฟล์ที่มีนามสกุล .mp3 .mp4 .wav .aac .m4a เท่านั้น
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-6 col-6">
                                            <!-- <input type="datetime-local" class="form-control" id="Publish_date" name="Publish_date"> -->
                                            <input placeholder="วันเผยแพร่" class="form-control" type="text" onfocus="(this.type='datetime-local')" id="Publish_date" name="Publish_date">
                                            <div class="invalid" name="invalid-Publish_date">
                                                กรุณาระบุเวลาเผยแพร่
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8 col-md-10 col-8">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-outline-success" name="upload">upload</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="border rounded d-inline scroll-to-top " href="#page-top "><i class="fas fa-angle-up "></i></a>
            </div>
            <script src="assets/bootstrap/js/bootstrap.min.js "></script>
            <script src="assets/js/bs-init.js "></script>
            <script src="assets/js/theme.js "></script>
        </div>

    </body>
    <script>
        $("input[name='episode']").keyup(function() {
            $("input[name='episode']").prop('classList').remove('is-invalid')
            $("div[name='invalid-episode']").prop('classList').remove('d-block')
        })
        $("input[name='title']").keyup(function() {
            $("input[name='title']").prop('classList').remove('is-invalid')
            $("div[name='invalid-title']").prop('classList').remove('d-block')
        })
        $("textarea[name='ep_description']").keyup(function() {
            $("textarea[name='ep_description']").prop('classList').remove('is-invalid')
            $("div[name='invalid-ep_description']").prop('classList').remove('d-block')
        })
        $("input[name='Publish_date']").on('change', function() {
            $("input[name='Publish_date']").prop('classList').remove('is-invalid')
            $("div[name='invalid-Publish_date']").prop('classList').remove('d-block')
        })
        $("input[name='file']").change(function() {
            $("input[name='file']").prop('classList').remove('is-invalid')
            $("div[name='invalid-file']").prop('classList').remove('d-block')
        })
        $("form").submit(function() {


            if ($("input[name='title']").val() == "") {
                $("input[name='title']").prop('classList').add('is-invalid')
                $("div[name='invalid-title']").prop('classList').add('d-block')
                event.preventDefault();
            }
            if ($("input[name='episode']").val() == "") {
                $("input[name='episode']").prop('classList').add('is-invalid')
                $("div[name='invalid-episode']").prop('classList').add('d-block')
                event.preventDefault();
            }
            if ($("textarea[name='ep_description']").val() == "") {
                $("textarea[name='ep_description']").prop('classList').add('is-invalid')
                $("div[name='invalid-ep_description']").prop('classList').add('d-block')
                event.preventDefault();
            }
            if ($("input[name='Publish_date']").val() == "") {
                $("input[name='Publish_date']").prop('classList').add('is-invalid')
                $("div[name='invalid-Publish_date']").prop('classList').add('d-block')
                event.preventDefault();
            }
            var obj = document.upload_media;
            var typeFile = obj.file.value.split('.');
            typeFile = typeFile[typeFile.length - 1];
            if (typeFile != "mp3" && typeFile != "mp4" && typeFile != "wav" && typeFile != "aac" && typeFile != "m4a" && $("input[name='file']").val() != "") {

                $("input[name='file']").prop('classList').add('is-invalid')
                $("div[name='invalid-type']").prop('classList').add('d-block')
                event.preventDefault();

                obj.image.focus();
                return false;
            } else if ($("input[name='file']").val() == "") {
                $("input[name='file']").prop('classList').add('is-invalid')
                $("div[name='invalid-file']").prop('classList').add('d-block')
                event.preventDefault();

            } else return true;
        });
    </script>
<?php
} else {
    header("Location: index.php");
}
?>

    </html>