<?php
  include("connection.php");

  // Query the desired table and store results in a variable
  $sql = "SELECT * FROM Doctor";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Displaying data from MySQL database</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>Doctor ID</th>
        <th>Name</th>
        <th>Specialty</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Loop through the results and display them in a table
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["doctor_id"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["specialty"]."</td>";
            echo "</tr>";
          }
        } else {
          echo "0 results";
        }
      ?>
    </tbody>
  </table>
</body>
</html>

<?php
  // Close the database connection
  $conn->close();
?>