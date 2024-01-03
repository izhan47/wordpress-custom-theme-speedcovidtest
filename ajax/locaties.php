<?php 
// This scripts updates the lat/lng for a locaties post.
require_once("../../../../wp-load.php");

// Did we get anything back at all?
if(empty($_POST)){
    echo 'false';
    return false;
}

// Check if everything is filled in
if(empty($_POST['lat']) || empty($_POST['lng']) || empty($_POST['post_id']) ){
    echo 'Niet alle data is meegegeven.';
    return false;
}

$lat = $_POST['lat'];
$lng = $_POST['lng'];
$id = $_POST['post_id'];

// Check if it is al numbers (which it needs to be...)
if(!is_numeric($lat) || !is_numeric($lng) || !is_numeric($id) ){
    echo 'Input heeft een verkeerd formaat';
    return false;
}

update_field('latitude' , $lat, $id); // Update Latitude
update_field('longitude', $lng, $id); // Update Longitude

echo 'Done';
return true;