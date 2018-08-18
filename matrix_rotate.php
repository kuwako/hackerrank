<?php

// Complete the matrixRotation function below.
function matrixRotation($matrix, $m, $n, $r) {
  // 配列を真っ直ぐにする
  $lineList = array();
  $min = min([$m, $n]);
  for ($i = 0; $i < $min / 2; $i++) {
    $lineList[] = line($matrix, $m, $n, $i);
  }

  $orderdList = array();
  foreach ($lineList as $line) {
    $orderdList[] = order($line, $r);
  }

  $res = array();
  for ($j = 0; $j < count($orderdList); $j++) {
    $res = fit($res, $orderdList[$j], $m, $n, $j);
  }

  foreach ($res as $key => $value) {
    ksort($value);
    $text = implode(' ', $value);

    echo $text . PHP_EOL;
  }
}

function fit(array $res, array $order, $row, $col, $num)
{
  $i = 0;
  for ($a = 0; $a < $col - $num * 2; $a++) {
    $res[$num][$a + $num] = $order[$i];
    $i++;
  }

  for ($b = 1; $b < $row - $num * 2; $b++) {
    $res[$b + $num][$col - 1 - $num] = $order[$i];
    $i++;
  }

  for ($c = 1; $c < $col - $num * 2; $c++) {
    $res[$row - 1 - $num][$col - 1 - $num - $c] = $order[$i];
    $i++;
  }
  // 上
  for ($d = 1; $d < $row - $num * 2 - 1; $d++) {
    $res[$row - 1 - $num - $d][$num] = $order[$i];
    $i++;
  }

  return $res;
}

function order($line, $r) {
  // num分ずらす
  $num = $r % count($line);
  $before = array_slice($line, 0, $num);
  $after = array_slice($line, $num);

  return array_merge($after, $before);
}

function line($arr, $row, $col, $num)
{
  $res = [];
  // 右
  for ($a = 0; $a < $col - $num * 2; $a++) {
    $res[] = $arr[$num][$a + $num];
  }
  // 下
  for ($b = 1; $b < $row - $num * 2; $b++) {
    $res[] = $arr[$b + $num][$col - 1 - $num];
  }
  // 左
  for ($c = 1; $c < $col - $num * 2; $c++) {
    $res[] = $arr[$row - 1 - $num][$col - 1 - $num - $c];
  }
  // 上
  for ($d = 1; $d < $row - $num * 2; $d++) {
    $res[] = $arr[$row - 1 - $num - $d][$num];
  }

  array_pop($res);
  return $res;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $mnr_temp);
$mnr = explode(' ', $mnr_temp);

$m = intval($mnr[0]);

$n = intval($mnr[1]);

$r = intval($mnr[2]);

$matrix == array();

for ($i = 0; $i < $m; $i++) {
    fscanf($stdin, "%[^\n]", $matrix_temp);
    $matrix[] = array_map('intval', preg_split('/ /', $matrix_temp, -1, PREG_SPLIT_NO_EMPTY));
}

matrixRotation($matrix, $m, $n, $r);

fclose($stdin);
