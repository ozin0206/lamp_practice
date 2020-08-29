<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

header('X-FRAME-OPTIONS: DENY');
session_start();

$token = get_csrf_token();
/*
リターンとはなにか？
⇒関数から返された値を変数に代入することができる

get_csrf_tokenでリターンされた値を$tokenで受け取るにはどうしたらいいか？
⇒$token = get_csrf_token();

formタグのアクション属性の意味？
⇒送信するデータの送信先を指定する役割

is_valid_csrf_tokenはどこで実行するか？
⇒有効なファイルが存在するときに実行される
*/
//ログインしていなければログインページに飛ばす
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$items = get_open_items($db);
$ranking = get_ranking($db);

include_once VIEW_PATH . 'index_view.php';