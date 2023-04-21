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
            <div class="mt-6 from-primary-light to-secondary-light rounded-3xl w-full h-[450px] grid place-items-center py-6 bg-cover
            bg-[url('https://images.unsplash.com/photo-1681927269046-1263e3282bb8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80')]
            z-0 relative
            
            ">
                <div class="text-center px-3 lg:px-0">
                    <h1 class="sm:text-2xl text-3xl font-bold text-on-primary-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, nostrum.</h1>
                    <p class="sm:text-lg text-base max-w-2xl mx-auto text-on-primary-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, placeat ad? Quam, vitae natus accusantium cupiditate consequuntur laudantium ea omnis.</p>

                    <div class="mt-12">
                        <x-buttons.button-tonal title="Procitaj Vise" href="#" icon="" />
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
