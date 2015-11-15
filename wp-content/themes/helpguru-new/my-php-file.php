<?php
// incloud admin email
//('wp -> log in -> profile -> email')
require_once('../../../wp-config.php');
$admin_email = get_option( 'admin_email' ); 
echo $admin_email;

// db info
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "rol_support_forms";
// connect to db
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_REQUEST["contact_form_data"]){

  $obj = $_POST["contact_form_data"];

  $name = $obj["Name"];
  $email = $obj["Email"];
  $subject = $obj["Subject"];
  $description = $obj["Description"];
  // sql requset
  $sql = "INSERT INTO contact_form (name, email, subject, description)
  VALUES ( '$name', '$email', '$subject', '$description')";


  // insert into db
    print_r($_REQUEST);
    echo($name);
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    print_r($_POST);

    // send notification email to sender/user
    $to = $obj["Email"];
    $subject = $obj["Subject"];
    $message = "This is a notification email from ROL Support - Contact Form.";
    $from = $admin_email;
    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    echo "Mail From " . $from;
    echo "Mail Sent to " . $to;
    //send email to admin
    $to_admin .= $admin_email;// to admin
    // $subject_admin = $obj["Subject"];
    // $message_admin = "This is a notification email from ROL Support - Contact Form.";
    $from_admin = $obj["Email"];
    $headers_admin = "From:" . $from_admin;
    mail($to_admin,$subject,$message,$headers_admin);
    echo "(admin)Mail From " . $from_admin;
    echo "(admin)Mail Sent to " . $to_admin;

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  // close the conaction to db
  $conn->close();
}

// // insert contact form data to db
// if (isset($_POST["contact_form_data"])){
//   // the data in variables
//   $obj = json_decode($_POST['contact_form_data'], true);
//   $name = $obj['Name'];
//   $email = $obj['Email'];
//   $subject = $obj['Subject'];
//   $description = $obj['Description'];
//   // sql requset 
//   $sql = "INSERT INTO contact_form (name, email, subject, description)
//   VALUES ( '$name', '$email', '$subject', '$description')";
//   // insert into db
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//     // print_r($_POST);
//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
//   // close the conaction to db
//   $conn->close();
// }


// insert error report form data to db
if ($_REQUEST["error_report_form_data"]){

  $obj = $_POST["error_report_form_data"];

  $name = $obj["Name"];
  $email = $obj["Email"];
  $product = $obj["Product"];
  $hardware_v = $obj["Hardware_v"];
  $software_v = $obj["Software_v"];
  $idesk_v_android = $obj["iDesk_v_android"];
  $android_v = $obj["Android_v"];
  $idesk_v_ios = $obj["iDesk_v_ios"];
  $ios_v = $obj["iOS_v"];
  $subject = $obj["Subject"];
  $description = $obj["Description"];


  // $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v, idesk_v_android, android_v, software_v, idesk_v_ios, ios_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v', '$idesk_v_android', '$android_v','$software_v','$idesk_v_ios', '$ios_v')";

  if ($product === "id/idrive"){
    $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v,software_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v','$software_v')"; 
  }
  else if($product === "app-android"){
    $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v, idesk_v_android, android_v,software_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v', '$idesk_v_android', '$android_v','$software_v')"; 
  }
  else if($product === "app-ios"){
    $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v, idesk_v_ios, ios_v, software_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v', '$idesk_v_ios', '$ios_v', '$software_v')"; 
  }


  if ($conn->query($sql) === TRUE){
    echo "Successfully iserted data";
    print_r($_POST);
    print_r($product);
    print_r($obj);
    echo "hihihih!";

    // send an email
    $to = $obj["Email"] . ', '; // to sender
    $to .= $admin_email;// to admin 
    $subject = $obj["Subject"];
    $message = "This is a notification email from ROL Support - Error Report Form.";
    $from = $admin_email;
    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    echo "Mail From " . $from;
    echo "Mail Sent to " . $to;

  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
    // print_r($obj);

  }

  $conn->close();
}





// // insert error report form data to db
// if (isset($_POST["error_report_form_data"])){

//   $obj = json_decode($_POST["error_report_form_data"], true);

//   $name = $obj["Name"];
//   $email = $obj["Email"];
//   $product = $obj["Product"];
//   $hardware_v = $obj["Hardware_v"];
//   $software_v = $obj["Software_v"];
//   $idesk_v_android = $obj["iDesk_v_android"];
//   $android_v = $obj["Android_v"];
//   $idesk_v_ios = $obj["iDesk_v_ios"];
//   $ios_v = $obj["iOS_v"];
//   $subject = $obj["Subject"];
//   $description = $obj["Description"];

//   if ($product === "id/idrive"){
//     $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v,software_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v','$software_v')"; 
//   }
//   else if($product === "app-android"){
//     $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v, idesk_v_android, android_v,software_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v', '$idesk_v_android', '$android_v','$software_v')"; 
//   }
//   else if($product === "app-ios"){
//     $sql = "INSERT INTO error_report_form (name, email, subject, description, product, hardware_v, idesk_v_ios, ios_v, software_v) VALUES ('$name', '$email', '$subject', '$description', '$product', '$hardware_v', '$idesk_v_ios', '$ios_v', '$software_v')"; 
//   }


//   if ($conn->query($sql) === TRUE){
//     echo "Successfully iserted data";
//     // print_r($_POST);
//     // print_r($product);
//     // print_r($obj);
//     // echo "hihihih!";

//   }else{
//     echo "Error: " . $sql . "<br>" . $conn->error;
//     // print_r($obj);

//   }

//   $conn->close();
// }






// $host = "127.0.0.1";
// $user = "root";
// $pass = "mysql";
// $db = "rol_support_forms";

// $dbc = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
// $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $name = @$_POST['Name'];
// $email = @$_POST['Email'];
// $subject = @$_POST['Subject'];
// $description = @$_POST['Description'];


// $q = "INSERT INTO contact_form ( name, email, subject, description ) VALUES ( Name, Email, Subject, Description)";

// // $q = "INSERT INTO contact_form (name, email, subject, description ) VALUES ('Ali', 'alialicom', 'Ali testing', 'Testing save to db.')";

//     $query = $dbc->prepare($q);
//     $query->bindParam('Name', $name);
//     $query->bindParam('Email', $email);
//     $query->bindParam('Subject', $subject);
//     $query->bindParam('Description', $description);



//     $results = $query->execute();

//   echo($name);
//   echo($email);















// include_once ('../../../wp-config.php');
// include_once ('../../../wp-load.php');
// include_once ('../../../wp-includes/wp-db.php');
// include_once ('../../../wp-includes/pluggable.php');

// $imageName = @$_FILES['image']['name'];
// $query->bindParam(':image', $imageName);


?>