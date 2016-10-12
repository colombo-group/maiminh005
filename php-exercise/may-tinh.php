<!DOCTYPE html>
<html>
  <head>
    <title>Máy tính</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      input[type='text'] {
        width:50px;
      }
      div {
        text-align:center;
      }
    </style>
  </head>

  <body>
    <?php

    function getVars() {
      $num1 = htmlspecialchars($_POST['num1']);
      $num2 = htmlspecialchars($_POST['num2']);
      $a = array($num1, $num2);
      if (!is_numeric($num1) || !is_numeric($num2)) {
        echo '<h2 align="center">Your input is wrong or not number! </h2>';
        return false;
      }
      return true;
    }

    if (isset($_POST['add'])) {
      if (getVars()) {
        $res = $_POST['num1'] + $_POST['num2'];
      }
    } else if (isset($_POST['subtract'])) {
      if (getVars()) {
        $res = $_POST['num1'] - $_POST['num2'];
      }
    }
     else if (isset($_POST['multi'])) {
      if (getVars()) {
        $res = $_POST['num1'] * $_POST['num2'];
      }
    }
     else if (isset($_POST['div'])) {
      if (getVars()) {
        $res = $_POST['num1'] / $_POST['num2'];
      }
    }
     else if (isset($_POST['exp'])) {
      if (getVars()) {
        $res = pow($_POST['num1'], $_POST['num2']);
      }
    }
    ?>

    <div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
        <input type="text" name="num1" value="<?php echo isset($_POST['num1']) ? ($_POST['num1']) : ''; ?>"/>
        <input type="submit" value="+" name="add"/>
        <input type="submit" value="-" name="subtract"/>
        <input type="submit" value="*" name="multi"/>
        <input type="submit" value="/" name="div"/>
        <input type="submit" value="^" name="exp"/>
        <input type="text" name="num2" value="<?php echo isset($_POST['num2']) ? ($_POST['num2']) : ''; ?>"/>
        <span>=</span>
        <input type="text" name="result" value="<?php echo isset($res) ? ($res) : ''; ?>"/>
      </form>
    </div>
  </body>
</html>
