<?php

require 'src/Cart.php';
require 'src/Product.php';
require 'src/Cart/Delivery.php';
require 'src/Cart/Item.php';
require 'src/Cart/SpecialOffer.php';
require 'src/Cart/SpecialOffer/SecondRedWidgetAtHalfPrice.php';


// Case #1 B01, G01 $37.85

$cart1 = new Cart();
$cart1->add('B01');
$cart1->add('G01');
echo '1st case: ' . (($cart1->total() === '$37.85') ? 'passed' : 'failed') . "\r\n";

// Case #2 R01, R01 $54.37

$cart2 = new Cart();
$cart2->add('R01');
$cart2->add('R01');
echo '2nd case: ' . (($cart2->total() === '$54.37') ? 'passed' : 'failed') . "\r\n";

// Case #3 R01, G01 $60.85

$cart3 = new Cart();
$cart3->add('R01');
$cart3->add('G01');
echo '3rd case: ' . (($cart3->total() === '$60.85') ? 'passed' : 'failed') . "\r\n";

// Case #4 B01, B01, R01, R01, R01 $98.27

$cart4 = new Cart();
$cart4->add('B01');
$cart4->add('B01');
$cart4->add('R01');
$cart4->add('R01');
$cart4->add('R01');
echo '4rd case: ' . (($cart4->total() === '$98.27') ? 'passed' : 'failed') . "\r\n";
