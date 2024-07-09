
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/image.jpg">
    <title>PHP File upload</title>
</head>
<body>
    <h1>File Uploads</h1>
    <form action="process-form.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="5098576">

        <label for="image">Image File</label>
        <input type="file" id="image" name="image">

        <label for="file2">Another file</label>
        <input type="file" id="file2" name="file2">
        <button>Upload</button>

    </form>



    
</body>
</html>