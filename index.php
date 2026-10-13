<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    extract($_REQUEST);
    if(isset($mod)){
        switch($mod){
            case 'page':
                include_once 'controller/page.php';
                break;
            case 'cart':
                include_once 'controller/cart.php';
                break;
            case 'user':
                include_once 'controller/user.php';
                break;
            case 'admin':
                include_once 'controller/admin.php';
                break;
        }
    }else{
        header('location: ?mod=page&act=home');
    }
?>