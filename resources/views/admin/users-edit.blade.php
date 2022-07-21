@extends('admin.template')

@section('title')
Editare utilizator - {{ $user->name }} - {!! $user->hasVerifiedEmail() ? '<i class="fa fa-check" aria-hidden="true"></i> Email verificat' : '<i class="fa fa-circle text-danger" aria-hidden="true"></i> Email Neverificat' !!}

@endsection

@section('content')

<br><br>

<ol class="breadcrumb mb-4" style="font-size: 20px; text-align: center; text-decoration: none;">

    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control Panel</a></li>
    <li class="breadcrumb-item"><a href="{{ route('users') }}">Control Panel</a></li>
    <li class="breadcrumb-item active">Edit users {{ $user->name }}</li>

</ol>


    <section class="container">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-md-4"><br>
                        <label for="name">Nume</label><br>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nume" value="{{ $user->name }}"><br>
                        @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                <div class="form-group col-md-4"><br>
                    <label for="email">Email</label><br>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ $user->email }}"><br>
                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-4"><br>
                    <label for="address">Adresa</label><br>
                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Adresa" value="{{ $user->address }}"><br>
                    @error('address')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-3"><br>
                    <label for="phone">Telefon</label><br>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Telefon" value="{{ $user->phone }}"><br>
                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-3"><br>
                    <label for="role">Rol</label><br>
                    <input name="role" type="text" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Rol " value="{{ $user->role }}"><br>
                    @error('role')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                </div><br><br>

                <div class="row">
                    <div class="form-group col-md-3"><br>
                        <div id="img-preview">
                            <img id="photo-preview" src="{{ 'images/users/' . $user->photo }}" alt="" style="max-width: 120px; display:inline-block;"><br>
                        </div><br>
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="photoFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Creaza user</button>
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
