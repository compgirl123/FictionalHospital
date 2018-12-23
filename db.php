<?php
include 'pData.php';

$patientInfo = [];

/*if(isset($_SESSION['ptdata']))
{ 
    echo '<pre>' . var_export($_SESSION['ptdata'], true) . '</pre>';    
}*/
//var_dump($patientData);
$patientData = $_SESSION['ptdata'];
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
$sqlCreate = "CREATE TABLE `fictionalHospital`.`Patient` 
(
medicareID BIGINT(12) PRIMARY KEY,
firstName VARCHAR(30),
lastName VARCHAR(30),
gender CHAR(1) DEFAULT '?',
dob DATE NOT NULL,
phone CHAR(16),
address VARCHAR(255),
city VARCHAR(30)
)";

$result = $conn->query($sqlCreate);
$sql .= "INSERT INTO fictionalhospital.patient(medicareID, firstName, lastName, gender,dob,phone,address,city) VALUES ";
foreach($patientData as $key=>$value)
{
    $sql .= 
    "(".$_SESSION['ptdata'][$key]['medicareId'].",'".$_SESSION['ptdata'][$key]['firstName']."','".$_SESSION['ptdata'][$key]['lastName']."','".
     $_SESSION['ptdata'][$key]['gender']."','". $_SESSION['ptdata'][$key]['date']."',".$_SESSION['ptdata'][$key]['phone'].",'".$_SESSION['ptdata'][$key]['streetAddress']."','".$_SESSION['ptdata'][$key]['city']."')";
    if($key < 14)
    {
        $sql .= ",";
    }
}
var_dump($sql);
$result = $conn->query($sql);
/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["medicareID"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
    }
} else {
    /*echo "0 results";
}*/
$conn->close();



?>
