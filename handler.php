<?php

include('db.php');

$action = $_GET['action'];

$username = $con->real_escape_string($_GET['username']);
$password = $con->real_escape_string(md5(md5(md5($_GET['password']))));
$hwid = $con->real_escape_string($_GET['hwid']);
$invite_code = $con->real_escape_string($_GET['invite_code']);
$logged = false;

if(!$action)
{
	echo "Error";
}
else
{	
	if($action == "register_admin_xd")
	{
		if($query = $con->query("INSERT INTO users (username,password) VALUES ('$username','$password')"))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	else if($action == "login3")
	{
		$query = $con->query("SELECT * FROM users WHERE username = '$username' and password = '$password'");
		$cnt = $query->num_rows;
		
		if($cnt == 1)
		{
			echo "1";
		}
		elseif ($cnt == 0)
		{
			echo "0";
		}
		elseif($cnt == 2)
		{
			echo "2";
		}
		elseif ($cnt == 3)
		{
			echo "3";
		}
		else
		{
			echo "0"; 
		}
	}
	else if($action == "admin")
	{
		$query = $con->query("SELECT * FROM admin WHERE username = '$username' and password = '$password' and hwid = '$hwid'");
		$cnt = $query->num_rows;
		
		if($cnt == 1)
		{
			echo "1";
		}
		elseif ($cnt == 0)
		{
			echo "0";
		}		
		else
		{
			echo "0"; 
		}
	}
	else if($action == "hwid")
	{
		$query = $con->query("SELECT * FROM users WHERE username = '$username' and password = '$password' and hwid = '$hwid'");
		$cnt = $query->num_rows;
		
		if($cnt == 1)
		{
			echo "1";
		}
		elseif ($cnt == 0)
		{
			echo "0";
		}		
		else
		{
			echo "0"; 
		}
	}
	else if($action == "dl")
	{
		$query = $con->query("SELECT * FROM users WHERE username = '$username' and password = '$password' and hwid = '$hwid'");
		$cnt = $query->num_rows;
		
		if($cnt == 1)
		{
			$logged = true;
		}
		elseif ($cnt == 0)
		{
			$logged = false;
		}		
		else
		{
			$logged = false;
		}
		if ($logged)
		{
			$filename = "https://github.com/kuba0742/vaccbannicja/raw/master/hwhazfagsdgafs.dll";
            $mimetype = "mime/type";
            header("Content-Type: ".$mimetype );
            echo readfile($filename);
		}
	}
	else if($action == "dli")
	{
		$query = $con->query("SELECT * FROM users WHERE username = '$username' and password = '$password' and hwid = '$hwid'");
		$cnt = $query->num_rows;
		
		if($cnt == 1)
		{
			$logged = true;
		}
		elseif ($cnt == 0)
		{
			$logged = false;
		}		
		else
		{
			$logged = false;
		}
		if ($logged)
		{
			$filename = "https://github.com/kuba0742/vaccbannicja/raw/master/HWID Generator.exe";
            $mimetype = "mime/type";
            header("Content-Type: ".$mimetype );
            echo readfile($filename);
		}
	}
	else if($action == "create_invite")
	{
		$query = $con->query("SELECT * FROM users WHERE username = '$username' and password = '$password' and hwid = '$hwid'");
		$cnt = $query->num_rows;	
		if($cnt == 1)
		{
			$logged = true;
		}
		elseif ($cnt == 0)
		{
			$logged = false;
		}		
		else
		{
			$logged = false;
		}
		if ($logged)
		{
			if($query = $con->query("INSERT INTO invites (data) VALUES ('$invite_code')"))
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		}
	}
	
	else if($action == "sadness")
	{

	if($query = $con->query("INSERT INTO free (hwid) VALUES ('$hwid')"))
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
		  
	}
	else if($action == "register")
	{
		$query = $con->query("SELECT * FROM invites WHERE data = '$invite_code'");
		$cnt = $query->num_rows;	
		if($cnt == 1)
		{
			$logged = true;
		}
		elseif ($cnt == 0)
		{
			$logged = false;
		}		
		else
		{
			$logged = false;
		}
		
		if ($logged)
		{
			
			if($query = $con->query("DELETE FROM invites WHERE data = '$invite_code'"))
		    {
				if($query = $con->query("INSERT INTO users (username,password,hwid) VALUES ('$username','$password','$hwid')"))
				{
					echo "1";
				}			
		    }
		}
		else
		{
			echo "033";
		}	
	}
	else if($action == "getrank")
	{
		echo "something";
		$query = $con->query("SELECT rank FROM users3 WHERE username = '$username'");
	    $result = $con->query("SELECT rank FROM users3 WHERE username = '$username'");
		echo $result->fetch_object()->memTotal;

	}

}

?>
