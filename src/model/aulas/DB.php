<?php

try {
	$mysqli = new mysqli('localhost', 'root', '', 'horarios');
	
    }
catch(PDOException $e)
    {
    echo 'Error: ' . $e->getMessage();
    }
?>