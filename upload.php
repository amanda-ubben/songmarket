<?php // upload.php
echo <<<_END
<html><head><title>PHP Form</title></head><body>
<form method='post' action='upload.php' encrypt='multipart/formdata'>
Select File: <input type='file' name='filename' size='10'/>
<input type='submit' value ='Upload'/>
</form>
_END;

if ($_FILES)
{
	$name = $_FILES['filename']['name'];
	move_uploaded_files($_FILES['filename']['tmp_name'], $name);
	echo "Uploaded image '$name'<br /><img src='$name' />
}

echo "</body></html>";
?>
