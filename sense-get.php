<?php

ini_set('display_errors', 1); error_reporting(-1);

class dbconnection{
	private $servername = "69.90.161.65";
	private $username = "thewh134_super";
	private $password = "Super01";
	private $dbname = "thewh134_sense";

	private $flag = "false";
	private $currentTable = "notification";

	//----Query notification -----------------
	public function dbQuery(){

		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "SELECT flag FROM $this->currentTable WHERE id=1";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)){
				//echo "notification: " . $row["flag"]. "<br>";
				$currentFlag = $row["flag"];
			}
			} else {
		    echo "0 results";
		}

		//update notification flag
		if ($currentFlag == 'true') { 
			$dbconnection2 = new dbconnection;
			$dbconnection2->dbReset();
		};

		mysqli_close($conn);
	}


	//----Reset notifcation if 'true' -----------------
	public function dbReset(){

		$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE $this->currentTable SET flag='$this->flag' WHERE id=1";
		//$result = mysqli_query($conn, $sql);

		if ($conn->query($sql) === TRUE) {
	    echo "Notification reset";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		mysqli_close($conn);
	}
}

//----call dbQuery

$dbconnection = new dbconnection;
$dbconnection->dbQuery();

?>