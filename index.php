<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <link rel="stylesheet" href="style.css">
    <body>

     <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
     </form>
 

<?php 
$imagesDirectory = "images/";

if(is_dir($imagesDirectory))
{
	$opendirectory = opendir($imagesDirectory);
  
    while (($image = readdir($opendirectory)) !== false)
	{
		if(($image == '.') || ($image == '..'))
		{
			continue;
		}
		
		$imgFileType = pathinfo($image,PATHINFO_EXTENSION);
		
		if(($imgFileType == 'jpg') || ($imgFileType == 'png'))
		{
			echo "<img src='images/".$image."' width='200'> ";
		}
    }
	
    closedir($opendirectory);
 
}
?>


 
<?php

$dir_path = "uploads/";
$extensions_array = array('jpg','png','jpeg');

if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            
           // check file extension
            if(in_array($extension, $extensions_array))
            {
            
            echo "<img src='$dir_path$files[$i]' style='width:400px;height:224px;'>";

            }
        }
    }
}
?>


      
    


    </body>
</html>