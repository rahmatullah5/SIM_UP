<?php
    $cookie_name="first_visit";
    $cookie_value="cookie_visit";
    setcookie($cookie_name,$cookie_value,time() + (6), "/");
    
?>
<html>
    <body>
    <?php
        if(!isset($_COOKIE[$cookie_name])){
            echo "Cookie Named '". $cookie_name ."' is not set! <br/>";
            include "Landingpage.php";
        }
    else{
        echo "Cookie '" . $cookie_name . "' is set<br/>";
        echo "value is '" . $_COOKIE[$cookie_name] ."' <br/>";
        include "homepage.php";
    }
    ?>
    
    </body>
</html>