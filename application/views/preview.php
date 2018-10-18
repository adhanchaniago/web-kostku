<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Laporan</title>

	</head>
	<body>
		<img src="<?=base_url()?>img/daftarr.png">
		<p style="text-align: center;">Table User</p>
		<table>
			<tr>
				<th>No</th>
				<th>Username</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Tanggal</th>
			</tr>
			<?php $no=0;
				foreach ($users as $key) {
					$no++; ?>

					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $key->username ?></td>
						<td><?php echo $key->nama ?></td>
						<td><?php echo $key->email ?></td>
						<td><?php echo $key->tanggal ?></td>
					</tr>

			<?php	} ?>
		</table>
		<p style="text-align: center;"><a href="<?=site_url('')?>/Cetak/cetakpdf">Cetak</a></p>
	</body>
</html>