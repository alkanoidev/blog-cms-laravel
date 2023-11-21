<div>
    @if ($message = session()->has('success'))
        <div class="alert alert--success alert-dismissible fade show" role="alert">
            <p class="text-white mb-0">{{ session()->get('success') }}</p>
        </div>
    @endif
    @if ($message = session()->has('error'))
        <div class="alert alert--danger alert-dismissible fade show" role="alert">
            <p class="text-white mb-0">{{ session()->get('error') }}
            </p>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert--danger alert-dismissible fade show" role="alert">
                <p class="text-white mb-0">{{ $error }}
                </p>
            </div>
        @endforeach
    @endif
</div>

<style>
    .alert--success {
        position: relative;
        padding: .5rem;
        border-radius: 0.5rem;
        width: 100%;
        border: 1px solid #14532d80;
        background: rgba(20, 82, 45, .5);
        font-size: .8rem;
    }

    .alert--danger {
        position: relative;
        padding: .5rem;
        border-radius: 0.5rem;
        width: 100%;
        border: 1px solid rgb(221, 53, 53);
        background: rgb(116, 27, 27);
        font-size: .8rem;
    }
</style>
