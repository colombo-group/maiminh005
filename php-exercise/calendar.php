<!DOCTYPE html>
<html>
  <head>
    <title>Calendar</title>
    <meta charset="UTF-8">
    <meta name="viewport" $content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <?php
    $content = "";
    $count = 1;
    $nShortName = Array('Sun', 'M', 'Tu', 'W', 'Th', 'F', 'Sat');
    $dEndDayOfMonth = Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    //initialize date time
    $getTime = getdate(date("U"));
    //calculate white-space
    $startSpace = $getTime['mday'];
    while ($startSpace > 7) {
      $startSpace -= 7;
    }
    $startSpace = $getTime['wday'] - $startSpace + 1;
    if ($startSpace < 0) {
      $startSpace += 7;
    }

    $content .= '<table border = 1 align="center"><tr><th colspan=7 >' . $getTime['month'] . '</th></tr>';
    $content .= '<tr><th colspan=7>' . $getTime['weekday'] . ' ' . $getTime['year'] . '</th></tr>';
    $content .= '<tr>';
    for ($n = 0; $n < count($nShortName); $n++) {
      $content .= '<td>' . $nShortName[$n] . '</td>';
    }
    $content .= '</tr>';
    $content .= '<tr>';
    for ($j = 0; $j < $startSpace; $j++) {
      $content .= '<td></td>';
    }
    while ($count <= $dEndDayOfMonth[$getTime['mon'] - 1]) {
      for ($t = $startSpace; $t < 7; $t++) {
        if ($count === $getTime['mday']) {
          $content .= '<td style="color:red;font-weight:bold;">' . $count . '</td>';
        } else if ($count <= $dEndDayOfMonth[$getTime['mon'] - 1]) {
          $content .= '<td>' . $count . '</td>';
        } else {
          $content .= '<td></td>';
        }
        $count++;
      }
      $content .= '<tr></tr>';

      $startSpace = 0;
    }

    $content .= '</tr>';
    $content .= '</table>';
    ?>


    <div id="show">
<?php echo $content; ?>
    </div>
  </body>
</html>
