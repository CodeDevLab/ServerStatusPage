<?php
function check_port($port) {
    $conn = @fsockopen("127.0.0.1", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
    else {
     require 'online.php';
    }
}

function server_report() {
    $report = array();
    $svcs = array('21'=>'FTP',
                  '22'=>'SSH',
                  '25'=>'SMTP',
                  '80'=>'HTTP',
                  '110'=>'POP3',
                  '143'=>'IMAP',
                  '3306'=>'MySQL');
    foreach ($svcs as $port=>$service) {
        $report[$service] = check_port($port);
    }
    return $report;
}
$report = server_report();

?>






<?php

function check_port_ssp($port) {
    $conn = @fsockopen("182.253.190.114", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
    else {
     require 'online.php';
    }
}

function server_report_ssp() {
    $report_ssp = array();
    $svcs = array('8000'=>'API');
    foreach ($svcs as $port=>$service) {
        $report_ssp[$service] = check_port_ssp($port);
    }
    return $report_ssp;

}

$report_ssp = server_report_ssp();
?>






<?php

function check_port_accounting($port) {
    $conn = @fsockopen("www.smartaccounting.me", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
    else {
     require 'online.php';
    }
}

function server_report_accounting() {
    $report_accounting = array();
    $svcs = array('80'=>'HTTP');
    foreach ($svcs as $port=>$service) {
        $report_accounting[$service] = check_port_accounting($port);
    }
    return $report_accounting;

}

$report_accounting = server_report_accounting();
?>

