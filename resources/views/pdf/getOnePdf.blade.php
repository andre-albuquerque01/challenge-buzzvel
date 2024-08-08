<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Plan Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            margin: 20px auto;
            max-width: 800px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .holiday {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .holiday:last-child {
            border-bottom: none;
        }

        .holiday p {
            margin: 5px 0;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">Holiday Plan Report</div>
        <div class="holiday">
            <p><span class="label">Title:</span> {{ $day->title }}</p>
            <p><span class="label">Description:</span> {{ $day->description }}</p>
            <p><span class="label">Start holiday:</span> {{ $day->startHoliday }}</p>
            <p><span class="label">Finish holiday:</span> {{ $day->endHoliday }}</p>
            <p><span class="label">Location:</span> {{ $day->location }}</p>
        </div>
    </div>
</body>

</html>
