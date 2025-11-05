<?php

// Regular Expressions (regex) are patterns used to match or search
// for specific character sequences in strings. They are powerful tools for validation, searching, and text replacement.

// Example Use Cases:
// - Validating email or phone formats
// - Extracting specific data from text
// - Replacing words or patterns dynamically
// - Complex search operations


// A regular expression is a sequence of characters that defines a search pattern.

// Example:
//   $pattern = "/w3schools/i";
//   - '/' → Delimiter (used to enclose the pattern)
//   - 'w3schools' → Pattern to search for
//   - 'i' → Modifier (makes the search case-insensitive)

// Regular expressions can be a simple character search
// or a complex pattern involving ranges, metacharacters, and quantifiers.

// Common Delimiters: / # ~
// You can choose any non-alphanumeric, non-whitespace character as a delimiter.


// REGULAR EXPRESSION FUNCTIONS IN PHP

// PHP provides several functions to use regular expressions:
// preg_match()      → Tests if a pattern exists (returns 1 or 0)
// preg_match_all()  → Counts all matches of a pattern
// preg_replace()    → Replaces all matches with another string

// USING preg_match()
// Checks if a string contains a match for a pattern.

// Define a regex pattern (case-insensitive search for 'w3schools')
$pattern = "/w3schools/i";  // '/' = delimiter, 'i' = ignore case

// Check if pattern exists in string
echo preg_match($pattern, $str);  // Output: 1 (pattern found)


// Case-sensitive match example
$pattern = "/W3Schools/";  
echo preg_match($pattern, $str);  // Output: 1 (exact match found)

$pattern = "/w3schools/";  
echo preg_match($pattern, $str);  // Output: 0 (case mismatch, so no match)


// USING preg_match_all()
// Counts all occurrences of the pattern in the string
$str = "The rain in SPAIN falls mainly on the plains.";  

// Pattern to match "ain" (case-insensitive)
$pattern = "/ain/i";  

// Returns how many times "ain" appears in the string
echo preg_match_all($pattern, $str);  // Output: 4


// USING preg_replace()
// Replaces all matches of a pattern with a new string
$str = "Visit Microsoft!";  

// Pattern to find "microsoft" (case-insensitive)
$pattern = "/microsoft/i";  

// Replace it with "W3Schools"
echo preg_replace($pattern, "W3Schools", $str);  // Output: Visit W3Schools!


// REGULAR EXPRESSION MODIFIERS
// Modifiers change how the pattern behaves.
// Modifier | Description
// -----------------------------------
// i        | Case-insensitive search
// m        | Multiline search (^ and $ match line start/end)
// u        | Enables correct matching of UTF-8 characters

$str = "Hello\nWorld";
$pattern = "/^world/m";  // 'm' makes ^ work per line
echo preg_match($pattern, $str); // Output: 1

// REGULAR EXPRESSION PATTERNS
// Brackets [ ] define a range or set of allowed characters.

// Pattern    | Description
// --------------------------
// [abc]      | Matches 'a', 'b', or 'c'
// [^abc]     | Matches anything except 'a', 'b', or 'c'
// [a-z]      | Matches lowercase letters a to z
// [A-Z]      | Matches uppercase letters A to Z
// [0-9]      | Matches digits 0–9
// [A-z]      | Matches any letter (uppercase or lowercase)

$str = "cat bat mat fat";
$pattern = "/[cb]at/";
preg_match_all($pattern, $str, $matches);
print_r($matches); // Matches: cat, bat

// METACHARACTERS
// These characters have special meanings in regex.
// Character | Meaning
// ----------------------------
// |         | OR (cat|dog|fish)
// .         | Any single character
// ^         | Start of string
// $         | End of string
// \d        | Any digit (0–9)
// \D        | Any non-digit
// \s        | Any whitespace
// \S        | Any non-whitespace
// \w        | Any letter or digit
// \W        | Any non-letter/digit
// \b        | Word boundary
// \uxxxx    | Unicode character (hexadecimal)

$str = "The number is 42.";
$pattern = "/\d+/"; // Matches one or more digits
preg_match($pattern, $str, $match);
print_r($match); // Output: 42

// QUANTIFIERS
// Define how many times a character or pattern can occur.
// Quantifier | Description
// --------------------------
// n+         | One or more occurrences
// n*         | Zero or more occurrences
// n?         | Zero or one occurrence
// n{3}       | Exactly 3 occurrences
// n{2,5}     | Between 2 and 5 occurrences
// n{3,}      | At least 3 occurrences

$str = "Hellooo World!";
$pattern = "/o{2,}/"; // Matches 'oo' or more
preg_match_all($pattern, $str, $match);
print_r($match); // Output: ooo

// Escaping special characters
// To search for special regex symbols like ? or .,
// prefix them with a backslash (\)

$pattern = "/\?+/";  // Match one or more '?'
$str = "What??";
echo preg_match($pattern, $str); // Output: 1

// GROUPING
// Parentheses ( ) are used for grouping or capturing subpatterns.
// - Apply quantifiers to groups
// - Extract matched portions

$str = "Apples and bananas.";
$pattern = "/ba(na){2}/i"; // Looks for 'ba' followed by 'na' twice → 'banana'
echo preg_match($pattern, $str); // Output: 1

$str = "John Smith, Jane Doe";
$pattern = "/(\w+)\s(\w+)/";
preg_match_all($pattern, $str, $matches);
print_r($matches);
// Output:
// [1] => John, Jane
// [2] => Smith, Doe

// COMBINED EXAMPLE
// Use regex to validate an email format:
$email = "user@example.com";
$pattern = "/^[\w\.-]+@[\w\.-]+\.\w{2,}$/";

if (preg_match($pattern, $email)) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}

// 1. Always test your regex patterns (use tools like regex101.com).
// 2. Use delimiters other than '/' if your pattern contains slashes.
// 3. Escape special characters when needed using '\'
// 4. Be cautious with greedy quantifiers (* and +).
// 5. Use anchors (^ and $) to match specific string positions.
// 6. For better performance, simplify overly complex patterns.
// 7. Use 'u' modifier for UTF-8 support if working with Unicode text.

?>