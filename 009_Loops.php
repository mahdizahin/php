<?php
// Loops are used to run the same code multiple times until a condition becomes false.

// The while Loop

$i = 1; // Counter starts at 1
while ($i < 6) { // Loop as long as $i < 6
    echo "Example 1: i = $i";
    $i++; // Increment to avoid infinite loop
}
// Output: 1, 2, 3, 4, 5


// Break stops the loop
$i = 1;
while ($i < 6) {
    if ($i == 3) break; // Stop when i = 3
    echo "Example 2: i = $i";
    $i++;
}
// Output: 1, 2


// Continue skips current iteration
$i = 0;
while ($i < 6) {
    $i++;
    if ($i == 3) continue; // Skip printing 3
    echo "Example 3: i = $i";
}
// Output: 1, 2, 4, 5, 6


// The do...while Loop - Runs at least once, then checks condition
$i = 1;
do {
    echo "Example 4: i = $i";
    $i++;
} while ($i < 6);
// Output: 1, 2, 3, 4, 5


// Even if condition false, runs once
$i = 8;
do {
    echo "Example 5: i = $i";
    $i++;
} while ($i < 6);
// Output: 8


// Break and Continue work here too
$i = 1;
do {
    if ($i == 3) break; // Stop loop
    echo "Example 6: i = $i";
    $i++;
} while ($i < 6);
// Output: 1, 2

$i = 0;
do {
    $i++;
    if ($i == 3) continue; // Skip 3
    echo "Example 7: i = $i";
} while ($i < 6);
// Output: 1, 2, 4, 5, 6


// The for Loop
for ($x = 0; $x <= 10; $x++) { // Start, condition, increment
    echo "Example 8: x = $x";
}
// Output: 0 to 10


// Break stops the loop
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) break;
    echo "Example 9: x = $x";
}
// Output: 0, 1, 2


// Continue skips iteration
for ($x = 0; $x <= 10; $x++) {
    if ($x == 3) continue;
    echo "Example 10: x = $x";
}
// Output: 0, 1, 2, 4, 5, 6, 7, 8, 9, 10


// Count by 10
for ($x = 0; $x <= 100; $x+=10) {
    echo "Example 11: x = $x";
}
// Output: 0, 10, 20, ..., 100


// The foreach Loop (arrays)
$colors = array("red", "green", "blue", "yellow");

// Loop through values
foreach ($colors as $color) {
    echo "Example 12: Color = $color";
}
// Output: red, green, blue, yellow


// Associative arrays (key => value)
$members = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach ($members as $name => $age) {
    echo "Example 13: $name is $age years old";
}
// Output: Peter is 35, Ben is 37, Joe is 43


// Loop through objects
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
}

$myCar = new Car("red", "Volvo");
foreach ($myCar as $prop => $value) {
    echo "Example 14: $prop = $value";
}
// Output: color = red, model = Volvo


// Break and continue work here too
foreach ($colors as $color) {
    if ($color == "blue") break; // Stop at blue
    echo "Example 15: $color";
}
// Output: red, green


foreach ($colors as $color) {
    if ($color == "blue") continue; // Skip blue
    echo "Example 16: $color<br>";
}
// Output: red, green, yellow


// Modify array by reference
foreach ($colors as &$color) {
    if ($color == "blue") $color = "pink";
}
var_dump($colors); // blue changed to pink


// Alternative syntax
foreach ($colors as $color):
    echo "Example 17: $color<br>";
endforeach;
// Output: red, green, pink, yellow


// ✔ while: runs as long as condition true
// ✔ do...while: runs at least once
// ✔ for: runs a set number of times
// ✔ foreach: loops through arrays or objects
// ✔ break: stop the loop immediately
// ✔ continue: skip current iteration
// ✔ use & in foreach to modify array values directly



// Real -Life Examples of Loops in HR System

// WHILE LOOP → Keep processing attendance until all employees checked

$totalEmployees = 5;
$checked = 1;

while ($checked <= $totalEmployees) {
    echo "Checking attendance of Employee #$checked\n";
    $checked++;
}

