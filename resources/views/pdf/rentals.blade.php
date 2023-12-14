<!DOCTYPE html>
<html lang="en">
<head>
  <title>PDF Template</title>
  <style>
    * {
      font-family: arial, sans-serif;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
  </style>
</head>
<body>
  <h2 style="margin-bottom: 20px">Rental List</h2>
  <table>
		<thead>
			<tr>
				<th>No</th>
        <th>Name</th>
        <th>Game</th>
        <th>Status</th>
        <th>Penalty</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rentals as $rental)
			<tr>
				<td>{{ $loop->iteration }}</td>
        <td>{{ $rental->user->name }}</td>
        <td>{{ $rental->game->name }}</td>
        <td>{{ $rental->status }}</td>
        <td>{{ $rental->penalty ? 'Rp' . number_format($rental->penalty, 0, ',' , '.') : '-' }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>