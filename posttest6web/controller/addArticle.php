<?php
require '../model/db.php';

if(isset($_POST['submit'])){
        $judul =  $_POST['judul'];
        $tag = $_POST['tag'];
        $konten = $_POST['konten'];
        
        $filename = $_FILES["file"]["name"];
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "../img/" . date("Y-m-d") . $filename;
        $folder2 = "./img/" . date("Y-m-d") . $filename;

        $res = mysqli_query($db, "INSERT INTO artikel(judul, tag, konten, gambar) VALUES('$judul', '$tag', '$konten', '$folder2')");
        if($res){
            $res2 = move_uploaded_file($tempname, $folder);
            if($res2){
                echo "<script>
                alert('Data Berhasil Ditambahkan!');
            </script>";
                echo " <script>
                document.location.href = '../artikel.php';
                </script>";
            }else{
                echo "<script>
                alert('Data Gagal Ditambahkan!');
            </script>";
                echo " <script>
                document.location.href = '../tulis.html';
                </script>";
            }
        } else {
            echo "<script>
            alert('Data Gagal Ditambahkan!');
        </script>";
            echo " <script>
            document.location.href = '../tulis.html';
            </script>";
        }
}

?>