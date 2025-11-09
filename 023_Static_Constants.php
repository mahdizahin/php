<?php
/*

STATIC PROPERTIES, METHODS, AND CONSTANTS IN PHP OOP

In PHP OOP, **static members** (properties and methods) belong to
the *class itself*, not to any specific object.

That means:
- You can use them **without creating an object**.
- All objects of the same class share one static value.

Real-Life Example:
Think of a “Main Power Switch” in a building.
- It’s not tied to any single room (object),
- It controls electricity for *the whole building* (class level).

And **constants** are like fixed building rules — they never change.

Access static members or constants using the class name directly:

    ClassName::$property
    ClassName::methodName()
    ClassName::CONSTANT_NAME

When to Use Static and Constants:
 Shared data across all objects (e.g., counter, configuration)
 Utility/helper methods (e.g., math functions)
 Fixed values that never change (e.g., PI, version number)

*/


// Static Property & Method
class MathHelper {
    public static $pi = 3.1416;  // Static property (shared by all)
    public static $operationCount = 0;  // Count total operations

    // Static method — can be called without creating object
    public static function add($a, $b) {
        self::$operationCount++;  // Access static property with self::
        return $a + $b;
    }

    public static function circleArea($radius) {
        self::$operationCount++;
        return self::$pi * $radius * $radius;
    }
}

// Access directly via class name — no object needed
echo "Addition: " . MathHelper::add(10, 5);
echo "Circle Area (r=3): " . MathHelper::circleArea(3);
echo "Total Operations Done: " . MathHelper::$operationCount;

/*
Output:
Addition: 15
Circle Area (r=3): 28.2744
Total Operations Done: 2
*/


// Class Constants
/*

Constants are fixed values inside a class.
They:
- Are defined using 'const' keyword.
- Never change during program execution.
- Are accessed with :: operator.

Imagine company policies like:
  - MAX_LOGIN_ATTEMPTS = 5
  - TAX_RATE = 15%
They remain the same for all employees/users.

*/

class AppConfig {
    const APP_NAME = "NeuroFlight Lab";
    const VERSION = "1.2.0";
    const AUTHOR = "Development Team";
}

echo "App Name: " . AppConfig::APP_NAME;
echo "Version: " . AppConfig::VERSION;
echo "Author: " . AppConfig::AUTHOR;


// Static Counter Example
/*
Static properties are great for tracking shared values,
like counting how many users or files have been created.
*/

class Counter {
    public static int $count = 0; // shared property

    public function __construct() {
        self::$count++;
    }

    public static function showCount(): void {
        echo "Total objects created: " . self::$count;
    }
}

// Creating objects
$u1 = new Counter();
$u2 = new Counter();
$u3 = new Counter();

// Show shared counter (same for all)
Counter::showCount();  // Output: Total objects created: 3



// Constants in Practical Math Class
class MathConstants {
    const PI = 3.14159;
    const E  = 2.71828;

    public static function circleArea(float $radius): float {
        return self::PI * $radius * $radius;
    }

    public static function circleCircumference(float $radius): float {
        return 2 * self::PI * $radius;
    }
}

echo "PI = " . MathConstants::PI;
echo "E  = " . MathConstants::E;
echo "Area (r=3): " . MathConstants::circleArea(3);
echo "Circumference (r=3): " . MathConstants::circleCircumference(3);


/*
🔹 Static Members:
   - Belong to the class itself, not an instance.
   - Access via ClassName::member
   - Common use: counters, helpers, utilities.

🔹 Constants:
   - Defined using const keyword.
   - Immutable (cannot change value).
   - Access via ClassName::CONSTANT_NAME
   - Common use: configuration, rules, math constants.

🔹 self:: vs $this->
   - self:: → used inside class for static members
   - $this-> → used for object (non-static) members
*/
?>