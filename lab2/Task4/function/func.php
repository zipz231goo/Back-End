<?php
function fnSin($x) {
  return sin($x);
}

function fnCos($x) {
  return cos($x);
}

function fnTg($x) {
  return tan($x);
}

function fnMyTg($x) {
  if ($x == 0) {
    return "undefined";
  }
  return tan($x);
}

function power($x, $y) {
  return pow($x, $y);
}

function factorial($x) {
  if ($x < 0) {
    return "Error: Negative number";
  }
  $result = 1;
  for ($i = 1; $i <= $x; $i++) {
    $result *= $i;
  }
  return $result;
}
?>