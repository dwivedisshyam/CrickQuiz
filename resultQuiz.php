<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Scoreboard - CrickQuiz</title>
        <?php include('headContent.php');?>
    </head>

    <body>
        <!-- Navigation -->
        <?php include('navBar.php');
              include('dbConnection.php')
        ?>
        <br style="clear: both;">
        <div class="h-100 container p-5" style="margin-top:32px;">
            <?php
                  
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
                $id = $_POST['userId'];
                $playerName = $_POST['playerName'];
                $userName = $_POST['userName'];
                $values = array(
                         array($_POST['userId'],$_POST['Q1'],$_POST['A1']),
                         array($_POST['userId'],$_POST['Q2'],$_POST['A2']),
                         array($_POST['userId'],$_POST['Q3'],$_POST['A3']),
                         array($_POST['userId'],$_POST['Q4'],$_POST['A4']),
                         array($_POST['userId'],$_POST['Q5'],$_POST['A5']),
                         array($_POST['userId'],$_POST['Q6'],$_POST['A6']),
                         array($_POST['userId'],$_POST['Q7'],$_POST['A7']),
                         array($_POST['userId'],$_POST['Q8'],$_POST['A8']),
                         array($_POST['userId'],$_POST['Q9'],$_POST['A9']),
                         array($_POST['userId'],$_POST['Q10'],$_POST['A10'])
                    );
                $score = 0;
                for($indx=0; $indx<10; $indx++){
                    $query = "INSERT INTO tbl_answer (userId, queNo, ans) VALUES(". $values[$indx][0] .",". $values[$indx][1] .",'". $values[$indx][2] ."')";
                    mysqli_query($con, $query);
                    
                    $query = "SELECT ans FROM tbl_userque where userId=". $id ." AND queNo=". $values[$indx][1];
                    $row = mysqli_fetch_assoc(mysqli_query($con, $query));
                    if($row['ans'] == $values[$indx][2])
                        $score++;
                }
                 $query = "INSERT INTO tbl_result (userId, playerName, score) VALUES(". $id .",'". $playerName ."',". $score .")";
                mysqli_query($con, $query);
                $query = "SELECT playerName, score FROM tbl_result WHERE userId=".$id;
                $result = mysqli_query($con, $query); 
                ?>
                
            <div class="col-sm-12 m-auto p-3">
                <div class="col-sm-8 p-0 m-auto">
                    <h2>
                        
                        How Much You Know About <?php echo $userName;?>'s Cricket Hobby?</h2>
                    <u><h5>Instructions -</h5></u>
                    <ul>
                        <li>Enter your name.</li>
                        <li>Answer the Questions about your friend.
                            <br/>&emsp;(Don't cheat :p)</li>
                        <li>Check your score at the scoreboard.</li>
                    </ul>
                </div>
                <div class="col-sm-8 p-5 m-auto mt-3 mb-3" style="border:1px solid #00dddd;">
                    <h3>Enter Your Name</h3>
                    <form method="post" action="playQuiz.php">
                        <input type="hidden" name="userId" value="<?php echo $id;?>"/>
                        <input class="form-control" type="text" name="playerName" placeholder="Example : Raman"/ required><br/>
                        <center><input class="btn btn-danger" type="submit" value="Get Started"/> 
                            <br/>
                            <p></p>
                            <a class="btn btn-success" href="index.php">Create Your Quiz</a>
                        
                        </center>
                    </form>
                </div>
                <br/>
                <div class="col-sm-10 m-auto p-3 mt-3" style="border: 2px solid black; border-radius: 2em;">
                    <center><h1>Who knows <?php echo $userName;?> best?</h1></center>
                    <h4>
                        <table class="table">
                            <tr><td class="text-right">Name </td><td class="text-left">Score</td></tr>
                            <?php 
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr><td class='text-right'>". $row['playerName'] ." </td><td class='text-left'>". $row['score'] ."/10</td></tr>";        
                                    }
                                }
                                mysqli_close($con);
                            ?>
                        </table>
                    </h4>
                </div>
            </div>
            
                <?php
            }else if(isset($_GET['q'])){
                $id = $_GET['q'];
              //  echo $id;
                $query = "SELECT name FROM tbl_user WHERE uId=".$id;
                $row= mysqli_fetch_assoc(mysqli_query($con, $query));
                $name = $row['name'];
                $query = "SELECT playerName, score FROM tbl_result WHERE userId=". $id;
                $result = mysqli_query($con, $query);    
            ?>
            <div class="col-sm-12 m-auto p-3">
                <div class="col-sm-8 p-0 m-auto">
                    <h2>How Much You Know About <?php echo $name;?>'s Cricket Hobby?</h2>
                    <u><h5>Instructions -</h5></u>
                    <ul>
                        <li>Enter your name.</li>
                        <li>Answer the Questions about your friend.
                            <br/>&emsp;(Don't cheat :p)</li>
                        <li>Check your score at the scoreboard.</li>
                    </ul>
                </div>
                <div class="col-sm-8 p-5 m-auto mt-3 mb-3" style="border:1px solid #00dddd;">
                    <h3>Enter Your Name</h3>
                    <form method="post" action="playQuiz.php">
                        <input type="hidden" name="userId" value="<?php echo $id;?>"/>
                        <input class="form-control" type="text" name="playerName" placeholder="Example : Raman"/ required><br/>
                        <center><input class="btn btn-danger" type="submit" value="Get Started"/> </center>
                    </form>
                </div>
                <br/>
                <div class="col-sm-10 m-auto p-3 mt-3" style="border: 2px solid black; border-radius: 2em;">
                    <center><h1>Who knows <?php echo $name;?> best?</h1></center>
                    <h4>
                        <table class="table">
                            <tr><td class="text-right">Name </td><td class="text-left">Score</td></tr>
                            <?php 
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr><td class='text-right'>". $row['playerName'] ." </td><td class='text-left'>". $row['score'] ."/10</td></tr>";        
                                    }
                                }
                                mysqli_close($con);
                            ?>
                        </table>
                    </h4>
                </div>
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
