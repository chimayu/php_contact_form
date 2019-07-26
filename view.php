<?php
    require_once('function.php');
    require_once('dbconnect.php');

    //SQLを実行
    $stmt = $dbh->prepare('SELECT * FROM surveys');
    $stmt->execute();
    $results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>一覧</title>
</head>
<body>
<!-- //画面に表示する -->
    <?php foreach ($results as $result): ?>
        <p><?php echo 'ニックネーム:' . h($result['nickname']); ?></p>
        <p><?php echo 'E-mail: ' . h($result['email']); ?></p>
        <p><?php echo '内容: ' . h($result['content']); ?></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>