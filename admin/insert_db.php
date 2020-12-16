<?php
    include ("../includes/logincheck.php");
    include ("../includes/header.php");
    include ("../includes/mysql_connect.php");
    echo "<h1>Insert done</h1>";

    if(isset($_POST['submit']))
    {
        $thisFileName = basename($_FILES['file']['name']);
        $thisFileType = basename($_FILES['file']['type']);
        
        if(($thisFileType != "jpeg") && ($thisFileType != "pjpeg") && ($thisFileType != "png"))
        {
            echo "That is not a JPG or PNG image file";
            exit();
        }

        uploadImage();

        // Create display images at optimal screen size

        list($width, $height) = getimagesize("../uploads/originals/".$thisFileName);
        $resizedWidth = $width;

        if($width > 800)
        {
            $resizedWidth = 800;
        }
        if($height > 500)
        {
            $ratio = $width / $height;
            $height = 500;
            $resizedWidth = $height * $ratio;
        }
        if(($thisFileType != "jpeg") && ($thisFileType != "pjpeg"))
        {
            createThumbPNG($thisFileName, 120, "../uploads/thumbnail/");
            createThumbPNG($thisFileName, $resizedWidth, "../uploads/display/");
        }
        else
        {
            createThumbJPEG($thisFileName, 120, "../uploads/thumbnail/");
            createThumbJPEG($thisFileName, $resizedWidth, "../uploads/display/");
        }

        $item_name = $_POST['item_name'];
        $item_description = $_POST['item_description'];
        $category = $_POST['category'];
        $science_requirement = $_POST['science_requirement'];

        $require_item1 = $_POST['require_item1'];
        $require_item1_num = $_POST['require_item1_num'];
        $require_item2 = $_POST['require_item2'];
        $require_item2_num = $_POST['require_item2_num'];
        $require_item3 = $_POST['require_item3'];
        $require_item3_num = $_POST['require_item3_num'];

        $damage = $_POST['damage'];
        $durability = $_POST['durability'];
        $how_to_obtain = $_POST['how_to_obtain'];

        addToDB($thisFileName, $item_name, $item_description, $category, $science_requirement, $require_item1, $require_item1_num, $require_item2,$require_item2_num, $require_item3, $require_item3_num, $damage, $durability, $how_to_obtain, $con);  /* Add to database */
    }

    function alert($userPrompt, $result)
    {
        echo "<form id=\"alert\" name=\"alert\">";
        echo "
            <div class='alert alert-$result alert-dismissible' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                $userPrompt
            </div>";
        echo "</form>";
    }

    function uploadImage()
    {
        $targetFolder = "../uploads/originals/"; // Path to the destination folder
        $thisFileName = basename($_FILES['file']['name']);
        $thisFilePath = $targetFolder . $thisFileName;

        move_uploaded_file($_FILES['file']['tmp_name'],$thisFilePath) or die(alert("Could not move temp file.", "danger"));
    }

    function createThumbJPEG($fileName, $thumbWidth, $destination)
    {
        $originalFilePath = "../uploads/originals/".$fileName;
        list($width,$height) = getimagesize($originalFilePath);
        $imgRatio = $width/$height;
        $thumbHeight = $thumbWidth / $imgRatio;
        $thumb = imagecreatetruecolor($thumbWidth,$thumbHeight);
        $source = imagecreatefromjpeg($originalFilePath);

        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

        $newFileName = $destination . $fileName;

        imagejpeg($thumb, $newFileName, 0);
        imagedestroy($thumb);
        imagedestroy($source);

        echo "<img src=\"$newFileName\" />";
        alert("Image has been uploaded to the Database.", "success");
        
    }

    function createThumbPNG($fileName, $thumbWidth, $destination)
    {
        $originalFilePath = "../uploads/originals/".$fileName;
        list($width,$height) = getimagesize($originalFilePath);
        $imgRatio = $width/$height;
        $thumbHeight = $thumbWidth / $imgRatio;
        $thumb = imagecreatetruecolor($thumbWidth,$thumbHeight);
        $source = imagecreatefrompng($originalFilePath);

        $background = imagecolorallocate($thumb , 0, 0, 0);
        // removing the black from the placeholder
        imagecolortransparent($thumb, $background);

        // turning off alpha blending (to ensure alpha channel information
        // is preserved, rather than removed (blending with the rest of the
        // image in the form of black))
        imagealphablending($thumb, false);

        // turning on alpha channel information saving (to ensure the full range
        // of transparency is preserved)
        imagesavealpha($thumb, true);

        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

        $newFileName = $destination . $fileName;

        imagepng($thumb, $newFileName, 0);
        imagedestroy($thumb);
        imagedestroy($source);

        echo "<p><img src=\"$newFileName\" />";
        alert("Image has been uploaded to the Database.", "success");
        
    }

    function addtoDB($thisFileName, $item_name, $item_description, $category, $science_requirement, $require_item1, $require_item1_num, $require_item2,$require_item2_num, $require_item3, $require_item3_num, $damage, $durability, $how_to_obtain, $con)
    {
        $sql = "INSERT INTO craft(item_name, item_description, img_filename, category, science_requirement, require_item1, require_item1_num, require_item2, require_item2_num, require_item3, require_item3_num, damage, durability, how_to_obtain) VALUES('$item_name', '$item_description', '$thisFileName', '$category', '$science_requirement', '$require_item1', '$require_item1_num', '$require_item2', '$require_item2_num', '$require_item3', '$require_item3_num', '$damage', '$durability', '$how_to_obtain')";

        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    }
    include ("../includes/footer.php");
?>