<?php

// Arithmetic Operators
$x = 10;
$y = 3;

echo "Addition: " . ($x + $y);        // 13
echo "Subtraction: " . ($x - $y);     // 7
echo "Multiplication: " . ($x * $y);  // 30
echo "Division: " . ($x / $y);        // 3.3333
echo "Modulus: " . ($x % $y);         // 1
echo "Exponentiation: " . ($x ** $y); // 1000


// Assignment Operators
$x = 10;
$x += 5;  // 15
echo "\nAfter += 5: $x\n";
$x -= 3;  // 12
echo "After -= 3: $x\n";
$x *= 2;  // 24
echo "After *= 2: $x\n";
$x /= 4;  // 6
echo "After /= 4: $x\n";
$x %= 4;  // 2
echo "After %= 4: $x\n";


// Comparison Operators
$a = 5;
$b = "5";

echo "Equal (==): " . var_export($a == $b, true);     // true
echo "Identical (===): " . var_export($a === $b, true); // false
echo "Not equal (!=): " . var_export($a != $b, true); // false
echo "Greater than (>): " . var_export($a > 3, true); // true
echo "Less than (<): " . var_export($a < 3, true);    // false
echo "Spaceship (<=>): " . ($a <=> $b);               // 0


// Increment / Decrement
$x = 5;
echo "Pre-increment (++x): " . (++$x); // 6
echo "Post-increment (x++): " . ($x++); // 6
echo "After post-increment: $x"; // 7
echo "Pre-decrement (--x): " . (--$x); // 6
echo "Post-decrement (x--): " . ($x--); // 6
echo "After post-decrement: $x"; // 5


// Logical Operators
$a = true;
$b = false;

echo "AND (&&): " . var_export($a && $b, true); // false
echo "OR (||): " . var_export($a || $b, true);  // true
echo "NOT (!a): " . var_export(!$a, true);      // false
echo "XOR (xor): " . var_export($a xor $b, true); // true


// String Operators
$txt1 = "Hello";
$txt2 = "World";

echo "Concatenation (.): " . ($txt1 . " " . $txt2); // Hello World
$txt1 .= " PHP";
echo "After .= : $txt1"; // Hello PHP


// Array Operators
$x = array("a" => "red", "b" => "green");
$y = array("c" => "blue", "d" => "yellow");

print_r($x + $y); // Union
var_dump($x == $y);  // false
var_dump($x === $y); // false


// Conditional Assignment Operators
$age = 20;
$msg = ($age >= 18) ? "Adult" : "Minor";
echo "Ternary result: $msg";  // Adult

$user = null;
$name = $user ?? "Guest";
echo "Null coalescing result: $name"; // Guest
// if $user exists and is not null; since it’s null, it returns "Guest"

?>