<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion ->connect_error) die("Fatal Error");

    $user = mysql_fix_string($conexion, $_POST['user']);
    $pass = mysql_fix_string($conexion, $_POST['pass']);
    $query = "SELECT * FROM users 
                WHERE user='$user' AND pass='$pass'";

    function mysql_entities_fix_string($con, $string)
    {
        return htmlentties(mysql_fix_string($con, $string));
    }

    function mysql_fix_string($con, $string)
    {
        if (get_magic_quotes_gpc())
            $string = stripslashes($string);
        return $con->real_escape_string($string);
    }
?>
