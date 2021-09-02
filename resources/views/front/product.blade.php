@extends('layouts.template')

@section('css')

@endsection

@section('content')
<main>

    <section class="text-gray-600 body-font min-h-screen">
        <div class="container px-5 pt-20 pb-10 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{$type->type_name_ch}}</h1>
                    <div class="h-1 w-20 bg-hmit-blue rounded"></div>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
            @foreach ($products as $product)
            <div class="p-4 lg:w-1/3">
                    <a href="{{$product->links}}" target="_blank">
                        <div
                            class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                            <img alt="team"
                                class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                                src="{{$product->img}}">
                            <div class="flex-grow sm:pl-8">
                                <h2 class="title-font font-medium text-lg text-gray-900">{{$product->name_ch}}</h2>
                                <p class="mb-4">
<pre>
{{$product->content_ch}}
</pre>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>
@endsection

@section('js')
@endsection
