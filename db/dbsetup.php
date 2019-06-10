<?php
include 'dbconn.php';


//Random character generator
function generateRandomString($length = 10){
    global $randomString;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



//establish db connection
$db_conn = mysqli_connect($db_servername, $db_username, $db_password);
mysqli_select_db($db_conn, $db_name);
$db_conn->set_charset("utf8");

if (mysqli_connect_errno()) {
     die(mysqli_connect_error());
}

//db connection is closed in includes/footer.php

//Error handling . Add debug=true to the querystring
if (isset($_GET["debug"])) {
	ini_set('display_errors', TRUE);
} else {
  ini_set('display_errors', FALSE);
}
?>
