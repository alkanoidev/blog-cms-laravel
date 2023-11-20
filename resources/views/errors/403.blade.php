@extends('layouts.app', ['title' => 'Došlo je do greške'])

@section('content')
    <div class="h-full w-full grid place-content-center">

        <main class="text-center space-y-4">
            <div>
                <h1 class="text-3xl text-on-light dark:text-on-dark">Došlo je do greške</h1>
                <h2 class="text-3xl text-primary-light dark:text-primary-dark font-bold">403</h2>
            </div>
            <p class="max-w-sm text-on-light dark:text-on-dark">Nemate dozvolu da pristupite ovoj stranici.</p>
            <x-buttons.button-filled title="Nazad" href="{{ url()->previous() }}" />
        </main>

    </div>
@endsection
