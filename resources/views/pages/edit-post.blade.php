@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <main class="card mt-4 mx-4">
        <div class="card-body" id="container">
            <div class="container1">
                <h2 class="ml-3">Create new post</h2>
                <div class="input-title-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="input-title" class="form-control mb-3" />
                </div>
                <div class="bg-white" id="editorjs"></div>
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
    .input-title-group label{
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
</style>
@push('js')
    <script>
        let token = "{{ csrf_token()}}";

        const editor = new EditorJS({
            /**
             * Id of Element that should contain Editor instance
             */
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
                            byFile: "/blogpost/upload-image",
                            // byUrl: "{{ url('/images/') }}",
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
                code: editorjsCodeflask,
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true,
                },
                warning: Warning,
            },
            onReady: async () => {
                const exp = /.*(?:\D|^)(\d+)/;
                const id = exp.exec(window.location.pathname)[1];
                const res = await fetch(`/blogpost/${id}`);
                const data = await res.json();
                const content = JSON.parse(data.content);
                document.getElementById("input-title").value = data.title;

                if (data !== undefined || data !== null) {
                    await editor.blocks.render(content);
                }
            },
        });


        $("#save").on("click", () => {
            editor
                .save()
                .then((outputData) => {
                    const exp = /.*(?:\D|^)(\d+)/;
                    const id = exp.exec(window.location.pathname)[1];

                    $.ajax({
                        type: 'post',
                        url: "/blogpost/update/" + id,
                        data: {
                            title: document.getElementById("input-title").value,
                            content: JSON.stringify(outputData)
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
