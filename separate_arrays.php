<?php

// Complete the matchingStrings function below.
function matchingStrings($strings, $queries) {
  $ret = [];
  $st = array_count_values($strings);

  foreach ($queries as $value) {
    if (array_key_exists($value, $st)) {
      $ret[] = $st[$value];
    } else {
      $ret[] = 0;
    }
  }

  return $ret;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $strings_count);

$strings = array();

for ($i = 0; $i < $strings_count; $i++) {
    $strings_item = '';
    fscanf($stdin, "%[^\n]", $strings_item);
    $strings[] = $strings_item;
}

fscanf($stdin, "%d\n", $queries_count);

$queries = array();

for ($i = 0; $i < $queries_count; $i++) {
    $queries_item = '';
    fscanf($stdin, "%[^\n]", $queries_item);
    $queries[] = $queries_item;
}

$res = matchingStrings($strings, $queries);

fwrite($fptr, implode("\n", $res) . "\n");

fclose($stdin);
fclose($fptr);
