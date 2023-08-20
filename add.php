
<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    
    <center>
        <h1>Pendaftaran Ekstrakulikuler</h1>
        <hr>
        <a href="index.php">Go to Home</a>
    <br/><br/>
    </center>
        
    <div style="padding-left: 30%;">
        <form action="" method="post">
            <table>
                <tr>
                    <td>NIS</td>
                    <td> : </td>
                    <td><input type="text" name="nis" id="nis"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td><input style="width: 300px;" type="text" name="nama" id="nama"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> : </td>
                    <td><select name="kelas" id="kelas">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td> : </td>
                    <td> <input type="date" name="ttl" id="ttl"> </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td><textarea name="alamat" id="alamat" cols="41" rows="2"></textarea></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td> : </td>
                    <td><input type="text" name="kota" id="kota"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : </td>
                    <td><input type="radio" name="jk" id="male" value="Laki-laki"><label for="male">Laki-Laki</label>
                    <input type="radio" name="jk" id="female" value="Perempuan"><label for="female">Perempuan</label></td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td> : </td>
                    <td><input type="checkbox" name="hobi[]" id="hobi1" value="Membaca">Membaca <br>
                    <input type="checkbox" name="hobi[]" id="hobi2" value="Olahraga">Olahraga <br>
                    <input type="checkbox" name="hobi[]" id="hobi3" value="Menyanyi">Menyanyi <br>
                    <input type="checkbox" name="hobi[]" id="hobi4" value="Menari">Menari <br>
                    <input type="checkbox" name="hobi[]" id="hobi5" value="Traveling">Traveling <br></td>
                </tr>
                <tr>
                    <td>Pilihan Ekstrakulikuler</td>
                    <td> : </td>
                    <td><select name="ekskul" id="ekskul" size= 7 multiple>
                        <option value="Pramuka">Pramuka</option>
                        <option value="Basket">Basket</option>
                        <option value="Volly">Volly</option>
                        <option value="Band">Band</option>
                        <option value="Seni&nbspTari">Seni Tari</option>
                        <option value="Robotic">Robotic</option>
                        <option value="Bulu&nbspTangkis">Bulu Tangkis</option>
                    </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><br><input name="submit" type="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
    
    <?php
if(isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $jk = $_POST['jk'];
    
    // Include database connection file
    include_once("koneksi.php");
    
    // Process hobbies checkbox values
    $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : array();
    $hobi_values = array_map([$mysqli, 'real_escape_string'], $hobi); // Sanitize values
    $hobi_values = implode(', ', $hobi_values); // Convert sanitized array to comma-separated string

    $ekskul = $_POST['ekskul'];

    // Sanitize and validate other inputs before using in SQL query
    $nis = $mysqli->real_escape_string($nis);
    $nama = $mysqli->real_escape_string($nama);
    $kelas = $mysqli->real_escape_string($kelas);
    $ttl = $mysqli->real_escape_string($ttl);
    $alamat = $mysqli->real_escape_string($alamat);
    $kota = $mysqli->real_escape_string($kota);
    $jk = $mysqli->real_escape_string($jk);

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO tb_siswa (nis, nama, kelas, ttl, alamat, kota, jk, hobi, ekskul) VALUES ('$nis','$nama','$kelas','$ttl','$alamat','$kota','$jk','$hobi_values','$ekskul')");
    
    if ($result) {
        // Show message when user added
        header("location: index.php");
    } else {
        echo "Error inserting record: " . $mysqli->error;
    }
}
?>
</body>
</html>
