<div class="pt-4">
    @if ($message = session()->has('success'))
        <div class="alert alert--success alert-dismissible fade show" role="alert">
            <p class="text-white mb-0">{{ session()->get('success') }}</p>
        </div>
    @endif
    @if ($message = session()->has('error'))
        <div class="alert alert-danger" role="alert">
            <p class="text-white mb-0">{{ session()->get('error') }}</p>
        </div>
    @endif
</div>

<style>
    .alert--success {
        position: relative;
        padding: 1rem;
        border-radius: 0.5rem;
        width: 100%;
        border: 1px solid #14532d80;
        background: rgba(20, 82, 45, .5);
        font-size: .8rem;
    }
</style>