<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css"/>
    <title>Profil Saya</title>
</head>
<body>
    <nav>
        <div class="nav">
            <ul>
                <a href="index.php">Home</a>
                <a href="aboutme.html">About</a>
                <a href="./artikel.php">News</a>
                <a href="./artikel.php">Sumber</a>
                <a href="./artikel.php">Isu Panas</a>
                
                
                <?php
                session_start();
                error_reporting(0);
                if($_SESSION['login'] != NULL){
                  echo "<a href='./controller/logout.php'>Logout</a>";
                  echo "<a href='./profile.php'>" . $_SESSION['login'] . "</a>";
                  if($_SESSION['stat'] == 'a'){
                    echo "<a href='./tulis.html'>Tulis Artikel</a>";
                  }
                } else {
                  echo "<a href='./login.html'>Login</a>";
                }
                ?>
              </ul>
          </div>
      </nav>
    <div class="profile-container">
        <div class="profile-info">
            <div class="pp">
                <div class="img-pp" style="background-image: url('./img/defpp.jpg');"></div>
            </div>
            <div class="nama"><?php echo $_SESSION['login'] ?></div>
            <div class="email"><?php echo $_SESSION['login'] ?></div>
            <div class="button-wrap">
                <button onclick=""><img width="30px" src="./img/delete.png"/></button>
                <button onclick=""><img  width="30px" src="./img/edit.png"/></button>
            </div> 
        </div>
        <div class="profile-content">
            <div class="profile-content-header">Artikel</div>
            <?php
            require './model/db.php';
            $q = "SELECT * FROM artikel";
            $res = mysqli_query($db, $q);
            while($ds = mysqli_fetch_assoc($res)){
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
            <div class="news-card">
                <div id="id" hidden>2</div>
                <div class="newstext">
                    <div class="headtitle">
                        <div class="tag">tes</div><div class="date">tanggal</div>
                    </div>
                    <div class="title">tes</div>
                    <div class="description">tes</div>
                </div>
                <div class="newsimage" style="background-image: url('./img/1911986202p.webp');">
                </div>
            </div>
        </div>
    </div>
    <script src="./artikel.js"></script>
</body>
</html>