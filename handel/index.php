<?php
if(isset($_GET['url'])){
    $url = $_GET['url'];
    $file = "../blog/".$url.".html";
    if(file_exists($file)){
        include "../pages/siteurl.php";
        $pattern = array(
            "/[a-z\.0-9A-Z]+\/(.*)/",
            "/-/"
        );
        $replace = array(
            "$1",
            " "
        );
        $title = ucfirst(preg_replace($pattern, $replace, $url))." - escrib";
        $main = file_get_contents($file);
        include "../pages/blogshel.php";
    }
    else{
        header("location: ../error/404.php");
    }
}
?>