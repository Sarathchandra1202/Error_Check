<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['name']) &&
        isset($_POST['gender']) && isset($_POST['religion']) &&
        isset($_POST['ddltongue']) && isset($_POST['ddlcaste'])&&
        isset($_POST['ddlCountry']) && isset($_POST['number'])&&
        isset($_POST['landnumber']) && isset($_POST['image'])&&
        isset($_POST['horoscope']) && isset($_POST['email'])&&
        isset($_POST['username']) && isset($_POST['pass'])&&
        isset($_POST['c_pass'])) {
        
        $Namee = $_POST['name'];
        $age = $_POST['ddlage'];
        $gender = $_POST['gender'];
        $religion = $_POST['religion'];
        $mother_tongue = $_POST['ddltongue'];
        $caste = $_POST['ddlcaste'];
        $country = $_POST['ddlCountry'];
        $mobile_number = $_POST['number'];
        $Landline = $_POST['landnumber'];
        $images = $_POST['image'];
        $zodiac = $_POST['horoscope'];
        $email_id = $_POST['email'];
        $Username = $_POST['username'];
        $Passwordd = $_POST['pass'];
        $ConfirmPassword = $_POST['c_pass'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "vvmat";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            
            $Insert = "INSERT INTO profilee(Namee,age,gender,religion,mother_tongue,caste,country,mobile_number,Landline,images,zodiac,email_id,Username,Passwordd,ConfirmPassword) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($Insert);
            $stmt->bind_param("sisssisssssssss",$Namee,$age,$gender,$religion,$mother_tongue,$caste,$country,$mobile_number,$Landline,$images,$zodiac,$email_id,$Username,$Passwordd,$ConfirmPassword);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "New record inserted successfully.";
            }
            else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All fields are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>
