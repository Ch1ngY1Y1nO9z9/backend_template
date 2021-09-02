@extends('layouts.template')

@section('css')
<style>
    pre{
        font-size: 20px;
        color: #1E2188;
        font-weight: bold;
    }

    @media (max-width: 767px){
        pre{
            font-size: 16px;
        }
    }
</style>
@endsection

@section('content')
<main>
    <section class="text-gray-600 body-font min-h-screen">
        <div class="container px-5 pt-20 pb-10 mx-auto">
            <div class="flex flex-wrap w-full mb-10">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{$news->title_ch}}</h1>
                    <div class="h-1 w-20 bg-hmit-blue rounded"></div>
                </div>
            </div>
            <div class="container mx-auto">
<pre style="white-space: break-spaces;word-break: break-all;">
{{$news->content_ch}}
</pre>
            </div>
        </div>
    </section>

</main>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js"></script>

@endsection
