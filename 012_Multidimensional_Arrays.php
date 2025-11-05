<?php

// 2D Arrays
$people = [
    ["Name" => "Peter", "Age" => 35, "City" => "London"],
    ["Name" => "Ben", "Age" => 37, "City" => "Paris"],
    ["Name" => "Joe", "Age" => 43, "City" => "New York"]
];

// Access elements
echo $people[0]["Name"]; // Peter

// Loop through 2D array
foreach ($people as $person) {
    echo $person["Name"] . " - " . $person["City"] . "\n";
}

echo "<br>";echo "<br>";
// 3D Arrays
$matrix = [
    [
        ["id"=>1, "value"=>"A"],
        ["id"=>2, "value"=>"B"]
    ],
    [
        ["id"=>3, "value"=>"C"],
        ["id"=>4, "value"=>"D"]
    ]
];

// Access element
echo $matrix[1][1]["value"]; // D
echo "<br>";echo "<br>";
// Nested loops
for ($i=0; $i < count($matrix); $i++) {
    for ($j=0; $j < count($matrix[$i]); $j++) {
        echo $matrix[$i][$j]["value"] . " ";
    }
}

echo "<br><br>";
// Arrays of Associative Arrays
$users = [
    ["id"=>1, "name"=>"Alice", "score"=>90],
    ["id"=>2, "name"=>"Bob", "score"=>80],
    ["id"=>3, "name"=>"Charlie", "score"=>85]
];

// Extract column
$names = array_column($users, "name");
print_r($names); // ["Alice","Bob","Charlie"]
echo "<br><br>";
// Higher-order functions
$nums = [1,2,3,4,5,6];

// Filter
$even = array_filter($nums, fn($n) => $n % 2 === 0);
print_r($even); // [2,4,6]
echo "<br><br>";
// Map
$squares = array_map(fn($n) => $n*$n, $nums);
print_r($squares); // [1,4,9,16,25,36]
echo "<br><br>";
// Reduce
$sum = array_reduce($nums, fn($carry,$item) => $carry+$item,0);
echo $sum; // 21
echo "<br><br>";

// Combining Arrays
$arr1 = ["a","b","c"];
$arr2 = [1,2,3];

// array_combine
$combined = array_combine($arr1,$arr2);
print_r($combined); // ["a"=>1,"b"=>2,"c"=>3]
echo "<br><br>";
// array_merge_recursive
$a = ["color"=>"red", "size"=>"M"];
$b = ["color"=>"blue", "shape"=>"round"];
$merged = array_merge_recursive($a,$b);
print_r($merged); 
// ["color"=>["red","blue"], "size"=>"M", "shape"=>"round"]
echo "<br><br>";

// Removing duplicates in multidimensional arrays
$people = [
    ["name"=>"John","age"=>20],
    ["name"=>"John","age"=>20],
    ["name"=>"Jane","age"=>22]
];
$unique = array_map("unserialize", array_unique(array_map("serialize",$people)));
print_r($unique);

?>