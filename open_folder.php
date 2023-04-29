<?php 
require "inc/functions.php";

require "inc/_header.php";
?>

<div class="row main" style="height: 100vh; width:100vw">
        <?php require "inc/_sidebars.php" ?>
        <div class="col-10">
            <div class="container">

                <div class="container das-title text-center pt-4">
                    Welcome to the Lokeshwar System
                </div>

                <main>
                    <div class="container main-content text-center mt-4 ">
                        <div class="fs-4 direc_title">
                            My Directory
                        </div>

                        <?php
 $fold_name = $_GET['fol'];

                        if (isset($_POST['create_folder'])) {
 $fold_name = $_GET['fol'];

                            $create_folder_name = $_POST['create_folder_name'];
                            $directory_path = "./directory/" . $fold_name;
                            if (!file_exists($directory_path . '/'. $create_folder_name)) {
                                $folder_created = mkdir($directory_path . '/' . $create_folder_name);
                                if ($folder_created) {
                                    success_alert("Folder Created Successfully ");
                                }
                            } else {
                                echo error_alert("File already exist !!");
                            }
                        }





                        ?>

                        <div class="folder_files_section mt-3">
                            <form action="" method="post" class="d-flex">
                                <div class="input-group mb-3 container">
                                    <input class="form-control" type="text" name="create_folder_name" id="" placeholder="Folder name">
                                    <button type="submit" class="btn btn-primary" name="create_folder">Create</button>
                                </div>

                            </form>
                            <div class="row mt-4">

                            <?php
 $fold_name = $_GET['fol'];

if(isset($_POST['delete_this_folder'])){
    // $delete_folder_name = $_POST['create_folder_name'];
 $fold_name = $_GET['fol'];
    
    $directory_path = "./directory/" . $fold_name;

    if(file_exists($directory_path)){
        
        if(is_dir($directory_path)){
            if (file_exists($directory_path)) {
 $sc = scandir($directory_path);

    $count_sc_file = count($sc);

    if($count_sc_file > 2){
        // foreach($sc as $sc_file){
            
        //         unlink($sc_file);
            
        // }

        for($i = 2; $i < $count_sc_file; $i++){
unlink($directory_path . '/' . $sc[$i]);
        }
    }

                $folder_deleted = rmdir($directory_path);
                if ($folder_deleted) {
                    success_alert("Folder Deleted Successfully ");
                }else{
                    error_alert("Folder not deleted");
                }
            } else {
                echo error_alert("Folder Not exist !!");
            }
        }
    }else{
        echo "folder not exist";
    }

   
}
                            ?>

<div class="delete_folder mb-4 pb-4">
    <div class="row">
        <div class="col-6">
            <a href="./"><button type="submit" class="btn btn-outline-primary btn-sm">Back</button></a>
        </div>
        <div class="col-6">
            <form action="" method="post">
            <button type="submit" class="btn btn-outline-danger btn-sm" name="delete_this_folder">Delete This Folder</button>

            </form>
        </div>
    </div>
 
</div>


                                
<?php

 $fold_name = $_GET['fol'];
if(isset($fold_name) && $fold_name !== ''){
    $directory_path = "./directory/" . $fold_name;

    if(is_dir($directory_path)){
        echo 'Current Directory:  <br> ./'.$fold_name.'';
    // echo "<pre>";
    $sc = scandir($directory_path);
    
     $count_sc = count($sc);
     $count_main = $count_sc ;
    // echo "<pre>";
    
    // print_r($sc);
    // echo "</pre>";
    // foreach ($sc as $key => $value) {
    //     echo '<div class="col-4">
    //     '. $value["$key"] .'
        
    //     </div>';
    // }
    // echo  getcwd();
    
    // echo $file_type = filetype($fold_name);
    
    if($count_sc > 2){
        for($i = 2; $i < $count_sc; $i++){
            // echo $sc[$i];
            echo '<div class="col-4 text-center">';
    $directory_path = "./directory/" . $fold_name;

    if(is_dir($fold_name)){
        echo '
        <i class="fa-solid fa-folder" style="
            display: block;
            margin: auto;
            height: 35px;
        "></i>
    ';
    }else{
        echo '
        <i class="fa-solid fa-file" style="
        display: block;
        margin: auto;
        height: 35px;
    "></i>
        
        ';
    }
           
        // chdir("./directory/this");
        // echo getcwd();
        
        
        // if(isset($_POST['open_direc'])){
           
        // }
        // getcwd();
        
        
        echo '
         <!--  <a href="" name="open_direc"> '.$sc[$i].'</a>-->
           <a href="open_folder.php?fol='.$sc[$i].'" name="open_direc"> '.$sc[$i].'</a>
            </div>';
        
        }
        ?>
<?php
                        if (isset($_POST['upload_files'])) {
                            $upload_file_name = $_FILES['upload_file_name']['name'];
                            $directory_path = "./directory/" . $fold_name;
                            if (!file_exists($directory_path . $upload_file_name)) {
                                // $file_uploaded = mkdir($directory_path . $upload_file_name);

                                $file_tmp = $_FILES['upload_file_name']['tmp_name'];
                               if(move_uploaded_file($file_tmp, $directory_path . '/' . $upload_file_name))
                                 {
                                    success_alert("File Uploaded Successfully ");
                                }else{
                                    error_alert("File not uploaded !!");
                                }
                            } else {
                                echo error_alert("File already exist !!");
                            }
                        }





                        ?>
                        <div class="upload_files mt-5 pt-5">
    <form action="" method="post" enctype="multipart/form-data">
    <div >Upload files to this folder</div>

    <div class="input-group mb-3 container">
                                    <input class="form-control" type="file" name="upload_file_name" id="" placeholder="Folder name">
                                    <button type="submit" class="btn btn-primary" name="upload_files">Upload</button>
                                </div>
    </form>
</div>
        <?php
    }else{
        echo '<div class="col-12 text-center">No file or folders are available</div>';
    }
    
    }else{
        echo '<div class="col-12 text-center text-danger">No folders are available with the name '.$fold_name.'</div>';
        
    }

    ?>



<?php

}else{
    header("location: index.php");
}





?>

                                <!-- <div class="col-4">
                        this12
                        </div>
                        <div class="col-4">
                        this1
                        </div> -->
                            </div>
                        </div>
                    </div>
                </main>

                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100856.78607772809!2d91.02936259290715!3d23.980729445772273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375405bd30bb4f23%3A0x1b3b2e1fce26f623!2sBrahmanbaria%2C%20Bangladesh!5e1!3m2!1sen!2sus!4v1682705953403!5m2!1sen!2sus" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>
    </div>




<?php
require "inc/_footer.php";

?>