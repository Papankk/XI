<?php
if(isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $jk = $_POST['jk'];
    
    include_once("koneksi.php");
    
    $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : array();
    $hobi_values = implode(', ', $hobi);

    $ekskul = isset($_POST['ekskul']) ? $_POST['ekskul'] : array();
    $ekskul_values = implode(', ', $ekskul);

    $nis = $mysqli->real_escape_string($nis);
    $nama = $mysqli->real_escape_string($nama);
    $kelas = $mysqli->real_escape_string($kelas);
    $ttl = $mysqli->real_escape_string($ttl);
    $alamat = $mysqli->real_escape_string($alamat);
    $kota = $mysqli->real_escape_string($kota);
    $jk = $mysqli->real_escape_string($jk);
    $hobi_values = $mysqli->real_escape_string($hobi_values);
    $ekskul_values = $mysqli->real_escape_string($ekskul_values);

    $result = mysqli_query($mysqli, "UPDATE tb_siswa SET nama='$nama', kelas='$kelas', ttl='$ttl', alamat='$alamat', kota='$kota', jk='$jk', hobi='$hobi_values', ekskul='$ekskul_values' WHERE nis='$nis'");

    if ($result) {
        header('location: index.php');
    } else {
        echo "Error updating record: " . $mysqli->error;
    }

} else {
    $nis = $_GET['nis'];

    include_once("koneksi.php");

    $query = "SELECT * FROM tb_siswa WHERE nis='$nis'";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Data</title>
</head>
<body>
    <center>
        <h1>Edit User Data</h1>
        <hr>
    </center>
        
    <div style="padding-left: 30%;">
        <form action="edit.php" method="post">
            <table>
                <tr>
                    <td>NIS</td>
                    <td> : </td>
                    <td><input type="text" name="nis" id="nis" value="<?php echo $row['nis']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td><input style="width: 300px;" type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td> : </td>
                    <td><select name="kelas" id="kelas">
                        <option value="X" <?php if ($row['kelas'] == 'X') echo 'selected'; ?>>X</option>
                        <option value="XI" <?php if ($row['kelas'] == 'XI') echo 'selected'; ?>>XI</option>
                        <option value="XII" <?php if ($row['kelas'] == 'XII') echo 'selected'; ?>>XII</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td> : </td>
                    <td> <input type="date" name="ttl" id="ttl" value="<?php echo $row['ttl']; ?>"> </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td><textarea name="alamat" id="alamat" cols="41" rows="2"><?php echo $row['alamat']; ?></textarea></td>
                </tr>
                <tr>
                    <td>Kota</td>
                    <td> : </td>
                    <td><input type="text" name="kota" id="kota" value="<?php echo $row['kota']; ?>"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : </td>
                    <td><input type="radio" name="jk" id="male" value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') echo 'checked'; ?>><label for="male">Laki-Laki</label>
                    <input type="radio" name="jk" id="female" value="Perempuan" <?php if ($row['jk'] == 'Perempuan') echo 'checked'; ?>><label for="female">Perempuan</label></td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td> : </td>
                    <td><input type="checkbox" name="hobi[]" id="hobi1" value="Membaca" <?php if (in_array('Membaca', explode(', ', $row['hobi']))) echo 'checked'; ?>>Membaca <br>
                    <input type="checkbox" name="hobi[]" id="hobi2" value="Olahraga" <?php if (in_array('Olahraga', explode(', ', $row['hobi']))) echo 'checked'; ?>>Olahraga <br>
                    <input type="checkbox" name="hobi[]" id="hobi3" value="Menyanyi" <?php if (in_array('Menyanyi', explode(', ', $row['hobi']))) echo 'checked'; ?>>Menyanyi <br>
                    <input type="checkbox" name="hobi[]" id="hobi4" value="Menari" <?php if (in_array('Menari', explode(', ', $row['hobi']))) echo 'checked'; ?>>Menari <br>
                    <input type="checkbox" name="hobi[]" id="hobi5" value="Traveling" <?php if (in_array('Traveling', explode(', ', $row['hobi']))) echo 'checked'; ?>>Traveling <br></td>
                </tr>
                <tr>
                    <td>Pilihan Ekstrakulikuler</td>
                    <td> : </td>
                    <td><select name="ekskul[]" id="ekskul[]" size= 7 multiple>
                        <option value="Pramuka" <?php if (in_array('Pramuka', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Pramuka</option>
                        <option value="Basket" <?php if (in_array('Basket', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Basket</option>
                        <option value="Volly" <?php if (in_array('Volly', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Volly</option>
                        <option value="Band" <?php if (in_array('Band', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Band</option>
                        <option value="Seni&nbspTari" <?php if (in_array('Seni&nbspTari', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Seni Tari</option>
                        <option value="Robotic" <?php if (in_array('Robotic', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Robotic</option>
                        <option value="Bulu&nbspTangkis" <?php if (in_array('Bulu&nbspTangkis', explode(', ', $row['ekskul']))) echo 'selected'; ?>>Bulu Tangkis</option>
                    </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><br><input name="submit" type="submit" value="Update"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
