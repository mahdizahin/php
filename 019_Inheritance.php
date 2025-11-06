<?php

// Inheritance means: a "child" class can reuse the code of a "parent" class.
// The child gets access to the parent’s public and protected properties and methods
// Reduced duplication and improve maintainability.
//
// Syntax: class Child extends Parent

//  Basic Inheritance
class Fruit {
    public $name;
    public $color;

    // Constructor automatically runs when object is created
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    // A method common to all fruits
    public function intro() {
        echo "The fruit is {$this->name} and its color is {$this->color}.\n";
    }
}

// Child class (inherits from Fruit)
class Strawberry extends Fruit {
    public function message() {
        echo "Am I a fruit or a berry?\n";
    }
}

// Create a child object
$strawberry = new Strawberry("Strawberry", "Red");

$strawberry->message();  // Works: defined in Strawberry.  Am I a fruit or a berry?
$strawberry->intro();    // Works: inherited from Fruit.  The fruit is Strawberry and its color is Red.


// Protected Access in Inheritance
// Protected means: accessible inside this class + child classes,
// But NOT accessible outside (directly by an object)
class Vehicle {
    public $brand;
    protected $speed;

    public function __construct($brand, $speed) {
        $this->brand = $brand;
        $this->speed = $speed;
    }

    protected function details() {
        echo "{$this->brand} runs at {$this->speed} km/h.\n";
    }
}

class Car extends Vehicle {
    public function showDetails() {
        echo "Vehicle Info: ";
        $this->details();  // Accessing protected method from child class → Allowed
    }
}

$tesla = new Car("Tesla", 250);
$tesla->showDetails(); // Works (calls protected method inside child)
# $tesla->details(); // ERROR: cannot call protected method directly


// Method Overriding (Child modifies Parent behavior)
// You can redefine (override) methods in the child class with the same name.
// When overridden, PHP uses the child’s version, not the parent’s.

class Animal {
    public function sound() {
        echo "Some generic animal sound.\n";
    }
}

class Dog extends Animal {
    // Overriding parent method
    public function sound() {
        echo "The dog barks: Woof! \n";
    }
}

class Cat extends Animal {
    public function sound() {
        echo "The cat meows: Meow! \n";
    }
}

$dog = new Dog();
$cat = new Cat();

$dog->sound(); // Child version runs
$cat->sound(); // Another override

/*
OUTPUT:
The dog barks: Woof! 
The cat meows: Meow!
*/


// Overriding Constructors and Adding Properties
class FruitV2 {
    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function intro() {
        echo "The fruit is {$this->name} and its color is {$this->color}.\n";
    }
}

// Child adds new property: $weight
class StrawberryV2 extends FruitV2 {
    public $weight;

    // Override constructor
    public function __construct($name, $color, $weight) {
        // Assign new + inherited properties
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    // Override method
    public function intro() {
        echo "The fruit is {$this->name}, the color is {$this->color}, ";
        echo "and it weighs {$this->weight} grams.\n";
    }
}

$berry = new StrawberryV2("Strawberry", "Red", 50);
$berry->intro();
// OUTPUT: The fruit is Strawberry, the color is Red, and it weighs 50 grams.



// The 'final' Keyword
// The 'final' keyword prevents inheritance OR method overriding.
// Final Class → Cannot be extended

final class Planet {
    public function info() {
        echo "This is a planet in the solar system.\n";
    }
}

// ❌ Error if you try:
// class Earth extends Planet {} // This will fail!


// Define a parent class named 'Bird'
class Bird {

    // Declare a final method 'fly' - this method can't be changed (overridden) by any subclass
    final public function fly() {
        echo "Birds can usually fly.\n";
    }
}

// Define a child class 'Penguin' that inherits from 'Bird'
class Penguin extends Bird {

    // ❌ If we try to redefine (override) the 'fly()' method here, it will cause an error.
    /*
    public function fly() {
        echo "Penguins cannot fly!";  // ❌ This would cause a Fatal Error
    }
    */

    // Define a new method 'info' unique to the 'Penguin' class
    public function info() {
        echo "Penguins are flightless birds.\n";
    }
}

// Create an object (instance) of the 'Penguin' class
$penguin = new Penguin();

// Call the inherited 'fly()' method from the 'Bird' class
// Child classes can still use the final method, just not modify it.
// Output: Birds can usually fly.
$penguin->fly();  

// Call the 'info()' method defined inside the 'Penguin' class
// Output: Penguins are flightless birds.
$penguin->info(); 



// Inheritance allows code reuse → child inherits from parent.
// 'extends' keyword → defines parent-child link.
// 'protected' → available in child, not outside.
// Method Overriding → Child can override parent’s methods to customize behavior.
// 'final' → prevents either inheritance (for class) or overriding (for method).
// Public & Protected → accessible in child. Private → not.

// Real-life analogy:
// - Parent class = Blueprint (Vehicle)
// - Child class = Specialized version (Car, Bike)

?>