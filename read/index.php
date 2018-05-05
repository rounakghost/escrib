<?php
include "../pages/siteurl.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
            background-color: #fff176;
            font-size: 1.2em;
        }
        .header{
            padding:15px;
            background-color: tomato;
            color: white;
            text-align: center;
            font-size: 20px;

        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117911923-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117911923-1');
</script>
</head>
<body>
<?php
include "../pages/nav.php";
?>
<main>
<div class="header"><h1>
        escrib</h1>
</div>
<br><br>
<?php
$blogers = array_slice(scandir("../blog/",1), 0, -2);
$blogs_arr = array();
foreach ($blogers as $bloger){
    $blogs = array_slice(scandir("../blog/".$bloger,1), 0, -2);
    foreach ($blogs as $blog){
        $pattern = array(
                "/-/",
                "/\.html$/"
        );
        $replace = array(
                " ",
                ""
        );
        $title = ucfirst(preg_replace($pattern, $replace, $blog));
        $url = $bloger."/".$blog;
        $blog_arr = array(
                "title" => $title,
                "by" => $bloger,
                "blog" => $blog,
                "url" => $url,
                "toc" => filemtime("../blog/".$url)
        );
        array_push($blogs_arr, $blog_arr);
    }
}
//echo "<pre>";
//print_r($blogs_arr);
//echo "</pre>";
usort($blogs_arr, function($a, $b) {
    return $b['toc'] <=> $a['toc'];
});
//echo "<pre>";
//print_r($blogs_arr);
//echo "</pre>";
$toe = "";
foreach ($blogs_arr as $blog){
    $toe.= "<li><a href='../".$blog['by']."/".preg_replace("/(\.html)$/", "", $blog["blog"])."'>".$blog['title']."<br />".$blog['by']." - ".time2str($blog['toc'])."<br /> --------------------------</a></li>";
}
$toe = "<ul>".$toe."</ul>";
echo $toe;
function time2str($ts) {
    if(!ctype_digit($ts)) {
        $ts = strtotime($ts);
    }
    $diff = time() - $ts;
    if($diff == 0) {
        return 'now';
    } elseif($diff > 0) {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0) {
            if($diff < 60) return 'just now';
            if($diff < 120) return '1 minute ago';
            if($diff < 3600) return floor($diff / 60) . ' minutes ago';
            if($diff < 7200) return '1 hour ago';
            if($diff < 86400) return floor($diff / 3600) . ' hours ago';
        }
        if($day_diff == 1) { return 'Yesterday'; }
        if($day_diff < 7) { return $day_diff . ' days ago'; }
        if($day_diff < 31) { return ceil($day_diff / 7) . ' weeks ago'; }
        if($day_diff < 60) { return 'last month'; }
        return date('F Y', $ts);
    } else {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0) {
            if($diff < 120) { return 'in a minute'; }
            if($diff < 3600) { return 'in ' . floor($diff / 60) . ' minutes'; }
            if($diff < 7200) { return 'in an hour'; }
            if($diff < 86400) { return 'in ' . floor($diff / 3600) . ' hours'; }
        }
        if($day_diff == 1) { return 'Tomorrow'; }
        if($day_diff < 4) { return date('l', $ts); }
        if($day_diff < 7 + (7 - date('w'))) { return 'next week'; }
        if(ceil($day_diff / 7) < 4) { return 'in ' . ceil($day_diff / 7) . ' weeks'; }
        if(date('n', $ts) == date('n') + 1) { return 'next month'; }
        return date('F Y', $ts);
    }
}
?>
</main>
<script src="../js/script.js"></script>
<!-- Start 1FreeCounter.com code -->
  
  <script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=134070" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=134070' + data + '">');
  document.write('</a>');
  </script>

<!-- End 1FreeCounter.com code -->
</body>
</html>
