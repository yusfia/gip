<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
	<h2>Menampilkan Data User</h2>
	<table border="1">
		<tr>
			<td>No</td>
			<td>Nama</td>
			<td>Email</td>
			<td>Hapus</td>
		</tr>
		<?php
		foreach ($users->result() as $i => $user) {
		?>
			<tr>
				<td><?= ++$i; ?></td>
				<td><?= $user->nama; ?></td>
				<td><?= $user->email; ?></td>
				<td><a onclick="deleteItem('<?php echo $user->id ?>')">Hapus</a></td>
			</tr>
		<?php
		} ?>
	</table>
	<div style="width:500px; height:500px;">
		<canvas id="myChart"></canvas>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: "<?= base_url('index.php/user/get_all_users') ?>",
				type: "GET",
				dataType: 'json',
				success: function(data) {
					console.log(data);
				},
				error: function(data) {

				}
			})
			$.ajax({
				url: "<?= base_url('index.php/user/count_on_name') ?>",
				type: "GET",
				dataType: 'json',
				success: function(data) {
					console.log(data);
					alert(data.message);
					chartSetup(data);
				},
				error: function(data) {

				}
			})
			
		});

		function chartSetup(input) {
			const data = {
				labels: input.key,
				datasets: [{
					label: 'My First Dataset',
					data: input.value,
					backgroundColor: [
						'rgb(255, 99, 132)',
						'rgb(54, 162, 235)',
						'rgb(255, 205, 86)'
					],
					hoverOffset: 4
				}]
			};
			const config = {
				type: 'doughnut',
				data: data,
			};
			var ctx = $('#myChart');
			const myChart = new Chart(ctx, config);
		}

		function deleteItem($id) {
			$.ajax({
				url: "<?= base_url('index.php/user/delete/') ?>" + $id,
				type: "GET",
				success: function(data) {
					window.location.replace("<?= base_url('index.php/user/show') ?>");
					console.log(data);
				},
				error: function(data) {

				}
			})
		}
	</script>
</body>

</html>