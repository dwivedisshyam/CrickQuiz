<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home</title>
        <?php include('headContent.php');?>
        <style>
            .bgImg{
                background-image: url(image/img1.jpg);
                height: 400px;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>

    <body>
        <!-- Navigation -->
        <?php include('navBar.php');?>
        <br style="clear: both;">
        <div class="container p-5" style="margin-top:32px; height:100%;">
            <div class="h-100 m-auto py-5 col-sm-7 text-center text-white bgImg">
                <h1>How Much You Know About Your Friend's Cricket Hobby?</h1>
                <p></p>
                <form method="post" action="createQuiz.php">
                    <input class="form-control" type="text" name='name' placeholder="Enter Name" required/>
                    <input type="submit" value="START NOW!" class="mt-5 btn btn-lg btn-danger"/>
                </form>
                
            </div>
        </div>
        
        
        <!-- Footer -->
        <?php include('footer.php');?>
    </body>
</html>
