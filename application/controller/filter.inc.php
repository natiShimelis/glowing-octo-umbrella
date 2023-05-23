            <?php
            include 'connection.inc.php';
            ?>
        
        <div class=filter_section>
            <form role="filter" method="POST" action="searchResult.php" name="filter">
            <h5><button name="filter_search" type="submit"> Filter:</button></h5>
                <h6>Writers List</h6>
                <hr>
            <?php
            $querylist="SELECT*FROM user where IsWriter=1";
            $writerquery=mysqli_query($conn,$querylist);
            if(mysqli_num_rows($writerquery)>0)
        {
                foreach($writerquery as $writerlist)
            {

                $checked=[];
                if(isset($_POST['user'])){
                    $checked=$_POST['user'];
                }
                ?>
                    <div>   
                    <input type="checkbox" name="writers[]" value="<?=$writerlist['UserID'];?>"
                        <?php if(in_array($writerlist['UserID'],$checked)) { echo "checked"; }?>
                    />
                        <?=$writerlist['UserName'];?>
                    </div>
                <?php
            }
        }
            else
            {
                echo "No writers found";
            }
            ?>
            </form>
        </div>       
            
    <div class="search-section">
        <?php
        print_r($_POST);
                if(isset($_POST['user']))
                {
                    $writerchecked = [] ;
                    $writerchecked = $_POST['user'];
                    foreach($writerchecked as $rowUser)
                    {
                        $filterd="SELECT*FROM blog WHERE (blogName lIKE '%$search%' OR Content lIKE '%$search%') AND UserID IN($rowUser)";
                        $filt_run=(mysqli_query($conn,$filterd));
                        if(mysqli_num_rows($filt_run)>0)
                        {
                            foreach($filt_run as $articles):
                               ?> 
                                    <h6> <?php echo articles['blogName']; ?> </h6>
                                    <p><?php echo $articles['Content']; ?></p>
                                <?php
                            endforeach;
                        }
                    }
                }
                else
                {
                    $filterd="SELECT*FROM blog WHERE (blogName lIKE '%$search%' OR Content lIKE '%$search%')";
                    $filt_run=(mysqli_query($conn,$filterd));
                    if(mysqli_num_rows($filt_run)>0){
                        foreach($filt_run as $articles) {
                            echo"<h6>" . $articles['blogName'] . "</h6>";
                            echo"<p>" . $articles['Content'] . "</p>";
                        }
                    }
                }
            ?>
    </div>
            
            
                    
                    

        
                