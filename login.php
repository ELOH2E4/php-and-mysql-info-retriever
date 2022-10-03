<?php // login.php
$host = 'localhost'; 
$data = 'publications';
$user = 'root';
$pass = 'mysql';
$chrs = 'utf8mb4';
$attr = "mysql:host = $host;dbname=$data;charset=$chrs";
$opts = 
[
   PDO::ATTR_ERRMODE    =>PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
   PDO::ATTR_EMULATE_PREPARES   =>false,
];
?>

<?php
require_once 'login.php';
try
{
 $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e)
{
 throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>

<?php // query.php
 require_once 'login.php';
 try
 {
    $pdo = new PDO($attr, $user, $pass, $opts);
 }
 catch (PDOException $e)
 {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
 }
 $query = "SELECT * FROM classics";
 $result = $pdo->query($query);
 
 while ($row = $result->fetch())
 {
    echo 'Author:  ' .htmlspecialchars($row['author'])  . "<br>";
    echo 'Title:   ' .htmlspecialchars($row['title'])   . "<br>";
    echo 'Category:' .htmlspecialchars($row['category']). "<br>";
    echo 'Year:    ' .htmlspecialchars($row['year'])    . "<br>";
    echo 'ISBN:    ' .htmlspecialchars($row['isbn'])    . "<br>";
 }
 ?>
