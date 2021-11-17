<?php require("./assets/php/checklogin.php");
require("../../db/db_podcast.php");
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
        <title>Profile - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="assets/css/untitled.css">
        <link rel="stylesheet" href="assets/css/table.css">
        <link rel="stylesheet" href="assets/css/manage.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/font.css">
    </head>

    <body id="page-top">

        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php require("./assets/php/nav.php"); ?>
                    <div class="container">
                        <div style="margin-top: 30px;">
                            <h3 class="text-dark mb-4">Create Your Podcast</h3>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">About your podcast
                                </p>
                            </div>
                            <div class="card-body" style="padding-right: 10%;">
                                <form method="post" action="podcast_manager.php" novalidate enctype="multipart/form-data" name="create_podcast">
                                    <div class="form-floating" style="margin-bottom: 20px;">
                                        <input type="text" class="form-control" id="podcast_name" name="podcast_name" placeholder="Podcast name">
                                        <label for="floatingInput">Podcast name</label>
                                        <div class="invalid" name="invalid-podcast_name">
                                            กรุณาระบุชื่อของ Podcast
                                        </div>
                                    </div>
                                    <div class="form-floating" style="margin-bottom: 20px;">
                                        <textarea class="form-control" placeholder="Podcast description" id="podcast_description" name="podcast_description" style="resize: none ; height: 150px;" maxlength="600"></textarea>
                                        <label for="floatingTextarea2">Podcast description
                                        </label>
                                        <div class="invalid" name="invalid-podcast_description">
                                            กรุณาเขียนคำอธิบายของ Podcast
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">

                                        <label for="input_category" class="form-label" id="category" name="category">Podcast category</label>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-5">
                                            <select class="form-select" name="category">
                                                <option selected value="">Choose one</option>
                                                <?php $sql = "SELECT * FROM category";
                                                $query = mysqli_query($con, $sql);
                                                while ($result = mysqli_fetch_assoc($query)) : ?>
                                                    <option value="<?= $result['category'] ?>"><?= $result['category'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <div class="invalid" name="invalid-category">
                                                กรุณาระบุประเภทของ Podcast
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-7">
                                            <input class="form-control" type="file" accept="image/*" name="image">
                                            <div class="invalid" name="invalid-image">
                                                กรุณาอัพโหลดรูปภาพปกของ Podcast
                                            </div>
                                            <div class="invalid" name="invalid-type">
                                                กรุณาอัพโหลดไฟล์ที่มีนามสกุล .jpg .jpeg .gif .png .svg เท่านั้น
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="id_cp" name="id_cp" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8 col-md-10 col-8">
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-outline-success" name="insert">create</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>


                        </div>

                    </div>

                </div><a class="border rounded d-inline scroll-to-top " href="#page-top "><i class="fas fa-angle-up "></i></a>
            </div>
            <script src="assets/bootstrap/js/bootstrap.min.js "></script>
            <script src="assets/js/bs-init.js "></script>
            <script src="assets/js/theme.js "></script>
    </body>
    <script>
        $("input[name='podcast_name']").keyup(function() {
            $("input[name='podcast_name']").prop('classList').remove('is-invalid')
            $("div[name='invalid-podcast_name']").prop('classList').remove('d-block')
        })
        $("textarea[name='podcast_description']").keyup(function() {
            $("textarea[name='podcast_description']").prop('classList').remove('is-invalid')
            $("div[name='invalid-podcast_description']").prop('classList').remove('d-block')
        })
        $("select[name='category']").on('change', function() {
            $("select[name='category']").prop('classList').remove('is-invalid')
            $("div[name='invalid-category']").prop('classList').remove('d-block')
        })
        $("input[name='image']").change(function() {
            $("input[name='image']").prop('classList').remove('is-invalid')
            $("div[name='invalid-image']").prop('classList').remove('d-block')
        })
        $("input[name='image']").change(function() {
            $("input[name='image']").prop('classList').remove('is-invalid')
            $("div[name='invalid-type']").prop('classList').remove('d-block')
        })
        $("form").submit(function() {


            if ($("input[name='podcast_name']").val() == "") {
                $("input[name='podcast_name']").prop('classList').add('is-invalid')
                $("div[name='invalid-podcast_name']").prop('classList').add('d-block')
                event.preventDefault();
            }
            if ($("textarea[name='podcast_description']").val() == "") {
                $("textarea[name='podcast_description']").prop('classList').add('is-invalid')
                $("div[name='invalid-podcast_description']").prop('classList').add('d-block')
                event.preventDefault();
            }
            if ($("select[name='category']").val() == "") {
                $("select[name='category']").prop('classList').add('is-invalid')
                $("div[name='invalid-category']").prop('classList').add('d-block')
                event.preventDefault();
            }
            if ($("input[name='image']").val() == "") {
                $("input[name='image']").prop('classList').add('is-invalid')
                $("div[name='invalid-image']").prop('classList').add('d-block')
                event.preventDefault();
            }
            var obj = document.create_podcast;
            var typeFile = obj.image.value.split('.');
            typeFile = typeFile[typeFile.length - 1];
            if (typeFile != "jpg" && typeFile != "jpeg" && typeFile != "gif" && typeFile != "png" && typeFile != "svg" && $("input[name='image']").val() != "") {

                $("input[name='image']").prop('classList').add('is-invalid')
                $("div[name='invalid-type']").prop('classList').add('d-block')
                event.preventDefault();

                obj.image.focus();
                return false;
            } else if ($("input[name='image']").val() == "") {
                $("input[name='image']").prop('classList').add('is-invalid')
                $("div[name='invalid-image']").prop('classList').add('d-block')
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