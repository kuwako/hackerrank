<?php

// Complete the balancedForest function below.
function balancedForest($c, $edges) {
  // $c = [0, 1, 1, 2, 3];
  // $edges = [[1,2], [1,3], [1,4], [4,5]]
  // 木構造を作ってやる...?
  // 動的計画法的なやり方で枝の計算を事前にやる...?
  $tree = [];
  $tree[1][1] = $c[0];
  $edgeCnt = count($edges);
  for ($i = 0; $i < $edgeCnt; $i++) {
    $e = $edges[$i];
    $l = $e[0];
    $r = $e[1];
    $tree[$l][$r] = $c[$r - 1];
  }

  // お手上げ
  // こんな感じらしい(C#でも実行時間間に合わないらしい)
  // http://yambe2002.hatenablog.com/entry/2016/07/25/102636
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
