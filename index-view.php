<html>
    <head>
    </head>
    <body >
        <div style="width: 50%;text-align: center; margin: auto;">
        <h1>String Processor - e15 Project 1</h1>
        <div>
            <form action="index.php" method="post">
            <input name="inputString" placeholder="Enter a string"><input type="submit" name="btSubmit" value="Process">
            </form>
        </div>
        
        <?php
            if(isset($_POST['btSubmit'])){

                $inputString = $_POST['inputString'];                
               
        ?>
            <div style="width: 350px; margin: auto; border: 2px solid #ccc;">
                <h3>Result</h3>
                <div>
                    String:<br>
                    <?php echo $inputString;?>
                </div>
                <div>
                    Is Palindrome:<br>
                    <?php echo isPalindrome($inputString);?>
                </div>
                <div>
                    Vowel Count:<br>
                    <?php echo vowelCount($inputString);?>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </body>
</html>