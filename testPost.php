<?php
  session_start();
  killSession();
?>

<?php
  function killSession() {
    $_SESSION = [];

    if (isset($_COOKIE[session_name()])) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time()-36000, $params['path']);
      session_destroy();
    }
  }
?>

<?php
require_once('header-top.php');
?>
  <meta name="description" content="女性専用初心者向けの英会話教室です。全く英語がわからなくても、一から丁寧にお教えいたします。英語から離れていた方、一から英語を学びたい方、是非お気軽にお越し下さい。">
  <title>たのしい英会話 | 大阪市 北区 英会話 | 実力に差がつく英会話を紹介 | 大阪市 英会話教室 top20 | 大阪市 初心者向け 英会話教室</title>

<?php
require_once('header-bottom.php');
?>
  <div class="header-image" id="course-header-image">
    <h2>送信完了</h2>
    <p>送信完了画面です！</p>
  </div>
  <main class="main">
    <div class="testPost">
      <p>送信が完了しました。ありがとうございます。<br>
        担当から連絡がくるまでお待ちください。
      </p>
      <a href="index.php">トップページへ戻る</a>
    </div>
  </main>
<?php
  require_once('footer.php');
?>
</body>
</html>