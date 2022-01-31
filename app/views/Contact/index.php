<html>
    <head>
        <meta charset = "utf-8">
	    <meta name = "viewport" content = "width=device-width">

        <!-- CSS only -->
        <link rel="stylesheet" type="text/css" href="/public/css/layout.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet" 
        integrity = "sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin = "anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous">
        </script>

        <title>Contact Us</title>
    </head>
    <body>
        <?php
            $this->view ('shared/navigation');
        ?>
        <section>
            <h1>Contact Us</h1>

            <p>Please provide your information below, and we'll be sure to get back to you. (Not really)</p>
            <form method = "POST" action = "">
                <label class = "form-label">Email: <input id = "email" class = "form-control" type = "email" name = "email"></label> <br>
                <label class = "form-label">Message: <textarea class = "form-control" rows = "2" cols = "80" name = "message"></textarea></label> <br>
                <input class = "form-control" type = "submit" name = "action" value = "Send!">
            </form>
            <?php
                $this->view('Count/index');
            ?>
        </section>
    </body>
</html>