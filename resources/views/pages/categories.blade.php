@extends('layouts.admin', ['class' => 'g-sidenav-show bg-gray-900'])

@section('content')
    <div class="row mx-2 mt-3 z-10">
        <div class="col-12">
            <div class="card text-white bg-gray-800 mb-4">
                <div class="card-header bg-gray-800 pb-0">
                    <h3 class="text-white">Category Management</h3>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="container__create_new">
                        <form action="{{ route('category.store') }}" method="POST" class="color-white"
                            enctype="multipart/form-data">
                            @csrf
                            <h4>Create New Category</h4>
                            <div class="form-group">
                                <label class="form-check-label text-light" for="input-title"
                                    value="{{ old('title') }}">Title</label>
                                <input type="text" name="title" id="input-title" class="form-control mb-3" />
                            </div>
                            <div class="form-group">
                                <label class="form-check-label text-light" for="input-icon">Icon:</label>
                                <br>
                                <input type="file" name="icon" id="input-icon">
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                            @include('components.alert')
                        </form>
                    </div>
                    <ul class="container__all_categories">
                        @if (count($categories) != 0)
                            @foreach ($categories as $category)
                                <li class="card_category">
                                    <h5>{{ $category->title }}</h5>
                                    <img src="{{ asset('images/' . $category->icon_path) }}" />
                                    <div class="card_category_buttons">
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-secondary">Delete</button>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p class="ps-4">No categories.</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

<style scoped>
    .container__create_new {
        max-width: 24rem;
        padding-left: 1.5rem;
    }

    @media only screen and (max-width: 600px) {
        .container__create_new {
            max-width: 20rem;
            padding-left: 1.5rem;
        }
    }

    .container__create_new form h4 {
        color: white;
    }

    .table-row {
        border-style: none !important;
        border-color: transparent;
        border-width: 0px;
    }

    .table-row:nth-child(even) {
        background-color: #252a2e;
        border-radius: 5px !important;
    }

    .card {
        box-shadow: none !important;
    }

    svg {
        height: 3rem;
        width: 3rem;
        border-radius: .5rem;
    }

    input[type="file"] {
        position: relative;
    }

    input[type="file"]::file-selector-button {
        width: 136px;
        color: transparent;
    }

    /* Faked label styles and icon */
    input[type="file"]::before {
        position: absolute;
        pointer-events: none;
        top: 10px;
        left: 16px;
        height: 20px;
        width: 20px;
        content: "";
        fill: #94ccff;
        background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM5NGNjZmYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBjbGFzcz0ibHVjaWRlIGx1Y2lkZS11cGxvYWQiPjxwYXRoIGQ9Ik0yMSAxNXY0YTIgMiAwIDAgMS0yIDJINWEyIDIgMCAwIDEtMi0ydi00Ii8+PHBvbHlsaW5lIHBvaW50cz0iMTcgOCAxMiAzIDcgOCIvPjxsaW5lIHgxPSIxMiIgeDI9IjEyIiB5MT0iMyIgeTI9IjE1Ii8+PC9zdmc+");
    }

    input[type="file"]::after {
        position: absolute;
        pointer-events: none;
        top: 11px;
        left: 40px;
        content: "Upload File";
        width: 100%;
        font-size: 0.875rem;
        font-weight: 400;
        color: #fff;
        border-radius: 0.5rem;
    }

    /* ------- From Step 1 ------- */

    /* file upload button */
    input[type="file"]::file-selector-button {
        border-radius: .8rem;
        padding: 0 16px;
        height: 40px;
        cursor: pointer;
        background-color: #202124;
        border: 1px solid rgba(0, 0, 0, 0.16);
        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.05);
        margin-right: 16px;
        transition: background-color 200ms;
    }

    /* file upload button hover state */
    input[type="file"]::file-selector-button:hover {
        background-color: #202124;
    }

    /* file upload button active state */
    input[type="file"]::file-selector-button:active {
        background-color: #202124;
    }

    .container__all_categories {
        list-style: none;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .card_category {
        display: flex;
        flex-direction: column;
        border-radius: 1rem;
        padding: 1rem;
        background-color: #202124;
        width: 18rem;
    }

    .card_category img {
        width: 52px;
        filter: invert();
        margin-bottom: 1rem;
    }

    .card_category h5 {
        color: white;
    }

    .card_category .card_category_buttons {
        text-align: end;
        display: block;
    }

    .card_category .card_category_buttons button {
        margin-bottom: 0px;
    }
</style>
