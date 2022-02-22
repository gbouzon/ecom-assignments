<html>
    <head>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Home page</title>
    </head>
    <body>
        <div class='container'>
            <h1>Social Publication and Commenting App </h1>
            <h2>Publications:</h2>
            <ol>
                <?php
                    foreach($data as $publication) {
                        //getting username, refactor later
                        $profile = $publication->getProfile($publication->profile_id);
                        $user = $publication->getUser($profile->user_id);
                        $username = $user->username;

                        //TODO: get timestamp and order list by timestamp
                        echo "<li><a href = '/Publication/index/$publication->publication_id'>$publication->publication_title by $username</a></li>";
                    }
                ?>
            </ol>
            
            <?php
                $this->view('subviews/navigation');
            ?>
        </div>
    </body>
</html>