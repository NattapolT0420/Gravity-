<?php
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
} else {
    header("Location: index.php");
}
