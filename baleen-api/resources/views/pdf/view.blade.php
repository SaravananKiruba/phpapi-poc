<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
</head>
<body>
    <h1>PDF Report</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Order Number</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->OrderNumber}}</td>
                    <td>{{ $item->ClientName }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
