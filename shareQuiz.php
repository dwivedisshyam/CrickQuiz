<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <meta name="author" content="">
        <title>One Page Wonder - Start Bootstrap Template</title>
        <?php include('headContent.php');?>
       
        <script>
            function myFunction() {
              /* Get the text field */
              var copyText = document.getElementById("myInput");

              /* Select the text field */
              copyText.select();

              /* Copy the text inside the text field */
              document.execCommand("copy");

              /* Alert the copied text */
              //alert("Copied the text: " + copyText.value);
            }
        </script>
    </head>

    <body>
        <!-- Navigation -->
        <?php include('navBar.php');
              include('dbConnection.php')
        ?>
        <br style="clear: both;">
        <div class="h-100 container p-5" style="margin-top:32px;">
            <?php
                  $id = $_POST['id'];
                 if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                     $values = array(
                         array($_POST['id'],$_POST['Q1'],$_POST['A1']),
                         array($_POST['id'],$_POST['Q2'],$_POST['A2']),
                         array($_POST['id'],$_POST['Q3'],$_POST['A3']),
                         array($_POST['id'],$_POST['Q4'],$_POST['A4']),
                         array($_POST['id'],$_POST['Q5'],$_POST['A5']),
                         array($_POST['id'],$_POST['Q6'],$_POST['A6']),
                         array($_POST['id'],$_POST['Q7'],$_POST['A7']),
                         array($_POST['id'],$_POST['Q8'],$_POST['A8']),
                         array($_POST['id'],$_POST['Q9'],$_POST['A9']),
                         array($_POST['id'],$_POST['Q10'],$_POST['A10']),
                     );
                    for($row = 0; $row < 10; $row++){
                       // echo $values[$row][0]."  ". $values[$row][1]."  ". $values[$row][2]."<br/>";
                        $query = "INSERT INTO tbl_userque (userId, queNo, ans) VALUES (". $values[$row][0] .",".  $values[$row][1] .",'". $values[$row][2] ."')";
                        mysqli_query($con, $query);
                        mysqli_error($con);
                    }
                     mysqli_close($con);
                        ?>        
                     <h3>Share This Link With Your Friends</h3>
                        <div class="form-inline">
                            <input class="form-control col-sm-8" id="myInput" type="text" value="<?php echo "http://localhost/quiz/resultQuiz.php?q=". $id?>"/>&nbsp;<button class="btn" onclick="myFunction()">Copy Link</button>
                        </div>
            <br/>
                    <div>
                        <span>
                           <a class="btn text-white" style="background-color: #3b5998" href="https://www.facebook.com/sharer/sharer.php?app_id=201404847153312&sdk=joey&u=<?php echo "http://localhost/quiz/resultQuiz.php?q=". $id?>&display=popup&ref=plugin&src=share_button" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=580')"><img src="image/facebook.png" width='30' height='30'/> Share</a>
                        </span>
                        <span class="text-white">
                            <a class="btn btn-success text-white" href="whatsapp://send?text=<?php echo "http://localhost/quiz/resultQuiz.php?q=". $id?>" data-action="share/whatsapp/share"><img src="image/whatsapp.png" width='30' height='30'/> Whatsapp</a>
                        </span>
                    </div>
            <?php
                }else{
                    header('Location: index.php'); 
                }
            ?>
        </div>
        
        
        <!-- Footer -->
        <?php include('footer.php');?>
    </body>
</html>
