<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <!-- Include any necessary stylesheets for your PDF layout -->
</head>
<body>
    <h1>PDF Report</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
