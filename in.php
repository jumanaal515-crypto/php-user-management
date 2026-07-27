<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "sql104.infinityfree.com";
$username = "if0_42364520";
$password = "GCm6L0J1aU3Lv";
$dbname = "if0_42364520_task";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if (isset($_GET['toggle_id'])) {
    $id = intval($_GET['toggle_id']); 

    $sql_toggle = "UPDATE user SET Status = IF(Status = 1, 0, 1) WHERE Id = $id";
    
    $conn->query($sql_toggle);
    
    
    header("Location: in.php");
    exit();
}

if (isset($_POST['delete_all'])) {
    $conn->query("TRUNCATE TABLE user");
    header("Location: in.php");
    exit();
}
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['name']) && isset($_REQUEST['age'])) {
$name = $_REQUEST['name'];
$age = $_REQUEST['age'];

$sql_insert = "INSERT INTO user (Name, Age, Status) VALUES ('$name', '$age', 0)"; 

if ($conn->query($sql_insert) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql_insert . "<br>" . $conn->error;
}
}
?> 

<style>
  body { font-family: sans-serif; padding: 40px; }
  table { border-collapse: collapse; margin-top: 15px; }
  th { background-color: #f2f2f2; }
</style>

<h2>HTML Forms</h2>

<form action="in.php" method="post">
  <label for="fname">Name:</label>
  <input type="text" id="name" name="name" >
  <label for="lname">Age:</label>
  <input type="number" id="age" name="age">
  <input type="submit" value="Submit">
</form> 

<br><hr><br>

<?php


$sql_select = "SELECT Id, Name, Age, Status FROM user";
// Execute the SQL query
$result = $conn->query($sql_select);

// Process the result set
if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Status</th>
                <th>Action</th>
            </tr>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["Id"] . "</td>
            <td>" . $row["Name"] . "</td>
            <td>" . $row["Age"] . "</td>
           <td>" . ($row["Status"] == 1 ? "<b style='color:green'>1</b>" : "<b style='color:red'>0</b>") . "</td>
            <td>
               <a href='in.php?toggle_id=" . $row["Id"] . "'>
                  <button type='button' style='cursor:pointer; padding: 4px 8px;'>Toggle</button>
               </a>
            </td>
          </tr>";
}
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<form method="post">
   <input type="submit" name="delete_all" value="Clear All Data" style="background:red; color:white; border:none; padding:8px; cursor:pointer;" onclick="return confirm('هل أنت متأكد من مسح جميع البيانات؟');">
