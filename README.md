# Log-Request
A simple log maker for request that storage url requests and time execution of then

## How to use:

```
// Require class file
require "LogRequest.php";

/** Instance LogRequest class
    @param $file dir/file.txt format
    @param $dateFormat - optional Default: "d/m/Y H:i:s"
    @param $round - optional - integer number of digits after dot infloat falue seconds - Default: 2 = 1.35s
**/
$log = new LogRequest("log.txt", "d/m/Y H:i:s", 2);

// Some code for test propose only
for($i = 1; $i <= 2; $i++){
	sleep(1);
}

// Finalize the counter and generate log.txt file
$log->end();
```

This will create a file.txt in dir directory on your app with something like:

```
[30/09/2019 23:47:23] - http://localhost/LogRequest/teste.php?param=teste - ExecTime: 2 sec
```
