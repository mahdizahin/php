<?php
/*

In PHP OOP, "access modifiers" control **who can access** class properties and methods.

There are 3 main types:
public    → can be accessed from anywhere (default)
protected → can be accessed only inside the class or from subclasses (child classes)
private   → can only be accessed inside the class where it is declared

*/

// Basic Access Modifiers
class Fruit {
    public $name;       // Can be accessed anywhere
    protected $color;   // Can be accessed in this class or inherited classes
    private $weight;    // Can be accessed only in this class

    public function setValues($name, $color, $weight) {
        $this->name = $name;     // OK (public)
        $this->color = $color;   // OK (protected)
        $this->weight = $weight; // OK (private)
    }

    public function getInfo() {
        return "Fruit: {$this->name}, Color: {$this->color}, Weight: {$this->weight}g";
    }
}

$mango = new Fruit();
$mango->name = "Mango";  // Works (public)
$mango->setValues("Mango", "Yellow", 300);
echo $mango->getInfo();  // Works fine

// The following lines will throw errors if uncommented:
// $mango->color = "Green";   ❌ ERROR – protected
// $mango->weight = 500;      ❌ ERROR – private


// Protected vs Private in Inheritance
// Protected members are accessible to child classes, but private members are NOT.

class Vehicle {
    public $brand;
    protected $speed;
    private $engineNo;

    // Public method to set values for all 3 properties
    public function setDetails($brand, $speed, $engineNo) {
        // All accessible here since we’re inside the same class
        $this->brand = $brand;
        $this->speed = $speed;
        $this->engineNo = $engineNo;
    }

    public function showBasic() {
        // Both $brand (public) and $speed (protected) can be accessed here
        return "Brand: {$this->brand}, Speed: {$this->speed} km/h";
    }
}

class Car extends Vehicle {
    public function showAll() {
        // ❌ $this->engineNo is NOT accessible here because it is private in parent
        // ✅ $this->brand (public) and $this->speed (protected) are accessible here
        return "This {$this->brand} runs at {$this->speed} km/h."; // Works (protected)
    }
}

$tesla = new Car(); // Creates an object of Car, which inherits everything from Vehicle
$tesla->setDetails("Tesla", 250, "E1234"); // ✅ Works: public method accessible everywhere
echo "\n" . $tesla->showBasic(); // ✅ Works: returns "Brand: Tesla, Speed: 250 km/h"
echo "\n" . $tesla->showAll();   // ✅ Works: returns "This Tesla runs at 250 km/h."


// Encapsulation & Data Validation
class FruitWithValidation {
    private $weight; // private property, cannot be accessed directly

    public function set_weight($weight) {
        if($weight > 0) {
            $this->weight = $weight;
        } else {
            echo "Invalid weight! Must be positive";
        }
    }

    public function get_weight() {
        return $this->weight;
    }
}

$fruit = new FruitWithValidation();
$fruit->set_weight(150);
echo "Weight: " . $fruit->get_weight() . " g<br>";
$fruit->set_weight(-50); // triggers validation


/*
 Real-Life Analogy
Imagine a BankAccount class:
- The "account number" should be private (nobody can change it directly).
- The "balance" is protected (can be accessed by subclasses like SavingsAccount).
- The "owner name" is public (can be displayed easily).
*/

class BankAccount {
    public $owner;
    protected $balance;
    private $accountNumber;

    public function __construct($owner, $balance, $accountNumber) {
        $this->owner = $owner;
        $this->balance = $balance;
        $this->accountNumber = $accountNumber;
    }

    protected function deposit($amount) {
        $this->balance += $amount;
    }

    private function showAccountNumber() {
        return $this->accountNumber;
    }

    public function getSummary() {
        return "Owner: {$this->owner}, Balance: {$this->balance}";
    }
}

class SavingsAccount extends BankAccount {
    public function addInterest($rate) {
        // Accessing protected property is allowed:
        $this->balance += $this->balance * ($rate / 100);
    }

    public function depositMoney($amount) {
        // Call protected method from parent
        $this->deposit($amount);
    }
}

$account = new SavingsAccount("Alice", 1000, "AC12345");
$account->depositMoney(500);      // Works
$account->addInterest(10);        // Works
echo "\n" . $account->getSummary();  // "Owner: Alice, Balance: 1650"

// The following lines will cause fatal errors if uncommented:
// echo $account->balance;         ❌ ERROR – protected
// echo $account->accountNumber;   ❌ ERROR – private
// $account->deposit(100);         ❌ ERROR – protected
// $account->showAccountNumber();  ❌ ERROR – private

/*
Use private for sensitive data (like passwords, account numbers).
Use protected for internal logic meant to be extended by child classes.
Use public for methods or data meant to be used from outside the class.
*/
?>