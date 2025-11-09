<?php

/*
 Abstraction means "show only essential details and hide the complex logic."
 - An abstract class defines "what" should be done but not always "how".
 - Child classes must implement the abstract methods the parent declares.

 Interface: a pure contract. It specifies method signatures that a class must implement.
 Interfaces contain no implementation (only method signatures).

 In PHP, abstraction is implemented using: Abstract Classes and Abstract Methods

✔ Abstract class cannot be instantiated directly.
   Example: $a = new Animal(); ❌ (Error)

✔ Abstract class may contain:
   - Abstract methods (no body)
   - Normal methods (with body)
   - Properties

✔ Any class extending an abstract class MUST implement all abstract methods.

✔ Abstract classes are used when multiple
   related classes share the same structure
   but have different implementations.

Why it matters (real-world view):
- Simplifies large systems by separating **interface from implementation**.
- Makes code flexible: developers can change internal logic without breaking the code that depends on it.
- Encourages consistency across related classes.
*/


// Abstract Class and Method
abstract class Animal {
    // Abstract method → must be defined by child classes
    abstract public function makeSound();

    // Regular method → shared among all child classes
    public function sleep() {
        echo "Sleeping...";
    }
}

// Child classes must implement the abstract method
class Dog extends Animal {
    public function makeSound() {
        echo "Dog barks: Woof Woof!";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Cat meows: Meow!";
    }
}

// Create objects
$dog = new Dog();
$cat = new Cat();

$dog->makeSound();
$dog->sleep();

$cat->makeSound();
$cat->sleep();

/*
Output:
Dog barks: Woof Woof!
Sleeping...
Cat meows: Meow!
Sleeping...
*/


abstract class Vehicle {
    protected $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    abstract public function accelerate();

    public function start() {
        echo "{$this->brand} engine started!";
    }
}

class Car extends Vehicle {
    public function accelerate() {
        echo "{$this->brand} car accelerates to 100 km/h";
    }
}

class Bike extends Vehicle {
    public function accelerate() {
        echo "{$this->brand} bike speeds up to 80 km/h";
    }
}

$vehicles = [
    new Car("Tesla"),
    new Bike("Yamaha")
];

foreach ($vehicles as $v) {
    $v->start();
    $v->accelerate();
}

/*
Output:
Tesla engine started!
Tesla car accelerates to 100 km/h 
Yamaha engine started!
Yamaha bike speeds up to 80 km/h 
*/


// Abstract Class 
abstract class Shape {
    // An abstract method: no body, child must implement it
    abstract public function area(): float;

    // Another abstract method
    abstract public function perimeter(): float;

    // A concrete method (regular method with implementation)
    // This can be used by all child classes without redefinition.
    public function describe(): string {
        return "I am a shape.";
    }
}

// Child #1 — Circle implements the abstract methods
class Circle extends Shape {
    private float $radius;

    public function __construct(float $radius) {
        $this->radius = $radius;
    }

    // Implement area()
    public function area(): float {
        return pi() * $this->radius * $this->radius;
    }

    // Implement perimeter()
    public function perimeter(): float {
        return 2 * pi() * $this->radius;
    }

    // You may add extra methods specific to Circle
    public function getRadius(): float {
        return $this->radius;
    }
}

// Child #2 — Rectangle implements the abstract methods
class Rectangle extends Shape {
    private float $width;
    private float $height;

    public function __construct(float $width, float $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(): float {
        return $this->width * $this->height;
    }

    public function perimeter(): float {
        return 2 * ($this->width + $this->height);
    }
}


// Use the classes
$circle = new Circle(3);
$rect = new Rectangle(4, 5);

echo "Circle area: " . $circle->area();    
echo "Circle perimeter: " . $circle->perimeter();
echo "Rectangle area: " . $rect->area();
echo "Rectangle perimeter: " . $rect->perimeter();

/*
Expected Output:
Circle area: 28.274333882308
Circle perimeter: 18.849555921539
Rectangle area: 20
Rectangle perimeter: 18
*/


// - A non-abstract child class MUST implement ALL abstract methods declared by its abstract ancestor.
// - Abstract methods may declare argument/return types; child methods must be compatible (same required args; may add optional args).
// - Visibility: an abstract method declared as protected cannot be made
//   more restrictive in the child (cannot become private), but can be public (less restrictive).


//  Abstract Method with arguments + optional child args 
abstract class Greeter {
    // Parent defines required parameter $name
    abstract public function greet(string $name): string;
}

class SimpleGreeter extends Greeter {
    // Child implements greet; may add optional parameters
    public function greet(string $name, string $suffix = "!"): string {
        return "Hello, {$name}{$suffix}";
    }
}

$g = new SimpleGreeter();
echo $g->greet("Alice");         // Hello, Alice!
echo $g->greet("Bob", "!!!");    // Hello, Bob!!!

/*
Expected Output:
Hello, Alice!
Hello, Bob!!!
*/



// Real-Life Example: Payment System
/*
Imagine an e-commerce website.
There are different payment options (Credit Card, PayPal, Bkash),
but the rest of the system only needs to know that each payment
method has a function called "pay()".

This is the power of abstraction — we define a rule (abstract class)
that all payment methods must follow, but each can have its own logic.
*/

abstract class PaymentGateway {
    abstract public function pay($amount);

