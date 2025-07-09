<?php
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $blood_group = $_POST['blood_group'];
    $last_donation = $_POST['last_donation'];

    // Insert into Donors table
    $sql = "INSERT INTO Donors (name, age, contact, blood_group, last_donation_date)
            VALUES ('$name', '$age', '$contact', '$blood_group', '$last_donation')";

    if ($conn->query($sql) === TRUE) {
        // Also update/increment blood stock
        $check = "SELECT * FROM BloodInventory WHERE blood_group='$blood_group'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            $update = "UPDATE BloodInventory SET units_available = units_available + 1 WHERE blood_group='$blood_group'";
            $conn->query($update);
        } else {
            $insert = "INSERT INTO BloodInventory (blood_group, units_available) VALUES ('$blood_group', 1)";
            $conn->query($insert);
        }

        echo "<script>alert('Donor Registered Successfully!'); window.location.href='../donator.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid Request Method.";
}
?>