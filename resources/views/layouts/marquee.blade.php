<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        html,body{
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: skyblue;
        }

        .box{
            display: flex;
        }

        .inner{
            width: 100%;
            height: 200%;
            line-height: 200px;
            font-size: 6em;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 800;
            white-space: nowrap;
            overflow: hidden;
            box-shadow: 4px 6px 8px rgba(red, green, blue, 0.5);
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="inner">
            <span>Welcome to you</span>
        </div>
        <div class="inner">
            <span>Welcome to you</span>
        </div>
    </div>
</body>
</html>