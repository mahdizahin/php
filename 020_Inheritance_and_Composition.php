<?php
/*
Composition vs Inheritance
When designing classes, you can connect them in two main ways:

Inheritance ("is-a" relationship) — one class extends another.
   Example: A Dog **is an** Animal.

Composition ("has-a" relationship) — one class uses another.
   Example: A Car **has an** Engine.

Choosing the right one makes your code more flexible, modular, and reusable.
*/


// PART 1: INHERITANCE ("is-a" Relationship)

class Animal {
    public function makeSound() {
        echo "Some generic animal sound...\n";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof! Woof!\n";
    }
}

$dog = new Dog();
$dog->makeSound();

/*
Explanation:
- Dog extends Animal → it **is an** Animal.
- Dog inherits the behavior of Animal but can override it.
Use Inheritance when:
   - One class is a specialized version of another.
   - Example: Dog is a specific type of Animal.
*/


// PART 2: COMPOSITION ("has-a" Relationship)

class Engine {
    public function start() {
        echo "Engine started...\n";
    }

    public function stop() {
        echo "Engine stopped.\n";
    }
}

class Car {
    // Car "has" an Engine → Composition
    private $engine;

    // Injecting the Engine object through the constructor
    public function __construct(Engine $engine) {
        $this->engine = $engine;
    }

    public function startCar() {
        echo "Starting the car...\n";
        $this->engine->start();
    }

    public function stopCar() {
        echo "Stopping the car...\n";
        $this->engine->stop();
    }
}

$engine = new Engine();
$car = new Car($engine);
$car->startCar();
$car->stopCar();

/*
Explanation:
- Car doesn’t “inherit” Engine; it “uses” it.
- Car delegates the start/stop work to the Engine object.
Use Composition when:
   - You want to build complex behavior by combining smaller parts.
   - Example: A Car has an Engine, not “is” an Engine.
*/



// Real-Life Analogy — Inheritance Example

class Employee {
    public function work() {
        echo "Employee working on assigned tasks.\n";
    }
}

class Manager extends Employee {
    public function work() {
        echo "Manager managing team and projects.\n";
    }
}

$manager = new Manager();
$manager->work();

/*
Inheritance here makes sense:
Manager "is an" Employee — it just has a more specific role.
*/


// Composition Example
class Keyboard {
    public function input() {
        echo "Typing on keyboard...\n";
    }
}

class Monitor {
    public function display() {
        echo "Showing visuals on screen...\n";
    }
}

class Computer {
    private $keyboard;
    private $monitor;

    public function __construct(Keyboard $keyboard, Monitor $monitor) {
        $this->keyboard = $keyboard;
        $this->monitor = $monitor;
    }

    public function operate() {
        $this->keyboard->input();
        $this->monitor->display();
        echo "Computer is operating smoothly.\n";
    }
}

$keyboard = new Keyboard();
$monitor = new Monitor();
$computer = new Computer($keyboard, $monitor);
$computer->operate();

/*
Composition here makes sense:
A Computer "has a" Keyboard and "has a" Monitor.
If we replace the keyboard or monitor later, the Computer still works.
This makes it more flexible and modular.
*/


/*
| Feature                | Inheritance (is-a)                   | Composition (has-a)                      |
|------------------------|--------------------------------------|-----------------------------------------|
| Relationship Type       | Parent → Child                      | Object contains other objects           |
| Example                 | Dog is an Animal                    | Car has an Engine                       |
| Code Reuse              | Through inheritance (extends)       | Through delegation (uses another class) |
| Flexibility             | Rigid — tightly coupled             | Flexible — loosely coupled              |
| Change Impact           | Changes in parent affect all children | Easier to change without side effects |
| When to Use             | When one class is a specialized type | When one class uses another’s behavior  |
*/


// Final Example — Mix Both Together

// Base class
class Vehicle {
    public function move() {
        echo "Vehicle is moving...\n";
    }
}

// Reusable component
class GPS {
    public function navigate() {
        echo "Navigating to destination...\n";
    }
}

// Car extends Vehicle (inheritance) but also HAS GPS (composition)
class SmartCar extends Vehicle {
    private $gps;

    public function __construct(GPS $gps) {
        $this->gps = $gps;
    }

    public function drive() {
        $this->move();       // from Vehicle (inherited)
        $this->gps->navigate(); // from GPS (composed)
        echo "Driving with smart navigation!\n";
    }
}

$gps = new GPS();
$smartCar = new SmartCar($gps);
$smartCar->drive();

/*
Output:
Vehicle is moving...
Navigating to destination...
Driving with smart navigation!

Explanation:
SmartCar shows **best practice** — combine both inheritance (for core structure)
and composition (for modular features).
*/


/*
INHERITANCE:
   - "is-a" relationship
   - Good for hierarchical specialization (e.g., Dog → Animal)
   - Tends to be rigid and tightly coupled

COMPOSITION:
   - "has-a" relationship
   - Builds larger systems by combining smaller components
   - More flexible and easier to maintain

Best Practice:
   → Prefer COMPOSITION for flexibility and testability.
   → Use INHERITANCE only when the child truly "is a" type of the parent.
*/
?>