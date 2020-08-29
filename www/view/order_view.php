<html>
    <head>
        <meta charset='uts-8'>
        <title>購入履歴画面</title>
    </head>
        <h1>購入履歴</h1>
    <body>
        <section>
            <caption>商品一覧</caption>
            <table border="3">
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
                    <th>合計金額</th>
                </tr>
            <?php foreach($order as $read) { ?>
                <tr>
                    <td><?php print h($read['order_id']); ?></td>
                    <td><?php print h($read['order_datetime']); ?></td>
                    <td><?php print h($read['total']); ?></td>
                    <td><a href="order_details.php?order_id=<?php print $read['order_id'];?>">詳細</a></td>
                </tr>   
            <?php } ?>   
            </table>   
        </section>
    </body>
</html>