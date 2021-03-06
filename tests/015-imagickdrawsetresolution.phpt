--TEST--
Test ImagickDraw->setResolution
--SKIPIF--
<?php require_once(dirname(__FILE__) . '/skipif.inc'); 
?>
--FILE--
<?php

$im = new Imagick();
$im->newImage(1000,1000, "white","png");

$draw = new ImagickDraw();
$draw->setFont (dirname (__FILE__) . '/anonymous_pro_minus.ttf');
$draw->setFontSize(72);

$draw->setResolution(10, 10);
$small = $im->queryFontMetrics($draw, "Hello World");

$draw->setResolution(300, 300);
$large = $im->queryFontMetrics($draw, "Hello World");

var_dump($small['textWidth'] < $large['textWidth']);

echo "OK\n";

?>
--EXPECT--
bool(true)
OK
