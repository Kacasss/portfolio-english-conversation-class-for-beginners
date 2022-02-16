<?php
  session_start();

  require_once("lib/util.php");

  if (empty($_SESSION['radio'])) {
    $radio = "";
  } else {
    $radio = $_SESSION['radio'];
  }

  if (empty($_SESSION['text'])) {
    $text = "";
  } else {
    $text = $_SESSION['text'];
  }

  if (empty($_SESSION['name'])) {
    $name = "";
  } else {
    $name = $_SESSION['name'];
  }

  if (empty($_SESSION['phoneNumber'])) {
    $phoneNumber = "";
  } else {
    $phoneNumber = $_SESSION['phoneNumber'];
  }

  if (empty($_SESSION['email'])) {
    $email = "";
  } else {
    $email = $_SESSION['email'];
  }

  $year;
  if (empty($_SESSION['year'])) {
    $year = "";
  } else {
    $year = (int) $_SESSION['year'];
  }

  if (empty($_SESSION['month'])) {
    $month = "";
  } else {
    $month = (int) $_SESSION['month'];
  }

  if (empty($_SESSION['day'])) {
    $day = "";
  } else {
    $day = (int) $_SESSION['day'];
  }

  if (empty($_SESSION['time'])) {
    $time = "";
  } else {
    $time = $_SESSION['time'];
  }

  if (empty($_SESSION['level'])) {
    $level = "";
  } else {
    $level = $_SESSION['level'];
  }

  if (empty($_SESSION['message'])) {
    $message = "";
  } else {
    $message = $_SESSION['message'];
  }
  
  
  
  function arrayList ($attributeStr) {
    $delimiter = ",";
    return explode($delimiter, $attributeStr);
  }

  $radioStr = "体験レッスン,相談";
  $radioArray = arrayList($radioStr);

  $timeStr = "選択して下さい, 09：00～12：00, 13：00～16：00, 17：00～20：00";
  $timeArray = arrayList($timeStr);

  $levelStr = 
              "選択して下さい, １．超初心者レベル, ２．中学初級レベル, ３．中学中級レベル, ４．中学卒業レベル, ５．高校初級レベル, ６．高校中級レベル, ７．高校卒業レベル, ８．大学レベル, ９．わからない";
  $levelArray = arrayList($levelStr);

  
  function checked($radioArray, $radio) {
    if (empty($radio)) {
      $radio = "体験レッスン";
    }

    if (is_array($radio)) {
      $isChecked = in_array($radioArray, $radio);
    } else {
      $isChecked = ($radioArray === $radio);
    }

    if ($isChecked) {
      echo "checked";
    } else {
      echo "";
    }
  }
  
  function selected($iStart, $iEnd, $nameAttribute, $date) {
    for ($i = $iStart; $i < $iEnd; $i++){
      if ($nameAttribute === $i) {
        echo nl2br("                       <option value=\"{$i}\" selected=\"selected\">{$i}{$date}</option>" . PHP_EOL);
      } else {
        echo nl2br("                       <option value=\"{$i}\">{$i}{$date}</option>" . PHP_EOL);
      }
    }
  }

  function arraySelected($iStart, $iEndArray, $nameAttribute) {
    for ($i = $iStart; $i < count($iEndArray); $i++){
      if ($nameAttribute === $iEndArray[$i]) {
        echo nl2br("                       <option value=\"{$iEndArray[$i]}\" selected=\"selected\">{$iEndArray[$i]}</option>" . PHP_EOL);
      } else {
        echo nl2br("                       <option value=\"{$iEndArray[$i]}\">{$iEndArray[$i]}</option>" . PHP_EOL);
      }
    }
  }


?>

<?php
require_once('header-top.php');
?>
  <meta name="description" content="女性専用初心者向けの英会話教室です。お問い合わせのページです。体験レッスンのご予約や、相談等、フォームでご入力頂くか、どうぞお気軽にお電話を下さい。全く英語がわからなくても、一から丁寧にお教えいたします。英語から離れていた方、一から英語を学びたい方、是非お気軽にお越し下さい。">
  <title>たのしい英会話 | 大阪市 体験レッスン | 英語 初心者 | 英会話 お問い合わせ | 大阪 英会話 体験</title>

<?php
require_once('header-bottom.php');
?>

  <div class="header-image" id="contact-header-image">
    <h2>お問い合わせ</h2>
    <p>質問や体験レッスン等はこちらから！</p>
  </div>
  <main class="main">
    <div class="contact-wrapper">
        <p class="contact-description">
          体験レッスン・お問い合わせはこちらのフォームに
          ご入力頂くか、お気軽にお電話下さい。
        </p>
      <section>
        <img class="contact-image" src="images/contact_image1.png" alt="スマホで連絡を取ろうとしている女性">
        <div class="contact-number">
          <h2>お電話でのご連絡はこちらへ</h2>
          <span>06-2345-6789</span>
          <p>受付時間<br>平日・土日祝日：朝9時～20時</p>
        </div>
      </section>
      <section>
        <div class="contact-form">
          <form action="testConfirm.php" method="post">
            <table>
              <tr>
                <th>お問い合わせ内容</th>
                <td class="lesson">
                    <input type="radio" name="radio" value="<?= security($radioArray[0]); ?>" id="lesson" <?= security(checked($radioArray[0], $radio)); ?>>
                    <label for="lesson"><?= security($radioArray[0]); ?></label>

                    <input type="radio" name="radio" value="<?= security($radioArray[1]); ?>" id="consoltation" <?= security(checked($radioArray[1], $radio)); ?>>
                    <label for="consoltation"><?= security($radioArray[1]); ?></label>
                </td>
                <tr>
                  <th>フリガナ</th>
                  <td>
                    <input type="text" name="text" id="text" value="<?= security($text); ?>">
                    <label for="text"></label>
                  </td>
                </tr>
                <tr>
                  <th>お名前</th>
                  <td>
                    <input type="text" name="name" id="name" value="<?= security($name); ?>">
                    <label for="name"></label>
                  </td>
                </tr>
                <tr>
                  <th>電話番号</th>
                  <td>
                    <input type="tel" name="phoneNumber" id="phoneNumber" value="<?= security($phoneNumber); ?>">
                    <label for="phoneNumber"></label>
                  </td>
                </tr>
                <tr>
                  <th>メールアドレス</th>
                  <td>
                    <input type="email" name="email" id="email" value="<?= security($email); ?>">
                    <label for="email"></label>
                  </td>
                </tr>
                <tr>
                  <th>ご希望の日にち</th>
                  <td>
                    <select name="year">
                      <?php security(selected(2022, 2031, $year, "年")); ?>
                    </select>

                    <select name="month">
                      <?php security(selected(1, 13, $month, "月")); ?>
                    </select>

                    <select name="day">
                      <?php security(selected(1, 32, $day, "日")); ?>
                    </select>

                  </td>
                </tr>
                <tr>
                  <th>ご希望の時間帯</th>
                  <td>
                    <select name="time">
                      <?php security(arraySelected(0, $timeArray, $time)); ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>ご自身の英語力</th>
                  <td>
                    <select name="level">
                    <?php security(arraySelected(0, $levelArray, $level)); ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>備考・入力内容</th>
                  <td>
                    <textarea name="message" placeholder="ご意見ありましたらご入力下さい"><?= security($message); ?></textarea>
                  </td>
                </tr>
              </tr>
            </table>
            <input type="submit" value="送信">
            <!-- <input type="reset" value="取消"> -->
          </form>
        </div>
      </section>
    </div>
  </main>

  <?php
  require_once('footer.php');
?>

</body>
</html>