@extends('layouts.app')

@section('content')

    <div id="VueApp" class="h-full w-full flex justify-center items-center">
        <h1 class="font-normal text-grey-darkest">🤘 Tailwindcss, Sass and Vue</h1>
    </div>

@endsection

@section('scripts')
    <script src="{{ mix('js/VueApp.js') }}"></script>
@endsection
