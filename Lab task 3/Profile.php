<!DOCTYPE html>
<html>

<body>
    <form action="Upload.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><b>PROFILE PICTURE</b></legend>
            <img src="dummy.png" alt="Profile pic" width="180" height="180"><br>
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <hr>
            <input type="submit" value="Submit" name="submit">
        </fieldset>
    </form>
</body>

</html>