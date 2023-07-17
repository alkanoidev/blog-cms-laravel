@extends('layouts.admin', ['class' => 'g-sidenav-show bg-gray-900'])

@section('head')
    {{-- <link id="pagestyle" href={{ asset('assets/css/argon-dashboard.css') }} rel="stylesheet" /> --}}
@endsection

@section('content')
    <main class="card mt-4 mx-4 bg-gray-800">
        <div class="card-body" id="container">
            <div class="container1">
                <h2 class="ml-3 text-white">Create new post</h2>
                <div class="input-title-group">
                    <label for="title" class="text-white">Title:</label>
                    <input type="text" name="title" id="input-title" class="form-control mb-3" />
                </div>
                <div id="editorjs" class="text-black"></div>
                <button id="save" class="btn-primary mt-3 btn">Save</button>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </main>
@endsection
<style>
    .input-title-group label {
        font-size: 1rem;
    }

    .container1 {
        width: 100%;
        max-width: 800px;
        margin: 0px auto;
    }

    #editorjs img {
        border-radius: 20px;
    }

    .btn {
        border-radius: 1rem !important;
        padding-left: 2rem !important;
        padding-right: 2rem !important;
    }

    svg {
        height: 3rem;
        width: 3rem;
        border-radius: .5rem;
    }
</style>
@push('js')
    <script>
        let token = "{{ csrf_token() }}";

        const editor = new EditorJS({
            holder: "editorjs",
            tools: {
                header: Header,
                image: {
                    class: ImageTool,
                    config: {

                        additionalRequestHeaders: {
                            "X-CSRF-TOKEN": token
                        },
                        endpoints: {
                            accept: 'images/*',
                            byFile: "/dashboard/blogpost/upload-image", // Your backend file uploader endpoint
                            byUrl: "{{ url('/images/') }}", // Your endpoint that provides uploading by Url
                        },
                    },
                },
                linkTool: {
                    class: LinkTool,
                    config: {
                        endpoint: "http://localhost:8000/fetchUrl", // Your backend endpoint for url data fetching,
                    },
                },
                underline: Underline,
                list: {
                    class: List,
                    inlineToolbar: true,
                    config: {
                        defaultStyle: "unordered",
                    },
                },
                quote: Quote,
                raw: RawTool,
                inlineCode: {
                    class: InlineCode,
                    shortcut: "CMD+SHIFT+M",
                },
                code: CodeTool,
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true,
                },
                warning: Warning,
            },
        });

        $("#save").on("click", () => {
            editor
                .save()
                .then((outputData) => {
                    const edjsParser = edjsHTML();
                    const html = edjsParser.parse(outputData).join(' ').toString();
                    $.ajax({
                        type: 'post',
                        url: "/dashboard/blogpost/store",
                        data: {
                            title: document.getElementById("input-title").value,
                            body_json: JSON.stringify(outputData),
                            body_html: html
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
                })
                .catch((error) => {
                    console.log("Saving failed: ", error);
                });
        })
    </script>
@endpush
