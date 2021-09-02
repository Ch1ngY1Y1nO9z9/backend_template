@extends('layouts.template')

@section('css')
@endsection

@section('content')
<main>
    <section class="text-gray-600 body-font min-h-screen">
        <div class="container px-5 pt-20 pb-10 mx-auto">
{!! $about->content_ch !!}
        </div>
    </section>

</main>
@endsection

@section('js')
@endsection
