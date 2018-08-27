<?php

// Complete the balancedForest function below.
function balancedForest($c, $edges) {

  var_dump($c);
  var_dump($edges);

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $c_temp);

    $c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

    $edges == array();

    for ($i = 0; $i < ($n - 1); $i++) {
        fscanf($stdin, "%[^\n]", $edges_temp);
        $edges[] = array_map('intval', preg_split('/ /', $edges_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $result = balancedForest($c, $edges);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
