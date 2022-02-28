<html>
    <head>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->publication_title ?></title>
    </head>
    <body>
        <h2>Comments:</h2>
        <div>
        <?php
            foreach($data as $comment) {
                //getting username, refactor later
                $parsedown = new app\models\Parsedown(); //displaying markdown
                $profile = $comment->getProfile($comment->profile_id);
                $user = $comment->getUser($profile->user_id);
                $username = $user->username;
                $timestamp = $comment->getTimestamp($comment->publication_comment_id);
                echo "<h4>$username at $timestamp:</h4>"; 
                echo $parsedown->line($comment->comment) . "<br>";
                if (isset($_SESSION['user_id']) && $user->user_id == $_SESSION['user_id'])
                        echo "<a href='/Comment/update/$comment->publication_comment_id'>Modify</a> | 
                        <a href='/Comment/delete/$comment->publication_comment_id'>Delete</a> <br><br>";
            }
        ?>
        <div>
    </body>
</html>