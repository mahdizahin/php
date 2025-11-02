<?php

// The switch statement is used to perform different actions
// based on different possible values of a single variable or expression.
//
// Syntax:
// switch (expression) {
//   case label1:
//       // code block
//       break;
//   case label2:
//       // code block
//       break;
//   default:
//       // code block
// }

// How it works:
// 1️⃣ The expression is evaluated once.
// 2️⃣ Its value is compared with each 'case' value.
// 3️⃣ If a match is found, that case’s code runs.
// 4️⃣ The 'break' keyword stops further checks.
// 5️⃣ The 'default' block runs if no match is found.


// Basic switch example

$favcolor = "red"; // Initialize variable

switch ($favcolor) {
    case "red":
        echo "Example 1: Your favorite color is red!<br>";   // This line executes because $favcolor == "red"
        break;
    case "blue":
        echo "Example 1: Your favorite color is blue!<br>";
        break;
    case "green":
        echo "Example 1: Your favorite color is green!<br>";
        break;
    default:
        echo "Example 1: Your favorite color is neither red, blue, nor green!<br>";
}
// Output: Your favorite color is red!


// The break keyword
// The 'break' statement tells PHP to stop running more cases inside the switch.
// If you don’t use 'break', PHP will keep running the next case(s) even if they don’t match — this is called “fall-through”.
// Fall-through only happens after a case matches. Cases before the match are skipped, cases after the match run until a break.
// In simple terms: when a case matches, PHP runs from that point until it finds a 'break' or reaches the end of the switch.

$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Example 2: Your favorite color is red!<br>"; // Executes because match found
        // No break here → execution continues to next case
    case "blue":
        echo "Example 2: Your favorite color is blue!<br>"; // Executes because of fall-through (No Break above)
        break;
    case "green":
        echo "Example 2: Your favorite color is green!<br>";
        break;
    default:
        echo "Example 2: Your favorite color is neither red, blue, nor green!<br>";
}
// Output:
// Your favorite color is red!
// Your favorite color is blue!

// Because we missed 'break' in 'red', execution “falls through” to 'blue'.
// Only use intentional fall-through when multiple cases share the same code.


// The default keyword - Runs when no case matches the value.
$d = 4;

switch ($d) {
    case 6:
        echo "Example 3: Today is Saturday<br>";
        break;
    case 0:
        echo "Example 3: Today is Sunday<br>";
        break;
    default:
        echo "Example 3: Looking forward to the Weekend<br>"; // This runs (no match)
}
// Output: Looking forward to the Weekend


// Default not last (Valid but not recommended)
// 'default' can appear anywhere in the switch, but must end with 'break' if it’s not the last case.

$d = 4;

switch ($d) {
    default:
        echo "Example 4: Looking forward to the Weekend<br>"; // Executes because no case matches
        break;
    case 6:
        echo "Example 4: Today is Saturday<br>";
        break;
    case 0:
        echo "Example 4: Today is Sunday<br>";
}
// Output: Looking forward to the Weekend
// (Works, but not good style — keep default last for clarity)


// Common code blocks for multiple cases
// You can stack multiple case labels that share the same code block.

$d = 3; // Suppose 3 means Wednesday

switch ($d) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Example 5: The week feels so long!<br>"; // Runs for Mon–Fri
        break;
    case 6:
    case 0:
        echo "Example 5: Weekends are the best!<br>";  // Runs for Sat or Sun
        break;
    default:
        echo "Example 5: Something went wrong<br>";
}
// Output: The week feels so long!

// When PHP matches case 3, it runs the code from that point down until it reaches a break.
// Cases 3, 4, and 5 all share the same code and one break statement.
// So, if PHP matches case 3, 4, or 5, it will run the same echo line.
// These cases are grouped together — no matter which one matches, the same message will be shown.

// switch with expressions
// You can use calculations or functions in the switch expression.

$num = 10;

switch (true) { // use 'true' for range checks
    case ($num < 0):
        echo "Example 6: Negative number<br>";
        break;
    case ($num == 0):
        echo "Example 6: Zero<br>";
        break;
    case ($num > 0 && $num <= 10):
        echo "Example 6: Positive and small number<br>"; // Executes
        break;
    default:
        echo "Example 6: Positive and large number<br>";
}
// Output: Positive and small number


// switch vs if-elseif
// switch is cleaner for comparing one variable to fixed values.
// if...elseif is better for complex expressions (ranges, logical conditions).

$grade = "B";

switch ($grade) {
    case "A":
        echo "Example 7: Excellent!<br>";
        break;
    case "B":
        echo "Example 7: Good job!<br>"; // Runs
        break;
    case "C":
        echo "Example 7: Needs improvement!<br>";
        break;
    default:
        echo "Example 7: Invalid grade<br>";
}
// Output: Good job!


// -------------------------------
// Summary
// -------------------------------
// ✔ switch compares a single value against multiple constants
// ✔ break stops execution of further cases
// ✔ default handles unmatched cases
// ✔ Missing break causes fall-through
// ✔ Multiple cases can share the same block
// ✔ You can use expressions with 'switch(true)' for custom logic

?>