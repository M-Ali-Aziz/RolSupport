<?php
// Create class PDOHelher
class PDOHelper {
 
  protected function connectToDatabase($host,$dbname,$user,$pass){
    return new PDO(
      "mysql:host=$host;dbname=$dbname",
      $user,
      $pass,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
  }
 
  protected function fixNumerics($result){
    foreach ($result as &$row) {
      foreach ($row as $key => &$val) {
        if (is_numeric($val)) {
          $row[$key] = (float) $val;
        }
      }
    }
    return $result;
  }
 
  public function query($sql,$parameters = array()){
    $query = $this->PDO->prepare($sql);
    $query->execute($parameters);
    if(stripos($sql,'SELECT') === 0){
      $result = $this->fixNumerics($query->fetchAll(PDO::FETCH_ASSOC));
      return $result;
    }
    return true;
  }
 
  public function jsonQuery($sql,$parameters = array()){
    return json_encode($this->query($sql,$parameters));
  }
  public function __construct($host,$dbname,$user="root",$pass=""){
    $this->PDO = $this->connectToDatabase($host,$dbname,$user,$pass);
  }
}
?>
<?php
// PDOHelper
$PDOH = new PDOHelper("127.0.0.1", "rol_support_forms", "root", "mysql");

function saveFormData($form_data){
	global $PDOH;

	$sql = "INSERT INTO contact_form (name, email, subject, description) VALUES (:Name, :Email, :Subject, :Description)";

	$PDOH->query($sql, $form_data);

	return true;
}

if (isset($_REQUEST["$form_data"])){
	echo(json_encode(saveFormData($_REQUEST["$form_data"])));
}
?>