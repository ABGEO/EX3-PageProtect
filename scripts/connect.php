<?php
	//აგალითი 1.

	$adminLogin = admin; //ადმინის ლოგინი
	$adminPass = admin; //ადმინის პაროლი

	/*
		მაგალითი 2.

		თუ გსურთ ავტორიზაციისათვის გამოიყენოთ მონაცემთა ბაზა,
		მაშინ გამოიყენეთ ქვემოთ მოცემული კოდი.

		mysql_connect(HOST, USER, PASSWORD) //ჰოსტი, მომხმარებლის სახელი, პაროლი
		or die("<p>მონაცემთა ბაზასთან დაკავშირების შეცდომა! " . mysql_error() . "</p>");

		mysql_select_db(DB_NAME) //მონაცემთა ბაზის სახელი
		or die("<p>მონაცემთა ბაზის არჩევის შეცდომა! ". mysql_error() . "</p>");

		$sql_select = "SELECT * FROM Table_Name"; // ყველა მონაცემის ამოტანა ბაზიდან
		$result = mysql_query($sql_select);
		$row = mysql_fetch_array($result);

		$adminLogin = $row['admin_login'];
		$adminPass = $row['admin_pass'];

		თუ თქვენ არ გაქვთ მონაცემთა ბაზა,
		მაშინი გამოიყენეთ ამ კოდის 1 მაგალითი
	*/
?>
