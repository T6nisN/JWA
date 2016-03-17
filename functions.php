<?php
include('session.php');

$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("joharWindow", $connection);
$user = $login_session;
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
	$query = mysql_query("SELECT value FROM adjectives");	
		echo '<div class="col-md-8">';
		while($rowtwo = mysql_fetch_array($query)){
		  echo '<div>
				<input style="width:22%;float:left;" name="adjective" id="btn" class="myButton" type="button"  value="'.$rowtwo['value'].'"/>
				</div>';
		}
		echo '</div';
}
//function getMyFacade(){
//	global $user;
//	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter!='arena' && lahter!='blindspot' && lahter!='unknown')";	
//	$result = mysql_query($query);
//		if ($result){
//			while ($row = mysql_fetch_assoc($result)) {
//				foreach($row as $key => $field) {
//					echo htmlspecialchars($field).' ';
//					
//				}
//			}
//			
//		}else{
//			$err = mysql_error();
//			die("<br>{$query}<br>*** {$err} ***<br>");
//		}
//}
//function ggetMyArena(){
//	global $user;
//	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";	
//	$result = mysql_query($query);
//		if ($result){		
//			while ($row = mysql_fetch_assoc($result)) {
//				foreach($row as $key => $field) {
//				echo htmlspecialchars($field).' ';
//				}
//			}
//		}else{
//			$err = mysql_error();
//			die("<br>{$query}<br>*** {$err} ***<br>");
//		}
//}
//function getMyBlindSpot(){
//	global $user;
//	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter ='blindspot' )";	
//	$result = mysql_query($query);
//		if ($result){
//			while ($row = mysql_fetch_assoc($result)) {
//				foreach($row as $key => $field) {
//				echo htmlspecialchars($field).' ';
//				}
//			}
//		}else{
//			$err = mysql_error();
//			die("<br>{$query}<br>*** {$err} ***<br>");
//		}
//}
function getMyUnknownAdjectives(){
	global $user;
	$query = "SELECT value FROM adjectives WHERE id NOT in (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user'))";	
	$result = mysql_query($query);
		if ($result){
			while ($row = mysql_fetch_assoc($result)) {
				foreach($row as $key => $field) {
				echo htmlspecialchars($field).' ';
				}
			}		
		}else{
			$err = mysql_error();
			die("<br>{$query}<br>*** {$err} ***<br>");
		}
}

