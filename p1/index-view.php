<html>
    <head>
        <style>
            .topDiv{
                width: 50%;
                text-align: center; 
                margin: auto;
            }
            .result{
                width: 350px; 
                margin: auto; 
                border: 2px solid #ccc;
            }
            .result div{
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body >
        <div class="topDiv">
        <h1>String Processor - e15 Project 1</h1>
        <div>
            <form action="process.php" method="post">
            <input name="inputString" placeholder="Enter a string"><input type="submit" name="btSubmit" value="Process">
            </form>
        </div>
        
        <?php
            if(isset($inputString)){
        ?>
            <div class="result">
                <h3>Result</h3>
                <div>
                    Input String: <?php echo $inputString;?>
                </div>
                <div>
                    Is Palindrome: <?php echo $isPalindrome;?>
                </div>
                <div>
                    Vowel Count: <?php echo $vowelCount;?>
                </div>
                <div>
                    Is Big Woord: <?php echo $isBigWord;?>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </body>
</html>