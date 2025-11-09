<?php

/*
"Polymorphism" comes from Greek:
  - "Poly" = many
  - "Morph" = forms
So, it literally means "many forms".

Polymorphism allows:
The same function or method name to behave differently based on the object that calls it.
Allows different classes to define the same method name, but behave differently when that method is called.

Polymorphism is mainly achieved through:
   1. Inheritance + Method Overriding
   2. Interfaces (same method signatures, different behaviors)
   3. Abstract classes

Think of it like: many employees (different roles) but same action "work()".
It helps you write flexible, scalable, and reusable code.
*/


// Method Overriding (Runtime Polymorphism)
class Animal {
    public function sound() {
        echo "Some generic animal sound.\n";
    }
}

class Dog extends Animal {
    public function sound() {
        echo "Dog barks: Woof!";
    }
}

class Cat extends Animal {
    public function sound() {
        echo "Cat meows: Meow!";
    }
}

class Cow extends Animal {
    public function sound() {
        echo "Cow moos: Moo!";
    }
}

// Using polymorphism: same method name, different behavior
// All objects share the same interface (Sound), but each performs it differently.
$animals = [new Dog(), new Cat(), new Cow()];

foreach ($animals as $animal) {
    $animal->sound(); // PHP automatically calls the correct version
}

/*
Expected Output:
Dog barks: Woof! 
Cat meows: Meow! 
Cow moos: Moo! 
*/

/*
Explanation:
- All subclasses inherit from Animal.
- Each overrides Sound() to provide specific behavior.
- The same method call ($animal->Sound()) gives different outputs.
- We can treat all objects as "Animal" type, yet each acts differently.
- This makes code flexible, reusable, and easy to extend.

If you add "Lion" or "Duck", you don’t need to change existing code.

Imagine you press the same button labeled “Start”:
- On a TV → it turns on the display.
- On a Washing Machine → it starts washing.
- On a Computer → it boots up.

Same action → Different behavior.
That’s polymorphism.

*/


// Polymorphism with Interfaces
// An interface defines a contract — a set of methods
// that classes must implement, but each class defines its own behavior.
// Polymorphism allows one interface to represent multiple behaviors.

/*
Example Summary:

interface Shape {
    public function area();
}

class Circle implements Shape {
    public function area() { echo "Circle area"; }
}

class Square implements Shape {
    public function area() { echo "Square area"; }
}

$shapes = [new Circle(), new Square()];
foreach($shapes as $shape) {
    $shape->area(); // Same method, different outputs
}

*/


// Another Example: Payment Methods
interface PaymentMethod {
    public function pay($amount);
}

class PayPal implements PaymentMethod {
    public function pay($amount) {
        echo "Paying \${$amount} via PayPal";
    }
}

class CreditCard implements PaymentMethod {
    public function pay($amount) {
        echo "Paying \${$amount} using Credit Card";
    }
}

class Bitcoin implements PaymentMethod {
    public function pay($amount) {
        echo "Paying \${$amount} with Bitcoin";
    }
}

// Same method call 'pay()', different behavior
$payments = [new PayPal(), new CreditCard(), new Bitcoin()];

foreach ($payments as $method) {
    $method->pay(100);
}

/*
Output:
Paying $100 via PayPal.
Paying $100 using Credit Card.
Paying $100 with Bitcoin.
*/



// Real-Life Example: Polymorphism in a Banking System
abstract class Account {
    abstract public function calculateInterest($balance);
}

class SavingsAccount extends Account {
    public function calculateInterest($balance) {
        return $balance * 0.04; // 4% interest
    }
}

class CurrentAccount extends Account {
    public function calculateInterest($balance) {
        return $balance * 0.01; // 1% interest
    }
}

class FixedDepositAccount extends Account {
    public function calculateInterest($balance) {
        return $balance * 0.07; // 7% interest
    }
}

$accounts = [
    new SavingsAccount(),
    new CurrentAccount(),
    new FixedDepositAccount()
];

$balance = 10000;

foreach ($accounts as $acc) {
    echo "Interest: " . $acc->calculateInterest($balance) . "tk";
}

/*
Output:
Interest: 400 tk
Interest: 100 tk
Interest: 700 tk
*/



// Polymorphism with Abstract Classes
abstract class Shape {
    abstract public function area(): float;
    abstract public function describe(): string;
}

class Circle extends Shape {
    private float $radius;
    public function __construct(float $r) {
        $this->radius = $r;
    }
    public function area(): float {
        return pi() * $this->radius * $this->radius;
    }
    public function describe(): string {
        return "I am a Circle with radius {$this->radius}";
    }
}

class Rectangle extends Shape {
    private float $width;
    private float $height;
    public function __construct(float $w, float $h) {
        $this->width = $w;
        $this->height = $h;
    }
    public function area(): float {
        return $this->width * $this->height;
    }
    public function describe(): string {
        return "I am a Rectangle of {$this->width}x{$this->height}";
    }
}

// Using polymorphism
$shapes = [new Circle(3), new Rectangle(4, 5)];

foreach ($shapes as $shape) {
    echo $shape->describe() . " | Area = " . $shape->area();
}

/*
Expected Output:
I am a Circle with radius 3 | Area = 28.274333882308
I am a Rectangle of 4x5 | Area = 20
*/


// Real-Life Analogy: Employees (Different Roles)
interface Employee {
    public function work(): string;
}

class Developer implements Employee {
    public function work(): string {
        return "Writing code";
    }
}

class Designer implements Employee {
    public function work(): string {
        return "Designing UI/UX";
    }
}

class Manager implements Employee {
    public function work(): string {
        return "Managing project";
    }
}

// Same interface, many forms of work()
$team = [new Developer(), new Designer(), new Manager()];

foreach ($team as $member) {
    echo $member->work();
}

/*
Expected Output:
Writing code 
Designing UI/UX 
Managing project 
*/


// Static vs Dynamic Polymorphism (Concept Only)

/*
- Static Polymorphism (compile-time) → achieved via Method Overloading (NOT natively in PHP)
- Dynamic Polymorphism (runtime) → achieved via Method Overriding (SUPPORTED in PHP)

PHP only supports runtime polymorphism directly.
*/

?>