<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body
        {
            text-align: center;
        }
        .page-break 
        {
            page-break-after: always;
        }
        h1
        {
            color: red;
            /* margin: 150px; */
        }
        img
        {
            margin: 50px;
        }
    </style>
</head>
<body>
    Page 1
    <h1>Hello world!</h1>
    <img src="{{public_path('image/user1.png')}}" alt="">
    <div class="page-break"></div>
    Page 2
    <h1>Hello world1!</h1>
    <img src="{{public_path('image/user1.png')}}" alt="">
    <div class="page-break"></div>
    Page 3
    <h1>Hello world1!</h1>
    <img src="{{public_path('image/user1.png')}}" alt="">
    <div class="page-break"></div>
</body>
</html>
