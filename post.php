<?php
    function edit_image(string $photo_name) : string {
        if(strpos($photo_name, "%") >= 0):
               $photo_name = str_replace("%", "_", $photo_name);
        endif;
        if(strpos($photo_name, "Bin_Emmanuel") === FALSE):
               $photo_name = "Bin_Emmanuel_".$photo_name;
        endif;
        return $photo_name;
    }
    if(isset($_FILES['dir'])):
        (bool) $error = false;
        $image_folder = "Upload";
        $valid_ext = ['jpg', 'png', 'jpeg'];
        if(!is_dir($image_folder)):
            mkdir($image_folder, 0777);
        endif;
        $len = count($_FILES['dir']);
        for ($i=0; $i < $len - 1; $i++) { 
            $name = $_FILES['dir']['name'][$i];
            $tmp = $_FILES['dir']['tmp_name'][$i];

            $ext_name = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $photo_name = pathinfo($name, PATHINFO_FILENAME);
            if(in_array($ext_name, $valid_ext)):
                $path = $image_folder."/".edit_image($photo_name).".".$ext_name;
                if(move_uploaded_file($tmp, $path)):
                    print("ALL done Mannie");
                else:
                    print("Something went wrong. . . Please try again");
                endif;
            else:
                print("Please select a valid image");
            endif;
        }
    endif;
?>