<?php

require './APPDataParser.php';

$array = [
  ['ИВАНОВ ИВАН ИВАНОВИЧ', '12:00-16:00', '12:00-16:00', '12:00-16:00', '', '12:00-16:00', '12:00-16:00', ''],
  ['ИВАНОВ ИВАН ИВАНОВИЧ', '08:00-16:00', '08:00-11:00', '08:00-10:00', '12:00-16:00', '', '', ''],
  ['ПЕТРОВ ПЕТР ПЕТРОВИЧ', '12:00-16:00', '', '12:00-16:00', '', '12:00-16:00', '', ''],
  ['ПЕТРОВ ПЕТР ПЕТРОВИЧ', '12:00-16:00', '', '12:00-16:00', '', '12:00-16:00', '', ''],
  ['ПЕТРОВ ПЕТР ПЕТРОВИЧ', '12:00-16:00', '', '12:00-16:00', '', '12:00-16:00', '', ''],
  ['ПЕТРОВ ПЕТР ПЕТРОВИЧ', '12:00-16:00', '', '12:00-16:00', '', '12:00-16:00', '', '12:00-16:00'],
];

$dataParser = new APPDataParser();

var_dump($dataParser->normalizeGrafic($array));

?>