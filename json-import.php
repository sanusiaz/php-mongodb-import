<?php

require 'vendor/autoload.php';

$databaseName = 'test';

// make sure this folder exists
$extractedFolder = __DIR__ . '/mongodb_dump/extracted/';

$files = scandir($extractedFolder);

// Remove '.' and '..' from the list
$files = array_diff($files, ['.', '..']);


$clientInstance = new MongoDB\Client();

$database = (new MongoDB\Client)->selectDatabase($databaseName);

// Check if each file is of the desired type
foreach ($files as $file) {
    $filePath = $extractedFolder . '/' . $file;

    // Use pathinfo to extract the file extension
    $fileInfo = pathinfo($filePath);
    $fileExtension = strtolower($fileInfo['extension']);

    // Check if the file is of the desired type
    if ($fileExtension === "json") {
        $collectionName = pathinfo($file, PATHINFO_FILENAME);


        $collections = $database->listCollections();

        $parsedCollectionName = [];


        foreach ($database->listCollections() as $collectionInfo) {
            $parsedCollectionName[] = $collectionInfo->getName();
        }

        if ( !in_array($collectionName, $parsedCollectionName) ) {

            // Create Collection  from File
            $result = $database->createCollection($collectionName, [
                'validator' => [],
            ]);

            
            $command = "mongoimport --db $databaseName --collection $collectionName --type json --file $filePath --jsonArray";

            // Execute the command
            $output = [];
            $returnVar = 0;
            exec($command, $output, $returnVar);

            // Check for success or failure
            if ($returnVar === 0) {
                echo "Collection {$collectionName} Data Imported Successfully \n";
            } else {
                echo "An Error Occurred In Importing Collection {$collectionName} data \n";
            }

            continue;
        }
        else {
            echo $collectionName . " Already Exists \n";
        }
       

    }
}
