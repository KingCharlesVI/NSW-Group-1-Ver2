<?php
// Example PHP script to check Arma 3 server status

// Function to check if Arma 3 server is online
function isArmaServerOnline($serverIP, $serverPort) {
    $timeout = 1; // Timeout in seconds
    $connection = @fsockopen($serverIP, $serverPort, $errno, $errstr, $timeout);
    if ($connection) {
        fclose($connection);
        return true; // Server is online
    } else {
        return false; // Server is offline
    }
}

// Example usage:
$serverIP = '64.74.161.163';
$serverPort = '2306';
$status = isArmaServerOnline($serverIP, $serverPort);
echo json_encode(array('isOnline' => $status));
?>