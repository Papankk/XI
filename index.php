<?php
include_once("koneksi.php");
 
$result = mysqli_query($mysqli, "SELECT * FROM tb_siswa ORDER BY nis DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Insert</a><br/><br/>
 
    <table width='100%' border=1>
 
    <tr>
        <th>NIS</th> <th>Nama</th> <th>Kelas</th> <th>Tanggal Lahir</th> <th>Alamat</th> <th>Kota</th> <th>Jenis Kelamin</th> <th>Hobi</th> <th>Ekstrakulikuler</th> <th>Aksi</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nis']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['kelas']."</td>";
        echo "<td>".$user_data['ttl']."</td>";
        echo "<td>".$user_data['alamat']."</td>"; 
        echo "<td>".$user_data['kota']."</td>"; 
        echo "<td>".$user_data['jk']."</td>"; 
        echo "<td>".$user_data['hobi']."</td>";
        echo "<td>".$user_data['ekskul']."</td>";       
        echo "<td><a href='edit.php?nis=$user_data[nis]'>Edit</a> | <a href='delete.php?nis=$user_data[nis]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>
