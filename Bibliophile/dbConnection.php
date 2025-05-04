<?php
$server = 'tcp:asadayoub.database.windows.net,1433';
$database = 'LibraryDB';
$username = 'asad';
$password = 'Hafiz6568!';
$maxRetries = 5; // Maximum number of retries
$retryInterval = 5; // Time (in seconds) to wait between retries
$retryCount = 0; // Initialize retry counter

while (true) {
    $connection = odbc_connect("Driver={ODBC Driver 17 for SQL Server};Server=$server;Database=$database;", $username, $password, SQL_CUR_USE_DRIVER);

    if ($connection) {
        // echo "Connected successfully!";
        break; // Exit the loop when connection is successful
    } else {
        $retryCount++;
        // echo "Connection failed. Retrying ($retryCount)...\n";

        if ($retryCount >= $maxRetries) {
            // echo "Max retries reached. Exiting...";
            exit; // Exit the script if maximum retries are reached
        }

        sleep($retryInterval); // Wait before trying again
    }
}
