<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "⚠️ メールアドレスが無効です。";
    } elseif (empty($name) || empty($message)) {
        $error = "⚠️ 必須項目を入力してください。";
    } else {
        $to = 'radolemon1049@gmail.com';  // 送信先メールアドレス
        $subject = "【お問い合わせ】{$name}様より";
        $body = "名前: {$name}\nメール: {$email}\n\n{$message}";
        $headers = "From: {$email}\r\nReply-To: {$email}\r\nContent-Type: text/plain; charset=UTF-8";

        if (mail($to, $subject, $body, $headers)) {
            $sent = true;
        } else {
            $error = "❌ メール送信に失敗しました。";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><title>お問い合わせフォーム</title></head>
<body>
<h1>お問い合わせ</h1>
<?php if ($sent): ?>
    <p style="color:green;">✅ 送信完了しました。</p>
<?php else: ?>
    <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>お名前（必須）:<br>
            <input type="text" name="name" required value="<?php echo $_POST['name'] ?? ''; ?>">
        </label><br><br>
        <label>メールアドレス（必須）:<br>
            <input type="email" name="email" required value="<?php echo $_POST['email'] ?? ''; ?>">
        </label><br><br>
        <label>お問い合わせ内容（必須）:<br>
            <textarea name="message" required rows="6" cols="40"><?php echo $_POST['message'] ?? ''; ?></textarea>
        </label><br><br>
        <button type="submit">送信する</button>
    </form>
<?php endif; ?>
</body>
</html>
