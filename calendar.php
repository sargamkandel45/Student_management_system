<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            height: 100vh;
            align-items: center;
            justify-content:center;
        }
        .small{
            display: none;
        }
        @media (max-width: 802px) {
            .large{
                display: none;
            }
            .small{
                display: block;
            }
        }
    </style>
</head>
<body>
    <iframe src="https://www.hamropatro.com/widgets/calender-full.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
    style="border:none; overflow:hidden; width:800px; height:700px;" allowtransparency="true" class="large"></iframe>
    <iframe src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:295px; height:385px;" class="small" allowtransparency="true"></iframe>
</body>
</html>