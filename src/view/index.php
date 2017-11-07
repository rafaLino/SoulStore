<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 14/10/2017
 * Time: 23:50
 */

require_once('../view/head.html');
require_once('../view/slide.html');
if(isset($_REQUEST['recSenhaForm'])){
    $email = $_REQUEST['confirmEmail'];
    echo "<script>alert('" . $email . "')</script>";
}