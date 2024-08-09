<?php 
function isMobileDevice() {
    return preg_match("/(android|iphone|ipod|opera mini|iemobile)/i", $_SERVER['HTTP_USER_AGENT']);
}


?>