echo "All employees' attendance checked!\n";

/*
OUTPUT:
Checking attendance of Employee #1
Checking attendance of Employee #2
Checking attendance of Employee #3
Checking attendance of Employee #4
Checking attendance of Employee #5
All employees' attendance checked!
*/


// DO...WHILE LOOP → Send salary confirmation at least once

// Suppose an HR system sends confirmation messages.
// Even if there are no new employees, it should run once to show "No updates".

$employeesToPay = 0;

do {
    echo "Sending salary confirmation...\n";
    $employeesToPay--;
} while ($employeesToPay > 0);

echo "Salary confirmation process done.\n";

/*
OUTPUT:
Sending salary confirmation...
Salary confirmation process done.
*/


// FOR LOOP → Calculate bonuses for top 3 employees

// You know you need to process exactly 3 employees (fixed count)

for ($rank = 1; $rank <= 3; $rank++) {
    echo "Calculating bonus for Top Employee #$rank\n";
}

echo "Bonus processing complete.\n";

/*
OUTPUT:
Calculating bonus for Top Employee #1
Calculating bonus for Top Employee #2
Calculating bonus for Top Employee #3
Bonus processing complete.
*/


// FOREACH LOOP → Display employee information

$employees = [
    "Rahim" => "Developer",
    "Karim" => "Designer",
    "Salma" => "Manager"
];

foreach ($employees as $name => $role) {
    echo "$name works as a $role\n";
}

/*
OUTPUT:
Rahim works as a Developer
Karim works as a Designer
Salma works as a Manager
*/


// FOREACH LOOP (Modify by reference) → Apply salary raise

$salaries = [
    "Rahim" => 30000,
    "Karim" => 28000,
    "Salma" => 35000
];

foreach ($salaries as $name => &$salary) {
    $salary += 2000; // Give every employee a raise
}

foreach ($salaries as $name => $newSalary) {
    echo "$name’s new salary: $newSalary BDT\n";
}


/*
Normal foreach: $salary is a copy; changing it does not affect the original array.
With & (reference): $salary points to the actual array value; changes update the original array directly 

OUTPUT:
Rahim’s new salary: 32000 BDT
Karim’s new salary: 30000 BDT
Salma’s new salary: 37000 BDT         
*/


// BREAK → Stop processing when encountering a resigned employee

$employeeStatus = ["Rahim" => "Active", "Karim" => "Active", "Salma" => "Resigned", "Tania" => "Active"];

foreach ($employeeStatus as $name => $status) {
    if ($status == "Resigned") {
        echo "$name has resigned — stopping payroll processing!\n";
        break; // stop loop immediately
    }
    echo "Processing payroll for $name ($status)\n";
}

/*
OUTPUT:
Processing payroll for Rahim (Active)
Processing payroll for Karim (Active)
Salma has resigned — stopping payroll processing!
*/


// CONTINUE → Skip absent employees in attendance report

$attendance = [
    "Rahim" => "Present",
    "Karim" => "Absent",
    "Salma" => "Present",
    "Tania" => "Present"
];

foreach ($attendance as $name => $status) {
    if ($status == "Absent") {
        echo "$name is absent today — skipping.\n";
        continue;
    }
    echo "$name is present.\n";
}

/*
OUTPUT:
Rahim is present.
Karim is absent today — skipping.
Salma is present.
Tania is present.
*/


/*
| Loop Type     | When to Use                              | Example in HR System                            |
|----------------|------------------------------------------|--------------------------------------------------|
| while          | When you don’t know how many checks      | Keep verifying attendance until all done         |
| do...while     | Must run once even if no records exist   | Send salary confirmation at least once           |
| for            | Fixed number of iterations               | Process top 3 employees for bonus                |
| foreach        | Iterate through a list or database rows  | Show employee names, roles, or salaries          |
| break          | Stop loop early                          | Stop payroll when a resigned employee found      |
| continue       | Skip specific case                       | Skip absent employees during report              |
*/

?>