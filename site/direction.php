<?php
require_once './global.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
if (isset($_GET['mod'])) {
    $includeFile = "";
    if (isset($_GET['act'])) {
        $includeFile = "./site/controllers/" . $_GET['mod'] . "/" . $_GET['act'] . ".php";
    } else {
        $includeFile = "./site/controllers/" . $_GET['mod'] . "/view.php";
    }
    if (file_exists($includeFile)) {
        if($_GET['mod']!='user') {
            $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
        }
        require_once $includeFile;
    } else {
        require_once './404.php';
    }
} else {
    require_once './site/controllers/home/view.php';
}
?>