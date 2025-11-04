<?php

// What is an Array?
// An array is a variable that can hold multiple values under a single name.
// Indexed arrays use numeric keys, associative arrays use named keys.

// Indexed Arrays
$cars = ["Volvo", "BMW", "Toyota"]; // Modern shorthand
var_dump($cars); 
// Output: array(3) { [0]=> string(5) "Volvo" [1]=> string(3) "BMW" [2]=> string(6) "Toyota" }

echo"<br>";

// Access elements
echo $cars[0]; // Volvo
echo $cars[2]; // Toyota

echo"<br>";
// Update elements
$cars[1] = "Ford"; // Change BMW to Ford

// Add new elements
$cars[] = "Honda"; // Add at the end

// Remove elements
unset($cars[0]); // Remove first element (does not reindex)

// Loop through array
foreach ($cars as $car) {
    echo $car . " ";
}
// Output: Ford Toyota Honda


// Associative Arrays
$car = [
    "brand" => "Ford",
    "model" => "Mustang",
    "year"  => 1964
];

// Access elements
echo $car["model"]; // Mustang

// Update elements
$car["year"] = 2024;

// Add elements
$car["color"] = "Red";

// Remove elements
unset($car["brand"]);

// Loop through associative array
foreach ($car as $key => $value) {
    echo "$key: $value ";
}
// Output: model: Mustang year: 2024 color: Red
echo"<br>";echo"<br>";

// Multidimensional Array (Basic 2D)
$cars2D = [
    ["Volvo", 22, 18],
    ["BMW", 15, 13],
    ["Saab", 5, 2]
];

// Access elements
echo $cars2D[0][0]; // Volvo
echo $cars2D[1][2]; // 13

echo"<br>";
// Nested loops
for ($i=0; $i < count($cars2D); $i++) {
    for ($j=0; $j < count($cars2D[$i]); $j++) {
        echo $cars2D[$i][$j] . " ";
    }
    echo"<br>";
}


// Functions as Array Elements
function greet() {
    echo "Hello!";
}
$myArr = ["greetFunction" => "greet"];
$myArr["greetFunction"](); // Hello!


// Modern Features
// Array destructuring
$arr = [1,2,3];
[$a,$b,$c] = $arr;
echo $a; // 1

// Strict array_search
$arr = [1, '1', 2];
$key = array_search(1, $arr, true);
var_dump($key); // 0

?>