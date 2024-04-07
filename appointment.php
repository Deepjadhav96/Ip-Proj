<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "salonex"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, preferred_time, date, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $preferred_time, $date, $message);

    // Set parameters and execute
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $preferred_time = $_POST["preferred_time"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    if ($stmt->execute() === TRUE) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Appointment Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Salon Appointment Booking</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <!-- <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div> -->
        <div class="form-group">
            <label for="preferred_time">Preferred Time Slot:</label>
            <select id="preferred_time" name="preferred_time" required>
                <option value="">Select Time Slot</option>
                <option value="9:00 AM">9:00  AM to 10:00 AM</option>
                <option value="10:00 AM">10:00  AM to 11:00 AM</option>
                <option value="11:00 AM">11:00  AM to 12:00 PM</option>
                <option value="12:00 PM">12:00  PM to 1:00  PM</option>
                <option value="1:00 PM">1:00  PM to 2:00  PM</option>
                <option value="2:00 PM">2:00  PM to 3:00  PM</option>
                <option value="3:00 PM">3:00  PM to 4:00  PM</option>
                <option value="4:00 PM">4:00  PM to 5:00  PM</option>
                <option value="5:00 PM">5:00  PM to 6:00  PM</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4"></textarea>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

