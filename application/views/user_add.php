<!DOCTYPE html>
<html>
	<head>
		<title>Membuat Form Tambah User</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	</head>
	<body>
		<center>
			<h2>Form Tambah Data User</h2>
			<form>
				<table border="1">
					<tr>
						<td>Email</td>
						<td><input id="email" type="text" name="email"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input id="password" type="password" name="password"></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><input id="nama" type="text" name="nama"></td>
					</tr>
					<tr>
						<td colspan="2"><input id="sbt" type="button" name="kirim" value="Masukkan Data"></td>
					</tr>
				</table>
			</form>
		</center>
		<script>
			$(document).ready(function(){
				$('#sbt').click(function(){
					var input = {
						'email' : $('#email').val(),
						'password' : $('#password').val(),
						'nama' : $('#nama').val()
					}
					console.log(input);
					$.ajax({
						url : "<?= base_url('index.php/user/save')?>",
						type : "POST",
						data : input,
						dataType : 'json',
						success : function(data){
							console.log(data);
						},
						error : function(data){
							console.log(data);
						}
					})
				});
			});
		</script>
	</body>
</html>