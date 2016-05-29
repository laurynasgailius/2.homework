
<?php
	
	require_once("db.php");

	$everything_was_okay = true;

	if(isset($_GET["to"])){ 
		if(empty($_GET["to"])){ 
			$everything_was_okay = false;
			echo "Enter departure location <br>"; 
		}else{
			echo "To: ".$_GET["to"]."<br>"; 
		}
	}else{
		$everything_was_okay = false; 
	}
	
	if(isset($_GET["message"])){
		
		if(empty($_GET["message"])){
			
			$everything_was_okay = false;
			echo "Enter the destination!";
		}else{
			
			echo "Message: ".$_GET["message"]."<br>";
		}
		
	}else{
		
		$everything_was_okay = false;
	}

	if($everything_was_okay == true){
		
		echo "Your ticket is ready! <br>";
		
		$mysql = new mysqli("localhost", $db_username, $db_password, "webpr2016_laugai");
		
		$stmt = $mysql->prepare("INSERT INTO messages_sample (recipient, message) VALUES (?,?)");
			
		//echo error
		echo $mysql->error;
		
		$stmt->bind_param("ss", $_GET["to"], $_GET["message"]);
		
		
		if($stmt->execute()){
			echo "print here</a>" ;
		}else{
			echo $stmt->error;
		}
		
		
	}
	
	
?>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<center><div id="ticket">
<br>
<a href="table.php">logs</a>
<h2>Travel</h2>

<form method="get">
	<label for="to"> <label>
	<input type="text" placeholder="From:" name="to"><br><br>
	
	<label for="message"> <label>
	<input type="text" placeholder="To:" name="message"><br><br>
	

	<input type="submit" value="Buy a ticket">

<form>
</div>
</body>
