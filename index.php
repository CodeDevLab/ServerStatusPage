<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Status of Servers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="css/favicon.png" type="image/x-icon" />

    <META HTTP-EQUIV="refresh" CONTENT="5">
    
    <!-- CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      #wrap > .container {
        padding-top: 60px;
      }
      .container .credit {
        margin: 20px 0;
      }

      code {
        font-size: 80%;
      }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <![endif]-->

  </head>

  <body>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
           <img src='css/anredwhitebluedots.gif' width='10' height='10' style='margin-top:15px; padding-right:10px;' align='left'> <a class="brand" href="#"> Server Status Page </a>
            <div class="nav-collapse collapse">
              <ul class="nav">
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>



<?php
function check_port($port) {
    $conn = @fsockopen("127.0.0.1", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
}

function server_report() {
    $report = array();
    $svcs = array('80'=>'HTTP',
                  '21'=>'SFTP',
                  '3306'=>'Database');
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





      <!-- Begin page content -->
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                  <table class="table table-bordered">
                    <h5>s6pay.com</h5>
                    <thead>
                      <tr>
                        <th>Service</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>HTTP</td>
                        <td width='50px;'><?php echo $report['HTTP'] ? "<font style=color:blue;> 
                            <button type='button' class='btn btn-xs btn-primary'>Online</button>" : "
                            <button type='button' class='btn btn-xs btn-danger'>Offline</button>"; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>SFTP</td>
                        <td><?php echo $report['SFTP'] ? "<font style=color:blue;> 
                            <button type='button' class='btn btn-xs btn-primary'>Online</button>" : "
                            <button type='button' class='btn btn-xs btn-danger'>Offline</button>"; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>DB</td>
                        <td><?php echo $report['Database'] ? "<font style=color:blue;> 
                            <button type='button' class='btn btn-xs btn-primary'>Online</button>" : "
                            <button type='button' class='btn btn-xs btn-danger'>Offline</button>"; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                  <table class="table table-bordered">
                    <h5>API SSP</h5>
                    <thead>
                      <tr>
                        <th>Service </th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>API</td>
                        <td width='50px'><?php echo $report_ssp['API'] ? "<font style=color:blue;> 
                            <button type='button' class='btn btn-xs btn-primary'>Online</button>" : "
                            <button type='button' class='btn btn-xs btn-danger'>Offline</button>"; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                  <table class="table table-bordered">
                    <h5>Smartaccounting</h5>
                    <thead>
                      <tr>
                        <th>Service </th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>HTTP</td>
                        <td width='50px'><?php echo $report_accounting['HTTP'] ? "<font style=color:blue;> 
                            <button type='button' class='btn btn-xs btn-primary'>Online</button>" : "
                            <button type='button' class='btn btn-xs btn-danger'>Offline</button>"; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>

        </div>

      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit">&copy; Copyright 2017 - SSP. All Rights Reserved. Owned & Developed by: www.syde.co</p>
      </div>
    </div>

  </body>
</html>

