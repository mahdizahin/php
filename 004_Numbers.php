<?php


// Integers - are whole numbers (no decimals)
$x = 100;
var_dump($x); // int(100)

// Integers can be positive or negative
$y = -50;
var_dump($y); // int(-50)

// Integers in different number systems
$decimal = 123;     // Decimal (base 10)
$hex = 0x1A;        // Hexadecimal (base 16)
$octal = 0123;      // Octal (base 8)
$binary = 0b1010;   // Binary (base 2)

echo "Decimal: $decimal, Hex: $hex, Octal: $octal, Binary: $binary<br>";

// Checking integer type
$check = 5985;
echo "Is integer? " . (is_int($check) ? "Yes" : "No") . "<br>";
#যদি condition true হয় → ? এর পরের প্রথম value রিটার্ন করে
#যদি condition false হয় → : এর পরের দ্বিতীয় value রিটার্ন করে

// Predefined integer constants
echo "PHP_INT_MAX: " . PHP_INT_MAX . "<br>";
echo "PHP_INT_MIN: " . PHP_INT_MIN . "<br>";
echo "PHP_INT_SIZE (bytes): " . PHP_INT_SIZE . "<br>";

// Floats - are numbers with decimals or in exponential form
$a = 10.365;
$b = 2.5e3; // 2.5 × 10³ = 2500
$c = 7.64E-5; // 7.64 × 10⁻⁵

var_dump($a, $b, $c);
// Checking float type
echo "Is float? " . (is_float($a) ? "Yes" : "No") . "<br>";

// Float constants
echo "PHP_FLOAT_MAX: " . PHP_FLOAT_MAX . "<br>";
echo "PHP_FLOAT_MIN: " . PHP_FLOAT_MIN . "<br>";
echo "PHP_FLOAT_DIG: " . PHP_FLOAT_DIG . "<br>";
echo "PHP_FLOAT_EPSILON: " . PHP_FLOAT_EPSILON . "<br>";
// Infinity and NaN
// Infinity - value beyond float range
$inf = 1.9e411; // too large → INF
var_dump($inf);

echo "Is infinite? " . (is_infinite($inf) ? "Yes" : "No") . "<br>";
// Finite check
$num = 1000;
echo "Is finite? " . (is_finite($num) ? "Yes" : "No") . "<br>";
// NaN (Not a Number) - result of invalid math
$nan = acos(8); // cosine inverse of 8 is undefined cos⁻¹(x) | -1 to 1
var_dump($nan);
echo "Is NaN? " . (is_nan($nan) ? "Yes" : "No") . "<br>";

// Number Strings - are strings that represent numbers
$numStr1 = "59.85";
$numStr2 = "Hello";

echo "Is numeric? " . (is_numeric($numStr1) ? "Yes" : "No") . "<br>"; // Yes
echo "Is numeric? " . (is_numeric($numStr2) ? "Yes" : "No") . "<br>"; // No

// Constants - hold fixed values that can’t be changed
define("PI_VALUE", 3.1416);
echo "Value of constant PI_VALUE: " . PI_VALUE . "<br>";

// Using const keyword (must be in global scope)
const MYCAR = "Volvo";
echo "My Car: " . MYCAR . "<br>";

// Array constant (PHP 7+)
define("CARS", ["BMW", "Toyota", "Volvo"]);
echo "First car in array constant: " . CARS[0] . "<br>";

// Constants are global by default
define("GREETING", "Welcome to PHP!");
function sayHello() {
  echo GREETING . "<br>"; // Accessible inside function
}
sayHello();

// PHP Math Functions

// pi()
echo "Value of PI: " . pi() . "<br>";

// min() and max()
echo "Min: " . min(0, 150, 30, 20, -8, -200) . "<br>";
echo "Max: " . max(0, 150, 30, 20, -8, -200) . "<br>";

// abs() – absolute value
echo "Absolute of -6.7: " . abs(-6.7) . "<br>";

// sqrt() – square root
echo "Square root of 64: " . sqrt(64) . "<br>";

// round() – rounds float to nearest integer
echo "Round of 0.60: " . round(num:0.60) . "<br>";
echo "Round of 0.49: " . round(num:0.49) . "<br>";

// Random number
echo "Random number (0–100): " . rand(0, 100) . "<br>";
?>