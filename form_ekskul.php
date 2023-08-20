<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ekstrakulikuler</title>
</head>
<body>
    <center>
        <h1>Pendaftaran Ekstrakulikuler</h1>
        <hr>
    </center>
        
    <div style="padding-left: 30%;">
        <form action="latihan3(2).php" method="post">
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
                    <td><select name="ekskul[]" id="ekskul[]" size= 7 multiple>
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
                    <td><br><input name="submit" type="submit" value="Submit">  <input onclick="location.href='latihan3.php'" type="button" value="Cancel"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>