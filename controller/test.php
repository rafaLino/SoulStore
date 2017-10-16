<?php
/**
 * Created by PhpStorm.
 * User: Rafael Lino
 * Date: 14/10/2017
 * Time: 23:50
 */

require_once('../view/head.html');
if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    echo "<script>alert('" . $email . "')</script>";
}