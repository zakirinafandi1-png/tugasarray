<?php
// Jika belum submit jumlah data
if (!isset($_POST['jumlah']) && !isset($_POST['simpan'])) {
?>
    <h2>Selamat datang di website personal untuk memasukan data siswa gratis</h2>
    <form method="post">
        Masukan Jumlah data yang akan diinput: 
        <input type="number" name="jumlah" min="1" required>
        <input type="submit" value="Submit">
    </form>
<?php
} 
// Jika jumlah data sudah diinput
elseif (isset($_POST['jumlah'])) {
    $jumlah = $_POST['jumlah'];
    echo "<h2>Input $jumlah data siswa</h2>";
    echo "<form method='post'>";

    // tampilkan form siswa satu per satu (bukan tabel)
    for ($i = 1; $i <= $jumlah; $i++) {
        echo "<fieldset style='margin-bottom:15px;'>";
        echo "<legend>Data Siswa ke-$i</legend>";
        echo "NISN: <br><input type='text' name='nisn[]' required><br><br>";
        echo "Nama Lengkap: <br><input type='text' name='nama[]' required><br><br>";
        echo "Alamat: <br><input type='text' name='alamat[]' required><br>";
        echo "</fieldset>";
    }

    echo "<input type='submit' name='simpan' value='Simpan Data'>";
    echo "</form>";
} 
// Jika data siswa disimpan
elseif (isset($_POST['simpan'])) {
    $nisn    = $_POST['nisn'];
    $nama    = $_POST['nama'];
    $alamat  = $_POST['alamat'];

    echo "<h3>Data siswa yang tersimpan:</h3>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>No</th><th>NISN</th><th>Nama Lengkap</th><th>Alamat</th></tr>";
    for ($i = 0; $i < count($nisn); $i++) {
        echo "<tr>";
        echo "<td>".($i+1)."</td>";
        echo "<td>".$nisn[$i]."</td>";
        echo "<td>".$nama[$i]."</td>";
        echo "<td>".$alamat[$i]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>