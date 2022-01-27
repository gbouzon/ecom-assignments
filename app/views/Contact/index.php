<html>
    <head>
        <!-- CSS only -->
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet" 
        integrity = "sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin = "anonymous">
    
        <!-- JavaScript Bundle with Popper -->
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous">
        </script>

        <title>Contact Us</title>
    </head>
    <body>
        <h1>Contact Us</h1>

        <p>info here.</p>
        <!-- DO SOME INPUT CHECKING LATERS -->
        <form method = "POST" action = "">
            <label class = "form-label">Email: <input class = "form-control" type = "email" name = "email"></label> <br>
            <label class = "form-label">Message: <textarea class = "form-control" rows = "4" cols = "50" name = "message"></textarea></label> <br>
            <input class = "form-control" type = "submit" name = "action" value = "Send!">
        </form>
        <?php
            if(!isset($_POST['action'])) {
                $this->view ('shared/navigation');
                $this->view('Count/index');
            }
            else {
                $dataToWrite = ['author'=>$_POST['email'], 'message'=>$_POST['message']];
                $stringToWrite = json_encode($dataToWrite);
                $fileHandle = fopen('log.txt', 'a');
                flock($fileHandle, LOCK_EX);
                fwrite($fileHandle, $stringToWrite . "\n");
                fclose($fileHandle);
            }
        ?>
    </body>
</html>