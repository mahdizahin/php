<?php

// Double vs Single Quotes
$x = "Yash";
echo "Double Quotes: Hello $x ";     // Output: Hello Yash
echo 'Single Quotes: Hello $x ';     // Output: Hello $x


// String Length
echo "Length of 'Hello world!': " . strlen("Hello world!"); // Output: 13


// Word Count
echo "Word count in 'Hello world!': " . str_word_count("Hello world!"); // Output: 2


// Search for Text Within a String
echo "Position of 'world' in 'Hello world!': " . strpos("Hello world!", "world"); // Output: 6


// Convert to Upper & Lower Case
$x = "Hello World!";
echo "Uppercase: " . strtoupper($x);  // Output: HELLO WORLD!
echo "Lowercase: " . strtolower($x);  // Output: hello world!


// Replace String
$x = "Hello World!";
echo "Replace 'World' with 'Dolly': " . str_replace("World", "Dolly", $x); // Output: Hello Dolly!


// Reverse a String
$x = "Hello World!";
echo "Reversed: " . strrev($x); // Output: !dlroW olleH


// Remove Whitespace
$x = "   Hello World!   ";
echo "Original: '$x' ";           // Output: '   Hello World!   '
echo "Trimmed: '" . trim($x) . "' "; // Output: 'Hello World!'


// Convert String into Array (explode)
$x = "Hello World!";
$y = explode(" ", $x);
echo "Array result from explode(): ";
print_r($y); // Output: Array ( [0] => Hello [1] => World! )


// String Concatenation
$x = "Hello";
$y = "World";
$z1 = $x . $y;              // No space
$z2 = $x . " " . $y;        // Add space manually
$z3 = "$x $y";              // Using double quotes
echo "Concatenation 1 (no space): $z1 ";    // Output: HelloWorld
echo "Concatenation 2 (manual space): $z2 "; // Output: Hello World
echo "Concatenation 3 (double quotes): $z3 "; // Output: Hello World


// Slice a String (substr)
$x = "Hello World!";
echo "From index 6 to end: " . substr($x, 6); // Output: World!
echo "From -5 (start from end), 3 chars: " . substr($x, -5, 3); // Output: orl
echo "From index 5 to -3: " . substr("Hi, how are you?", 5, -3); // Output: ow are y


// Escape Characters
$x = "We are the so-called \"Vikings\" from the north.";
echo $x; // Output: We are the so-called "Vikings" from the north.

// Common escape examples
echo "Single quote: It\'s a great day ";    // Output: It's a great day
echo "Double quote: \"Quoted text\" ";      // Output: "Quoted text"
echo "Dollar sign: This costs \$5 ";        // Output: This costs $5
echo "New line example (\\n) visible only in CLI "; // Output: shows \n in web
echo "Tab example (\\t) visible only in CLI ";      // Output: shows \t in web


// Summary of Useful Escape Sequences
echo "\\' → Single Quote ";
echo "\\\" → Double Quote ";
echo "\\$ → Dollar Sign ";
echo "\\n → New Line ";
echo "\\r → Carriage Return ";
echo "\\t → Tab ";
echo "\\f → Form Feed ";
echo "\\ooo → Octal value ";
echo "\\xhh → Hex value ";

?>