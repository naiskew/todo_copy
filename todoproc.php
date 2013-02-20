<?php 

$dbName = "dbMyTodo";
$con = mysql_connect("localhost","kai","kai");

if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

$sql = "CREATE DATABASE ". $dbName;

if (mysql_query($sql,$con))
{
	global $dbName;
	mysql_select_db($dbName, $con);;
	$sql = "CREATE TABLE tblTodo 
	(
		idTodo int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(idTodo),
		username varchar(30),
		subject varchar(30),
		duedate varchar(30),
		duetime varchar(30)
	)";

	if (!mysql_query($sql,$con))
	{
		die('Error:' . mysql_error());
	}

	$sql = "CREATE TABLE tblUser 
	(
		idUser int NOT NULL AUTO_INCREMENT, 
		PRIMARY KEY(idUser),
		username varchar(30),
		passwd varchar(30)
	)";

	if (!mysql_query($sql,$con))
	{

		die('Error:' . mysql_error());
	}

}
else
{
	//echo "Database found";
	//echo "Error creating database: " . mysql_error();
}
	

mysql_select_db($dbName, $con);

$commnd = $_REQUEST["commnd"];
switch ($commnd)
{
	case "getlistall":
	getListAll();
	break;

	case "getlistday":
	getListDay();
	break;

	case "searchlist":
	searchList();
	break;

	case "addlist":	
	addList();
	getListAll();
	break;

	case "updatelist":
	updateList();
	getListAll();
	break;

	case "deletelist":
	deleteList();
	getListAll();
	break;
	
	case "login":
	userLogin();
	break;

	case "register":
	userRegister();
	break;

}

mysql_close($con);

function getListAll()
{
	
	$sql = "SELECT * FROM tblTodo WHERE username = '". $_REQUEST["username"] . "' ORDER BY duedate, duetime, subject";
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		echo "" . $row['idTodo'] . "!split!" . $row['subject'] . "!split!" . $row['duedate'] . "!split!" . $row['duetime'] . "!split!";

	}	
}

function getListDay()
{
	
	$sql = "SELECT * FROM tblTodo WHERE username = '". $_REQUEST["username"] . "' and duedate = '" . $_REQUEST["duedate"] . "' ORDER BY duetime, subject";
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		echo "" . $row['idTodo'] . "!split!" . $row['subject'] . "!split!" . $row['duedate'] . "!split!" . $row['duetime'] . "!split!";

	}

	/*
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>UserName</th>";
	echo "<th>Subject</th>";
	echo "<th>DueDate</th>";
	echo "<th>DueTime</th>";
	echo "</tr>";

	while($row = mysql_fetch_array($result))
	{

		echo "<tr>";
		echo "<td>" . $row['idTodo'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['subject'] . "</td>";
		echo "<td>" . $row['duedate'] . "</td>";
		echo "<td>" . $row['duetime'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
	*/
}

function searchList()
{	
	$sql = "SELECT * FROM tblTodo WHERE username = '". $_REQUEST["username"] . "' and ";
	$sql = $sql . "duedate >= '" . $_REQUEST["fromdate"] . "' and duedate <= '" . $_REQUEST["todate"] . "' and ";
	$sql = $sql . "duetime >= '". $_REQUEST["fromtime"] . "' and duetime <= '" . $_REQUEST["totime"] . "' and ";
	$sql = $sql . "subject LIKE '%" . $_REQUEST["subject"] . "%' ORDER BY duedate, duetime, subject";
	$result = mysql_query($sql);
	
	while($row = mysql_fetch_array($result))
	{
		echo "" . $row['idTodo'] . "!split!" . $row['subject'] . "!split!" . $row['duedate'] . "!split!" . $row['duetime'] . "!split!";

	}
}

function addList()
{
	global $con;	

	if ($_REQUEST["subject"] != "")
	{
		$sql="INSERT INTO tblTodo (username, subject, duedate, duetime)
		VALUES
		('" . $_REQUEST["username"] . "','" . $_REQUEST["subject"] . "','" . $_REQUEST["duedate"] . "','" . $_REQUEST["duetime"] . "')";

		if (!mysql_query($sql,$con))
		{
			die('Error: asd' . mysql_error());
		}
	}	
}

function updateList()
{
	global $con;
	$sql = "UPDATE tblTodo SET ";
	$sql = $sql . "subject = '" . $_REQUEST["subject"] . "',";
	$sql = $sql . "duedate = '" . $_REQUEST["duedate"] . "',";
	$sql = $sql . "duetime = '" . $_REQUEST["duetime"] . "' ";
	$sql = $sql . "WHERE idTodo = '" . $_REQUEST["idTodo"] . "'";

	if (!mysql_query($sql,$con))
	{
		die('Error: asd' . mysql_error());
	}
}

function deleteList()
{
	global $con;
	$sql = "DELETE FROM tblTodo ";
	$sql = $sql . "WHERE idTodo = '" . $_REQUEST["idTodo"] . "'";

	if (!mysql_query($sql,$con))
	{
		die('Error: asd' . mysql_error());
	}
}

function userRegister()
{
	global $con;	
	$countResult = 0;
	$sql = "SELECT * FROM tblUser WHERE username = '". $_REQUEST["username"] . "'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$countResult = $countResult+1;
	}

	if ($countResult>0)
	{
		echo "UserName already exist, choose the new one";
	}
	else
	{
		$sql="INSERT INTO tblUser (username, passwd)
		VALUES
		('" . $_REQUEST["username"] . "','" . $_REQUEST["passwd"] . "')";

		if (!mysql_query($sql,$con))
		{
			die('Error: asd' . mysql_error());
		}

		echo $_REQUEST["username"];
	}	
}

function userLogin()
{
	global $con;	
	$countResult = 0;
	$passwdResult ="";
	$sql = "SELECT * FROM tblUser WHERE username = '". $_REQUEST["username"] . "'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$passwdResult = $row['passwd'];
		$countResult = $countResult+1;
	}

	if  ($countResult>0)
	{
		if ( $_REQUEST["passwd"] == $passwdResult)
		{

			echo $_REQUEST["username"];
		}
		else
		{
			echo "UserName and Password mismatch";	
		}
		
	}
	else
	{
		echo "cant find UserName, plz register";	
	}	
}

 ?>
