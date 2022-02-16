<?php
  session_start();

  require_once("lib/util.php");
  
  $error = [];

  $radioArray = ["体験レッスン", "相談"];
  $timeArray = ["選択して下さい",
                 "09：00～12：00",
                 "13：00～16：00",
                 "17：00～20：00"
                ];

  $levelStr = 

  $levelArray = ["選択して下さい",
                  "１．超初心者レベル",
                  "２．中学初級レベル",
                  "３．中学中級レベル",
                  "４．中学卒業レベル",
                  "５．高校初級レベル",
                  "６．高校中級レベル",
                  "７．高校卒業レベル",
                  "８．大学レベル",
                  "９．わからない"
                ];

  $pattern;

  // 体験レッスン
  if (isset($_POST['radio'])) {
    $_SESSION['radio'] = $_POST['radio'];
  }
  if (empty($_SESSION['radio'])) {
    $error[] = "お問い合わせ内容を選択して下さい";
  } else if (!in_array($_SESSION['radio'], $radioArray)) {
    $error[] = "不正な操作です";
  } else {
    $radio = trim($_SESSION['radio']);
  }

  // フリガナ
  $pattern = "/[0-9]{1}/u";
  if (isset($_POST['text'])) {
    $_SESSION['text'] = $_POST['text'];
  }
  if (empty($_SESSION['text'])) {
    $error[] = "フリガナを入力して下さい";
  } else if(preg_match($pattern, $_SESSION['text']) === 1) {
    $error[] = "数字は入力できません。フリガナで入力して下さい";
  } else {
    $text = trim(mb_convert_kana($_SESSION['text'], "KCV"));
  }

  // お名前
  if (isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
  }
  if (empty($_SESSION['name'])) {
    $error[] = "名前を入力して下さい";
  } else if(preg_match($pattern, $_SESSION['name']) === 1) {
    $error[] = "数字は入力できません。名前を入力して下さい";
  } else {
    $name = trim(mb_convert_kana($_SESSION['name'], "HcV"));
  }

  // 電話番号
  $pattern = "/^(090|080|070)(-{0,1}\d{4}){2}$/u";
  if (isset($_POST['phoneNumber'])) {
    $_SESSION['phoneNumber'] = $_POST['phoneNumber'];
  }
  if (empty($_SESSION['phoneNumber'])) {
    $error[] = "携帯番号を入力して下さい";
  } else if(preg_match($pattern, mb_convert_kana($_SESSION['phoneNumber'], "n")) === 0) {
    $error[] = "携帯番号の入力が誤っています";
  } else {
    $phoneNumber = trim($_SESSION['phoneNumber']);
  }

  // メールアドレス
  $pattern = "/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-zA-Z]+(\.[!#%&\-_0-9a-zA-Z]+)+$/";
  if (isset($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
  }
  if (empty($_SESSION['email'])) {
    $error[] = "メールアドレスを入力して下さい";
  } else if(preg_match($pattern, $_SESSION['email']) === 0) {
    $error[] = "メールアドレスの入力が誤っています";
  } else {
    $email = trim($_SESSION['email']);
  }

  // 年
  if (isset($_POST['year'])) {
    $_SESSION['year'] = $_POST['year'];
  }
  if (empty($_SESSION['year'])) {
    $error[] = "ご希望の年を入力して下さい";
  } else {
    $year = trim($_SESSION['year']);
  }

  // 月
  if (isset($_POST['month'])) {
    $_SESSION['month'] = $_POST['month'];
  }
  if (empty($_SESSION['month'])) {
    $error[] = "ご希望の月を入力して下さい";
  } else {
    $month = trim($_SESSION['month']);
  }

  // 日
  if (isset($_POST['day'])) {
    $_SESSION['day'] = $_POST['day'];
  }
  if (empty($_SESSION['day'])) {
    $error[] = "ご希望の日を入力して下さい";
  } else {
    $day = trim($_SESSION['day']);
  }

  // ご希望の時間帯
  if (isset($_POST['time'])) {
    $_SESSION['time'] = $_POST['time'];
  }
  if (empty($_SESSION['time']) || $_SESSION['time'] === "選択して下さい") {
    $error[] = "ご希望の時間帯を選択して下さい";
  } else {
    $time = trim($_SESSION['time']);
  }

  // ご自身の英語力
  if (isset($_POST['level'])) {
    $_SESSION['level'] = $_POST['level'];
  }
  if (empty($_SESSION['level']) || $_SESSION['level'] === "選択して下さい") {
    $error[] = "ご自身の英語力を選択して下さい";
  } else {
    $level = trim($_SESSION['level']);
  }

  // 備考・入力内容
  if (isset($_POST['message'])) {
    $_SESSION['message'] = $_POST['message'];
  }
    $message = trim($_SESSION['message']);
?>

<?php
require_once('header-top.php');
?>
  <meta name="description" content="女性専用初心者向けの英会話教室です。全く英語がわからなくても、一から丁寧にお教えいたします。英語から離れていた方、一から英語を学びたい方、是非お気軽にお越し下さい。">
  <title>たのしい英会話 | 大阪市 北区 英会話 | 実力に差がつく英会話を紹介 | 大阪市 英会話教室 top20 | 大阪市 初心者向け 英会話教室</title>

<?php
require_once('header-bottom.php');
?>
  <div class="header-image" id="introduce-header-image">
    <h2>入力確認画面</h2>
    <p>入力内容に間違いないかご確認ください。</p>
  </div>
  <main class="main">
    <?php if(count($error) > 0) { ?>
      <div class="testConfirm">
          <p class="confirmError">入力内容に誤りがございます。<br>
            必要事項のご入力をお願いいたします。</p>
          <hr>
        <span class="error"><?= implode('<br>', $error) ?></span><br>
          <p class="contact-back"><a href="contact.php"><button>戻る</button></a></p>
      </div>
      <?php } else { ?>
        <div class="testConfirm">
          <h2>以下の内容で送信してよろしいですか？</h2>
          <p>お問い合わせ内容：<?= security($radio); ?></p>
          <p>フリガナ：<?= security($text); ?></p>
          <p>お名前：<?= security($name); ?></p>
          <p>電話番号：<?= security($phoneNumber); ?></p>
          <p>メールアドレス：<?= security($email); ?></p>
          <p>ご希望の日にち：<?= security($year) . "年 " . security($month) . "月 " . security($day) . "日"; ?></p>
          <p>ご希望の時間帯：<?= security($time); ?></p>
          <p>ご自身の英語力：<?= security($level); ?></p>
          <p>備考・入力内容：<?= security($message); ?></p>

          <p class="contact-back"><a href="contact.php"><button>戻る</button></a></p>
          <p class="contact-post"><a href="testPost.php"><button>送信</button></a></p>
      </div>
    <?php } ?>

  <main>
<?php
  require_once('footer.php');
?>

</body>
</html>