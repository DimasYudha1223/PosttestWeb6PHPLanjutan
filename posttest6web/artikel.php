<?php
require './model/db.php'
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="artikel.css">
        <title>Samarinda News Today</title>
    </head>
    <body>
        <header>
            <nav>
                <div class="nav">
                    <ul>
                        <a href="index.php">Home</a>
                        <a href="aboutme.html">About</a>
                        <a href="./artikel.php">News</a>
                        <a href="./artikel.php">Sumber</a>
                        <a href="./artikel.php">Isu Panas</a>
                        <a href="./tulis.html">Tulis Artikel</a>
                      </ul>
                  </div>
              </nav>
        </header>
        <div class="container">
            <?php
                $sql = "SELECT * FROM artikel";
                $rs = mysqli_query($db, $sql);
                while ($ds = mysqli_fetch_assoc($rs)) {
            ?>
                <div class="news-card">
                    <div id="id" hidden><?php echo $ds['id']; ?></div>
                    <div class="newstext">
                        <div class="headtitle">
                            <div class="tag"><?php echo $ds['tag']; ?></div><div class="date"><?php echo substr($ds['createdAt'], 0, 10); ?></div>
                        </div>
                        <div class="title"><?php echo $ds['judul']; ?></div>
                        <div class="description"><?php echo $ds['konten']; ?></div>
                    </div>
                    <div class="newsimage" style="background-image: url('<?php echo $ds['gambar']; ?>');">
                    </div>
                </div>

            <?php
                }
            ?>
        </div>
        <footer>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Terms</a>
            <a href="#">Privacy Policy</a>
        </footer>
        <script src="./artikel.js"></script>
    </body>
</html>