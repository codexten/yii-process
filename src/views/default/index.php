<?php
/**
 * Created by PhpStorm.
 * User: jomon
 * Date: 24/3/19
 * Time: 5:45 PM
 */

$process = [

];

use Cocur\BackgroundProcess\BackgroundProcess;

//$process = new BackgroundProcess('sleep 150');
//$process->run();
$process = BackgroundProcess::createFromPID(587);
$process->stop();

if ($process->isRunning()) {
    echo "Process Is running in {$process->getPid()}";
//    $process->stop();
} else {
    echo "Process Is not running";
}
//
//echo sprintf('Crunching numbers in process %d', $process->getPid());
//while ($process->isRunning()) {
//    echo '.';
//    sleep(1);
//}
//echo "\nDone.\n";