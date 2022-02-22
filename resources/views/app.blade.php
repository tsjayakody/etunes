<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="eTunes,eTunes Digital Music Distribution,eTunes Records,eTunes Music,eTunes Pvt Ltd">
        <meta name="description" content="eTunes (eTunes Pvt Ltd) is Sri Lanka’s first-ever comprehensive music services provider, offering services such as global music distribution, advanced rights management, and label operations solutions to both artists and music companies in the island. eTunes aims to empower the next generation of Sri Lankan artists with the tools and opportunities needed to reach a global stage.">
        <link rel="canonical" href="{{url()->current()}}"/>

        <title>eTunes | Digital Music Distribution | eTunes Records | eTunes Pvt Ltd</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- site icon -->
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-PZR1972XQC"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-PZR1972XQC');
        </script>
    </head>
    <body class="font-sans antialiased bg-[#020202]">
        @inertia

        <script type="text/javascript" src="/js/freechat.js"></script>
    </body>
</html>
