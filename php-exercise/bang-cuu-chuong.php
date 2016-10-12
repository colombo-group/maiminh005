
<?php
$content = '';
$content .= "<table border=1 cellpadding=3px cellspacing=3px>";
$content .= "<tr>";
for ($i = 1; $i <= 10; $i++) {
  $content .= "<td>";
  for ($j = 1; $j <= 10; $j++) {
    $content .= $i . " * " . $j . " = " . ($i * $j) . '<br>';
  }
  $content .= "</td>";
  if ($i == 5) {
    $content .= '</tr><tr>';
  }
}
$content .= "</tr></table>";
echo $content;
?>
