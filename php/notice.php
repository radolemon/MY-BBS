<!-- お知らせ -->
<?php
    $siteName = "GMC-BBS";
    $pageTitle = "notice";

    // noticeフォルダ内のJSONファイルを自動で全て読み込む
    $notice_dir = __DIR__ . '/../notice/';
    $notices = [];

    // noticeディレクトリが存在しなければ処理中止
    if (!is_dir($notice_dir)) {
        die('お知らせフォルダが存在しません。');
    }

    foreach (glob($notice_dir . '*.json') as $file) {
        $json = @file_get_contents($file);
        if ($json === false) {
            continue; // 読み込めなければスキップ
        }

        $data = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            continue; // JSONが不正ならスキップ
        }

        // 配列の配列か単体かを判定して追加
        if (is_array($data)) {
            if (isset($data[0])) {
                foreach ($data as $notice) {
                    if (isset($notice['date'], $notice['title'], $notice['body'])) {
                        $notices[] = $notice;
                    }
                }
            } else {
                if (isset($data['date'], $data['title'], $data['body'])) {
                    $notices[] = $data;
                }
            }
        }
    }

    // 日付で降順ソート
    usort($notices, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
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

            /*main.content {
                max-width: 600px;
                margin: 40px auto 0 auto;
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(80,80,160,0.08);
                padding: 32px 28px 24px 28px;
            }*/
            .notice-container {
                max-width: 600px;
                margin: 40px auto;
                background: #fff;
                border-radius: 14px;
                box-shadow: 0 4px 24px rgba(80,80,160,0.08);
                padding: 32px 28px 24px 28px;
            }
            h2 {
                color: #4e54c8;
                text-align: center;
                margin-top: 0;
            }
            .notice {
                border-left: 4px solid #4e54c8;
                padding: 12px 18px;
                margin-bottom: 22px;
                background: #f7f8fd;
                border-radius: 8px;
            }
            .notice-date {
                color: #888;
                font-size: 0.95rem;
                margin-bottom: 4px;
            }
            .notice-title {
                font-weight: bold;
                font-size: 1.1rem;
                margin-bottom: 6px;
            }
            .notice-body {
                font-size: 1rem;
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

        <div class="notice-container">
            <h2>お知らせ</h2>
            <?php if (empty($notices)): ?>
                <div class="notice">
                    <div class="notice-title">お知らせはありません</div>
                </div>
            <?php else: ?>
                <?php foreach ($notices as $notice): ?>
                    <div class="notice">
                        <div class="notice-date"><?= htmlspecialchars($notice['date']) ?></div>
                        <div class="notice-title"><?= htmlspecialchars($notice['title']) ?></div>
                        <div class="notice-body"><?= nl2br(htmlspecialchars($notice['body'])) ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <footer>
            <p>🌐2023 TEST - BBS</p>
        </footer>
    </body>
</html>

<!-- http://localhost/BBS/php/notice.php -->