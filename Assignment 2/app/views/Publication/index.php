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
                    $timestamp = $data->getTimestamp($data->publication_id);

                    echo "<h1>$data->publication_title by $username at $timestamp</h1>"; //title
                    echo "<p>$data->publication_text</p>"; //text
                    if (isset($_SESSION['user_id']) && $user->user_id == $_SESSION['user_id'])
                        echo "<a href='/Publication/update/$data->publication_id'>Modify this publication</a> | 
					    <a href='/Publication/delete/$data->publication_id'>Delete this publication</a> <br> <br>";
                ?>
            
            <?php
                echo "<a href='/Comment/create/$data->publication_id'>Leave a Comment</a> <br><br>";
                $this->view('subviews/navigation');
                $comments = $data->getComments($data->publication_id);
                $this->view('Comment/index', $comments);
                
            ?>
        </div>
    </body>
</html>