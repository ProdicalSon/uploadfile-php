<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/image.jpg">
    <title>PHP File Upload</title>
</head>
<body>

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

$mime_types = ["image/gif", "image/jfif", "image/pdf", "image/png", "image/jpeg", "image/txt", "image/docx", "image/doc", "image/xls"];

if( ! in_array($_FILES["image"]["type"], $mime_types)){
    exit("File type is not supported");
}
print_r($_FILES);


?>

</body>
</html>







