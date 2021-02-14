<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aldora - News Details</title>
    <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=zahra-bold" />
    <link rel="stylesheet" href="/css/webview.css">
    <style>
        .text-container .text{
            margin-top : 4px;
            font-size : 18px;
        }
        .editor-toolbar , .editor-preview-side , .CodeMirror , .editor-statusbar{
            display : none;
        } 

        body{
            direction : rtl;
        }
        .image-container{
            color: #924485;
            margin-bottom: 60px
        }
        .image-container h4{
            margin-bottom : 1px;
        }
        .image-container h5{
            margin-top : 10px;
        }               
    </style>
</head>
<body class="body" >
    <div class="container">
        <div class="image">
            <img src="https://res.cloudinary.com/dtmkwyhpn/image/upload/w_1000,h_400,c_crop,q_100/v1582799430/<?=$image?>" />
        </div>
        <div class="text-container">
            <h4 style="color: #924485; margin-bottom: 0" ><?=$title?></h4>
            <p style="color : #515050; margin-top: -10px" class="text" ><?=$description?></p>
        </div>
    </div>


    <script src="/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/admin/plugins/editors/markdown/simplemde.min.js"></script>
    <script src="/admin/plugins/editors/markdown/custom-markdown.js"></script>


</body>
</html>