<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Information</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fc;
        }

        .container {
            width: 100%;
            min-height: 100vh;
            padding-top: 50px;
        }

        h1 {
            text-align: center;
            color: #222;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .line {
            width: 55px;
            height: 3px;
            background: #2864e8;
            margin: 0 auto 35px;
        }

        .employee-list {
            width: 370px;
            margin: auto;
        }

        .employee {
            display: flex;
            justify-content: space-between;
            align-items: center;

            width: 100%;
            height: 65px;

            margin-bottom: 15px;
            padding: 0 25px;

            background: white;
            border-radius: 10px;

            text-decoration: none;
            color: #333;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);

            transition: 0.2s;
        }

        .employee:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }

        .arrow {
            font-size: 25px;
            color: #555;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>EMPLOYEE INFORMATION</h1>

    <div class="line"></div>

    <div class="employee-list">

        <a class="employee"
           href="{{ url('/employee/detail/101/John/Manager') }}">
            <span>Employee 1</span>
            <span class="arrow">→</span>
        </a>

        <a class="employee"
           href="{{ url('/employee/detail/102/Pisey/Programmer') }}">
            <span>Employee 2</span>
            <span class="arrow">→</span>
        </a>

        <a class="employee"
           href="{{ url('/employee/detail/103/King/Designer') }}">
            <span>Employee 3</span>
            <span class="arrow">→</span>
        </a>

        <a class="employee"
           href="{{ url('/employee/detail/104/Nita/Accountant') }}">
            <span>Employee 4</span>
            <span class="arrow">→</span>
        </a>

    </div>

</div>

</body>

</html>