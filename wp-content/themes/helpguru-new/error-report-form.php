<?php

// db info
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "forms";
// connect to db
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




//You need to add server side validation and better error handling here ???

$data = array();
$file_names;

if(isset($_GET['files']))
{ 

  $error = false;
  $files = array();

  $uploaddir = './myImg/';
  foreach($_FILES as $file)
  {
    if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
    {
      $files[] = $uploaddir .$file['name'];
    }
    else
    {
        $error = true;
    }
  }
  $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
  $data = array('success' => 'Form was submitted', 'formData' => $_POST);

  // insert form inputs data to db
  $name = $_POST["error_report_form_name"];
  $email = $_POST["error_report_form_email"];
  $product = $_POST["error_report_form_product"];
  $hardware_v = $_POST["error_report_form_hardware_version"];
  $software_v = $_POST["error_report_form_software_version"];
  $idesk_v_android = $_POST["error_report_form_id_app_version_android"];
  $android_v = $_POST["error_report_form_android_version_mobile"];
  $idesk_v_ios = $_POST["error_report_form_id_app_version_ios"];
  $ios_v = $_POST["error_report_form_ios_version_iphone"];
  $subject = $_POST["error_report_form_subject"];
  $description = $_POST["error_report_form_description"];

  $sql = "INSERT INTO errorreportform (name, email, product, hardware_v, software_v, idesk_v_android, android_v, idesk_v_ios, ios_v, subject, description) VALUES ('$name', '$email', '$product', '$hardware_v', '$software_v', '$idesk_v_android', '$android_v', '$idesk_v_ios', '$ios_v', '$subject', '$description')";

  // insert into db
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    print_r ($_POST);


    // mail('m.aliaa@live.com','Subject1','Message1','From: m_ali1426@hotmail.com');


    // // incloud admin email
    // //('wp -> log in -> profile -> email')
    // require_once('../../../wp-config.php');
    // $admin_email = get_option( 'admin_email' ); 
    // echo $admin_email;

    // // send notification email to sender/user
    // $to = $email;
    // $subject = $subject;
    // $message = "This is a notification email from ROL Support - Contact Form.";
    // $from = $admin_email;
    // $headers = "From:" . $from;
    // mail($to,$subject,$message,$headers);
    // echo "Mail From " . $from;
    // echo "Mail Sent to " . $to;
    // //send email to admin
    // $to_admin .= $admin_email;// to admin
    // // $subject_admin = $obj["Subject"];
    // // $message_admin = "This is a notification email from ROL Support - Contact Form.";
    // $from_admin = $email;
    // $headers_admin = "From:" . $from_admin;
    // mail($to_admin,$subject,$message,$headers_admin);
    // echo "(admin)Mail From " . $from_admin;
    // echo "(admin)Mail Sent to " . $to_admin;

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }


  //insert files to db
  $file_names = $_POST['filenames'];
  foreach ($file_names as $filename) {

    $file_name = $filename;

    $sql = "INSERT INTO errorreportformfiles (filename)
    VALUES ( '$file_name')";

    // insert into db
    if ($conn->query($sql) === TRUE) {
      echo "New FILE created successfully";
      print_r ($_POST);

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
  }
  
}

echo json_encode($data);





?>