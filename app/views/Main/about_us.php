<html>
    <head>
        <!-- CSS only -->
        <link rel="stylesheet" type="text/css" href="/layout.css">
        
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet" 
        integrity = "sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin = "anonymous">
    
        <!-- JavaScript Bundle with Popper -->
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous">
        </script>
        <title>About Us</title>
    </head>
    <body>
        <?php
            $this->view ('shared/navigation');
        ?>
        <section>
            <div class = "container">
                <h1>Among U- I mean About Us</h1>
                <p>See our developers!</p>
                <div class="images">
                    <p>This is Tony. He plays an unhealthy amount of Smash Bros and will tell you all about the science of bowling.</p>
                    <img src="/tonypog.png" id="tony"><br><br>
                    <p>This is Giuliana. She's kinda wack so be careful.</p>
                    <img src="/dragonslippers.png" id="giu"><br><br>
                </div>
                <?php
                    $this->view('Count/index');
                ?>
            </div>
        </section>
    </body>
</html>