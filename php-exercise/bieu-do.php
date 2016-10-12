
<!DOCTYPE html>
<html>
  <head>
    <title>Charts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      .table {
        margin:0 auto;
        text-align: center;
      }

    </style>
  </head>
  <body>

    <div id="all" >
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >
      <table class="table">

        <tr>
          <td>Anh</td>
          <td><input type="text" name="anh"/></td>
        </tr>
        <tr>
          <td>Phap</td>
          <td><input type="text" name="phap"/></td>
        </tr>
        <tr>
          <td>Duc</td>
          <td><input type="text" name="duc"/></td>
        </tr>
        <tr>
          <td>Nga</td>
          <td><input type="text" name="nga"/></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" value="Ve do thi" name="submit" /></button>
          <td></td>
        </tr>
      </table>
      </form>

    </div>
    
    <?php

      $myArray = Array();
      $myArray[0] = "Anh";
      $myArray[1] = "Phap";
      $myArray[2] = "Duc";
      $myArray[3] = "Nga";
      $id = Array('anhC', 'phapC', 'ducC', 'ngaC');
      
        
        //show the charts
        if(isset($_POST['submit'])) {
          $anh = htmlspecialchars($_POST['anh']);
        $phap = htmlspecialchars($_POST['phap']);
        $duc = htmlspecialchars($_POST['duc']);
        $nga = htmlspecialchars($_POST['nga']);
        $content = '';
        $country = Array($anh, $phap, $duc, $nga);
        for($i = 0;$i< count($country); $i++) {
          if(!is_numeric($country[$i])) {
            echo '<h2 align="center">Your input is wrong or have to fill in the field fully! </h2>';
            exit;
          }
        }
          $content .= '<table border="1px" class="table">';
          for ($i = 0; $i < count($myArray); $i++) {
            $content .= '<tr><td>'.$myArray[$i].'</td>';
            $content .= '<td><div style="width:'.$country[$i].'px;background-color:red;height:20px;">'.$country[$i].'%</div></td></tr>';
          }
          $content .= '</table>';
          echo $content;
        }
        
        
      
    ?>
  </body>
</html>


