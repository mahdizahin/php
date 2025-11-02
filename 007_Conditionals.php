
<?php
// -------------------------------
// PHP Conditional Statements
// -------------------------------
// Conditional statements control the flow of your program
// by executing certain code blocks only when conditions are met.

// Available types:
// 1. if
// 2. if...else
// 3. if...elseif...else
// 4. switch
// 5. Nested if
// 6. Short-hand (Ternary) syntax


// The if Statement
// Basic syntax: executes a block if the condition is TRUE
if (5 > 3) {
    echo "Example 1: 5 is greater than 3<br>";  // Output: 5 is greater than 3
}

$t = 14;
if ($t < 20) {
    echo "Example 2: Have a good day!<br>";  // Output: Have a good day!
}

// Using variables and comparison operator
$age = 18;
if ($age == 18) {
    echo "Example 3: You are exactly 18 years old.<br>";  // Output: You are exactly 18 years old.
}


// The if...else Statement
// Syntax: Executes one block if TRUE, another if FALSE
$age = 16;  

if ($age >= 18) {
    echo "Example 1: You are an adult";  // Runs if age is 18 or more
} else {
    echo "Example 1: You are a minor";   // Runs if age is less than 18
}


// The if...elseif...else Statement - Multiple conditions in sequence
$marks = 75;  

if ($marks >= 80) {
    echo "Example 2: Grade A";  // Runs if marks are 80 or more
} elseif ($marks >= 60) {
    echo "Example 2: Grade B";  // Runs if marks are between 60–79
} elseif ($marks >= 40) {
    echo "Example 2: Grade C";  // Runs if marks are between 40–59
} else {
    echo "Example 2: Fail";     // Runs if marks are below 40
}


// Comparison Operators in if
$x = 10;
$y = 20;

if ($x == $y) {
    echo "Example 6: Equal<br>";
} elseif ($x < $y) {
    echo "Example 6: \$x is less than \$y<br>"; // Output: $x is less than $y
} else {
    echo "Example 6: \$x is greater than \$y<br>";
}


// Logical Operators in if
$a = 200;
$b = 33;
$c = 500;

if ($a > $b && $a < $c) {
    echo "Example 7: Both conditions are true<br>"; // TRUE because 200>33 AND 200<500
}

if ($a > 100 || $b > 100) {
    echo "Example 8: At least one condition is true<br>"; // TRUE because $a>100
}

if (!($b > 100)) {
    echo "Example 9: Condition is NOT true, so this executes<br>"; // TRUE because $b>100 is FALSE
}


// Multiple OR conditions
$a = 5;
if ($a == 2 || $a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7) {
    echo "Example 10: $a is between 2 and 7<br>"; // Output: 5 is between 2 and 7
}


// Nested if (if inside another if)
$a = 13;
if ($a > 10) {
    echo "Example 11: Above 10"; // Always true
    if ($a > 20) {
        echo " and also above 20<br>";
    } else {
        echo " but not above 20<br>"; // Output: Above 10 but not above 20
    }
}


// Shorthand if (Single line)
$a = 5;
if ($a < 10) $b = "Hello"; // No curly braces needed for one statement
echo "Example 12: $b";  // Output: Hello


// Ternary Operator (Short-hand if...else)
$a = 13;
$b = ($a < 10) ? "Hello" : "Good Bye"; 
// If $a < 10, output "Hello", else "Good Bye"
echo "Example 13: $b"; // Output: Good Bye


// Null Coalescing Operator (??)
$user = null;
$name = $user ?? "Guest";
// If $user is not null, return it; otherwise return "Guest"
echo "Example 14: $name"; // Output: Guest


// switch Statement - Used when checking multiple possible values of the same variable
$day = "Tuesday";

switch ($day) {
    case "Monday":
        echo "Example 15: Start of the week!<br>";
        break;
    case "Tuesday":
        echo "Example 15: Second day of the week!<br>"; // Output: Second day of the week!
        break;
    case "Wednesday":
        echo "Example 15: Midweek day!<br>";
        break;
    default:
        echo "Example 15: Some other day!<br>";
}


// -------------------------------
// Summary
// -------------------------------
// • Use `if` for simple checks.
// • Use `if...else` for binary decisions.
// • Use `if...elseif...else` for multiple conditions.
// • Use `switch` for clean multi-value comparisons.
// • Use logical operators (&&, ||, !) for compound conditions.
// • Use nested if for dependent checks.
// • Use shorthand or ternary for concise logic.

?>
