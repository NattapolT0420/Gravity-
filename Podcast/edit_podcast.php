<?php require("./assets/php/checklogin.php");
// require("../../db/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

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
        <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/font.css">
        <link rel="stylesheet" href="assets/css/table.css">
        <link rel="stylesheet" href="assets/css/manage.css">
    </head>

    <body id="page-top">

        <div id="wrapper">

            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php require("./assets/php/nav.php"); ?>
                    <div class="container">
                        <div style="margin-top: 30px;">
                            <h3 class="text-dark mb-4">Edit Podcast</h3>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">About your podcast
                                </p>
                            </div>
                            <div class="card-body" style="padding-right: 10%;">
                                <form method="post" action="./assets/php/update_podcast.php" novalidate>
                                    <?php
                                    include('../../db/CRUD.php');

                                    $updateuser = new CRUD();
                                    $sql = $updateuser->fetchpodcast($id);
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <div class="form-floating" style="margin-bottom: 20px;">
                                            <input type="text" class="form-control" id="podcast_name" name="podcast_name" placeholder="Podcast name" value="<?php echo $row['podcast_name']; ?>">
                                            <label for="floatingInput">Podcast name</label>
                                            <div class="invalid" name="invalid-podcast_name">
                                                กรุณาระบุชื่อของ Podcast
                                            </div>
                                        </div>
                                        <div class="form-floating" style="margin-bottom: 20px;">
                                            <textarea class="form-control" placeholder="Podcast description" id="podcast_description" name="podcast_description" style="resize: none ; height: 150px;" maxlength="600"><?php echo $row['podcast_description']; ?></textarea>
                                            <label for="floatingTextarea2">Podcast description
                                            </label>
                                            <div class="invalid" name="invalid-podcast_description">
                                                กรุณาเขียนคำอธิบายของ Podcast
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 20px;">
                                            <div class="col">
                                                <label for="input_category" class="form-label" id="category" name="category">Podcast category</label>
                                                <select class="form-select" name="category">
                                                    <option selected value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                                                    <option value="ข่าวและการเมือง">ข่าวและการเมือง</option>
                                                    <option value="การศึกษา">การศึกษา</option>
                                                    <option value="กีฬาและนันทนาการ">กีฬาและนันทนาการ</option>
                                                    <option value="ธุรกิจและเทคโนโลยี">ธุรกิจและเทคโนโลยี</option>
                                                </select>
                                                <div class="invalid" name="invalid-category">
                                                    กรุณาระบุประเภทของ Podcast
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 20px;">
                                            <div class="col">
                                                <label for="input_status" class="form-label" id="status" name="status">Podcast category</label>
                                                <select class="form-select" name="status">
                                                    <option selected value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
                                                    <option value="public">public</option>
                                                    <option value="private">private</option>
                                                </select>
                                                <div class="invalid" name="invalid-status">
                                                    กรุณาระบุประเภทการเผยแพร่
                                                </div>
                                            </div>
                                        </div>
                                        <input type="number" value="<?php echo $id; ?>" class="id_pc" name="id_pc">
                                        <!-- <div class="row justify-content-end">
                                            <div class="col-2"><button class=" btn btn-primary " type="submit " name="update_podcast">Update podcast</button></div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-8 col-md-10 col-8">
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <button type="submit" class="btn btn-outline-warning" name="update_podcast">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                            </div>
                            </form>

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
            if ($("select[name='status']").val() == "") {
                $("select[name='status']").prop('classList').add('is-invalid')
                $("div[name='invalid-status']").prop('classList').add('d-block')
                event.preventDefault();
            }
        });
    </script>
<?php
} else {
    header("Location: index.php");
}
?>

    </html>