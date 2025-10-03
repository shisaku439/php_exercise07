<?php

$name = '';
$tel = '';
$email = '';
$item_key = '';
$err_msgs = [];
$is_msgs = false;

$items = ['バッグ', '靴', '時計', 'ネックレス', 'ピアス'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $item_key = $_POST['item_key'];

    // 個人情報バリデーション
    if (empty($name)) {
        $err_msgs[] = '氏名を入力してください';
    }
    if (empty($tel)) {
        $err_msgs[] = '電話番号を入力してください';
    }
    if (empty($email)) {
        $err_msgs[] = 'メールアドレスを入力してください';
    }

    //送信内容の表示フラグ
    if (empty($err_msgs)) {
        $is_msgs = true;
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>個人情報を入力してください</h3>

    <!-- エラーメッセージの表示 -->
    <?php if (!empty($err_msgs)): ?>
        <h2>エラーメッセージ</h2>
        <ul>
            <?php foreach ($err_msgs as $err_msg): ?>
                <li><?= $err_msg ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="" method="post">

        <!-- 個人情報入力欄 -->
        <label for="">氏名</label><br>
        <input type="text" name="name" value="<?= $name ?>"><br>

        <label for="">電話番号</label><br>
        <input type="tel" name="tel" value="<?= $tel ?>"><br>

        <label for="">メールアドレス</label><br>
        <input type="email" name="email" value="<?= $email ?>"><br>

        <h3>購入するものを選択してください</h3>

        <div>
            <select name="item_key">
                <?php foreach ($items as $item): ?>
                    <option value="<?= $item ?>"><?= $item ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>

        <div class="submit">
            <input type="submit" value="送信">
        </div>

    </form>


    <!-- 送信内容の表示 -->
    <?php if ($is_msgs): ?>
        <h3>以下の内容が送信されました。</h3>
        <table>
            <tr>
                <td>氏名：</td>
                <td><?= $name ?></td>
            </tr>
            <tr>
                <td>電話番号：</td>
                <td><?= $tel ?></td>
            </tr>
            <tr>
                <td>メールアドレス：</td>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <td>購入するもの：</td>
                <td><?= $item_key ?></td>
            </tr>
        </table>
    <?php endif; ?>

</body>

</html>
