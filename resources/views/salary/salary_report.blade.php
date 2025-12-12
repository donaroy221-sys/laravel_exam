<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Report</title>
    
</head>
<body>
    <h1>Salary Report</h1>

    <p><strong>Total Salary:</strong> ${{ number_format($totalSalary) }}</p>
    <p><strong>Average Salary:</strong> ${{ number_format($averageSalary) }}</p>

    

    <h3>All Employee Names:</h3>
    <ul>
        @foreach($employeeNames as $name)
            <li>{{ $name }}</li>
        @endforeach
    </ul>
</body>
</html>
