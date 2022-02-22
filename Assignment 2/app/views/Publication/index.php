<html>
    <head>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->publication_title ?></title>
    </head>
    <body>
        <div class='container'>

                <?php
                    //getting username, refactor later
                    $profile = $data->getProfile($data->profile_id);
                    $user = $data->getUser($profile->user_id);
                    $username = $user->username;

                    echo "<h1>$data->publication_title by $username</h1>"; //title
                    echo "<p>$data->publication_text</p>"; //text
                ?>
            
            <?php
                $this->view('subviews/navigation');
            ?>
        </div>
    </body>
</html>