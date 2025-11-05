<?php
/*

OOP (Object-Oriented Programming) is a way of structuring code
using objects — each object contains both:
   ➤ Properties (data)
   ➤ Methods (functions that act on the data)

Benefits:
- DRY Principle: Don’t Repeat Yourself
- Cleaner and organized code
- Easier to maintain, extend, and scale
- Promotes reusability
- Encapsulation: protects data integrity

*/

// Creating a Basic Class
class Fruit {
    // Properties — store data
    public $name;
    public $color;

    // Methods — define behavior

    // Setter for name
    function set_name($name) {
        $this->name = $name; // '$this' refers to the current object
    }

    // Getter for name
    function get_name() {
        return $this->name;
    }
}

/*
Explanation:
- 'class Fruit' defines a blueprint.
- 'public $name' is a property.
- 'set_name()' and 'get_name()' are methods.
- '$this->name' accesses the object's own property.
*/


// Creating Objects from the Class
$apple = new Fruit();    // Create an object named $apple
$banana = new Fruit();   // Create another object named $banana

$apple->set_name('Apple');     // Set name for apple
$banana->set_name('Banana');   // Set name for banana

echo "Fruit 1: " . $apple->get_name();  // Output: Apple
echo "Fruit 2: " . $banana->get_name(); // Output: Banana


/*
Explanation:
- 'new Fruit()' creates an object (instance) from the class.
- '->' operator is used to access object methods/properties.
*/


// Adding More Properties and Methods
class ExtendedFruit {
    public $name;
    public $color;

    // Set both name and color
    function set_details($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    // Get name
    function get_name() {
        return $this->name;
    }

    // Get color
    function get_color() {
        return $this->color;
    }

    // Display details
    function display() {
        echo "Fruit: {$this->name}, Color: {$this->color}";
    }
}

// Create multiple fruits
$apple = new ExtendedFruit();
$banana = new ExtendedFruit();
$mango = new ExtendedFruit();

$apple->set_details('Apple', 'Red');
$banana->set_details('Banana', 'Yellow');
$mango->set_details('Mango', 'Green');

// Display details
$apple->display();
$banana->display();
$mango->display();

/*
Output:
Fruit: Apple, Color: Red
Fruit: Banana, Color: Yellow
Fruit: Mango, Color: Green
*/


// DRY (Don’t Repeat Yourself) Principle
// Instead of repeating similar code for each fruit, we define
// one reusable class that handles all fruits. This is the
// essence of OOP — code reuse and maintainability.

class FruitInfo {
    public $name;
    public $color;
    public $weight;

    function set_info($name, $color, $weight) {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    function show_info() {
        echo "Name: $this->name, Color: $this->color, Weight: $this->weight g<br>";
    }
}

$apple = new FruitInfo();
$banana = new FruitInfo();

$apple->set_info('Apple', 'Red', 150);
$banana->set_info('Banana', 'Yellow', 120);

$apple->show_info();
$banana->show_info();

/*
Output:
Name: Apple, Color: Red, Weight: 150 g
Name: Banana, Color: Yellow, Weight: 120 g
*/


// Constructor Example
class FruitWithConstructor {
    public $name;
    public $color;

    // Constructor automatically sets properties on object creation
    function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    function display() {
        echo "Fruit: $this->name, Color: $this->color<br>";
    }
}

$apple = new FruitWithConstructor('Apple', 'Red');
$banana = new FruitWithConstructor('Banana', 'Yellow');
$apple->display();
$banana->display();


// ==========================================================
// Class   → Template or blueprint for creating objects.
// Object  → Instance of a class.
// Property → Variable inside a class.
// Method  → Function inside a class.
// $this   → Refers to the current object.
// new     → Keyword to create an object.
// ->      → Used to access object properties or methods.
//
// -----------------------------------------------------------
// Example Summary:
//
// class Fruit {
//   public $name;
//   function set_name($name) {
//       $this->name = $name;
//   }
// }
//
// $apple = new Fruit();
// $apple->set_name('Apple');
// echo $apple->name; // Apple
// -----------------------------------------------------------

?>