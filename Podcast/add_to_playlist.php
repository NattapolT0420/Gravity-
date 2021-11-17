<?php
if (isset($_GET['id'])) {
    $podcast_id = $_GET['id'];
}
?>
<?php require("./assets/php/checklogin.php"); ?>
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
    <link rel="stylesheet" href="assets/css/manage.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="assets/css/font.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php require("./assets/php/nav.php"); ?>
                <div class="container">
                    <div style="margin-top: 30px;">
                        <h3 class="text-dark mb-4">Add media to playlist</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Add media to playlist</p>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="save_to_playlist.php" novalidate>
                                <div class="row " style="margin-bottom: 80px">
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <label for="input_category" class="form-label" id="category" name="category">Select your playlist</label>
                                            <select class="form-select" name="addtoplaylist">
                                                <option selected value="">Choose one</option>
                                                <?php
                                                $id = $fetch_info['id'];
                                                $sql = "SELECT * FROM media_playlist WHERE user_id = $id";
                                                $query = mysqli_query($con, $sql);
                                                while ($result = mysqli_fetch_assoc($query)) : ?>
                                                    <option value="<?= $result['id'] ?>"><?= $result['playlist_name'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <div class="invalid" name="invalid-addtoplaylist">
                                                กรุณาเลือก Playlist
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <label for="input_category" class="form-label" id="category" name="category">Select media </label>
                                            <ul>
                                                <?php
                                                $sql = "SELECT * FROM media WHERE podcast_id = $podcast_id";
                                                $query = mysqli_query($con, $sql);
                                                while ($result = mysqli_fetch_assoc($query)) : ?>
                                                    <li><input type="checkbox" name="media[]" value="<?php echo $result["id"]; ?>" />
                                                        <?php echo $result["title"]; ?>
                                                    </li>
                                                <?php endwhile; ?>

                                            </ul>
                                        </div>
                                        <div class="invalid" name="invalid-media">
                                            กรุณาเลือก Playlist
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-10 col-10">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-2 col-2">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-outline-warning" name="add-to-playlist">Add</button>
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
    $("select[name='addtoplaylist']").on('change', function() {
        $("select[name='addtoplaylist']").prop('classList').remove('is-invalid')
        $("div[name='invalid-addtoplaylist']").prop('classList').remove('d-block')
    })
    $("input[name='media']").change(function() {
        $("input[name='media']").prop('classList').remove('is-invalid')
        $("div[name='invalid-media']").prop('classList').remove('d-block')
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
        if ($("select[name='addtoplaylist']").val() == "") {
            $("select[name='addtoplaylist']").prop('classList').add('is-invalid')
            $("div[name='invalid-addtoplaylist']").prop('classList').add('d-block')
            event.preventDefault();
        }
        // if ($("input[name='media']").val() == "") {
        //     $("input[name='media']").prop('classList').add('is-invalid')
        //     $("div[name='invalid-media']").prop('classList').add('d-block')
        //     event.preventDefault();
        // }
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

        if (!form.media.checked) {
            alert("Please indicate that you accept the Terms and Conditions");
            form.media.focus();
            return false;
        }
        return true;

    });
</script>

</html>