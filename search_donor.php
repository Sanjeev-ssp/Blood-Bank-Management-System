<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['blood_group'])) {
    $blood_group = $_GET['blood_group'];

    $sql = "SELECT * FROM Donors WHERE blood_group = '$blood_group'";
    $result = $conn->query($sql);

    echo "<h3>Donors with blood group $blood_group:</h3>";

    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Name</th><th>Age</th><th>Contact</th><th>Last Donation</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['contact']}</td>
                    <td>{$row['last_donation_date']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No donors found for this blood group.</p>";
    }

    echo "<br><a href='../requests.html'>← Back to Search</a>";
} else {
    echo "Invalid request.";
}
$conn->close();
?>

