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


//  $con = mysql_connect("localhost","root","mysql");
//  if (!$con)
// {
//     die('Could not connect: ' . mysql_error());
// } 
//  mysql_select_db("forms",$con);

 // $result=mysql_query("select * from contactform",$con);

  $sql = "SELECT * FROM contactform";

  $result = $conn->query($sql);

echo "<table border='1' >
<tr>
<td align=center> <b>id</b></td>
<td align=center><b>Name</b></td>
<td align=center><b>Email</b></td>
<td align=center><b>Subject</b></td></td>
<td align=center><b>Description</b></td>";

while($data = mysqli_fetch_row($result))
{   
    echo "<tr>";
    echo "<td align=center>$data[0]</td>";
    echo "<td align=center>$data[1]</td>";
    echo "<td align=center>$data[2]</td>";
    echo "<td align=center>$data[3]</td>";
    echo "<td align=center>$data[4]</td>";
    echo "</tr>";
}
echo "</table>";




















// db info
// $servername = "localhost";
// $username = "root";
// $password = "mysql";
// $dbname = "forms";
// // connect to db
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

//   $sql = "SELECT * FROM contactform";

//   // $result = $conn->query($sql);

//   // $array = while ($result->fetchInto($row)) {
//   //           // Assuming DB's default fetchmode is DB_FETCHMODE_ORDERED
//   //           echo $row[0] . "\n";
//   //           }

//   // select from db
//   if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
//     print_r ($_GET);
//     // echo json_encode($array);

//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//     echo $error;
//   }












  // //--------------------------------------------------------------------------
  // // Example php script for fetching data from mysql database
  // //--------------------------------------------------------------------------
  // $host = "localhost";
  // $user = "root";
  // $pass = "mysql";

  // $databaseName = "forms";
  // $tableName = "contactform";

  // //--------------------------------------------------------------------------
  // // 1) Connect to mysql database
  // //--------------------------------------------------------------------------
  // // include 'DB.php';
  // $con = new mysqli($host,$user,$pass, $databaseName);

  // //--------------------------------------------------------------------------
  // // 2) Query database for data
  // //--------------------------------------------------------------------------
  // $result = $con->query("SELECT * FROM $tableName");          //query
  // // $array = mysql_fetch_row($result);                          //fetch result    

  // //--------------------------------------------------------------------------
  // // 3) echo result as json 
  // //--------------------------------------------------------------------------
  // echo json_encode($result);

?>