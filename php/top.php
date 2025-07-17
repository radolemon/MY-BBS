<?php
    $siteName = "GMC-BBS";
    $pageTitle = "TOP";
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
            main.content {
                max-width: 600px;
                margin: 40px auto 0 auto;
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 4px 24px rgba(80,80,160,0.08);
                padding: 32px 28px 24px 28px;
            }
            .slideshow {
                position: relative;
                width: 100%;
                max-width: 480px;
                height: 260px;
                margin: 0 auto 28px auto;
                border-radius: 14px;
                overflow: hidden;
                box-shadow: 0 2px 16px rgba(80,80,160,0.13);
                background: #e0e7ff;
            }
            .slide {
                position: absolute;
                width: 100%;
                height: 100%;
                opacity: 0;
                transition: opacity 1s;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            .slide.active { opacity: 1; }
            h2 {
                color: #4e54c8;
                margin-top: 0;
                font-size: 1.5rem;
                letter-spacing: 1px;
            }
            hr {
                border: none;
                border-top: 1.5px solid #e0e0e0;
                margin: 28px 0;
            }
            ul {
                padding-left: 20px;
                margin: 0;
            }
            ul li {
                margin-bottom: 8px;
                font-size: 1.05rem;
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

        <main class="content">
            <div id="slider" class="slideshow">
                <div class="slide bg1"></div>
                <div class="slide bg2"></div>
            </div>
            <script>
                const images = [
                    "../image/slide1.jpg",
                    "../image/slide2.jpg",
                    "../image/slide3.png"
                ];
                let current = 0;
                let next = 1;

                const bg1 = document.querySelector('.bg1');
                const bg2 = document.querySelector('.bg2');

                function showBackground(idx, el) {
                    el.style.backgroundImage = `url('${images[idx]}')`;
                    el.style.backgroundSize = "cover";
                    el.style.backgroundPosition = "center";
                }

                function changeBackground() {
                    const active = bg1.classList.contains('active') ? bg1 : bg2;
                    const inactive = bg1.classList.contains('active') ? bg2 : bg1;

                    showBackground(next, inactive);
                    inactive.classList.add('active');
                    active.classList.remove('active');

                    current = next;
                    next = (next + 1) % images.length;
                }

                window.addEventListener('DOMContentLoaded', () => {
                    showBackground(current, bg1);
                    bg1.classList.add('active');
                    setTimeout(() => {
                        showBackground(next, bg2);
                    }, 0);
                    setInterval(changeBackground, 4000);
                });
            </script>
            <hr>

            <h2>TEST-BBSへようこそ！</h2>
            <p>
                <!-- ようこそメッセージ＆説明 -->
            </p>
            <hr>
        </main>

        <footer>
            <p>🌐2023 TEST - BBS</p>
        </footer>
    </body>
</html>

<!-- http://localhost/BBS/php/top.php -->
