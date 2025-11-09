<?php

/*
Problem:
PHP supports single inheritance (a class can inherit from only one parent).
But what if we need functionality from multiple classes?

Solution: Traits
Traits let us reuse code (methods & properties) across unrelated classes,
allowing a “multiple inheritance”–like behavior.
*/

/*
A Trait is a reusable block of code that can be inserted into any class.
Think of it like a plug-in that gives extra abilities to a class.

Syntax:
    trait TraitName {
        // methods and properties
    }

    class ClassName {
        use TraitName;
    }
*/


// Example 1: Basic Trait Usage
trait Greeting {
    public function sayHello() {
        echo "Hello! Welcome.";
    }
}

class Person {
    use Greeting; // Plugging in the Greeting trait
}

$person = new Person();
$person->sayHello();

// The `Greeting` trait adds the `sayHello()` method into the `Person` class.
// No need to duplicate this method in multiple classes.



// Example 2: Using MULTIPLE Traits in One Class
trait Goodbye {
    public function sayGoodbye() {
        echo "Goodbye! See you soon.";
    }
}

trait Thanks {
    public function sayThanks() {
        echo "Thanks for visiting!";
    }
}

class Guest {
    use Greeting, Goodbye, Thanks; // Multiple traits at once
}

$guest = new Guest();
$guest->sayHello();
$guest->sayThanks();
$guest->sayGoodbye();

/*
Output:
Hello! Welcome.
Thanks for visiting!
Goodbye! See you soon.
*/


// Example 3: Traits with Class Inheritance
class Human {
    public function eat() {
        echo "Eating food...";
    }
}

trait Walk {
    public function walk() {
        echo "Walking on two legs...";
    }
}

class Man extends Human {
    use Walk; // Inherits + adds trait behavior
}

$man = new Man();
$man->eat();   // From parent class
$man->walk();  // From trait



// Example 4: Trait CONFLICT Resolution
trait TraitA {
    public function message() {
        echo "Message from TraitA";
    }
}

trait TraitB {
    public function message() {
        echo "Message from TraitB";
    }
}

class MyClass {
    use TraitA, TraitB {
        TraitA::message insteadof TraitB;   // Use TraitA’s version
        TraitB::message as alternateMsg;    // Alias TraitB’s version
    }
}

$obj = new MyClass();
$obj->message();       // Output: Message from TraitA
$obj->alternateMsg();  // Output: Message from TraitB

/*
- Both traits have the same method (`message()`).
- `insteadof` → tells PHP which one to prioritize.
- `as` → renames the other method, so both can be used.
*/


// Example 5: Traits with Properties & Abstract Methods
trait Logger {
    public $logPrefix = "[LOG] ";

    public function log($msg) {
        echo $this->logPrefix . $msg;
    }

    abstract public function getSource(); // Must be implemented by the class
}

class FileLogger {
    use Logger;

    public function getSource() {
        return "File System";
    }

    public function saveLog($msg) {
        $this->log("Saving log from " . $this->getSource() . ": " . $msg);
    }
}

$logger = new FileLogger();
$logger->saveLog("Backup completed.");

/*
Output:
[LOG] Saving log from File System: Backup completed.
*/


// Example 6: Real-Life Analogy — Traits as Skill Sets
trait Cook {
    public function cookFood() {
        echo "Cooking delicious meals";
    }
}

trait Drive {
    public function driveCar() {
        echo "Driving safely";
    }
}

trait Code {
    public function writeCode() {
        echo "Writing clean PHP code";
    }
}

// Different professions reuse traits (skills)
class Chef {
    use Cook;
}

class Driver {
    use Drive;
}

class SoftwareEngineer {
    use Code, Drive; // Multi-skill combination
}

$chef = new Chef();
$driver = new Driver();
$dev = new SoftwareEngineer();

$chef->cookFood();
$driver->driveCar();
$dev->writeCode();
$dev->driveCar();

/*
Analogy:
Traits = reusable skill sets that can be shared across many roles (classes).


Purpose:
   → Share reusable methods across multiple classes.

Syntax:
   trait TraitName { ... }
   class ClassName { use TraitName; }

Key Features:
   - A class can use multiple traits.
   - Traits can contain properties & abstract methods.
   - Conflicts are resolved via `insteadof` and `as`.
   - Traits can also include other traits.

Best Practices:
   - Use traits for small, focused reusable behaviors (e.g., logging, validation).
   - Avoid stuffing too much logic into one trait.
   - Prefer class inheritance for core structure; use traits for optional abilities.
*/
?>