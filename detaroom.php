<?php session_start();
require_once 'mysql/connect.php';
$roomId = $_GET['roomId'];
echo "Room ID: " . $roomId;