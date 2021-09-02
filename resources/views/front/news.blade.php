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
<div class="container mx-auto">
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="-my-8 divide-y-2 divide-gray-100">
                    @foreach($all_news as $news)
                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                            <span class="font-semibold title-font text-3xl text-gray-700">{{date('Y', strtotime($news->date))}}</span>
                            <span class="mt-1 text-gray-500 text-lg">{{date('d', strtotime($news->date))}} {{date('M', strtotime($news->date))}}</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$news->title_ch}}</h2>
                            <p class="leading-relaxed">
                            {{$news->content_ch}}
                            </p>
                            <a class="text-indigo-500 inline-flex items-center mt-4" href="/news/{{$news->id}}">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@section('js')
@endsection
