<?php 
// This scripts updates the lat/lng for a locaties post.
require_once("../../../../wp-load.php");

// Did we get anything back at all?
if(empty($_POST)){
    echo 'false';
    return false;
}

// Check if everything is filled in
if(empty($_POST['city'])){
    echo 'false';
    return false;
}

// Return number
echo(rand(2,5));

return true;