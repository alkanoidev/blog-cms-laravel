@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <main class="card mt-4 mx-4">
        <div class="card-body">
            <h2 class="ml-3">Edit post</h2>
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
            console.log("aa");
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
                            endpoints: {
                                byFile: "/blogpost/upload-image", // Your backend file uploader endpoint
                                byUrl: "http://localhost:8008/fetchUrl", // Your endpoint that provides uploading by Url
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
                // const id = findId(window.location.href);
                console.log(window.location.pathname);
                const exp = /.*(?:\D|^)(\d+)/;
                const id = exp.exec(window.location.pathname)[1];
                const res = await fetch(`/blogpost/${id}`);
                const data = await res.json();
                console.log(data);
        
                // console.log(data);
        
                if (data !== undefined || data !== null) {
                  await editor.blocks.renderFromHTML(data.content);
                }
            },
        });
    

        // $("#save").on("click", () => {
        //     editor
        //         .save()
        //         .then((outputData) => {
        //             const edjsParser = edjsHTML();
        //             let html = edjsParser.parse(outputData);
        //             const block = outputData.blocks.find(block => block.type === "header");
        //             const title = block.data.text;
        //             const htmlSingleLine = html.join("<br />");
        
        //             $.ajax({
        //                 type: 'post',
        //                 url: "blogpost/store",
        //                 data: {
        //                     title: title,
        //                     content: htmlSingleLine
        //                 },
        //                 success: function (data) {
        //                     console.log(data);
        //                 }
        //             });
        //         })
        //         .catch((error) => {
        //             console.log("Saving failed: ", error);
        //         });
        // })
        </script>
        @endpush