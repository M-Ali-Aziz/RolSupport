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



  $name = $_POST["contact_form_name"];
  $email = $_POST["contact_form_email"];
  $subject = $_POST["contact_form_subject"];
  $description = $_POST["contact_form_description"];
  // sql requset
  $sql = "INSERT INTO contactform (name, email, subject, description)
  VALUES ( '$name', '$email', '$subject', '$description')";

  // insert into db
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    print_r ($_POST);

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




  $file_names = $_POST['filenames'];
  foreach ($file_names as $filename) {

    $file_name = $filename;

    $sql = "INSERT INTO contactformfiles (filename)
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