<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>PeduliDiri-DataUser</h4>
		</center>
		<br/>
		<table border="1">
			<thead>
				<tr>
					<th>No</th>
                    <th>NIK</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Telepon</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data_user as $p => $data)
				@if($data->role == 'user')
				<tr>
					<td>{{ $p++ }}</td>
					<td>{{$data->nik}}</td>
					<td>{{$data->name}}</td>
					<td>{{$data->email}}</td>
					<td>{{$data->alamat}}</td>
					<td>{{$data->telp}}</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>