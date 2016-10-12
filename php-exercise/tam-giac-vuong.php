<div class="change">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
    <input type="text" name="text" />
    <input type="submit" name="submit" value="ve tam giac"/>
  </form>
</div>
<?php
if (isset($_POST['submit'])) {
  $text = htmlspecialchars($_POST['text']);
  if ($text >= 100 || !is_numeric($text)) {
    echo '<h2 align="center">Your input is wrong or not number! </h2>';
    exit;
  }
  for ($i = 1; $i <= $text; $i++) {
    for ($j = $i; $j > 0; $j--) {
      echo ($j % 10) . ' ';
    }
    echo("<br>");
  }
}
?>







