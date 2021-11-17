<?php require("./assets/php/checklogin.php");
$text_search = null;
if (isset($_POST["txtKeyword"])) {
    $text_search = $_POST["txtKeyword"];
} ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        navbar_height = document.querySelector('.navbar.fixed-top').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
    });
</script>
<div class="navbar navbar-light navbar-expand bg-white shadow topbar fixed-top">
    <div class="container-fluid">
        <div class="sidebar-brand-logo col-xl-2 col-lg-2 col-md-4 col-4" onclick="location.href='index.php';"><img src="assets/img/logo.svg" style="width: 100%;"></div>
        <div class="col-xl-8 col-lg-8">
            <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search" name="frmSearch" method="post">
                <div class="input-group" id="searchbar">
                    <input class="bg-light form-control border-0 small" placeholder="Search for ..." name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $text_search; ?>">
                    <button class=" btn btn-primary py-0" type="submit" value="Search" style="background: rgb(55,117,98);"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <!-- <ul class="navbar-nav flex-nowrap ms-auto ">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <li class="nav-item dropdown d-sm-none no-arrow " id="searchbar-mb"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                    <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown" id="searchbar-mb">
                        <form class="me-auto navbar-search w-100" name="frmSearch" method="post">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $text_search; ?>">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="submit" value="Search"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                    </div>
                </li>
            </div>
        </ul> -->
        <ul class="navbar-nav flex-nowrap ms-auto" style="padding-right: 20px;">
            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end "> -->
            <li class="nav-item dropdown d-sm-none no-arrow " id="searchbar-mb"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown" id="searchbar-mb">
                    <form class="me-auto navbar-search w-100" name="frmSearch" method="post">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $text_search; ?>">
                            <div class="input-group-append"><button class="btn btn-primary py-0" type="submit" value="Search"><i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                </div>
            </li>
            <!-- </div> -->
            <?php
            if (!isset($_SESSION['email'])) {

            ?>
                <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end "> -->
                <button type="button" style="width: 6rem; margin: 0.9rem;" class="btn btn-outline-info" onclick="location.href='Login.php' ">เข้าสู่ระบบ</button>
                <!-- </div> -->
            <?php } else { ?>


                <li class="nav-item dropdown no-arrow ">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                            <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $fetch_info['name'] ?>
                            </span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400">
                                </i>&nbsp;Profile</a>
                            <a class="dropdown-item" href="create_podcast.php?id=<?php echo $fetch_info['id']; ?>"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400">
                                </i>&nbsp;Settings</a>
                            <a class="dropdown-item" href="uploadtable.php?id=<?php echo $fetch_info['id']; ?>"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity
                                log</a>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                        </div>
                    </div>


                </li>

            <?php }  ?>

        </ul>
    </div>
</div>