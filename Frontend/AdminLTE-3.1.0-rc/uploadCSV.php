<?php
	foreach ($_FILES as $fileKey => $fileArray) {
		echo $fileArray['size'];
	}
	
?>