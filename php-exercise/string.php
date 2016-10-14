<div >
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Nhập 1 kí tự muốn thực hiện
    <input type="text" name="character" />
    <input type="submit" value="Hien thi" name="submit"/>
  </form>
</div>


<?php
if (isset($_POST['submit'])) {

  //change your text that you want
  $string = 'once upon a time, in other world, human is friendly!';

  $character = htmlspecialchars($_POST['character']);
  if (strlen($character) != 1) {
    echo 'you cant fill this field more than 1 character, try again';
    exit;
  }
//convert string to array
  $arrayString = explode(' ', $string);
//array has 'a' character
  $saveString = array();
  $boldString = array();
  $boldAll = array();
  $count = 0;
  $bold = '';
  $countBold = 0;
  for ($i = 0; $i < count($arrayString); $i++) {

    for ($j = 1; $j <= ($inChar = strlen($arrayString[$i])); $j++) {
      $a = str_split($arrayString[$i]);
      for ($k = 0; $k < count($a); $k++) {
        if ($a[$k] == $character) {
          $saveString[$count] = $arrayString[$i];
          $bold .= '<strong>' . $a[$k] . '</strong>';
          $countBold = $i;
        } else {
          $bold .= $a[$k];
        }
        $boldString[$count] = $bold;
      }
      $bold = '';
    }
    $count++;
    if ($countBold != 0) {
      $boldAll[$i] = '<strong>' . $arrayString[$i] . '</strong>';
    } else {
      $boldAll[$i] = $arrayString[$i];
    }
    $countBold = 0;
  }
  $newIndex = array_merge($saveString);
//$newBoldString = array_merge($boldString);

  if (empty($saveString)) {
    echo 'No character is finded!';
  } else {
    echo 'Các chữ có chứa kí tự ' . $character . ' là :<br />';
    for ($i = 0; $i < count($newIndex); $i++) {
      echo $i . ' => ' . $newIndex[$i] . '<br />';
    }
    echo '<br>Văn bản chứa các kí tự' . $character . ' in đậm là:<br />';
    echo implode(' ', $boldString) . '<br />';


    echo '<br />Văn bản b với các từ có ký tự ' . $character . ' được bôi đậm :<br />';
    echo implode(' ', $boldAll) . '<br />';
  }
}