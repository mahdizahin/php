<?php

// 1. User Defined Functions
// Functions are reusable blocks of code that perform a specific task

// Simple function
function myMessage() {
    echo "Example 1: Hello world!";
}
myMessage(); // Output: Hello world!


// Function Arguments - Pass values into functions
function familyName($fname) {
    echo "Example 2: $fname Refsnes";
}

familyName("Jani");   // Output: Jani Refsnes
familyName("Hege");   // Output: Hege Refsnes
familyName("Stale");  // Output: Stale Refsnes


// Function with multiple arguments
function familyNameWithYear($fname, $year) {
    echo "Example 3: $fname Refsnes. Born in $year";
}

familyNameWithYear("Hege", "1975");  // Output: Hege Refsnes. Born in 1975
familyNameWithYear("Kai", "1983");   // Output: Kai Refsnes. Born in 1983


// Default Argument Values
function setHeight($minheight = 50) {
    echo "Example 4: The height is : $minheight";
}

setHeight(350); // Output: The height is : 350
setHeight();    // Output: The height is : 50
setHeight(135); // Output: The height is : 135


// Returning Values
function sum($x, $y) {
    return $x + $y;
}

echo "Example 5: 5 + 10 = " . sum(5, 10); // Output: 5 + 10 = 15
echo "Example 5: 7 + 13 = " . sum(7, 13); // Output: 7 + 13 = 20


// Passing Arguments by Reference
function add_five(&$value) {
    $value += 5;
}

$num = 2;
add_five($num);
echo "Example 6: num = $num"; // Output: num = 7


// Variable Number of Arguments (...)
// Variadic functions accept an unknown number of arguments
function sumMyNumbers(...$numbers) {
    $total = 0;
    foreach($numbers as $n) {
        $total += $n;
    }
    return $total;
}

echo "Example 7: Total = " . sumMyNumbers(5, 2, 6, 2, 7); // Output: Total = 22


// Variadic argument must be last
function myFamily($lastname, ...$firstnames) {
    foreach($firstnames as $fname) {
        echo "Example 8: Hi, $fname $lastname";
    }
}

myFamily("Doe", "Jane", "John", "Joey"); 
// Output:
// Hi, Jane Doe
// Hi, John Doe
// Hi, Joey Doe


// PHP is Loosely Typed - You don't need to declare data types in PHP
function addNumbers($a, $b) {
    return $a + $b;
}

echo "Example 9: " . addNumbers(5, "15 days"); 
// Output: 2o (PHP converts string "15 days" to integer 15)


// Strict Types in PHP 7
// Must be first line in file to enable strict mode
// declare(strict_types=1);

function addNumbersStrict(int $a, int $b) {
    return $a + $b;
}
// echo addNumbersStrict(5, "5 days"); // Throws error in strict mode


// Return Type Declarations
function addFloatNumbers(float $a, float $b) : float {
    return $a + $b;
}

echo "Example 10: " . addFloatNumbers(1.2, 5.2); // Output: 6.4


// Casting return type
function addFloatToInt(float $a, float $b) : int {
    return (int)($a + $b);
}

echo "Example 11: " . addFloatToInt(1.2, 5.2); // Output: 6


// Example with string return type
function greet(string $name) : string {
    return "Example 12: Hello, $name!";
}

echo greet("Alice"); // Output: Hello, Alice!



// 2. PHP Built-in Functions (Commonly Used)

// String functions
$str = "Hello World";

echo "Example 13: String length = " . strlen($str); // Output: 11
echo "Example 14: Uppercase = " . strtoupper($str); // Output: HELLO WORLD
echo "Example 15: Lowercase = " . strtolower($str); // Output: hello world
echo "Example 16: Replace = " . str_replace("World", "PHP", $str); // Output: Hello PHP


// Array functions
$colors = ["red", "green", "blue"];
array_push($colors, "yellow"); // Add element to end
print_r($colors); // Output: Array ( [0] => red [1] => green [2] => blue [3] => yellow )

$colors2 = ["pink", "black"];
$allColors = array_merge($colors, $colors2);
print_r($allColors); // Output merged array

// Search in array
if (in_array("blue", $allColors)) {
    echo "Example 17: Blue is in array";
}


// Math functions
echo "Example 18: Round 3.7 = " . round(3.7); // Output: 4
echo "Example 19: Absolute -5 = " . abs(-5); // Output: 5
echo "Example 20: Random number 1-100 = " . rand(1, 100);

// Date functions
echo "Example 21: Current date = " . date("Y-m-d"); // Output: current date
echo "Example 22: Current time = " . date("H:i:s"); // Output: current time


// -------------------------------
// Summary
// -------------------------------
// ✔ Functions are reusable blocks of code.
// ✔ Arguments pass information to functions.
// ✔ Default values handle missing arguments.
// ✔ Return values give results back to caller.
// ✔ Pass by reference modifies original variables.
// ✔ Variadic functions accept unknown number of arguments.
// ✔ PHP is loosely typed, but strict typing enforces types.
// ✔ Return type declarations enforce output type.
// ✔ Built-in functions simplify strings, arrays, math, dates, etc.

?>