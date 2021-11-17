<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    a.button3 {
        display: inline-block;
        padding: 0.3em 1.2em;
        margin: 0 0.3em 0.3em 0;
        border-radius: 2em;
        box-sizing: border-box;
        text-decoration: none;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        color: #FFFFFF;
        background-color: #4eb5f1;
        text-align: center;
        transition: all 0.2s;
    }

    a.button3:hover {
        background-color: #4095c6;
    }

    @media all and (max-width:30em) {
        a.button3 {
            display: block;
            margin: 0.2em auto;
        }
    }
</style>

<body>
    <a href="something" class="button3">Button</a>
    <a href="something" class="button3">It's getting old</a>

</body>

</html>