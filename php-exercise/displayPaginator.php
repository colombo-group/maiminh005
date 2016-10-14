<style type="text/css">
  a:link,span {
    float:left;
  }
</style>

<?php
$digit = array();
$a = 201;
$b = 2;
$c = 5;
$limit = $c;

$result = false;
$j = 1;
//calculate old number
for ($i = 0; $i < $a; $i++) {
  if ($i % $b == 0) {
    $j++;
    $digit[$j] = ($i);
  } else {
    $result = true;
  }
} //end for

$totalPage = ceil(count($digit) / $c);
//get current page
if (isset($_GET['page'])) {
  $getPage = intval($_GET['page']);
  if (is_numeric($getPage) && $getPage >= 1 && $getPage <= $totalPage) {
    if ($getPage >= 1 || $getPage <= $totalPage) {
      $page = $getPage;
    } else {
      header("location:/php-exercise/displayPaginator.php?page=1");
    }
  } else {
    header("location:/php-exercise/displayPaginator.php?page=1");
  }
} else {
  $page = 1;
  $getPage = 1;
}

$start = ($page * $limit) - $limit;
$end = ($page * $limit) + 1;
if ($end > (count($digit) + 1)) {
  while ($end > (count($digit) + 1)) {
    $end--;
  }
}
if ($start < 0) {
  while ($start < 0) {
    $start++;
  }
}
for ($j = $start + 2; $j <= $end; $j++) {
  echo $digit[$j] . ' ';
}
//show the navigation button
//**** show level 1 ****/
if ($result == true) {
  $next = $page + 1;
  if ($next >= $totalPage) {
    $next = $totalPage - 1;
  }
  $prev = $page - 1;
  if ($prev < 1) {
    $prev = 1;
  }


  echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . $prev . '"> Prev </a></div>';
  echo '<span>--</span>';
  echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . ($next + 1) . '"> Next </a></div>';
  echo '<br>';
}

//**** show level 2 ****/
if ($result == true) {
//  $next = $page + 1;
//  $prev = $page - 1;
  echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . $prev . '">Prev</a></div>';
  //hidden space if total page more than 8
  if ($totalPage > 8) {
    echo '<div><a href= "/php-exercise/displayPaginator.php?page=1">[1]</a></div>';
    if (($getPage - 3) > 1) {
      $counterStart = $getPage - 2;
      $dotStart = '<span>...</span>';
    } else {
      $counterStart = 2;
    }
    if ($getPage + 3 < $totalPage) {
      $counterEnd = $getPage + 1;
      $dotEnd = '<span>...</span>';
    } else {
      $counterEnd = $totalPage - 2;
    }
    //show navigation button shorter
    if (isset($dotStart)) {
      echo $dotStart;
    }
    //show number button 
    for ($i = $counterStart; $i <= $counterEnd + 1; $i++) {
      echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . ($i) . '">[' . $i . ']</a></div>';
    }
    if (isset($dotEnd)) {
      echo $dotEnd;
    }
    //show button less than $totalPage is 1 unit
    echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . ($totalPage) . '">[' . ($totalPage) . ']</a></div>';
  } else {
    for ($i = 1; $i <= $totalPage; $i++) {
      echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . $i . '">[' . $i . ']</a></div>';
    }
  }
}
echo '<div><a href= "/php-exercise/displayPaginator.php?page=' . ($next + 1) . '">Next</a></div>';
?>

