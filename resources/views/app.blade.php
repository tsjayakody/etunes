<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia

        <script type="text/javascript" src="/js/freechat.js"></script><script> window.start.init({ title: "Hi there ✌️", message: "How may we help you? Just send us a message now to get assistance.", color: "#FF0000", position: "right", placeholder: "Enter your message", withText: "Write with", viaWhatsapp: "Or call us directly via +94115300600", gty: "Go to your", awu: "and write us", connect: "Connect now", button: "Write us", device: "everywhere", logo: "https://d2r80wdbkwti6l.cloudfront.net/TdXfAvwxblHunom0Hi5gfEbUUlN2CWb3.jpg", person: "https://d2r80wdbkwti6l.cloudfront.net/YS2Im37RzCBt3NUq2JMnA2xjdGP69tzk.jpg", services: [{"name":"messenger","content":"471280242902835"},{"name":"mail","content":"contact@etunes.lk"},{"name":"phone","content":"+94115300600"}]})</script>
    </body>
</html>
