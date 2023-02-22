@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <main class="card mt-4 mx-4" id="edit-page">
        <div class="container1">
            <div class="input-title-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="input-title" class="form-control" />
            </div>
            <div contentEditable="true" id="edit-content-div" class="form-control"></div>
            <div class="save-button-div">
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
    @push('js')
    <script>
        const titleInput = document.getElementById('input-title');
        const editContentDiv = document.getElementById("edit-content-div");
        (async() => {
            const exp = /.*(?:\D|^)(\d+)/;
            const id = exp.exec(window.location.pathname)[1];
            const res = await fetch(`/blogpost/${id}`);
            const data = await res.json();
    
            if (data !== undefined || data !== null) {
                editContentDiv.innerHTML = data.content;
                titleInput.value = data.title;
            }
            // image drag & drop
            let handleDrag = function(e) {
                e.stopPropagation();
                e.preventDefault();
            };
            let handleDrop = function(e) {
                e.stopPropagation();
                e.preventDefault();
                x = e.clientX;
                y = e.clientY;
                let file = e.dataTransfer.files[0];
                if (file.type.match('image.*')) {
                    let reader = new FileReader();
                    reader.onload = (function(theFile) {
                        let dataURI = theFile.target.result;
                        let img = document.createElement("img");
                        img.src = dataURI;

                        if (document.caretRangeFromPoint) {
                            range = document.caretRangeFromPoint(x, y);
                            range.innerHTML += "<br>"
                            range.insertNode(img);
                        }
                        else
                        {
                            console.log('could not find carat');
                        }
                    });
                    reader.readAsDataURL(file);
                }
            };

            let dropZone = document.getElementById('edit-content-div');
            dropZone.addEventListener('dragover', handleDrag, false);
            dropZone.addEventListener('drop', handleDrop, false);
        })()

        $("#save").on("click", () => {
                const exp = /.*(?:\D|^)(\d+)/;
                const id = exp.exec(window.location.pathname)[1];
                $.ajax({
                    type: 'post',
                    url: "/blogpost/update/" + id,
                    data: {
                        title: titleInput.value,
                        content:  editContentDiv.innerHTML
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
                .catch((error) => {
                    console.log("Saving failed: ", error);
                });
        })
    </script>
@endpush

<style>
    #edit-page {
        padding: 1rem;
    }
    #edit-content-div{
        margin-top: 1rem;
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    #edit-content-div > img {
        width: 100%;
    }
    #edit-content-div:focus {
        outline: none;
        border: none;
    }
    .save-button-div{
        margin: 0px auto;
    }
    .container1 {
        width: 100%;
        max-width: 800px;
        margin: 0px auto;
    }
    .input-title-group label{
        font-size: 1rem;
    }
</style>