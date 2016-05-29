<?php

	require_once("db.php");
	
	
	$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_laugai");
	

	$stmt = $mysql->prepare("SELECT id, recipient, message FROM messages_sample");
	

	echo $mysql->error;
	

	$stmt->bind_result($id, $recipient, $message);
	

	$stmt->execute();
	
	$table_html = "";
	

	$table_html .= "<table>";
		$table_html .= "<tr>";
			$table_html .= "<th>ID</th>";
			$table_html .= "<th>Recipient</th>";
			$table_html .= "<th>Message</th>";
		$table_html .= "</tr>";
	

	while($stmt->fetch()){
		
		$table_html .= "<tr>"; 
			$table_html .= "<td>".$id."</td>";
			$table_html .= "<td>".$recipient."</td>";
			$table_html .= "<td>".$message."</td>";
		$table_html .= "</tr>"; 
	}
	$table_html .= "</table>";
	echo $table_html;
	
	
	
?>
<a href="app.php">app</a>