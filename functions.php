<?php
include('session.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysqli = mysqli_connect("localhost", "root", "root", "joharWindow");
if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

if (!$mysqli)
  {
  die('Could not connect: ' . mysqli_error());
  }

$db = mysqli_select_db($mysqli, 'joharWindow');

if (!$db)
  {
  die ("Can\'t use joharWindow : " . mysqli_error());
  }
$user = $session_username;
$friendUsername;

if(isset($_POST['source1'])) {
	$src1 =array();
	$AdjectivesArray = array();
	$src1= $_POST['source1'];
	$AdjectivesArray = array_map('trim', $src1);
	insertMyFacade();
}
if(isset($_POST['source2'],$_POST['friend'])) {
	global $friendUsername;
	$friend = $_POST['friend'];
	$friendUsername = $friend;
	$src2 =array();
	$AdjectivesFromFriendArray = array();
	$src2= $_POST['source2'];
	$AdjectivesFromFriendArray = array_map('trim', $src2);
	insertAdjectivesFromFriend();
}



function getAllAdjectives(){
	$mysqli = mysqli_connect("localhost", "root", "root", 'joharWindow');
	$query = $mysqli->query("SELECT value FROM adjectives");
		while($rowtwo = $query->fetch_assoc()){
		  echo '<div>
				<input name="adjective" id="btn" class="myButton adjective-button" type="button"  value="'.$rowtwo['value'].'"/>
				<span class="remove-adjective"></span>
				</div>';
		}
}
function getMyUnknownAdjectives(){
	global $user;
	global $AdjectivesArray;
	global $mysqli;
	global $db;
	$query = "SELECT value FROM adjectives WHERE id NOT in (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user'))";
	$result = $mysqli->query($query);
		if ($result){
			while ($row = $result->fetch_assoc()) {
				foreach($row as $key => $field) {
				echo '<span>'.htmlspecialchars($field).'</span>';
				}
			}
		}else{
			$err = mysqli_error();
			die("<br>{$query}<br>*** {$err} ***<br>");
		}
}

function insertMyFacade(){
		global $user;
		global $AdjectivesArray;
		global $mysqli;
		global $db;
			if (count($AdjectivesArray) == 6 ) {
				for ($i=0; $i <= 5; $i++){
				$sql = "INSERT INTO relations (userID, adjectiveID, lahter) VALUES ((SELECT id from LOGIN where username ='$user'), (SELECT id FROM adjectives WHERE value='".$AdjectivesArray[$i]."'), 'facade')";
				$result = $mysqli->query($sql);
				}
				if ($result) {
					header('Content-type: application/json');
					$response_array['status'] = 'success';
					$response_array['statusMessage'] = 'New entry added';
					echo json_encode($response_array);

				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
				}
			}else{
		   header('Content-type: application/json');
			 $response_array['status'] = 'error';
			 $response_array['statusMessage'] = 'Missing adjectives ( must be at leat 6 )';
			 echo json_encode($response_array);
			}
			mysqli_close($mysqli);
}
function ShowAdjectives(){
		global $AdjectivesArray;
		for($s=0; $s <=5; $s++){
			print_r ($AdjectivesArray[$s]);
		}

}
function insertAdjectivesFromFriend(){
		global $user;
		global $friendUsername;
		global $AdjectivesFromFriendArray;
		global $mysqli;
		global $db;
				if (count($AdjectivesFromFriendArray) == 6 ) {
					for ($i=0; $i <= 5; $i++){
					$sql = "INSERT INTO relations (userID, adjectiveID, lahter) VALUES ((SELECT id from LOGIN where username ='$friendUsername'), (SELECT id FROM adjectives WHERE value='".$AdjectivesFromFriendArray[$i]."'), 'facade')";
					$result = $mysqli->query($sql);
					}
					if ($result) {
						header('Content-type: application/json');
						$response_array['status'] = 'success';
						$response_array['statusMessage'] = 'New entry added';
						echo json_encode($response_array);

					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
				}else{
				 header('Content-type: application/json');
				 $response_array['status'] = 'error';
				 $response_array['statusMessage'] = 'Missing adjectives ( must be at leat 6 )';
				 echo json_encode($response_array);
				}
				mysqli_close($mysqli);



}
function getFriends(){
	global $user;
	$mysqli = mysqli_connect("localhost", "root", "root", 'joharWindow');
	$query = $mysqli->query("SELECT firstname, lastname, username FROM login WHERE ID IN (SELECT friendID FROM friends WHERE userID IN( SELECT id FROM login WHERE username ='$user'))");
		if (!$query) {
	    printf("Error: %s\n", mysqli_error($mysqli));
	    exit();
		}


		echo '<form action="/test-friend" method="POST">';
				echo '<ul class="friends-list">';
					while($rowtwo = $query->fetch_array()){
						echo '<li>';
							echo '<p>'.$rowtwo['firstname'].' '.$rowtwo['lastname'];
						  echo '<input name="friend" id="WhatButton" type="hidden" class="myButton" value="'.$rowtwo['username'].'"/>';
							echo '<button class="cta-button" style="margin-left:10px;" type="submit">Test</button></p>';
						echo '</li>';
					}
				echo '</ul>';
		echo '</form>';

}
function getFriendInfo($friendUsername){
	global $friendUsername;
	global $mysqli;
	//echo $friendUsername;
	// SQL Query To Fetch Complete Information Of User
	$ses_sql=$mysqli->query("select * from login where username='$friendUsername'");
	$result = mysqli_fetch_assoc($ses_sql);
	$friendInfo = array();
	$friendInfo['FirstName'] = $result['firstname'];
	$friendInfo['LastName'] = $result['lastname'];
	$friendInfo['UserName'] = $result['username'];
	$friendInfo['Email'] = $result['email'];
	$friend_created = $result['created'];
	$date = new DateTime($friend_created);
	$friend_created = $date->format('d.m.Y');
	$friendInfo['Created'] = $friend_created;

	return $friendInfo;
}
function getMyArena(){
	global $db;
	global $user;
	global $mysqli;
	$facade = array();
	$arena = array();
	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='facade')";
	$query2 = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";
	$result = $mysqli->query($query);
	$result2 = $mysqli->query($query2);
			while ($row2 = $result->fetch_assoc()) {
				foreach($row2 as $key => $facadefield) {
					array_push($facade, $facadefield);
				}
			}
			while ($row2 = $result2->fetch_assoc()) {
				foreach($row2 as $key => $arenafield) {
					array_push($arena, $arenafield);
				}
			}
			$result3 = array_intersect($facade, $arena);
				foreach($result3 as $key => $realArena) {
					echo '<span>'.htmlspecialchars($realArena).'</span>';
				}

}
function getMyFacade(){
	global $db;
	global $user;
	global $mysqli;
	$facade = array();
	$arena = array();
	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='facade')";
	$query2 = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";
	$result = $mysqli->query($query);
	$result2 = $mysqli->query($query2);
			while ($row2 = $result->fetch_assoc()) {
				foreach($row2 as $key => $facadefield) {
					array_push($facade, $facadefield);
				}
			}
			while ($row2 = $result2->fetch_assoc()) {
				foreach($row2 as $key => $arenafield) {
					array_push($arena, $arenafield);
				}
			}
			$result3 = array_diff($facade, $arena);
				foreach($result3 as $key => $realFacade) {
					echo '<span>'.htmlspecialchars($realFacade).'</span>';
				}

}
function getMyBlindSpot(){
	global $db;
	global $user;
	global $mysqli;
	$facade = array();
	$arena = array();
	$blindspot = array();
	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";
	$query2 = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='facade')";
	$result = $mysqli->query($query);
	$result2 = $mysqli->query($query2);
			while ($row2 = $result->fetch_assoc()) {
				foreach($row2 as $key => $arenafield) {
					array_push($arena, $arenafield);
				}
			}
			while ($row2 = $result2->fetch_assoc()) {
				foreach($row2 as $key => $blindspotfield) {
					array_push($blindspot, $blindspotfield);
				}
			}
			$result3 = array_diff($arena, $blindspot);
				foreach($result3 as $key => $realBlindSpot) {
					echo '<span>'.htmlspecialchars($realBlindSpot).'</span>';
				}

}

?>
