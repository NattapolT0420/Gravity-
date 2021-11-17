<?php require("./assets/php/checklogin.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
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
        <link rel="stylesheet" href="assets/css/table.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button-1.css">
        <link rel="stylesheet" href="assets/css/WhatsApp-Button.css">
        <link rel="stylesheet" href="assets/css/font.css">
    </head>
    <style>
    </style>

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
                            <div class="card-body" style="margin-bottom: 30px;">
                                <div class="row">
                                    <div class="col-md-6 text-nowrap">
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
                                    <table style="overflow-x:auto;">
                                        <!-- <table> -->
                                        <thead>
                                            <tr>
                                                <th>Podcast Name</th>
                                                <th>category</th>
                                                <th>status</th>
                                                <th>Edit</th>
                                                <th>Episode</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $i = 1;
                                            include_once('../../db/CRUD.php');
                                            $fetchdata = new CRUD();
                                            $id = $fetch_info['id'];
                                            $sql = $fetchdata->my_podcast($id, $text_search);
                                            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <!-- <th scope="row">
                                                            <?php

                                                            // echo $i;
                                                            // $i++;
                                                            ?>
                                                        </th> -->
                                                    <td><?php echo $row['podcast_name']; ?></td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button class="btn btn-warning " data-bss-hover-animate="pulse" onclick="location.href='edit_podcast.php?id=<?php echo $row['id']; ?>'">
                                                                <i class="fa fa-edit"></i></button>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <button class="btn btn-primary editbutt" data-bss-hover-animate="pulse" onclick="location.href='Episode_manange.php?id=<?php echo $row['id']; ?>'">
                                                                <i class="fa fa-edit"></i></button>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="delete_podcast.php?del=<?php echo $row['id']; ?>"><button class="btn btn-primary deletebutt" type="button"><i class="fa fa-trash"></i></button>
                                                            </a>
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
                <!-- <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
                    </div>
                </footer> -->
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