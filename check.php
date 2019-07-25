<?php
    // 別のファイルを読み込む
    require_once('function.php');

    // GETで来た場合はindex.htmlに戻す
    // echo '<pre>';
    // var_dump();
    // die;

     if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        header('Location: index.html');
    }

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    if ($nickname == '') {
        $nickname_result = 'ニックネームが入力されていません。';
    } else {
        $nickname_result = 'ようこそ、' . $nickname .'様';
    }
    
    if ($email == '') {
        $email_result = 'メールアドレスが入力されていません。';
    } else {
        $email_result = 'メールアドレス：' . $email;
    }

    if ($content == '') {
        $content_result =  'お問い合わせ内容が入力されていません。';
    } else {
        $content_result = 'お問い合わせ内容：' . $content;
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>入力内容確認</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>入力内容確認</h1>
    <p><?php echo h($nickname_result); ?></p>
    <p><?php echo h($email_result); ?></p>
    <p><?php echo h($content_result); ?></p>
    <!-- 送信内容が入ってない場合はOKボタンを出さないPHP -->
    <form method="POST" action="thanks.php">
        <input type="hidden" name="nickname" value="<?php echo h($nickname); ?>">
        <input type="hidden" name="email" value="<?php echo h($email); ?>">
        <input type="hidden" name="content" value="<?php echo h($content); ?>">
        <input type="button" value="戻る" onclick="history.back()">
        <?php if ($nickname != '' && $email != '' && $content != ''): ?>
            <input type="submit" value="OK">
        <?php endif; ?>
    </form>
</body>
</html>