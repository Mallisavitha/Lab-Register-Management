<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Register</title>
    
    <style>
        body {
            display: flex;
            height: 100vh;
            background: url(img/bgs.png) no-repeat;
            background-size: cover;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        
        .container {
            max-width: 975px;
            width: 75%;
            background-color: #f5f7f8;
            padding: 20px 30px;
            border-radius: 30px;
            height: 96vh;
        }
        h2 {
            text-align: center;
            margin-top: 0px;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #f2f2f2;
        }
        td{
            display: flex;
            justify-content: center;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Staff Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>system Number</th>
                    <th>Technical issue</th>
                    <th>Resolved\Unresolved</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <th></th>
                <th></th>
                <th></th>
                <td><input type="checkbox"></td>
                <th></th>
            </tbody>
        </table>
    </div>
</body>
</html>