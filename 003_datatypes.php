<?php

$intx = 4001;
var_dump( $intx );
echo"<br>";

$floatx = .56;
var_dump( $floatx );
echo"<br>";

$stringx="Chudling pong";
var_dump( $stringx );
echo"<br>";

$boolx = true;
var_dump( $boolx );

$cars = array("Volvo", "BMW", "Toyota");
var_dump($cars);

echo"<br>";


//Object - are instances of classes
class Car {
    public $color;
    public $model;

    // Constructor sets initial properties
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }

    // Method to display car info
    public function message() {
        return "My car is a " . $this->color . " " . $this->model;
    }
}
$myCar = new Car("red", "Volvo"); // Create object
var_dump($myCar);

echo $myCar->message() . "<br>";  // Output: My car is a red Volvo

echo"\n";

// NULL - Represents a variable with no value
$nullVar = null;
var_dump($nullVar); // Output: NULL

// Resource - Special type for external resources like database connections
#$conn = mysqli_connect("localhost", "root", "", "testdb");
#$var_dump($conn); // Output: resource(3) of type (mysqli) or object (mysqli) depending on PHP version
#mysqli_close($conn); // Close resource when done


// Changing Data Types (Casting)
// PHP allows explicit type conversion (casting) between types.
// Common casts: (int), (float), (string), (bool), (array), (object), (unset)

// -------------------------------
// 1️⃣ Cast Float → Integer
// -------------------------------
$x = 23465.768;              // A float number
$int_cast = (int)$x;         // Convert float to integer (drops decimal part)
echo "Casting float 23465.768 → int: $int_cast<br>";  // Output: 23465

// -------------------------------
// 2️⃣ Cast String → Integer
// -------------------------------
$y = "23465.768";            // A numeric string
$int_cast2 = (int)$y;        // Converts string to integer (ignores decimal)
echo "Casting string '23465.768' → int: $int_cast2<br>";  // Output: 23465

// -------------------------------
// 3️⃣ Cast Integer → String
// -------------------------------
$z = (string)12345;          // Converts integer to string
var_dump($z);                // Output: string(5) "12345"

// -------------------------------
// 4️⃣ Other Casting Examples
// -------------------------------
$a = (float)"12.5";          // String → Float
$b = (bool)0;                // 0 → false
$c = (array)5;               // Integer → Array
$d = (object)"Hello";        // String → Object

var_dump($a, $b, $c, $d);    // Displays resulting types and values

// -------------------------------
// 5️⃣ Casting Demonstration (Step-by-Step)
// -------------------------------
$x = 5;                      // Integer
var_dump($x);                // Output: int(5)

$x = (string)$x;             // Cast integer → string
var_dump($x);                // Output: string(1) "5"

// ✅ Summary:
// Casting changes the variable’s data type explicitly.
// PHP auto-converts types loosely, but explicit casting improves control and clarity.


?>
