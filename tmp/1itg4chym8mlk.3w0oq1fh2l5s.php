<html>
    <head>
        <title>FreeFatApp</title>
    </head>

    <body>
        <h1>FreeFat App</h1>

        <form action="<?= Base::instance()->alias('store_beer') ?>" method="POST">
            <label for="name">Name of the beer</label>
                <input type="text" name="name">
            <label for="type">Type of beer</label>
                <input type="text" name="type">

            <input type="submit" value="Save">
        </form>
    </body>
</html>