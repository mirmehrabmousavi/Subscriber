<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

function changeDateFormate($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function productImagePath($image_name)
{
    return public_path('images/products/' . $image_name);
}

function createDatabase($host, $database, $username, $password)
{
    /*DB::statement('CREATE DATABASE '.$database);
    DB::statement("CREATE USER '".$username."'@'".$host."' IDENTIFIED BY '".$password."'");
    DB::statement("GRANT ALL ON `".$database."`.* TO '".$username."'@'".$host."'");*/

    // Create new database
    DB::statement("CREATE DATABASE IF NOT EXISTS `".$database."`");
    // Granting user privileges to the $dbName
    DB::statement("GRANT ALL PRIVILEGES ON `".$database."`.* TO '".$username."'@'localhost' IDENTIFIED BY '".$password."'");
    // Then to make sure the new user settings take effect immediately, you can flush the privileges
    //DB::statement("FLUSH PRIVILEGES");
}

function importDataToDatabase()
{
    $sql_path = storage_path('your_file.sql');
    $sql = File::get($sql_path); // read the file
    DB::unprepared($sql); // run the SQL queries
    return response()->json(['message' => 'SQL File Imported Successfully'], 200);
}

function handleDatabase($dbName, $newDbName, $userName, $password){
    // Check if database exists
    $databases = DB::select('SHOW DATABASES');
    $databaseNames = array_map(function ($database) {
        return $database->Database;
    }, $databases);
    if (in_array($dbName, $databaseNames)) {
        // Alter existing database name
        DB::statement("RENAME DATABASE `$dbName` TO `$newDbName`");
    }
    // Create new database and user
    DB::statement("CREATE DATABASE `$dbName`");
    DB::statement("CREATE USER '$userName'@'localhost' IDENTIFIED BY '$password'");
    // Grant privileges
    DB::statement("GRANT ALL ON `$dbName`.* TO '$userName'@'localhost'");
}
