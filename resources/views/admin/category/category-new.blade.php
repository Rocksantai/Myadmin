@extends('admin.template')

@section('title', 'adaugare categorie')

@section('content')

<br><br>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control panel</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Category</a></li>
    <li class="breadcrumb-item">Create new Category</li>
</ol>

    <section class="container">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="form-group col-md-3"><br>
                        <label for="title">Category</label><br>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Categorie" value="{{ old('title') }}"><br>
                        @error('title')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-3"><br>
                        <label for="slug">Slug</label><br>
                        <input name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Slug" value="{{ old('slug') }}"><br>
                        @error('slug')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-6"><br>
                        <label for="subtitle">Subtitle</label><br>
                        <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" placeholder="Subtitle" value="{{ old('subtitle') }}"><br>
                        @error('subtitle')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-8"><br>
                        <label for="excerpt">Excerpt</label><br>
                        <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" placeholder="excerpt"></textarea>
                        @error('excerpt')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-2"><br>
                        <label for="views">Views</label><br>
                        <input name="views" type="number" class="form-control @error('views') is-invalid @enderror" id="views" placeholder="Views" value="{{ old('views') }}"><br>
                        @error('views')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-2"><br>
                        <label for="order">Order</label><br>
                        <input name="order" type="number" class="form-control @error('order') is-invalid @enderror" id="order" placeholder="Order" value="{{ old('order') }}"><br>
                        @error('order')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>



                </div><br><br>

                <div class="row">
                    <div class="form-group col-md-6"><br>
                        <div id="img-preview">
                            <img id="photo-preview" src="/images/categories/category.jpg" alt="" style="max-width: 120px; display:inline-block;"><br>
                        </div><br>
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="photoFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>


                    <div class="form-check mt-3 text-danger col-md-3">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="public">
                        <label class="form-check-label" for="defaultCheck1">
                        Public
                        </label>
                  </div>
                </div>

                <div class="row bg-light my-4">

                    <div class="form-group col-md-4"><br>
                        <label for="meta_title">Meta title</label><br>
                        <input name="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="meta_title" value="{{ old('meta_title') }}"><br>
                        @error('meta_title')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-4"><br>
                        <label for="meta_description">Meta Description</label><br>
                        <input name="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" placeholder="meta_description" value="{{ old('meta_description') }}"><br>
                        @error('meta_description')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-4"><br>
                        <label for="meta_keywords">Meta Keywords</label><br>
                        <input name="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" placeholder="meta_keywords" value="{{ old('meta_keywords') }}"><br>
                        @error('meta_keywords')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Creaza Category</button>
                <a href="{{ route('users') }}" type="submit" class="btn btn-danger">Cancel</a>
            </form>
    </section>

@endsection

@section('customJs')

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>

    <script>

        $(document).ready(function(){
            bsCustomFileInput.init()
        });

    </script>

    <script>

    const chooseFile = document.getElementById("photoFile");
    const imgPreview = document.getElementById("img-preview");
    chooseFile.addEventListener("change", function () {
        getImgData();

    });

    function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
              const fileReader = new FileReader();
              fileReader.readAsDataURL(files);
              fileReader.addEventListener("load", function () {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img src="' + this.result + '" />';
              });
            }
    }

    </script>

@endsection
