<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../csss/style.css"/>
</head>
<body>
<h1>Image uploader</h1>
<form action="imageUploader.php" method="post" enctype="multipart/form-data">
    <input id="input" type="text" name="title" placeholder="Titel eingeben"><br/><br/><br/><br/>
    <input type="file" name="userFile"><br> <br>
    <input id="button" type="submit" name="upload" value="Hochladen">
</form>

</body>
</html>
