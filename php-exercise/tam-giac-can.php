<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>tam giac can</title>

    <style type="text/css">
      div {
        text-align: center;
      }		
    </style>
  </head>
  <body>
    <div>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
        <input type="text" name ="input">
        <input type="submit" name="submit" value="ve tam giac"/>
      </form>
      <?php
      if (isset($_POST['submit'])) {
        $input = htmlspecialchars($_POST['input']);
        $content = '';
        for ($i = 1; $i <= $input; $i++) {
          for ($j = $i; $j > ($i / 2); $j--) {
            $content .= $j % 10 . " ";
          }
          if ($i % 2 !== 0) {
            $j+=2;
          } else {
            $j++;
          }
          while ($j <= $i) {
            $content .= $j % 10 . " ";
            $j++;
          }
          $content .="<br>";
        }
        echo $content;
      }
      ?>

    </div>
  </body>
</html>