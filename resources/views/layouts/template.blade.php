<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $seo = App\Seo::find(1); ?>
    <meta name="keywords" content="{{$seo->keyword}}">
    <meta name="description" content="{{$seo->description}}" />
    <title>{{$seo->title}}</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-GXF49ZEXBX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-GXF49ZEXBX');
    </script>

    @yield('recaptcha') -->


    <link href="/css/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.css" />
    <style>
        body {
            background: url('/src/imgs/bg.png');
        }

        .swiper-button-next:after,
        .swiper-container-rtl .swiper-button-prev:after,
        .swiper-button-prev:after,
        .swiper-container-rtl .swiper-button-next:after {
            content: "";
        }
    </style>

    @yield('css')
</head>

<body>
    <header class="text-gray-600 body-font shadow bg-hmit-blue fixed z-10 top-0 w-full">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="/">
                <span class="ml-3 text-xl bg-white p-2 px-3">
                    <img class="h-10" src="/img/logo.png" alt="HMIT">
                </span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">

                <a class="inline-flex items-center text-white border-0 py-1 px-3 pb-1 hover:underline rounded text-base mt-4 md:mt-0 mr-3" href="/about_us">
                    About us
                </a>

                <a class="inline-flex items-center text-white border-0 py-1 px-3 pb-1 hover:underline rounded text-base mt-4 md:mt-0 mr-3" href="#Classification">
                    Classification
                </a>

                <a class="inline-flex items-center text-white border-0 py-1 px-3 pb-1 hover:underline rounded text-base mt-4 md:mt-0 mr-3" href="#News">
                    Exhibition
                </a>

                <a class="inline-flex items-center text-white border-0 py-1 px-3 pb-1 hover:underline rounded text-base mt-4 md:mt-0 mr-3" href="#News">
                    News
                </a>
            </nav>
            <a class="inline-flex items-center text-white border-0 py-1 px-3 pb-1 hover:underline rounded text-base mt-4 md:mt-0"
                href="#ContactUs">
                Contact Us
            </a>
        </div>
    </header>

    <div style="padding-top:96px">
        @yield('content')
    </div>

    <footer class="text-white body-font">
        <div class="bg-hmit-blue">
            <div class="container mx-auto py-4 px-5">
                <p class="text-white text-lg text-center sm:text-left">Taiwan Hardware Suppliers Plaform&Magazine</p>
                <p class="text-white text-lg text-center sm:text-left">(Image Advertising Media Co.)</p>
                <p class="text-white text-sm text-center sm:text-left">13F.-5, No. 100, Sec. 1, Zhongqing Rd., North Dist., </p>
                <p class="text-white text-sm text-center sm:text-left">Taichung City 404, Taiwan</p>
                <p class="text-white text-sm text-center sm:text-left">TEL:+886-4-22038853   FAX:+886-4-22083823</p>
                <p class="text-white text-sm text-center sm:text-left">E-mail:info@hmit.com.tw</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
    @yield('js')
</body>
</html>
