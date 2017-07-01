<html>
    <head>
        <title>FreeFatApp</title>
    </head>

    <body>
        <h1>FreeFat App</h1>

        <?php foreach (($beers?:[]) as $beer): ?>
            <p><?= trim($beer['name']) ?></p>
        <?php endforeach; ?>
    </body>
</html>