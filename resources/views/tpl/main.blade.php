<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="/css/style.css?{{ rand(0,1000) }}"> <!-- Resource style -->
    <script src="/js/modernizr.js"></script> <!-- Modernizr -->
    <title>@yield('title')</title>
</head>
<body>
<header>
    <h1>Часто задаваемые вопросы</h1>
</header>
<section class="cd-faq">

    <ul class="cd-faq-categories">
        @include('menu.categories')
        <li><a href="#add_form">Связаться с нами</a></li>
    </ul> <!-- cd-faq-categories -->
    <div class="cd-faq-items">
        @yield('content')
    </div>

</section> <!-- cd-faq -->

<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/jquery.mobile.custom.min.js"></script>
<script src="/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
