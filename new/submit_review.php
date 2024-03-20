<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    
    if (empty($name) || empty($email) || empty($rating) || empty($review)) {
        echo "Please fill in all fields.";
    } else {
        
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "dbname";

       
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

  
        $sql = "INSERT INTO reviews (name, email, rating, review) VALUES ('$name', '$email', '$rating', '$review')";

        if ($conn->query($sql) === TRUE) {
            echo "Review submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

  
        $conn->close();
    }
} else {
   
    header("Location: hotel_seagull.html");
    exit;
}
?>
