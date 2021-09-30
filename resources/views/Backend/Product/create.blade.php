@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!empty($product))
                <div>

                    <a href="edit?tab=1" class="btn btn-outline-primary"><i class="material-icons">Form</i></a>
                    <a href="edit?tab=2" class="btn btn-outline-primary"><i class="material-icons">Image</i></a>
                </div>
            @endif

                @if (!empty($tab))
                    @if ($tab == 2)
                        @include('Backend.Product.imageEdit')
                    @else
                        @include('Backend.Product.form')
                    @endif
                @else 
                    @include('Backend.Product.form')
                @endif
               

        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        let files = document.getElementById("file-input")
        let container = document.getElementById("image-preview")

        const priview = () => {

            for (i of files.files) {
                let reader = new FileReader();
                let figer = document.createElement("figure")
                let figCap = document.createElement("figCaption")
                let deleteButton = document.createElement("div")
                deleteButton.innerText = "+"
                figCap.innerText = i.name
                figer.appendChild(figCap)

                reader.onload = () => {
                    let img = document.createElement("img")
                    img.setAttribute("src", reader.result)
                    // figer.insertAdjacentElement(deleteButton, img, figCap)
                    figer.insertBefore(img, figCap)
                }
                container.appendChild(figer)
                reader.readAsDataURL(i)
            }
        }
    </script>


@endpush

@push('js')
<style type="text/css">
    figure {
        width: 45%;
        display: block;
    }
    img {
        width: 100%;
    }
    #image-preview {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 5px
    }
</style>
@endpush
