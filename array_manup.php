<?php

// Complete the arrayManipulation function below.
function arrayManipulation($n, $queries) {
  $res = array_fill(0, $n, 0);

  foreach($queries as $q) {
    $k = $q[2];
    $res[$q[0] - 1] += $k;
    $res[$q[1]] -= $k;
  }
  $max = $res[0];

  for ($i = 1; $i < $n; $i++) {
    $res[$i] += $res[$i - 1];
    if ($max < $res[$i]) {
      $max = $res[$i];
    }
  }

  // このロジックでいけないなら多分phpじゃ無理...
  return $max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nm_temp);
$nm = explode(' ', $nm_temp);

$n = intval($nm[0]);

$m = intval($nm[1]);

$queries == array();

for ($i = 0; $i < $m; $i++) {
    fscanf($stdin, "%[^\n]", $queries_temp);
    $queries[] = array_map('intval', preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = arrayManipulation($n, $queries);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
