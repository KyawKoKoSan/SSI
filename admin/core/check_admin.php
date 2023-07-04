<?php
if ($_SESSION['admin_acc']['role'] != 0) {
    header("location:index.php");
}
