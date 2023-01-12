<html>

<head>
    <title>Data Lahan Sawah Kabupaten Tegal</title>
    <link rel="stylesheet" href="data.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <h4>Kabupaten Tegal</h4>
        </div>
        <ul>
            <li><a href="home-out.php">Home</a></li>
            <li><a href="#" class="active">Data Lahan Sawah</a></li>
            <li><a href="map-forafterlog.php">Peta Lahan Sawah</a></li>
        </ul>
    </nav>
    <h2>Data Luas Lahan Sawah</h2>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Kecamatan</th>
                <th>Luas Wilayah</th>
                <th>Bukan Lahan Sawah</th>
                <th>Lahan Sawah</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <?php 
			require_once 'koneksi.php';
			$stid = oci_parse($koneksi, 'SELECT id, nama_kec, luas_ha, bknlhnswh, lhn_swh FROM kota_tgl');
			oci_execute($stid);
			while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
		?>
        <tr>
            <td><?php echo $row['ID'];?></td>
            <td><?php echo $row['NAMA_KEC'];?></td>
            <td><?php echo $row['LUAS_HA'];?></td>
            <td><?php echo $row['BKNLHNSWH'];?></td>
            <td><?php echo $row['LHN_SWH'];?></td>
            <td><a href="update.php?id=<?= $row['ID']?>"><button type="button" class="edit">Edit</button></a> | <a href="delete.php?id=<?= $row['ID']?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><button type="button" class="hapus">hapus</button></td>
        <?php } ?>
    </table>
</body>
</html>