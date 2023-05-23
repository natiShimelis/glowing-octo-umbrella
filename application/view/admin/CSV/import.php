<?php

require('../database/connection.php');


if(isset($_POST['import']))
    {
        $fileName = $_FILES['file']['tmp_name'];

        if($_FILES['file']['size']> 0)
        
        {
            $file = fopen($fileName, 'r');

            while (($coloumn = fgetcsv($file, 10000000, ',') ) !== FALSE){

                $sql = 'Insert Into blog (BlogID, blogName) values (' .$coloumn[0]. ', ' .$coloumn[1]. ')';
               
                $result = mysqli_query($connection, $sql);

             if(!empty($result)){

                echo 'CSV Data Imported to Database';
             }

            else{

                echo 'Problem occured while Importing';

            }
            

             }

        }



    }

?>