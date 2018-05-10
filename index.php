<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get started with escrib</title>
    <link rel="stylesheet" href="css/style.css">
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
    <!-- its is not class="header" is tag headrer-->

    <!-- put sidenav in nav -->
    <!-- its ul not ui -->
    <?php
    include "pages/siteurl.php";
    include "pages/header.php";
    include "pages/nav.php";
    ?>
    <!-- use main insted of content-->
    <main>
        <div class="container"><br>
            Escrib is multi blogging website platform. Here you can share your experience and ideas on various topics given.
            <br><br>
            <div class="row">
                <div class="col s12 m6 l6">
                    <div class="card">
                        <a href="write/index.php"><img src="images/lifestyle.jpeg"></a>
                        <div class="container">
                            <p>Lifestyle
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="card">
                        <a href="write/index.php"><img src="images/food.jpeg"></a>
                        <div class="container">
                            <p>Food
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="card">
                        <a href="write/index.php"><img src="images/photography.jpeg"></a>
                        <div class="container">
                            <p>Photography
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="card">
                        <a href="write/index.php"><img src="images/travel.jpeg"></a>
                        <div class="container">
                            <p>Travel
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <a href="about.html">&copy; Rounak Narayan</a>
    </footer>
    <script src="js/script.js"></script>
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
