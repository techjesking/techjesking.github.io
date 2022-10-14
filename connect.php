<?php
$fullName= $_POST['fullName'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$chapter= $_POST['chapter'];
$mat_no= $_POST['mat_no'];
$currentLevel= $_POST['currentLevel'];
$designation= $_POST['designation'];
$date= $_POST['date'];
$number= $_POST['number'];



//Database Connection
$conn = new mysqli('localhost','root','','login_sample_dbase');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(fullName,gender,email,chapter,mat_no,currentLevel,designation,date,number) values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssissi",$fullName,$gender,$email,$chapter,$mat_no,$currentLevel,$designation,$date,$number);
    $stmt->execute();
    echo "Registration Successful!";
    $stmt->close();
    $conn->close();
}
?>