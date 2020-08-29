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
$db = get_db_connect();
$user = get_login_user($db);
$user_id = $_SESSION['user_id'];
if(is_admin($user) === false && user_check($db,$_GET['order_id'],$user_id) === false){
    header('Location:./logout.php');
    exit;
}


$order = get_order_details($db,$_GET['order_id']);
$o = get_one_order($db,$_GET['order_id']);

include_once VIEW_PATH . 'order_detail_view.php';