@extends('layouts.app')

@section('content')
    <div class="flex h-full relative z-0 w-full">
        <x-sidebar />

        <main>
            <div class="w-80">
                <x-text-input placeholder="Pretrazi" icon="search" name="search" />
            </div>
        </main>
    </div>
@endsection
