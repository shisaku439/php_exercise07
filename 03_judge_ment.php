<?php

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $score = filter_input(INPUT_GET, 'score');

    if ($score >= 60) {
        $msg = '合格です';
    } else {
        $msg = '不合格です';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>埋め込み</title>
</head>

<body>
    <?php if (!empty($msg)): ?>
        <h1><?= $msg ?></h1>
    <?php endif; ?>
    <a href="03_form2.php">戻る</a>
</body>

</html>
