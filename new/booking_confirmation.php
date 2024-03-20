<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    
    <?php
     
    $errors = array();

     
    if (empty($_POST['room_type'])) {
        $errors[] = "Room type is required.";
    }

     
    if (empty($_POST['check_in_date'])) {
        $errors[] = "Check-in date is required.";
    }

     
    if (empty($_POST['check_out_date'])) {
        $errors[] = "Check-out date is required.";
    }

    
    if (empty($_POST['guests']) || $_POST['guests'] <= 0) {
        $errors[] = "Number of guests must be provided and greater than 0.";
    }

 
    if (!empty($errors)) {
        echo "<h2>Error:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    } else {
        
        $room_type = $_POST['room_type'];
        $check_in_date = $_POST['check_in_date'];
        $check_out_date = $_POST['check_out_date'];
        $guests = $_POST['guests'];

        echo "<h2>Booking Details:</h2>";
        echo "<p><strong>Room Type:</strong> $room_type</p>";
        echo "<p><strong>Check-in Date:</strong> $check_in_date</p>";
        echo "<p><strong>Check-out Date:</strong> $check_out_date</p>";
        echo "<p><strong>Number of Guests:</strong> $guests</p>";

         
    }
    ?>

    <?php
 
    if(isset($_SERVER['HTTP_REFERER'])) {
        $previous_page = $_SERVER['HTTP_REFERER'];
        echo "<p><a href=\"$previous_page\">Go Back</a></p>";
    } else {
        echo "<p><a href=\"#\">Go Back</a></p>";
    }
    ?>

</body>
</html>
