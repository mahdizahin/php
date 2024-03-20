<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Submission</title>
</head>
<body>
    <?php
    //  form  submitted check kortesi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $feedback_type = $_POST["feedback_type"];
        $message = $_POST["message"];


        $name = htmlspecialchars(trim($name));
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        $feedback_type = htmlspecialchars(trim($feedback_type));
        $message = htmlspecialchars(trim($message));

       
        if (!empty($name) && !empty($email) && !empty($feedback_type) && !empty($message)) {
            
            echo "<h2>Thank you for your feedback!</h2>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Type of Feedback:</strong> $feedback_type</p>";
            echo "<p><strong>Message:</strong> $message</p>";
            echo "<p>We will get back to you as soon as possible.</p>";
        } else {
             
            echo "<h2>Error: All fields are required.</h2>";
        }
    } else {
         
        header("Location: guest_feedback_and_support.html");
        exit;
    }
    ?>
</body>
</html>
