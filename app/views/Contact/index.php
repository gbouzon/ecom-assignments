<html>
    <head>
        <meta charset = "utf-8">
	    <meta name = "viewport" content = "width=device-width">

        <!-- CSS only -->
        <link rel="stylesheet" type="text/css" href="/layout.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel = "stylesheet" 
        integrity = "sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin = "anonymous">

        <!-- JavaScript Bundle with Popper -->
        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity = "sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin = "anonymous">
        </script>

        <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <script type = "text/javascript"> 

            $(document).ready(function() {
                $("#email").on("input", function() {
		            manageIcon(checkEmail());
	            });
            })
            
            function manageIcon(bState) { //CHANGES THE COLOUR OF THE ICON THINGIES
	            if (bState) {
		            $("i.fa-times-circle").hide();
		            $("i.fa-check").show();
	            }
	            else {
		            $("i.fa-times-circle").show();
		            $("i.fa-check").hide();
	            }
            }

            function checkEmail() {
	            var email = $("input[name='email']").val();
	            var emailRegex = /^[a-zA-Z](?!.*[-_.]{2})[a-zA-Z0-9-_.]{0,15}@[a-zA-Z]{2,24}((.qc)?.ca|.com)$/; //change this later -> only checked

	            return emailRegex.test(email);
            }

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
                <label class = "form-label">Email: <input id = "email" class = "form-control" type = "email" name = "email"></label>
                <i class="fas fa-times-circle red hidden" style = "display: none; color: red; font-size: 19px;"></i>
			    <i class="fas fa-check green hidden" style = "display: none; color: green; font-size: 19px;"></i> <br>
                <label class = "form-label">Message: <textarea class = "form-control" rows = "2" cols = "80" name = "message"></textarea></label> <br>
                <input class = "form-control" type = "submit" name = "action" value = "Send!">
            </form>
            <?php
                $this->view('Count/index');
            ?>
        </section>
    </body>
</html>