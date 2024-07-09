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

        case UPLOAD_ERR_INI_SIZE;
        exit("File exceeds upload_max_filesize in php.ini");
        break;

        default;
        exit("Unkwown upload error");
        break;
    }
}
if($_FILES["image"]["size"] > 5098576)
{
    exit("File is too large(Max 5MB)");
}
print_r($_FILES);


?>