<?php 

// Require class file
require "LogRequest.php";

/** Instance LogRequest class
	@dir dir/file.txt format
	@round integer number for round the seconds
**/
$log = new LogRequest("log.txt", "d/m/Y H:i:s", 2);

// Some code for test propose only
for($i = 1; $i <= 2; $i++){
	sleep(1);
}

// Finalize the counter and generate log.txt file
$log->end();
