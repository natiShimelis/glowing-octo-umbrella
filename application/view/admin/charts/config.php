<?php
$connection = new mysqli("localhost","root","","bird");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}