<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="/css/style.css?{{ rand(0,1000) }}"> <!-- Resource style -->
    <script src="/js/modernizr.js"></script> <!-- Modernizr -->
    <title>{{$title}}</title>
</head>
<body>
<header>
    <h1>Часто задаваемые вопросы</h1>
</header>
<section class="cd-faq">

    {!! $content !!}

</section> <!-- cd-faq -->

<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/jquery.mobile.custom.min.js"></script>
<script src="/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
