<?php
if ($_SERVER["REQUEST_METHOD"] !=="POST")
{ 
     exit("POST request method required");
}

if(empty($_FILES))
{
    exit('$_FILES is empty - is file_uploads enabled in php.ini?');
}

if($_FILES["image"]["error"] !== UPLOAD_ERR_OK){
    switch($_FILES["image"]["error"]){
        case UPLOAD_ERR_PARTIAL;
        exit("File only partial uploaded");
        break;

        case UPLOAD_ERR_PARTIAL;
        exit("No file was uploaded");
        break;

        case UPLOAD_ERR_EXTENSION;
        exit("File upload stopped by a PHP extension");
        break;

        case UPLOAD_ERR_FORM_SIZE;
        exit("File exceeds MAX_FILE_SIZE in the HTML form");
        break;

        default;
        exit("Unkwown upload error");
        break;
    }
}
print_r($_FILES);


?>