    public function generateInvoice($amount) {
        echo "Invoice generated for amount: $$amount";
    }
}

class CreditCardPayment extends PaymentGateway {
    public function pay($amount) {
        echo "Processing Credit Card payment of $$amount...";
    }
}

class PayPalPayment extends PaymentGateway {
    public function pay($amount) {
        echo "Processing PayPal payment of $$amount...";
    }
}

class BkashPayment extends PaymentGateway {
    public function pay($amount) {
        echo "Processing Bkash payment of $$amount...";
    }
}

// Create multiple payment methods
$payments = [
    new CreditCardPayment(),
    new PayPalPayment(),
    new BkashPayment()
];

foreach ($payments as $p){
    $p->pay(1000);
    $p->generateInvoice(1000);
}

/*
Output:
Processing Credit Card payment of $1000...
Invoice generated for amount: $1000
Processing PayPal payment of $1000...
Invoice generated for amount: $1000
Processing Bkash payment of $1000...
Invoice generated for amount: $1000
*/



// Interfaces declare method signatures without implementations.
// All methods are implicitly public.

interface Animal {
    public function makeSound(): string;
    public function move(): string;
}

// Implement interface
class Dog implements Animal {
    public function makeSound(): string {
        return "Woof!";
    }
    public function move(): string {
        return "Run";
    }
}

class Cat implements Animal {
    public function makeSound(): string {
        return "Meow";
    }
    public function move(): string {
        return "Prowl";
    }
}

// Use polymorphically
$animals = [new Dog(), new Cat()];
foreach ($animals as $animal) {
    // We can call interface methods without caring about concrete class
    echo $animal->makeSound() . " - " . $animal->move();
}

/*
Expected Output:
Woof! - Run
Meow - Prowl
*/


// Interface vs Abstract Class — differences & guidelines
/*
- Interfaces can only declare method signatures (no properties, no implemented methods).
  (Since PHP 8.1 interfaces CAN have constants; and from earlier PHP versions 
   interfaces may have methods with implementations via "private" constants? 
   But keep to the classic: interfaces = method contracts.)

- Abstract classes can include implemented methods and properties.
- A class can implement multiple interfaces, but can EXTEND only one class.
- Use an abstract class when you want to share code (common implementation).
- Use an interface when you only need a contract (multiple, unrelated classes can implement it).
*/


// Multiple Interfaces example (Payment gateways)
interface PaymentGateway {
    public function pay(float $amount): bool;
}

interface Refundable {
    public function refund(string $txId): bool;
}

// A class can implement multiple interfaces
class Stripe implements PaymentGateway, Refundable {
    public function pay(float $amount): bool {
        echo "Stripe: processing payment of {$amount}\n";
        return true;
    }
    public function refund(string $txId): bool {
        echo "Stripe: refunding transaction {$txId}\n";
        return true;
    }
}

class Cash implements PaymentGateway {
    public function pay(float $amount): bool {
        echo "Cash: received {$amount}\n";
        return true;
    }
    // Cash does not implement Refundable
}

$stripe = new Stripe();
$stripe->pay(29.99);
$stripe->refund("TX_12345");

$cash = new Cash();
$cash->pay(10.00);

/*
Expected Output:
Stripe: processing payment of 29.99
Stripe: refunding transaction TX_12345
Cash: received 10
*/


// Interface constants & hints 
// Interfaces can include constants. Classes implementing the interface
// inherit those constants via the interface, but cannot override them.

interface Statused {
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function getStatus(): int;
}

class User implements Statused {
    private int $status;
    public function __construct(int $status = Statused::STATUS_ACTIVE) {
        $this->status = $status;
    }
    public function getStatus(): int {
        return $this->status;
    }
}

$user = new User();
echo "User status: " . $user->getStatus(); // 1

/*
Expected Output:
User status: 1
*/


// Combining Abstract Class + Interface
// You can make an abstract class implement an interface and leave
// some methods abstract for children to implement.

interface JsonSerializableCustom {
    public function toJson(): string;
}

abstract class Model implements JsonSerializableCustom {
    protected array $attributes = [];

    // a concrete helper method usable by subclasses
    public function setAttribute(string $key, $value): void {
        $this->attributes[$key] = $value;
    }

    // leave serialization to child classes (still required by interface)
    abstract public function toJson(): string;
}

class UserModel extends Model {
    public function __construct(string $name, int $age) {
        $this->attributes['name'] = $name;
        $this->attributes['age'] = $age;
    }

    public function toJson(): string {
        return json_encode($this->attributes);
    }
}

$u = new UserModel("Alice", 30);
echo $u->toJson() . PHP_EOL;

/*
Expected Output:
{"name":"Alice","age":30}
*/

// Common Errors & Pitfalls (short list)
/*
- Trying to instantiate an abstract class:
    $s = new Shape(); // Fatal error

- Forgetting to implement all interface methods:
    class Bad implements Animal { } // Fatal error: Class must implement method makeSound()

- Changing visibility incorrectly:
    // If abstract method is protected in parent, child cannot make it private.

- Method signature mismatch:
    // Child must accept the required args of the abstract/interface method.
*/


// When to use what? Practical guidance
/*
- Use interfaces when you need multiple unrelated classes to follow the same contract
  (e.g., PaymentGateway, Logger, CacheInterface).

- Use abstract classes when:
  - You want to provide a common base with shared code and some required methods.
  - You want to force child classes to implement specific functionality, but also
    provide default helper methods or stored properties.

- Use both together when you need both a contract and reusable base behavior.

Real-world analogy:
Think of an ATM machine:
- You know *what* it does (withdraw, check balance)
- You don’t see *how* it talks to the bank’s server.
That’s abstraction!

 Small checklist for writing robust abstractions & interfaces
- Keep interface methods small and focused.
- Prefer interfaces for API boundaries (decouple implementations).
- Avoid adding too much implementation to abstract classes if you want full flexibility.
- Document the expected behavior (what each method must do), not only the signature.
*/
?>