<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="utf-8">
        <title>Will's Anagram Task</title>
        <meta name="Will's Anagram Task" content="NetMatters Home Page">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="CSS/main.css" rel="stylesheet" type="text/css"> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> 
        </head>
    <body>
        <header>
            <h1>Will's Anagram Challenge</h1>
        </header>
        <div class="container">
            <form class="input-form" method="post">
                <div class="input-div">
                    <label>Please type a word or string of letters here.</label>
                        <input id="input1" type="text" name="input1" class="input">
                            <?php
                            if (isset($_POST['input1'])) {
                                    $word1 = true;
                                } 
                            ?>
                </div>
                <div class="input-div">    
                    <label>Please type a word or string of letters here.</label>
                        <input id="input2" type="text" name="input2" class="input">
                            <?php
                            if (isset($_POST['input2'])) {
                                    $word2 = true;
                                } 
                            ?>
                </div>
                    <button type="submit" name="button" class="button" value="button">Check for Anagram</button>
                </form>
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $word1 = $_POST['input1'];
                    $word2 = $_POST['input2'];

                
                    function isAnagram($string1, $string2)
                    {
                        // quick check, eliminate obvious mismatches quickly
                        if (strlen($string1) != strlen($string2)) {
                            return false;
                        }
                    
                        // Handle uppercase to lowercase comparisons
                        $array1 = count_chars(strtolower($string1));
                        $array2 = count_chars(strtolower($string2));
                    
                        // Check if 
                        if (!empty(array_diff_assoc($array2, $array1))) {
                            return false;
                        } 
                        if (!empty(array_diff_assoc($array1, $array2))) {
                            return false;
                        } 
                    
                        return true;
                    }

                    if (isAnagram($word1, $word2)) {
                        echo "${word1} is an anagram of ${word2}";
                    } else {
                        echo "${word1} is not an anagram of ${word2}";
                    }
                }
            ?>
        </div>
 
    </body>
</html