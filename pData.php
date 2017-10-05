<?php

require_once 'fzaninotto/faker/src/autoload.php';

$faker = Faker\Factory::create();

$patientInfo = [];


function ptdataGenerator(){
    $maxPatients = 15;
    $done = false;
    while(!$done){
        
        $done = true;
        for($x=0;$x<$maxPatients;$x++)
        {
            $min = strtotime("jan 1st -90 years");
            $max = strtotime("dec 31st -16 years");
            $time = rand($min,$max);
            $dob = date("Y-m-d",$time);
            $faker = Faker\Factory::create();
            $streetAddress = $faker->streetAddress; 
            if($x < 7)
            {
                $fName = $faker->firstNameMale;
                $gender = 'M';
            }
            else
            {
                $fName = $faker->firstNameFemale;
                $gender = 'F';
            }
            
            $lName = $faker->lastName;
            $medicareId = rand(99999999999,1000000000000);
            $numbers = rand(513999999, 515000000);
            $city = array(
                'Montreal',
                'Laval'
            );
            $key = array_rand($city);
            $city = $city[$key];
            shuffle($numbers);
            shuffle($medicareId);
            $patientInfo[$x]['phone'] = $numbers;
            $patientInfo[$x]['medicareId'] = $medicareId;
            $patientInfo[$x]['date'] = $dob;
            $patientInfo[$x]['firstName'] = $fName;
            $patientInfo[$x]['lastName'] = $lName;
            $patientInfo[$x]['gender'] = $gender;
            $patientInfo[$x]['streetAddress'] = $streetAddress;
            $patientInfo[$x]['city'] = $city; 
        }
       shuffle($patientInfo);
       return $patientInfo;
    }
    
}


session_start();
if(!isset($_SESSION['ptdata'])){
     $_SESSION['ptdata'] = ptdataGenerator();  
}  
$random = $_SESSION['ptdata'];

/*session_unset();
session_destroy();
unset($_SESSION['dob']);*/

/*

Hard Coded Name Values

*/

/*function namesArray()
{
   $patientfNameArray = array(
        'Peter',
        'Alessia',
        'Francesca',
        'Patrick',
        'Claudia',
        'Marzie',
        'Anthony',
        'Prabh' ,
        'Amelia' ,
        'Eric' ,
        'Andrew',
        'Amanda',
        'Melissa',
        'William',
        'Rachel'
   );
    
    $patientlNameArray = array(
        'Zorp',
        'Mezzaluna',
        'Di Lenna',
        'Morris',
        'Peterson',
        'Stevenson',
        'Williams',
        'Singh',
        'Kurt',
        'Kraus',
        'Gonzales',
        'Wu',
        'Knauss',
        'Wong',
        'Lee'
    );
    $names = array(
        'fName' => $patientfNameArray, 
        'lName' => $patientlNameArray
    );
    return $names; 
}*/

/*function genderArray()
{
    $genders = array(
        'M',
        'F',
        'F',
        'M',
        'F',
        'F',
        'M',
        'M',
        'F',
        'M',
        'M',
        'F',
        'F',
        'M',
        'F'
    );
    return $genders;
}*/

    
?>
