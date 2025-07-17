<!-- お問い合わせ -->
 <!-- 説明 -->
<?php
    $siteName = "GMC-BBS";
    $pageTitle = "issues";
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title><?= $pageTitle ?> / <?= $siteName ?></title>
        <link rel="icon" href="../image/icon.png" type="image/png"> 

        <style>
            body {
                background: #f5f6fa;
                font-family: 'Segoe UI', 'Meiryo', sans-serif;
                margin: 0;
                padding: 0;
                color: #222;
            }
            header {
                background: linear-gradient(90deg, #4e54c8 0%, #8f94fb 100%);
                color: #fff;
                padding: 20px 0 10px 0;
                text-align: center;
                box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            }
            header h1 {
                margin: 0 0 10px 0;
                font-size: 2.2rem;
                color: fff;
                letter-spacing: 2px;
            }
            header a {
                color: #fff;
                text-decoration: none;
                margin: 0 18px;
                font-weight: bold;
                font-size: 1.1rem;
                transition: color 0.2s;
            }
            header a:hover {
                color: #ffe082;
                text-decoration: underline;
            }

            footer {
                text-align: center;
                color: #888;
                font-size: 0.95rem;
                margin: 40px 0 10px 0;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>TEST - BBS</h1>
            <a href="../php/top.php">トップ</a>
            <a href="../php/notice.php">お知らせ</a>
            <a href="../php/info.php">掲示板について</a>
            <a href="../php/issues.php">お問い合わせ</a>
        </header>
    </body>
</html>