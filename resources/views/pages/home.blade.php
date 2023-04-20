@extends('layouts.app')

@section('content')
    <div class="flex h-full relative z-0">
        <x-sidebar />

        <main id="main" class="w-full pt-2 px-2 sm:pt-6 sm:px-6">
            <div class="sm:space-x-6 space-x-2 flex sm:justify-end justify-between w-full sm:pr-0 pr-24">
                <div class="w-80">
                    <x-text-input placeholder="Pretrazi" icon="search" name="search" />
                </div>
                <x-buttons.icon-button-tonal icon="dark_mode" />
            </div>
        </main>
    </div>
@endsection
