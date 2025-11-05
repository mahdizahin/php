<?php

// PHP has several predefined global arrays called **superglobals**. 
// These variables are always accessible from any scope, 
// including functions, classes, and files, without the need for 'global'.

// List of PHP Superglobals
// -------------------------
// $GLOBALS   - References all global variables
// $_SERVER   - Server and execution environment information
// $_REQUEST  - Collects data from $_GET, $_POST, and $_COOKIE
// $_POST     - Data sent via HTTP POST
// $_GET      - Data sent via HTTP GET
// $_FILES    - Upload file information
// $_ENV      - Environment variables
// $_COOKIE   - HTTP cookies
// $_SESSION  - Session variables


// GLOBALS
// $GLOBALS is an associative array containing all global variables

$x = 75;

function printGlobalX() {
    // Access global variable using $GLOBALS
    echo $GLOBALS['x']; // Output: 75
}
printGlobalX();

// Without $GLOBALS, a global variable is NOT accessible inside a function
function printXWrong() {
    // echo $x; // This will throw an undefined variable notice
}


// Using 'global' keyword to access a global variable
function printXWithKeyword() {
    global $x;
    echo $x; // Output: 75
}
printXWithKeyword();


// Create a global variable inside a function
function createGlobalVar() {
    $GLOBALS['y'] = 100;
}
createGlobalVar();
echo $GLOBALS['y']; // Output: 100


// $_SERVER
// Contains server and execution environment info

echo $_SERVER['PHP_SELF'];        // Current script filename
echo $_SERVER['SERVER_NAME'];     // Hostname
echo $_SERVER['HTTP_HOST'];       // Host header
echo $_SERVER['HTTP_REFERER'];    // Previous page URL (if available)
echo $_SERVER['HTTP_USER_AGENT']; // Browser info
echo $_SERVER['SCRIPT_NAME'];     // Path of current script

// Commonly used $_SERVER keys
// ---------------------------
// $_SERVER['GATEWAY_INTERFACE'] - CGI version
// $_SERVER['SERVER_ADDR']        - Server IP
// $_SERVER['SERVER_SOFTWARE']    - Web server software
// $_SERVER['SERVER_PROTOCOL']    - HTTP protocol
// $_SERVER['REQUEST_METHOD']     - GET, POST, etc.
// $_SERVER['QUERY_STRING']       - URL query string
// $_SERVER['REMOTE_ADDR']        - Visitor IP
// $_SERVER['SCRIPT_FILENAME']    - Absolute path to script
// $_SERVER['SERVER_PORT']        - Server port
// $_SERVER['HTTPS']              - 'on' if HTTPS


// $_REQUEST
// Contains data from $_GET, $_POST, and $_COOKIE

// Example using $_REQUEST with an HTML form
/*
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>
</body>
</html>
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_REQUEST['fname']); // Sanitize input
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}

// Example using $_REQUEST with GET query string
// URL: demo_phpfile.php?subject=PHP&web=w3schools.com
echo "Study " . $_REQUEST['subject'] . " at " . $_REQUEST['web'];


// $_POST
// Contains data submitted via HTTP POST (forms, JS requests)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['fname']);
    echo $name;
}

// Example: JavaScript XMLHttpRequest POST
/*
<script>
function sendPost() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "demo_ajax.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML = this.responseText;
    }
    xhttp.send("fname=Mary");
}
</script>

<button onclick="sendPost()">Click me!</button>
<h1 id="demo"></h1>
*/

// PHP file demo_ajax.php
// $name = $_POST['fname'];
// echo $name;


// $_GET
// Contains data submitted via HTTP GET (URL query string or form GET)

// Example: query string URL
// demo_phpfile.php?subject=PHP&web=w3schools.com
echo $_GET['subject']; // Output: PHP
echo $_GET['web'];     // Output: w3schools.com

// HTML form GET method
/*
<form action="welcome_get.php" method="GET">
  Name: <input type="text" name="name">
  Email: <input type="text" name="email">
  <input type="submit">
</form>
*/

// PHP welcome_get.php
/*
echo "Welcome " . $_GET['name'] . "<br>";
echo "Your email address is: " . $_GET['email'];
*/


// 1. Always sanitize user input (htmlspecialchars, filter_input, etc.).
// 2. Use $_POST for sensitive data; $_GET data is visible in the URL.
// 3. $_REQUEST combines GET, POST, COOKIE, but using it can be ambiguous.
// 4. Superglobals are automatically available; no need for 'global' inside functions.
// 5. $_SERVER contains lots of info about the client and server — useful for routing, logging, or analytics.

?>