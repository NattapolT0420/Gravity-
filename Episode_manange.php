<?php require("./assets/php/checklogin.php");
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
        <title>Table - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="assets/css/untitled.css">
        <link rel="stylesheet" href="assets/css/table_2.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
        <link rel="stylesheet" href="assets/css/font.css">

    </head>

    <body id="page-top">
        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <?php require("./assets/php/nav.php"); ?>
                    <div class="container">
                        <div style="margin-top: 30px;">
                            <h3 class="text-dark mb-4">Manage Podcasts</h3>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-10 col-8">
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-2 col-4">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" class="btn btn-outline-success" onclick="location.href='createEpisode.php?id=<?php echo $id; ?>'">New EP.</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="text-nowrap col-xl-2 col-lg-2 col-md-0 col-0">
                                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                            <label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                    <option value="10" selected="">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>&nbsp;</label>
                                        </div>
                                    </div>
                                    <?php
                                    $text_search = null;
                                    if (isset($_POST["txtKeyword"])) {
                                        $text_search = $_POST["txtKeyword"];
                                    }
                                    ?>

                                </div>
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Title</th>
                                                <th>description</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $i = 1;
                                            include_once('../../db/CRUD.php');
                                            $fetchdata = new CRUD();
                                            $sql = $fetchdata->manage_episode($id, $text_search);

                                            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td scope="row">
                                                        <?php
                                                        echo $i;
                                                        $i++;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['ep_description']; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button class="btn btn-primary editbutt" data-bss-hover-animate="pulse" onclick="location.href='EditEpisode.php?id=<?php echo $row['id']; ?>'">
                                                                <i class="fa fa-edit"></i></button>
                                                            <a href="delete_episode.php?del=<?php echo $row['id']; ?>"><button class="btn btn-primary deletebutt" type="button"><i class="fa fa-trash"></i></button></a>
                                                        </div>

                                                    </td>

                                                </tr>


                                        </tbody>
                                    <?php

                                            }
                                    ?>
                                    </tbody>
                                    </table>
                                    <?php
                                    mysqli_close($con);
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 align-self-center">
                                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                            Showing 1 to 10 of 27</p>
                                    </div>
                                    <div class="col-md-6">
                                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                            <ul class="pagination">
                                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
                    </div>
                </footer>
            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="assets/js/theme.js"></script>
    </body>
<?php
} else {
    header("Location: index.php");
}
?>

    </html>