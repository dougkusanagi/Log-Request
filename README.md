# Log-Request
A simple log maker for request that storage url requests and time execution of then

##How to use:
```
// Require class file
require "LogRequest.php";

/** Instance LogRequest class
	@param $file dir/file.txt format
    @param $dateFormat
	@param $round integer number for round the seconds in decimals
**/
$log = new LogRequest("log.txt", "d/m/Y H:i:s", 2);

// Some code for test propose only
for($i = 1; $i <= 2; $i++){
	sleep(1);
}

// Finalize the counter and generate log.txt file
$log->end();
```
