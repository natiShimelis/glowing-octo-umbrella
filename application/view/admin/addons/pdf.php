        <?php

            require('../database/connection.php');
            require('./fpdf/fpdf.php');

            // $sql = "select * from user";
            // $query = mysqli_query($connection, $sql);
            $query = "SELECT AdminId FROM Adregister ORDER BY AdminId";  
                $query_run = mysqli_query($connection, $query);
                    $row = mysqli_num_rows($query_run);
                        // echo '<h5> Users: '.$row.'</h5>';

            $query = "SELECT UserID FROM user ORDER BY UserID";  
                $query_run = mysqli_query($connection, $query);
                    $row1 = mysqli_num_rows($query_run);
                        // echo '<h5> Users: '.$row.'</h5>';

            $query = "SELECT FormID FROM validform ORDER BY FormID";  
                $query_run = mysqli_query($connection, $query);
                    $row2 = mysqli_num_rows($query_run);
                        // echo '<h5> Users: '.$row.'</h5>';
            
             $query = "SELECT SubID FROM submittions ORDER BY SubID";  
                $query_run = mysqli_query($connection, $query);
                    $row3 = mysqli_num_rows($query_run);
                        // echo '<h5> Users: '.$row.'</h5>';
                    


            
            if(isset($_POST['btn_pdf']));

            {
                $pdf = new FPDF('p', 'mm', 'A4');
                $pdf->AddPage();
                $pdf->SetFont('arial','b','14');
                $pdf->SetMargins($left = 60 , $top = 15, $right = 0 ); 
                
                $pdf->Cell(0,10,'A Sample Report Pdf, Database Generated ','0','1','C');
                $pdf->Cell('40','10','Total Admins','1','0','C');
                $pdf->Cell('40','10', $row,'1','1','C');
                $pdf->Cell('40','10','Total Users','1','0','C');
                $pdf->Cell('40','10', $row1,'1','1','C');
                $pdf->Cell('40','10','TPR','1','0','C');
                $pdf->Cell('40','10', $row2,'1','1','C');
                $pdf->Cell('40','10','Posts','1','0','C');
                $pdf->Cell('40','10', $row3,'1','1','C');

                $pdf->Cell(0,40,' ','0','1','C');
                $pdf->Cell(0,13,'* Key *','0','1','C');
                $pdf->Cell(0,0,'TPR - Total Pending Requests ','0','1','C');

                $pdf->Output();

            }
        ?>