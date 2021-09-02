@extends('layouts.template')

@section('css')
@endsection

@section('content')
<main>
    <section class="text-gray-600 body-font min-h-screen">
        <div class="container px-5 pt-20 pb-10 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{$product->name_ch}}</h1>
                    <div class="h-1 w-20 bg-hmit-blue rounded"></div>
                </div>
            </div>
            <section class="text-gray-600 body-font">
                <div class="container mx-auto flex px-5 pb-10 md:flex-row flex-col ">
                    <div class="lg:w-1/3 md:w-1/2 w-5/6 mb-10 md:mb-0">
                        <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                    </div>
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                        <p class="mb-8 leading-relaxed">
<pre style="white-space: break-spaces;word-break: break-all;">
{{$product->content_ch}}
</pre>
                        </p>
                    </div>
                </div>
                <div class="container mx-auto px-5">
                    {!! $product->datail_ch !!}
                </div>
            </section>
        </div>
    </section>

</main>
@endsection

@section('js')
@endsection
