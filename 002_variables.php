<?php

$name = "George";
$_business = "Weapon Manufacturing";
$code_name = "Delta Bro";
//$3rdWifeName = "Rita arnold"; //Invalid Variable name
//$net-worth = "466 Billion USDT";

$proft_per_unit = 800000;
$Quantity_sold  = "70";

$total_profit = ($proft_per_unit*$Quantity_sold);

print"Total Profit : $total_profit";

$Quantity_sold= "70 Unit";

echo"\n<br>Quantity Sold : $$Quantity_sold";


// Multiple Assignments
$daniel_father = $george_father = $nagasakis_father = "Nosto Rabbi";
echo"\n<br>Fathers name : $daniel_father,$george_father,$nagasakis_father";

// Variable Scope
// There are 4 types of variable scope in PHP:
// 1. Local
// 2. Global
// 3. Static
// 4. Superglobal ($GLOBALS)

#Local_scope
function testlocal(){                                                                  
    $cg=4.00; // accessible only inside this function
    echo"<br>local variables value $cg";
}
testlocal();  //output : local variables value 4             
//echo"$cg"; //Can't accesible from outside of function


#Global_scope
$gl_var="99";

function testglobal(){
    global $gl_var; //import global variable for accesible into function
    echo"<br>Global variable inside function : $gl_var";
}
testglobal(); // Output : Global variable inside function : 99

#Global_array

$gl_var1= "8";
$gl_var2= "9";


function global_array_testing(){
    $GLOBALS['result']= $GLOBALS['gl_var1']*$GLOBALS['gl_var2'];
    
}

global_array_testing();//Output : blank cz $result=0; global variable declear age kora hoy  ni
echo"<br>$result"; //now show  output : 72

// Static Variables - Keeps its value between function calls
function counter() {
    static $count = 0; // 'static' means this variable keeps its value between calls
    $count++;           // Increase the counter by 1
    echo "Counter: $count<br>"; 
}

// Each function call increments the same $count variable (it’s not reset to 0)
counter(); // Output: Counter: 1
counter(); // Output: Counter: 2
counter(); // Output: Counter: 3


?>

