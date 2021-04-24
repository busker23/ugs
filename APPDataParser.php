<?php

class APPDataParser {

  public function normalizeGrafic(array $arr): array
  {
    $result = [];
    $currentItem = [];

    foreach ($arr as $key => $value) {
      if (empty($currentItem)) {
        $currentItem[] = $value;
        continue;
      }

      if ($currentItem[$key - 1][0] === $value[0]) {
        $currentItem[$key] = $this->splitArrays($currentItem[$key - 1], $value);
        unset($currentItem[$key-1]);
        continue;
      }
      $currentItem[$key] = $value;
    }

    return array_merge($result, $currentItem);
  }

  private function splitArrays(array $first, array $second): array
  {
    $returnArray[0] = $first[0];
    $arrayCount = count($first) > count($second) ? count($first) : count($second);

    for ($i = 1; $i  < $arrayCount; $i++) {
      if (empty($first[$i])) {
        $returnArray[$i] = $second[$i];
      } elseif (empty($second[$i])) {
        $returnArray[$i] = $first[$i];
      }
       else {
        $returnArray[$i] = $this->getSortedTime($first[$i], $second[$i]);
      }
    }

    return $returnArray;
  }

  private function getSortedTime(string $time1, string $time2): string
  {
    $timeArray = array_unique(array_merge(explode('-', $time1), explode('-', $time2)));
    $timeResult = '';

    usort($timeArray, function($a, $b) {
        $first = strtotime(date('Y-m-d') ." ". $a);
        $second = strtotime(date('Y-m-d') ." ". $b);
        if ($first == $second) {
          return 0;
        }
        return ($first < $second) ? -1 : 1;
      });

    switch (count($timeArray)) {
      case 2:
        $timeResult = implode('-', $timeArray);
        break;
      case 3:
        $timeResult = sprintf("%s-%s", $timeArray[0], $timeArray[2]);
        break;
      case 4:
        $timeResult = sprintf("%s-%s,%s-%s", $timeArray[0], $timeArray[1], $timeArray[2], $timeArray[3]);
        break;
    }

    return $timeResult;
  }
}

?>
