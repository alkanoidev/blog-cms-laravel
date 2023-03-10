@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <main class="card mt-4 mx-4">
        <div class="card-body">
            <h2 class="ml-3">Edit post</h2>
            <input type="text" name="title" id="input-title" class="form-control" />
            <div class="bg-white rounded-3" id="editorjs"></div>
            <button id="save" class="btn-primary mt-3 btn">Save</button>

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
