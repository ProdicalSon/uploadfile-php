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

        case UPLOAD_ERR_NO_TMP_DIR;
        exit("Temporary folder not found");
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

$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime_type = $finfo->file($_FILES["image"]["tmp_name"]);

// exit($mime_type);
$mime_types = ["image/gif", "image/jfif", "image/pdf", "image/png", "image/jpeg", "image/txt", "image/docx", "image/doc", "image/xls"];

if( ! in_array($_FILES["image"]["type"], $mime_types)){
    exit("File type is not supported");
}

$pathinfo = pathinfo($_FILES["image"]["tmp_name"]);
$base = $pathinfo["filename"];
$base = preg_replace("/[^\w-]/", "_", $base);



$filename = $base . "." . $pathinfo["extension"];

$destination = __DIR__ . "/uploads/" . $filename;

if ( ! move_uploaded_file($_FILES["image"]["tmp_name"], $destination))
{
exit ("Can not move Uploaded file");
}
print_r($_FILES);


?>

</body>
</html>







