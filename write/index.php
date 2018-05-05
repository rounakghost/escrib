<?php

$name = $email = $gender = $comment = $website = "";
//print_r($_POST);
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = test_input($_POST["title"]);
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $username = preg_replace("/(.+)(@gmail\.com)/", "$1", $email);
    $dpurl = test_input($_POST["dpurl"]);
    $blog = test_input($_POST["blog"]);
    $category = test_input($_POST["category"]);
    $info_arr = array(
        "username" => $username,
        "name" => $name,
        "email" => $email,
        "dpurl" => $dpurl,
        "category" => $category,
        "title" => $title
    );
    $dir = "../blog/" . $username;
    if (!is_dir($dir)) {
        mkdir($dir, 0755);
    }
    $dirmd = "../markdown/" . $username;
    if (!is_dir($dirmd)) {
        mkdir($dirmd, 0755);
    }
    include "Parsedown.php";
    $blog = "# " .$title. "\n## by ".$name." on ".$category."\n".$blog;
    $parse = new Parsedown();
    $blogparse = $parse->text(nl2br($blog));
    $title = santize($title);
    $file = $dir . "/" .$title. ".html";
    $filemd = $dirmd . "/" .$title. ".md";
    file_put_contents($file, $blogparse);
    file_put_contents($filemd, $blog);
    file_put_contents("../images/dp/".$username.".jpg", file_get_contents($dpurl));
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function santize($u){
    $pattern = array(
        "/ +/",

    );
    $replacemet = array(
        "-"
    );

    return preg_replace($pattern, $replacemet, $u);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <title>BLOG UR LIFE</title>
    <style>
        main{
            width: 100vw;
            height: 100vh;
            background-image: url("../images/bg.jpeg");
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        @media screen and (max-width: 600px) {
            .card{
                height: 100%;
            }
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
<main>
    <div class="row">
        <div class="col s12 m10 l8 offset-l2 offset-m1">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../images/logo.jpg" id="card-img">
                    <img class="activator hide" src="../images/rou2.jpg" id="card-img-l">
                    <script>
                        function myFunction(x) {
                            if (x.matches) { // If media query matches
                                document.querySelector("#card-img-l").classList.remove("hide");
                                document.querySelector("#card-img").classList.add("hide");
                            } else {
                                document.querySelector("#card-img-l").classList.add("hide");
                                document.querySelector("#card-img").classList.remove("hide");                            }
                        }

                        var x = window.matchMedia("(min-width: 992px)")
                        myFunction(x) // Call listener function at run time
                        x.addListener(myFunction) // Attach listener function on state changes
                    </script>
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Post<i class="material-icons left fa fa-pencil-alt"></i></span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Write Ur words<i class="material-icons right fa fa-times-circle"></i></span><br />
                    <a class="waves-effect waves-dark btn-large white grey-text text-darken-3" id="loginGoogle"><i class="fab fa-google fa-fw"></i> SIGN IN WITH GOOGLE TO CONTINUE</a>
                    <div id="user" class="hide">
                        <ul class="collection">
                            <li class="collection-item avatar">
                                <img src="../images/f.jpeg" alt="" class="circle" id="userDp">
                                <span class="title" id="userName">Faisal Manzer</span><br />
                                <span id="userEmail">faisal.manzer11@gmail.com</span><br />
                                <i class="fa fa-sign-out-alt" id="signOut"></i>
                            </li>
                        </ul>
                        <form class="col s12 m12 l12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                            <input type="hidden" id="formUserName" name="name">
                            <input type="hidden" id="formUserEmail" name="email">
                            <input type="hidden" id="formUserDp" name="dpurl">
                            <div class="row">
                                <div class="input-field col s8 m6 l4">
                                    <input name="title" id="title" type="text" class="validate" required>
                                    <label for="title">Title</label>
                                </div>
                                <div class="input-field col s12 m6 l4">
                                    <select required name="category">
                                        <option value="" disabled selected>Chose your Category</option>
                                        <option value="lifestyle">Lifestyle</option>
                                        <option value="food">Food</option>
                                        <option value="travel">Travel</option>
                                        <option value="photography">Photography</option>
                                    </select>
                                    <label>Category</label>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <textarea id="textarea1" class="materialize-textarea" name="blog" required></textarea>
                                    <label for="textarea1">Write Here</label>
                                </div>
                                <div class="input-field col s12 m12 l12">
                                    <button class="btn waves-effect waves-light blue white-text" type="submit">SHARE
                                        <i class="right fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large white" href="../">
        <i class="fa fa-home deep-orange-text large"></i>
    </a>
</div>
<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
        <h3>Blog Submited Sussessful</h3>
        <p><?php
            include "../pages/siteurl.php";
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $anc = SITE_URL.$username."/".$title;
                echo "<h5><a href='".$anc."'>Click HERE to view</a></h5>";
                echo "<h6><a href='".SITE_URL."'>OR GO HOME</a></h6>";
            }
            ?></p>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
<script src="../js/gsign.js"></script>
<script src="https://apis.google.com/js/platform.js?onload=signInFaisal"></script>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "
            <script>
            let mode = document.querySelector('.modal');
            let inse = M.Modal.init(mode);
            inse.open();
            </script>
         ";
}

?>
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