function insertMyFacade(){
		global $user;
		global $AdjectivesArray;
		global $connection;
		global $db;
			// Check connection
			$connection = mysqli_connect("localhost", "root", "");
			$db = mysqli_select_db($connection, "joharWindow");
				// Check connection
			if (!$connection) {
				die("Connection failed: " . mysqli_connect_error());
			}
			if (count($AdjectivesArray) == 6) {
			for ($i=0; $i <= 5; $i++){
			$sql = "INSERT INTO relations (userID, adjectiveID, lahter) VALUES ((SELECT id from LOGIN where username ='$user'), (SELECT id FROM adjectives WHERE value='".$AdjectivesArray[$i]."'), 'facade')";
			$result = mysqli_query($connection, $sql);
			}
			if (mysqli_query($connection, $result)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			}
			}else{ echo ("Liiga vähe omadussõnu");}
			mysqli_close($connection);
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
		print_r($AdjectivesFromFriendArray);
		//echo $user;
		//echo($friendUsername);
			$connection = mysqli_connect("localhost", "root", "");
			$db = mysqli_select_db($connection, "joharWindow");
				// Check connection
			if (!$connection) {
				die("Connection failed: " . mysqli_connect_error());
			}
			if (count($AdjectivesFromFriendArray) == 6) {
			for ($i=0; $i <= 5; $i++){
			$sql = "INSERT INTO relations (userID, adjectiveID, lahter) VALUES ((SELECT id from LOGIN where username ='$friendUsername'), (SELECT id FROM adjectives WHERE value='".$AdjectivesFromFriendArray[$i]."'), 'arena')";
			$result = mysqli_query($connection, $sql);
			}
			if (mysqli_query($connection, $result)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			}
			}else{ echo ("Liiga vähe omadussõnu");}
			mysqli_close($connection);
			
	

}
function getFriends(){
	global $user;
	$query = mysql_query("SELECT username FROM login WHERE ID IN (SELECT friendID FROM friends WHERE userID IN( SELECT id FROM login WHERE username ='$user'))");	
		echo '<form action="friendTest.php" method="POST">';
		while($rowtwo = mysql_fetch_array($query)){
		  echo '<input name="friend" id="WhatButton" type="submit" class="myButton" value="'.$rowtwo['username'].'"/>';
		}
		echo '</form>';
}
function getFriendInfo($friendUsername){
	global $friendUsername;
	echo $friendUsername;
//$query = mysql_query("SELECT * FROM login WHERE ID IN (SELECT friendID FROM friends WHERE userID IN( SELECT id FROM login WHERE username ='$friendUsername'))");	
//	echo '<form action="friendTest.php" method="POST">';
//	while($rowtwo = mysql_fetch_array($query)){
//	  echo '<input name="friend" id="WhatButton" type="submit" class="myButton" value="'.$rowtwo['username'].'"/>';
//	}
//	echo '</form>';
//
}
function getMyArena(){
	global $db;
	global $user;
	global $connection;
	$facade = array();
	$arena = array();
	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='facade')";	
	$query2 = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";	
	$result = mysql_query($query);
	$result2 = mysql_query($query2);
			while ($row2 = mysql_fetch_assoc($result)) {
				foreach($row2 as $key => $facadefield) {
					//echo htmlspecialchars($facadefield).' ';
					array_push($facade, $facadefield);
					
				}
			}
			while ($row2 = mysql_fetch_assoc($result2)) {
				foreach($row2 as $key => $arenafield) {
					//echo htmlspecialchars($arenafield).' ';
					array_push($arena, $arenafield);
				}
			}
			//if($facade == $arena){
			//	echo ("Need on samad/");
			//}else{
			//		echo("need ei ole samad/");
			//	
			//}
			$result3 = array_intersect($facade, $arena);
			
				foreach($result3 as $key => $realArena) { 
					echo htmlspecialchars($realArena).' ';
					
				}

			//print_r($facade);
			//print_r($arena);
		
}
function getMyFacade(){
	global $db;
	global $user;
	global $connection;
	$facade = array();
	$arena = array();
	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='facade')";	
	$query2 = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";	
	$result = mysql_query($query);
	$result2 = mysql_query($query2);
			while ($row2 = mysql_fetch_assoc($result)) {
				foreach($row2 as $key => $facadefield) {
					//echo htmlspecialchars($facadefield).' ';
					array_push($facade, $facadefield);
					
				}
			}
			while ($row2 = mysql_fetch_assoc($result2)) {
				foreach($row2 as $key => $arenafield) {
					//echo htmlspecialchars($arenafield).' ';
					array_push($arena, $arenafield);
				}
			}
			//if($facade == $arena){
			//	echo ("Need on samad/");
			//}else{
			//		echo("need ei ole samad/");
			//	
			//}
			$result3 = array_diff($facade, $arena);
			
				foreach($result3 as $key => $realFacade) { 
					echo htmlspecialchars($realFacade).' ';
					
				}

			//print_r($facade);
			//print_r($arena);
		
}
function getMyBlindSpot(){
	global $db;
	global $user;
	global $connection;
	$facade = array();
	$arena = array();
	$blindspot = array();
	$query = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='arena')";	
	$query2 = "SELECT value FROM adjectives WHERE ID IN (SELECT adjectiveID FROM relations WHERE userID =(SELECT id from LOGIN where username ='$user') && lahter='facade')";	
	$result = mysql_query($query);
	$result2 = mysql_query($query2);
			while ($row2 = mysql_fetch_assoc($result)) {
				foreach($row2 as $key => $arenafield) {
					//echo htmlspecialchars($facadefield).' ';
					array_push($arena, $arenafield);
					
				}
			}
			while ($row2 = mysql_fetch_assoc($result2)) {
				foreach($row2 as $key => $blindspotfield) {
					//echo htmlspecialchars($arenafield).' ';
					array_push($blindspot, $blindspotfield);
				}
			}
			//if($facade == $arena){
			//	echo ("Need on samad/");
			//}else{
			//		echo("need ei ole samad/");
			//	
			//}
			
			$result3 = array_diff($arena, $blindspot);
			
				foreach($result3 as $key => $realBlindSpot) { 
					echo htmlspecialchars($realBlindSpot).' ';
					
				}

			//7print_r($arena);
			//print_r($blindspot);
		
}

?>