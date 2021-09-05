@extends('layouts.template')

@section('recaptcha')
    {{-- google recaptcha v3 --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section('css')
@endsection

@section('content')
    <main>
        <section>
            <img class="w-100" src="/img/info-bg.jpg" alt="">
        </section>

        <!-- Recommend supplier -->
        <section style="background: #56CCF2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2F80ED, #56CCF2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        ">
            <div class="container px-5 pt-8 pb-8 mx-auto">
                <div class="flex flex-wrap w-full">
                    <div class="lg:w-1/2 w-full lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">Recommend Supplier</h1>
                    </div>
                </div>
            </div>

            <div class="swiper-container bannerSwiper" style="overflow: hidden">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <a href="{{$banner->links}}" target="_blank">
                                <img src="{{$banner->img}}" alt="{{$banner->alt}}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div
                    class="swiper-button-next right-5 bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div
                    class="swiper-button-prev left-10 bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section>
            <div class="container px-5 pt-20 pb-20 mx-auto">
                <div class="flex flex-wrap w-full mb-10">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Certification Supplier</h1>
                        <div class="h-1 w-20 bg-hmit-blue rounded"></div>
                    </div>
                </div>
                <div class="swiper-container recommendSupplierSwiper">
                    <div class="swiper-wrapper pb-8">
                        @foreach($suppliers as $supplier)
                            <div class="swiper-slide">
                                <div class="p-4">
                                    <a href="{{$supplier->links}}" target="_blank">
                                        <div class="bg-white p-6 rounded-lg shadow">
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="{{$supplier->img}}" alt="{{$supplier->title_ch}}">
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                                {{$supplier->subtitle_ch}}
                                            </h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{$supplier->title_ch}}</h2>
                                            <p class="leading-relaxed text-base">{{$supplier->content_ch}}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

       <!-- Supplier Classification -->
        <section class="text-gray-600 body-font" style="background: #56CCF2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2F80ED, #56CCF2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        " id="Classification">
            <div class="container px-5 pt-20 pb-20 mx-auto">
                <div class="flex flex-wrap w-full mb-10">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">Supplier Classification
                        </h1>
                        <div class="h-1 w-20 bg-white rounded"></div>
                    </div>
                </div>
                <div class="flex flex-wrap -m-2">
                    @foreach ($productTypes as $type)
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full ">
                            <a href="/Types/{{$type->id}}">
                                <div
                                    class="h-full flex items-center bg-white border-gray-200 border p-4 rounded-lg shadow transform duration-300 hover:scale-105">
                                    <img alt="team"
                                        class="w-32 h-26 bg-gray-100 object-cover object-center flex-shrink-0 rounded mr-4"
                                        src="{{$type->img}}">
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 title-font font-medium">{{$type->type_name_ch}}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Products Videos -->
        <section class="text-gray-600 body-font">
            <div class="container px-5 pt-20 pb-10 mx-auto">
                <div class="flex flex-wrap w-full mb-10">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Products Videos</h1>
                        <div class="h-1 w-20 bg-hmit-blue rounded"></div>
                    </div>
                </div>
                <div class="swiper-container productsVideosSwiper">
                    <div class="swiper-wrapper pb-8">
                        @foreach($productVideos as $productVideo)
                        <div class="swiper-slide">
                            <div class="p-4">
                                <a href="{{$productVideo->links}}" target="_blank">
                                    <div class="bg-white p-6 rounded-lg shadow">
                                        <img class="h-40 rounded w-full object-cover object-center mb-4"
                                            src="{{$productVideo->img}}" alt="{{$productVideo->title_ch}}">
                                        <h2 class="text-lg text-gray-900 font-medium title-font">{{$productVideo->title_ch}}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
        </section>

        <section class="text-gray-600 body-font" style="background: #56CCF2;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2F80ED, #56CCF2);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2F80ED, #56CCF2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        " id="News">
            <div class="container px-5 py-20 mx-auto">
                <div class="flex flex-wrap w-full mb-10">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-white">News</h1>
                        <div class="h-1 w-20 bg-white rounded"></div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4 -my-8">
                    @foreach ($all_news as $news)
                        <div class="py-8 px-4 lg:w-1/3">
                            <div class="h-full flex items-start">
                                <div class="flex-grow pl-6">
                                    <a href="/news/{{$news->id}}">
                                        <img src="{{$news->img}}" alt="" style="height:280px;">
                                        <h2 class="title-font text-xl font-medium text-white my-3 hover:underline">{{$news->title_ch}}
                                        </h2>
                                    </a>
                                    <p class="leading-relaxed mb-5 text-gray-100">{{$news->content_ch}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-right">
                    <a href="/news" class=" btn btn-primary px-5 py-1 pb-2 bg-hmit-blue shadow hover:opacity-80">more</a>
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex flex-wrap w-full mb-10">
                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Partner</h1>
                        <div class="h-1 w-20 bg-hmit-blue rounded"></div>
                    </div>
                </div>
                <div class="flex flex-wrap -m-4 w-full">
                    @foreach ($partners as $partner)
                        <div class="p-4 lg:w-1/4 md:w-full">
                            <div
                                class="flex bg-white border-2 rounded-lg border-gray-200 border-opacity-50 p-4 flex-col">
                                <img class="h-40 rounded object-cover object-center mr-4 mb-3"
                                    src="{{$partner->img}}" alt="{{$partner->title_ch}}">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{$partner->title_ch}}</h2>
                                    <p class="leading-relaxed text-base">{{$partner->content_ch}}</p>
                                    <a class="mt-3 text-indigo-500 inline-flex items-center" href="{{$partner->links}}" target="_blank">Visit Website
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="text-white body-font relative">
            <div class="absolute inset-0 bg-bottom bg-no-repeat" style="background-image:url('/img/contact_us.jpg')">
            </div>
            <div class="container px-5 py-32 mx-auto flex" id="ContactUs">
                <div
                    class="w-full bg-black bg-opacity-50 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative shadow-md">
                    <h2 class="text-white text-lg mb-1 font-medium title-font">Contact Us</h2>
                    <p class="leading-relaxed mb-5 text-white">
                    If you are not looking for suppliers in the plafom,you can mail to us.<br>
                    We will quickly help for you.
                    </p>
                    <form action="/contact_us" method="post">
                        @csrf
                        <div class="flex flex-col md:flex-row md:space-x-4">
                            <div class="flex-1">
                                <div class="relative mb-4">
                                    <label for="companyName" class="leading-7 text-sm text-white">Company</label>
                                    <input type="text" id="companyName" name="companyName" required
                                        class="w-full bg-black bg-opacity-25 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('companyName')
                                        <span class="text-red-200" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="relative mb-4">
                                    <label for="country" class="leading-7 text-sm text-white">Country</label>
                                    <input type="text" id="country" name="country" required
                                        class="w-full bg-black bg-opacity-25 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="relative mb-4">
                                    <label for="companyWebsite" class="leading-7 text-sm text-white">Website</label>
                                    <input type="text" id="companyWebsite" name="companyWebsite" required
                                        class="w-full bg-black bg-opacity-25 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('companyWebsite')
                                        <span class="text-red-200" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="relative mb-4">
                                    <label for="business" class="leading-7 text-sm text-white">Business</label>
                                    <input type="text" id="business" name="business" required
                                        class="w-full bg-black bg-opacity-25 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('business')
                                        <span class="text-red-200" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="flex-1">
                            <div class="relative mb-4">
                                    <label for="email" class="leading-7 text-sm text-white">Email</label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full bg-black bg-opacity-25 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-white py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                    @error('email')
                                        <span class="text-red-200" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="relative mb-4">
                                    <label for="message" class="leading-7 text-sm text-white">Message</label>
                                    <textarea id="message" name="content"
                                        class="w-full bg-black bg-opacity-25 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-white py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                                <button
                        class="text-white block w-full bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Send</button>
                            </div>
                        </div>



                        <!-- {!! app('captcha')->render(); !!} -->

                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script>
        var swiper = new Swiper(".bannerSwiper", {
            autoplay: {
                delay: 5000,
            },
            spaceBetween: 30,
            navigation: {
                nextEl: ".bannerSwiper .swiper-button-next",
                prevEl: ".bannerSwiper .swiper-button-prev",
            },
            pagination: {
                el: ".bannerSwiper .swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".recommendSupplierSwiper", {
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 4,
            pagination: {
                el: ".recommendSupplierSwiper .swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".productsVideosSwiper", {
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 3,
            pagination: {
                el: ".productsVideosSwiper .swiper-pagination",
                clickable: true,
            },
        });

    </script>

@if(Session::has('message'))
    <script>
        alert('We will contact you in a few days, thank you for contacting us!')
    </script>
@endif

@endsection
