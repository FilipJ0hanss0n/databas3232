<?php
$dbh = new mysqli("localhost", "dbUser", "hej123", "webbshop");

if(!$dbh)
{
	echo "Ingen kontakt med databasen";
	exit;
}

$sql = "SELECT * FROM products";
$res = $dbh->prepare($sql);
$res->execute();
$result=$res->get_result();

if(!$result)
{
	echo "Felaktiga SQL fråga";
	exit;
}
//$dbh->close();  //Stänger databasen

//var_dump($result);

while($row = $result->fetch_assoc())
	{
		echo $row['name'];
		echo "<br>";
		echo $row['price']. " kronor";
	}

echo "<br><br>";;

$sql = "SELECT users.username, customers.username, customers.firstname, customers.lastname FROM users JOIN customers = customers.username";

echo "<table><tr><th>Anv namn</th><th>Förnamn</th><th>Efternamn</th></tr>";
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>";
		echo $row['username'];
		echo "</td><td>";
		echo $row['firstname'];
		echo "</td><td>";
		echo $row['lastname'];
		echo "</td><td>";
		echo $row['email'];
		echo "</td></tr>";
	}
	echo "table";
?>
