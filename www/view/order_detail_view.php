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
                <tr>
                    <td><?php print h($o['order_id']); ?></td>
                    <td><?php print h($o['order_datetime']); ?></td>
                    <td><?php print h($o['total']); ?></td>
                </tr>   
        
            </table>   
        </section>
        <section>
            <caption>商品一覧</caption>
            <table border="3">
                <tr>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>購入数</th>
                    <th>小計</th>
                </tr>
            <?php foreach($order as $read) { ?>
                <tr>
                    <td><?php print h($read['name']); ?></td>
                    <td><?php print h($read['price']); ?></td>
                    <td><?php print h($read['amount']); ?></td>
                    <td><?php print h($read['total']); ?></td>
                </tr>   
            <?php } ?>   
            </table>   
        </section>
    </body>
</html>