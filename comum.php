<?php
try {
	$dsn = "mysql:dbname=blog;host=localhost";
	$dbuser = "root";
	$dbpass = "";
	$pdo = new PDO($dsn, $dbuser, $dbpass);

} catch(PDOException $e) {
	die($e->getMessage());
}
?>
<h1>Notícias</h1>
<?php
$sql = "SELECT * FROM posts LIMIT 10";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0) {

	foreach($sql->fetchAll() as $post) {

		?>
		<h3><?php echo $post['titulo']; ?></h3>
		<?php echo $post['corpo']; ?>
		<hr/>
		<?php

	}

}
?>