<?php 


function generateRandomString($length = 10) {
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charlength = strlen($chars);
		$randomString = '';
		for($i = 0; $i < $length; $i++) {
			$randomString .= $chars[rand(0, $charlength - 1)];
		}
		return $randomString;
	}

  if(isset($_GET['title'])) {
	  $result = $conn->prepare("SELECT * FROM table_name WHERE short_url=?");
	  $result->bind_param("s", $_GET['title']);
	  $result->execute();

	  $goto = $result->get_result()->fetch_array();
	  $g = $goto[1];

	  $sql = $conn->prepare("UPDATE table_name SET clicks = clicks + 1 WHERE short_url = ?");
      $sql->bind_param("s", $_GET['title']);
      $sql->execute();

	  header("location: $g");
  }

  if(isset($_POST['submit_url'])) {

	if(substr($_POST['submit_url'], 0, 7) != "http://") {
		$longurl= "http://".$_POST['long_url'];
	} else {
		$longurl=$_POST['long_url'];
	}

	$sql = $conn->prepare("INSERT INTO table_name (long_url) VALUES (?)");
    $sql->bind_param("s", $longurl);
    $sql->execute();

	$sql = $conn->prepare("SELECT id, long_url FROM table_name WHERE long_url=?");
    $sql->bind_param("s", $longurl);
    $sql->execute();
	$result = $sql->get_result();

	if($result->num_rows > 0) {
		$row = mysqli_fetch_array($result);
		$long = $row["long_url"];
		$id = $row["id"];
		$shorturl = generateRandomString();

		$sql = "UPDATE table_name SET short_url = '$shorturl' WHERE long_url='$longurl'";

		if ($conn->query($sql) === TRUE) {
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else {
		echo "We could not shorten that URL, please try again!";
	}
  }


?>