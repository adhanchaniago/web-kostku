<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Laporan</title>

	</head>
<style>
	table{
		border-collapse: collapse;
		width: 70%;
		margin: 0 auto;
	}
	table th{
		border:1px solid #000;
		padding: 3px;
		font-weight: bold;
		text-align: center;
	}
	table td{
		border:1px solid #000;
		padding: 3px;
		vertical-align: top;
	}
</style>
	<body>
		<div>
			<img style="padding-left: 45%;padding-top: 10%" src="<?=base_url()?>img/P.png" width="100" height="60">
			<h2 style="text-align: center; margin-top: 0%">Data Pengguna</h2>	
		</div>
		<br>
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
	</body>
</html>