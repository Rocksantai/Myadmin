@extends('admin.template')

@section('title', 'editare profil ' . $user->name)

@section('content')

<br><br>

<ol class="breadcrumb mb-4" style="font-size: 20px; text-align: center; text-decoration: none;">

    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Control Panel</a></li>
    {{-- <li class="breadcrumb-item"><a href="{{ route('users') }}">Control Panel</a></li> --}}
    <li class="breadcrumb-item active">Edit Profile for User {{ $user->name }}</li>

</ol>


    <section class="container">
            <form action="{{ route('user.profile-update', $user->id) }}" method="POST" enctype="multipart/form-data">
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

                <div class="form-group col-md-4"><br>
                    <label for="phone">Telefon</label><br>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Telefon" value="{{ $user->phone }}"><br>
                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
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

            <br><br><br>
            <hr>
            <br><br><br>

            <div class="row">
                @if(Session::has('user_message'))

                    <div class="alert alert-warning">
                        {!! Session::get('user_message') !!}
                    </div>

                @endif
                <form>

                    <h1>Resetare parola</h1>

                    <div class="form-group col-md-4"><br>
                        <label for="password">Parola actuala</label><br>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Parola" value="{{ old('password') }}"><br>
                        @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-4"><br>
                        <label for="password">Parola noua</label><br>
                        <input name="passwordnew" type="password" class="form-control @error('password') is-invalid @enderror" id="passwordnew" placeholder="Parola noua" value="{{ old('password') }}"><br>
                        @error('passwordnew')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-4"><br>
                        <label for="password_confirmation">Confirmare Parola noua</label><br>
                        <input name="passwordnew_confirmation" type="password" class="form-control @error('password_confirmation') is-invalidated @enderror" id="passwordnew_confirmation" placeholder="Confirmare Parola noua" value="{{ old('password_confirmation') }}"><br>
                        @error('passwordnew_confirmed')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <button type="submit" class="btn btn-danger">Resetare parola</button>

                </form>
        </div>
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
