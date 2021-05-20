<?php
$hostlocal="localhost";
$dbasename="tvaitis";
$nameusr="root";
$password="";

//Custom PDO options.
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$name = $_POST['first_name']; //Form values being taken 
$surname = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['comment'];
 
if(isset($_POST['submit'])){
 
     $name =$_POST['first_name'] ;
     echo $name;


        try {
            $conn = new PDO("mysql:host=$hostlocal;dbname=$dbasename", $nameusr,$password,$options);
            
        	if($conn){
        		echo "Connected to the <strong>tvaitis</strong> database successfully!";
                }


                $sql = "INSERT INTO `tvadiaries`(`first`,`last`,`email`,`phone`,`message`) VALUES (:name,:surname,:email ,:phone,:msg)";

                $stmt= $conn->prepare($sql);

                //$statement->bindValue(':name', '$name');
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':surname', $surname);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':phone', $phone);
                $stmt->bindValue(':msg', $msg);

                $inserted = $stmt->execute();

                if($inserted){
               echo 'Row inserted!<br>';
                }
        }


        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }$conn = null;
}

?>