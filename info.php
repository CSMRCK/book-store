<?php
include("config.php");
$id=$_REQUEST['id'];

$sql=mysql_query("SELECT * FROM `store` WHERE `id` = '$id'",$link);
 while($result = mysql_fetch_array($sql))
 {
            echo '<div class="col-lg-3 books"><div class="books"><ul class="books-items">
            <li class="first">«'.$result['name'].'»</li><br>
            <li>'. $result['genre'].'</li><br>
            <li>'. $result['description'].'</li><br>
            <li>'. $result['author'].'</li><br>
            <li class="first">'. $result['price'].'₴</li><br>
            </ul></div></div>';
}

if(isset($_POST['submit'])){
    $to = "cosmonorthen@gmail.com"; 
    $from = $_POST['email']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); 
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";

    }
?>

<head>
<title>Form submission</title>
</head>
<body>

<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Enter your ardress,name and count of books:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 