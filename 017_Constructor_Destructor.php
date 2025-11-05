<?php
/*

A constructor is a special method (__construct) that runs
automatically whenever a new object is created.

It’s used to:
  Initialize properties (set default values)
  Simplify object creation (no need to call set_ methods)
  Improve code readability

A destructor (__destruct) runs automatically when:
  - The object is destroyed, OR
  - The script execution ends

It’s often used to:
   Close connections
   Free up resources
   Display end-of-object messages (for learning/demo)
*/

// Basic Constructor
class Fruit {
    public $name;
    public $color;

    // Constructor automatically runs when object is created
    function __construct($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }
}

// Creating object — constructor runs immediately
$apple = new Fruit("Apple");
echo "Fruit Name: " . $apple->get_name();  // Output: Fruit Name: Apple

/*
Explanation:
- __construct($name) runs automatically.
- No need to call a separate set_name() method.
*/


// Constructor with Multiple Parameters
class ColoredFruit {
    public $name;
    public $color;

    // Initialize both name and color
    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    function get_name() {
        return $this->name;
    }

    function get_color() {
        return $this->color;
    }

    function display_info() {
        echo "Fruit: {$this->name}, Color: {$this->color}<br>";
    }
}

// Create objects with different values
$apple = new ColoredFruit("Apple", "Red");
$banana = new ColoredFruit("Banana", "Yellow");
$mango = new ColoredFruit("Mango", "Green");

$apple->display_info();
$banana->display_info();
$mango->display_info();

/*
Output:
Fruit: Apple, Color: Red
Fruit: Banana, Color: Yellow
Fruit: Mango, Color: Green
*/


// Default Constructor Values
// You can also provide default values to avoid errors when arguments are not passed.

class Vehicle {
    public $brand;
    public $color;

    function __construct($brand = "Unknown", $color = "Unspecified") {
        $this->brand = $brand;
        $this->color = $color;
    }

    function show_info() {
        echo "Brand: {$this->brand}, Color: {$this->color}";
    }
}

$car1 = new Vehicle("Tesla", "Black");
$car2 = new Vehicle("Toyota");         // Missing color → uses default
$car3 = new Vehicle();                 // Uses both defaults

$car1->show_info();
$car2->show_info();
$car3->show_info();

/*
Output:
Brand: Tesla, Color: Black
Brand: Toyota, Color: Unspecified
Brand: Unknown, Color: Unspecified
*/


// Using __destruct()
// The destructor automatically runs when the object is destroyed or when the script ends.
class FruitDestructor {
    public $name;
    public $color;

    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
        echo "Fruit Created: {$this->name} ({$this->color})<br>";
    }

    function __destruct() {
        echo "Fruit Destroyed: {$this->name} ({$this->color})<br>";
    }
}

$grape = new FruitDestructor("Grape", "Purple");
unset($grape); // manually trigger destructor

// Destructor will also run automatically at script end
class FruitDestructor1 {
    public $name;
    public $color;

    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
        echo "Constructed: {$this->name} ({$this->color})";
    }

    function __destruct() {
        echo "Destructing: The fruit is {$this->name} and the color is {$this->color}.<br>";
    }
}

$apple = new FruitDestructor1("Apple", "Red");
$banana = new FruitDestructor1("Banana", "Yellow");
/*
Expected Output (order may vary):
Constructed: Apple (Red)
Constructed: Banana (Yellow)
Destructing: The fruit is Apple and the color is Red.
Destructing: The fruit is Banana and the color is Yellow.
*/


// Practical Real-Life Example
// Simulating a Database Connection example

class DatabaseConnection {
    private $connection;

    // Constructor — automatically connects to DB
    function __construct() {
        $this->connection = "Connected to Database";
        echo $this->connection;
    }

    // Destructor — closes DB connection automatically
    function __destruct() {
        echo "Database Connection Closed";
    }
}

$db = new DatabaseConnection(); // Automatically connects & closes

/*
Output:
Connected to Database 
Database Connection Closed 
*/


// Array of Objects & Looping
class FruitInfo {
    public $name;
    public $color;
    public $weight;

    function __construct($name, $color, $weight) {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    function show_info() {
        echo "Name: $this->name, Color: $this->color, Weight: $this->weight g<br>";
    }
}

// Creating multiple objects in an array
$fruits = [
    new FruitInfo('Apple','Red',150),
    new FruitInfo('Banana','Yellow',120),
    new FruitInfo('Mango','Green',200)
];

// Loop through objects
foreach($fruits as $f) {
    $f->show_info();
}


// Real-Life Analogy: Bank Account
class BankAccount {
    private $balance;

    function __construct($initial_balance = 0) {
        $this->balance = $initial_balance;
    }

    function deposit($amount) {
        if($amount > 0) $this->balance += $amount;
    }

    function withdraw($amount) {
        if($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        } else {
            echo "Invalid withdrawal!<br>";
        }
    }

    function get_balance() {
        return $this->balance;
    }
}

$account = new BankAccount(500);
$account->deposit(200);
$account->withdraw(100);
echo "Current Balance: " . $account->get_balance();

// 🔸 __construct()
//    - Runs automatically when object is created
//    - Used to set up properties or initial setup
//
// 🔸 __destruct()
//    - Runs automatically at script end or when object destroyed
//    - Used for cleanup or closing connections
//
// 🔸 Advantages:
//      Cleaner, shorter code (no manual setters needed)
//      Automatic initialization and cleanup
//
// -----------------------------------------------------------
// Example Summary:
//
// class Fruit {
//   public $name;
//   function __construct($name) {
//       $this->name = $name;
//   }
//   function __destruct() {
//       echo "The fruit is {$this->name}.";
//   }
// }
//
// $apple = new Fruit("Apple");
// -----------------------------------------------------------

?>