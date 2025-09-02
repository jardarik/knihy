<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Evidence knih</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
		<div class="container">
			<a class="navbar-brand" href="index.php">Evidence knih</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=add">Vkládání knih</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=list">Přehled knih</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="index.php?page=search">Vyhledávání knih</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'add';
		switch ($page) {
		    case 'add':
		        echo '<h1 class="mb-4">Vkládání nové knihy</h1>';
		        echo '
                <form method="post" action="index.php?page=add" class="mb-4">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_first" class="form-label">Křestní jméno autora</label>
                        <input type="text" class="form-control" id="author_first" name="author_first" required>
                    </div>
                    <div class="mb-3">
                        <label for="author_last" class="form-label">Příjmení autora</label>
                        <input type="text" class="form-control" id="author_last" name="author_last" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Název knihy</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Popis</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Přidat knihu</button>
                </form>
                ';
		        break;
		    case 'list':
		        echo '<h1 class="mb-4">Přehled knih</h1>';
		        echo '<!-- Zde bude seznam knih -->';
		        break;
		    case 'search':
		        echo '<h1 class="mb-4">Vyhledávání knih</h1>';
		        echo '
                <form method="get" action="index.php" class="mb-4">
                    <input type="hidden" name="page" value="search">
                    <div class="mb-3">
                        <label for="author_last" class="form-label">Příjmení autora</label>
                        <input type="text" class="form-control" id="author_last" name="author_last">
                    </div>
                    <div class="mb-3">
                        <label for="author_first" class="form-label">Křestní jméno</label>
                        <input type="text" class="form-control" id="author_first" name="author_first">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Název knihy</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn">
                    </div>
                    <button type="submit" class="btn btn-primary">Vyhledat</button>
                </form>
                ';
		        echo '<!-- Zde bude vyhledávací formulář -->';
		        break;
		    default:
		        echo '<p>Vítejte v evidenci knih. Použijte menu pro přechod mezi stránkami.</p>';
		        break;
		}
		?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
