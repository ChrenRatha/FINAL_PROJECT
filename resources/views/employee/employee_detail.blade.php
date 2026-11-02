<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Detail</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            color: #222;
        }

        .container {
            min-height: 100vh;
            padding-top: 70px;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .line {
            width: 60px;
            height: 4px;
            background: #2864e8;
            border-radius: 10px;
            margin: 12px auto 45px;
        }

        .employee-card {
            width: 520px;
            max-width: 90%;
            margin: auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
        }

        .row {
            display: flex;
            min-height: 75px;
            border-bottom: 1px solid #eeeeee;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            width: 45%;
            display: flex;
            align-items: center;
            padding: 0 24px;

            background: #2864e8;
            color: white;

            font-size: 15px;
            font-weight: bold;
            letter-spacing: 0.4px;
        }

        .value {
            width: 55%;
            display: flex;
            align-items: center;
            padding: 0 25px;

            background: white;
            color: #333;

            font-size: 17px;
            font-weight: 500;
        }

        .back {
            display: block;
            width: 140px;
            margin: 30px auto 0;

            padding: 12px 20px;

            text-align: center;
            text-decoration: none;

            background: #2864e8;
            color: white;

            border-radius: 8px;

            font-weight: bold;

            transition: 0.2s;
        }

        .back:hover {
            background: #174fc7;
            transform: translateY(-2px);
        }

        @media (max-width: 600px) {

            .container {
                padding-top: 40px;
            }

            h1 {
                font-size: 24px;
            }

            .employee-card {
                width: 90%;
            }

            .row {
                min-height: 65px;
            }

            .label {
                width: 45%;
                padding: 0 15px;
                font-size: 12px;
            }

            .value {
                width: 55%;
                padding: 0 15px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>EMPLOYEE DETAIL INFORMATION</h1>

    <div class="line"></div>

    <div class="employee-card">

        <div class="row">
            <div class="label">
                EMPLOYEE ID
            </div>

            <div class="value">
                {{ $empid }}
            </div>
        </div>

        <div class="row">
            <div class="label">
                EMPLOYEE NAME
            </div>

            <div class="value">
                {{ $empname }}
            </div>
        </div>

        <div class="row">
            <div class="label">
                EMPLOYEE POSITION
            </div>

            <div class="value">
                {{ $position }}
            </div>
        </div>

    </div>

    <a href="/employee" class="back">
        ← Back
    </a>

</div>

</body>
</html>