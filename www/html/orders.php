<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'db.php';
require_once MODEL_PATH . 'orders.php';
require_once MODEL_PATH . 'user.php';
session_start();
if(isset($_SESSION['user_id']) === FALSE){
    header('index_view.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$db = get_db_connect();

$user = get_login_user($db);

if(is_admin($user) === false){
    $order = get_order($db,$user_id);
}else {
    $order = get_admin_order($db);
}

include_once VIEW_PATH . 'order_view.php';