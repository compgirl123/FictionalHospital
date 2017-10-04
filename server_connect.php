<?php
include 'test.php';

$patientInfo = [];

if(isset($_SESSION['ptdata']))
{ 
    echo '<pre>' . var_export($_SESSION['ptdata'], true) . '</pre>';    
}
    
// Connection to LocalHost

$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "fictionalhospital";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
/*echo "Connected successfully";*/

// CREATE TABLE FIRST AND THEN INSERT DATA
//$sql = "SELECT * FROM fictionalhospital.patient";
/*$sqlInsertion = 
    "INSERT INTO Patient (medicareID, firstName, lastName, gender,dob,phone,Address)
VALUES ('435', 'Peter', 'Zorb','M', '1987-10-04 00:00:00',5144362454,'326 Rue Guy');"*/
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        /*echo "id: " . $row["medicareID"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";*/
    }
} else {
    /*echo "0 results";*/
}
$conn->close();

// Connection to Concordia's Server

/*$servername = "uvc353_2.encs.concordia.ca";
$username = "uvc353_2";
$password = "353islit";
$dbname = "uvc353_2";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";*/


?>