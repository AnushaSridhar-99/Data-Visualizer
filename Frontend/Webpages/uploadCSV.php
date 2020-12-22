<?php
 if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["csvFile"])) {

            //if there was an error uploading the file
        if ($_FILES["csvFile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["csvFile"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "Upload: " . $_FILES["csvFile"]["name"] . "<br />";
             echo "Type: " . $_FILES["csvFile"]["type"] . "<br />";
             echo "Size: " . ($_FILES["csvFile"]["size"] / 1024) . " Kb<br />";
             echo "Temp file: " . $_FILES["csvFile"]["tmp_name"] . "<br />";

                 //if file already exists
             if (file_exists("upload/" . $_FILES["csvFile"]["name"])) {
            echo $_FILES["csvFile"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = $_FILES["csvFile"]["name"];
            move_uploaded_file($_FILES["csvFile"]["tmp_name"], "upload/" . $storagename);
			echo "Stored in: " . "upload/" . $_FILES["csvFile"]["name"] . "<br />";
			}
			echo exec("python D:\\\\xampp\\\\htdocs\\\\DataVisualizer\\\\Frontend\\\\Webpages\\\\InsertCSV.py ".$_FILES["csvFile"]["name"]);
			echo "Inserted to DB successfully";
        }
     } else {
             echo "No file selected <br />";
     }
}
?>