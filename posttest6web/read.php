<?php
require './model/db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM artikel WHERE id='$id'";
$rs = mysqli_query($db, $sql);
$ds = mysqli_fetch_assoc($rs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./read.css"> 
    <title>Document</title>
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

    <main class="konten">
        <div class="konfir" id="konfir">
                <div class="prompt">Apakah anda yakin untuk menghapus artikel ini?</div>
                <div class="ans">
                    <button id="y" onclick="document.location.href='./controller/deleteArticle.php?id=<?php echo $ds['id'] ?>'">Ya</button>
                    <button id="n" onclick="tutup()">Tidak</button>
                </div>
        </div>
        <div class="option" id="option">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <div class="menu" id="menu">
            <ul>
                <div class="wrap">
                    <a href="./edit.php?id=<?php echo $ds['id']?>">Edit Artikel</a>
                    <img width="12px" src="./img/edit.png" />
                </div>
                <div class="wrap" id="delete">
                    <a>Hapus Artikel</a>
                    <img width="12px" src="./img/delete.png" />
                </div>
            </ul>
        </div>
        <h1><?php echo $ds['judul']; ?></h1>
        <div class="subtitle">
            <p class="author">Admin</p><p class="date"><?php echo substr($ds['createdAt'], 0, 10); ?></p>
        </div>
        <div class="gambar" style="background-image: url('<?php echo $ds['gambar']; ?>')";></div>
        <div class="tags"><?php echo $ds['tag']; ?></div>
        <div class="deskripsi">
            <?php echo $ds['konten']; ?>
        </div>
    </main>
    <footer>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Terms</a>
        <a href="#">Privacy Policy</a>
    </footer>
    <script>
        const opt = document.getElementById('option');
        let open = false;
        opt.addEventListener('click', () => {
            const menu = document.getElementById('menu');
            if(open) { toggle = 'none'; open = false } else { toggle = 'block'; open = true }
            menu.style.display = toggle;
        })
        const conf = document.getElementById('konfir');
        const del = document.getElementById('delete');
        del.addEventListener('click', () => {
            conf.style.display = 'flex';
        })

        const tutup = () => {
            conf.style.display = 'none';
        }
    </script>
</body>
</html>