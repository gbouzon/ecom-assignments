<html>
<head>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<title>Publication Update</title>
</head>
<body>
	<div class='container'>

	<h1>Publication update</h1>
	<p>Please enter the details of the publication you want to update</p>
	<form method='post' action=''>
                <label class='form-label'>Publication title:<input type='text' name='publication_title' class='form-control' value='<?= $data->publication_title?>' /></label><br>
                <label class='form-label'>Publication text:<textarea name='publication_text' class='form-control'><?= $data->publication_text?></textarea></label><br>
                <input type="radio" id="public" name="publication_status" value="0">
                <label for="public">Public</label><br>
                <input type="radio" id="private" name="publication_status" value="1">
                <label for="private">Private</label><br>
                <input type="submit" name='action' value='Update Publication' class='form-control' />
            </form>
		<?php
			$this->view('subviews/navigation');
		?>
	</div>
</body>
</html>