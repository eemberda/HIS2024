<?php

/**
 * Configuration for database connection
 * Author: Roshin Reji
 */

$host       = "localhost";
$username   = "root";
$password   = "";
$dbname     = "appoinment_system";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );