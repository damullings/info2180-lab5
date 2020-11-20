<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


try 
{
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
} 
catch(Exception $e) 
{

  die($e->getMessage());
}


header('Content-Type: application/json');
//echo json_encode($superheroes);

$query = strval($_GET["country"]);
$context = strval($_GET["context"]);

$query = filter_var(htmlentities($query), FILTER_SANITIZE_STRING);
$query = html_entity_decode($query,ENT_QUOTES); //I converted it to html to preserve the quotes that are in some names


//$statement->bindValue(1,$query);
//$statement->execute(); 




if ($context == "cities")
{
  $statement = $conn->query("SELECT c.name, c.district, c.population 
  FROM cities c JOIN countries cs on c.country_code = cs.code 
  WHERE cs.name LIKE '%$query%'
  
  ");
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  require 'city.php';
}
else
{
  $statement = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  require 'country.php';
}



?>
<ul>
