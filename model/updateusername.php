<?php
echo "hello from updatename video";
header("Content-Type: application/json; charset=UTF-8");
$usernameupdate = json_decode($_POST["x"], false);

$servername = "localhost";
$username = "THANG";
$password = "password";
$dbname = "THANGDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else {
  
    $sql = "SELECT email,password FROM acount WHERE email='$usernameupdate->email'  and password='$usernameupdate->password'";
        $result = $conn->query($sql);
        $num_rows = mysqli_num_rows($result);
			if ($num_rows!=0) {
				
				//echo " exitst account";
                $sql = "UPDATE acount SET name='$usernameupdate->newname' WHERE email='$usernameupdate->email'  and password='$usernameupdate->password'";
                if ($conn->query($sql) === TRUE) {
                   //echo "Record update successfully";
                 } else {
                   //echo "Error update record: " . $conn->error;
                 }

            }     
}
$conn->close();

?>