<?php
// Database credentials
$servername = "localhost"; // usually "localhost"
$username = "jack_jack";
$password = "VjY[[WzqAFZkg7BC";
$dbname = "Property";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $id_number = $_POST["id_number"];
    $address = $_POST["permanent_address"];
    $zip = $_POST["zip"];
    // Retrieve other form fields

    // Handle file upload
    $file_name = $_FILES["file"]["name"];
    $file_temp = $_FILES["file"]["tmp_name"];
    $file_path = "uploads/" . $file_name;  // Adjust the path as needed

    move_uploaded_file($file_temp, $file_path);

    // Insert data into the database
    $sql = "INSERT INTO renter (ID, first_name, last_name, email, phone_number, identity_proof_document, identity_proof_doc_image, permanent_address, zip) VALUES ('$id', '$first_name', '$last_name', '$email', '$phone_number', '$id_number', '$file_path', '$address', '$zip')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>




