<?php
session_start();
if(isset($_SESSION["un"])){
header('location: user/profile.php');
}
?>