<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "noble2024";
    $password = " ";
    $dbname = "noble";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userid = $_GET['id']; 

    $sql = "SELECT u.email, p.firstname, p.lastname, p.isCompleted FROM user u INNER JOIN profile p ON u.id = p.userid WHERE u.id = $userid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1>User Profile</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Email</th><th>First Name</th><th>Last Name</th><th>Profile Completed</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['firstname']}</td>";
            echo "<td>{$row['lastname']}</td>";
            echo "<td>" . ($row['isCompleted'] ? 'Yes' : 'No') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Profile not found.";
    }

    $conn->close();
    ?>
</body>
</html>
