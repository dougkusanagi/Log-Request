<?php

class LogRequest{
	private $logFile;
	private $mode;
	private $startTime;
	private $endTime;
	private $txt;
	private $round;
	private $dateFormat;

	/**
	*	Initialize the counter of microtime
	*	@param $logFile file with directory for writing the logs
	*	@param $dateFormat format for date - default: 'd/m/Y H:i:s'
	*	@param $round integer value for round decimals - default: 2
	*	@return void
	**/
	public function __construct($logFile, $dateFormat = 'd/m/Y H:i:s', $round = 2){
		$this->startTime = $this->getMicroTime();
		$this->logFile = $this->normalizeSeparator($logFile);
		$this->round = $round;
		$this->dateFormat = $dateFormat;
		$this->txt = $this->getTimeRequest();
		$this->txt .= " - ".$this->getRequest();
	}

	/**
	*	Stops the counter of microtime and save the log file in @this->logFile
	*	@param void
	*	@return void
	**/
	public function end(){
		$this->endTime = $this->getMicroTime();
		$diference = (float)$this->endTime - (float)$this->startTime;
		$diference = round($diference, $this->round);
		$this->txt .= " - ExecTime: ". $diference ." sec\n";
		$this->start();
	}

	private function start(){
		$file = fopen($this->logFile, "a+") or die("Unable to open file!");
		fwrite($file, $this->txt);
		fclose($file);
	}

	private function normalizeSeparator($logFile){
		$ds = DIRECTORY_SEPARATOR;
		if($ds == "/"){
			return str_replace("\\", $ds, $logFile);
		}else{
			return str_replace("/", $ds, $logFile);
		}
	}

	private function checkFileExists(){
		if(file_exists($this->logFile)){ return true; }
		return false;
	}

	private function getMicroTime(){
		return microtime(true);
	}

	private function getTimeRequest(){
		return "[".date($this->dateFormat)."]";
	}

	private function getRequest(){
		// var_dump($_SERVER);
		return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	}
}
