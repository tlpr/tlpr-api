<?php
/*
 *
 * The Las Pegasus Radio (https://github.com/tlpr)
 * This code is licensed under the GNU AGPL-3.0-only license
 * https://www.gnu.org/licenses/agpl-3.0.html
 *
 */


require_once("../database.php");
header("Content-Type: application/json");

$database = new database();
$mysqli = $database->get_connection_object();
$request_method = $_SERVER[ "REQUEST_METHOD" ];


switch ($request_method)
{

  # Get record from database.
  case "GET":
    
    if (!isset($_GET[ "song_id" ], $_GET["song_id"]))
		die( json_encode(array("status" => false, "status-text" => "User ID and Song ID are required.")) );
		
	$response = get_status($_GET[ "user_id" ], $_GET[ "song_id" ]);
	echo json_encode($response);
    
    break;
  # ----

  # Insert new record
  case "POST":
    # ...
    break;
  # ----

  # Update existing record
  case "PUT":
    # ...
    break;
  # ----

  # Remove record
  case "DELETE":
    # ...
    break;
  # ----

  default:
    echo json_encode( array("status" => false, "status-text" => "Method not accepted.") );
    http_response_code(405);
    break;

}



function get_status($user_id, $song_id)
{
	
	global $mysqli;
	
	if ( !is_numeric($user_id) || !is_numeric($song_id) )
		return array("status" => false, "status-text" => "IDs has to be a number.");
		
	$sql = "SELECT * FROM `likes` WHERE `user_id` = $user_id AND `song_id` = $song_id";
	$response = $mysqli->query($sql);
	
	if (!$response)
		return array("status" => false, "status-text" => "Database error: $mysqli->error");
		
	$data = $response->fetch_array(MYSQLI_ASSOC);
	if ( empty($data) )
		return array("status" => false, "status-text" => "This user has not liked this song yet.");
		
	return array("status" => true, "status-text" => "Found status for this user and song.", "data" => $data);
		
	
}

