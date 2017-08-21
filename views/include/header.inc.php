<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-3.2.1.min.js"></script> -->
     <!-- <script type="text/javascript" src="scripts/scripts.js"></script>   -->
    <link rel="stylesheet" type="text/css" href="<?= Config::getURL() ?>styles/css/reset.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="<?= Config::getURL() ?>styles/css/fonts.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= Config::getURL() ?>styles/css/global.css" /> -->
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=lyjd13zu44fi96hxnzzrw8h66p8et8xppviovqhyun79on12"></script>
    <script>
    tinymce.init({
    selector: 'textarea',
    height: 300,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });
    </script>
    <title><?= $title ?></title>
</head>
<body>