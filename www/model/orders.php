<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_orders($db,$user_id){
    $sql = 'select order_id
            from orders
            where user_id = ?';

return fetch_all_query($db, $sql,array($user_id));
}

function insert_orders($db,$user_id){
    $sql = 'insert into orders
            (user_id,order_datetime)
            values
            (?,now())';
return execute_query($db,$sql,array($user_id));   

}

function insert_order_details($db,$carts,$order_id){
    foreach($carts as $cart){
        $sql = 'insert into order_details
                (order_id,item_id,amount,price)
                values
                (?,?,?,?)';
    execute_query($db,$sql,array($order_id,$cart['item_id'],$cart['amount'],$cart['price']));
  
    }
}

function get_order($db,$user_id){
    $sql = 'select orders.order_id,order_datetime,
            sum(price*amount) AS total
            from orders
            join order_details
            on orders.order_id = order_details.order_id
            where user_id = ?
            group by order_id';
    return fetch_all_query($db, $sql,array($user_id));
}

function get_admin_order($db){
    $sql = 'select orders.order_id,order_datetime,
            sum(price*amount) AS total
            from orders
            join order_details
            on orders.order_id = order_details.order_id
            group by order_id';
    return fetch_all_query($db, $sql);
}

function get_order_details($db,$order_id){
    $sql = 'select items.name,
            order_details.price,
            order_details.amount,
            order_details.price*order_details.amount as total
            from order_details
            join items
            on order_details.item_id = items.item_id
            where order_details.order_id=?';
    return fetch_all_query($db, $sql,array($order_id));
}

function get_one_order($db,$order_id){
    $sql = 'select orders.order_id,order_datetime,
            sum(price*amount) AS total
            from orders
            join order_details
            on orders.order_id = order_details.order_id
            where orders.order_id = ?
            group by orders.order_id';
    return fetch_query($db, $sql,array($order_id));
}

function user_check($db,$order_id,$user_id){
    $sql = 'select user_id 
           from orders
           where order_id = ?';

    $data = fetch_query($db, $sql,array($order_id));
    if((int)$data['user_id'] === (int)$user_id){
        return true;
    }else{
        return false;
    }
}

