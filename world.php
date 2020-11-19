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

$query = strval($_GET["query"]);

$query = filter_var(htmlentities($query), FILTER_SANITIZE_STRING);
$query = html_entity_decode($query,ENT_QUOTES); //I converted it to html to preserve the quotes that are in some names

$statement = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%'");
//$statement->bindValue(1,$query);
//$statement->execute(); 

$results = $statement->fetchAll(PDO::FETCH_ASSOC)
?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
