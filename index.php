<?php

////// library

class Job {
    public function task (Logger $logger){
        for($i=0; $i<10; $i++){
            $logger->log("task $i done");
        }
    }
}

class ConsoleLogger implements Logger{
    public function log($msg){
        echo $msg, "\n";
    }
}

interface Logger {
    public function log($msg);
}



////// library user code

class nothinLogger implements Logger {
    public function log($msg){
    }
}

class fileLogger {
    public function log($msg){
        $file = fopen("log.txt", "a");
        fwrite($file, $msg."\n");
        fclose($file);
    }
}

$job = new Job();
$logger = new NothingLogger();
$job->task($logger);




