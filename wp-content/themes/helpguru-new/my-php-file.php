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


// if ($_REQUEST["contact_form_data"]){

//   $obj = $_POST["contact_form_data"];

//   $name = $obj["Name"];
//   $email = $obj["Email"];
//   $subject = $obj["Subject"];
//   $description = $obj["Description"];
//   // sql requset
//   $sql = "INSERT INTO contactform (name, email, subject, description)
//   VALUES ( '$name', '$email', '$subject', '$description')";


//   // insert into db
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//     print_r ($_POST);

//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
//   // close the conaction to db
//   $conn->close();
// }


// // if ($_REQUEST["contact_form_data"]){
// if (isset($_POST["formData"])){

//   $obj = $_POST["formData"];

//   $name = $obj["contact_form_name"];
//   $email = $obj["contact_form_email"];
//   $subject = $obj["contact_form_subject"];
//   $description = $obj["contact_form_description"];
//   // sql requset
//   $sql = "INSERT INTO contact_form (name, email, subject, description)
//   VALUES ( '$name', '$email', '$subject', '$description')";


//   // insert into db
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//     print_r ($_POST);

//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
//   // close the conaction to db
//   $conn->close();
// }







//You need to add server side validation and better error handling here

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