<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
        }

        section {
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h1>Order Details - Invoice</h1>
    </header>

    <section>
        <h2>Order Information</h2>
        <table>
            <tr>
                <th>Order Number</th>
                <td>{{ $data->OrderNumber }}</td>
            </tr>
            <!-- Add more rows for other order information using $data->fieldName -->
        </table>
    </section>

    <section>
        <h2>Client Details</h2>
        <table>
            <tr>
                <th>Client Name</th>
                <td>{{ $data->ClientName }}</td>
            </tr>
            <!-- Add more rows for other client details using $data->fieldName -->
        </table>
    </section>

    <section>
        <h2>Payment Details</h2>
        <p><strong>Gross Amount:</strong> Rs.{{ $data->Receivable }}</p>
        <p><strong>GST ({{ $data->GST }}%):</strong> Rs.{{ $data->Receivable * ($data->GST / 100) }}</p>
        <p class="total"><strong>Total Amount:</strong> Rs.{{ $data->Receivable + ($data->Receivable * ($data->GST / 100)) }}</p>
    </section>

    <section>
        <h2>Terms and Conditions</h2>
        <p>{{ $data->{'Special T & C'} }}</p>
    </section>

    <footer>
        <p>Thank you for choosing our services!</p>
    </footer>

</body>
</html>
