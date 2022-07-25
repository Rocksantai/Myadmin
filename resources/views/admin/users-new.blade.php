@extends('admin.template')

@section('title', 'adaugare utilizator nou')

@section('content')

<br><br>

    <section class="container">
            <form action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                <div class="row">
                    <div class="form-group col-md-4"><br>
                        <label for="name">Nume</label><br>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nume" value="{{ old('name') }}"><br>
                        @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                <div class="form-group col-md-4"><br>
                    <label for="email">Email</label><br>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}"><br>
                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-4"><br>
                    <label for="address">Adresa</label><br>
                    <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Adresa" value="{{ old('address') }}"><br>
                    @error('address')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-3"><br>
                    <label for="phone">Telefon</label><br>
                    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Telefon" value="{{ old('phone') }}"><br>
                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-3"><br>
                    <label for="role">Rol</label><br>
                    <input name="role" type="text" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Rol " value="{{ old('role') }}"><br>
                    @error('role')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-3"><br>
                    <label for="password">Parola</label><br>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Parola" value="{{ old('password') }}"><br>
                    @error('password')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-3"><br>
                    <label for="password_confirmation">Confirmare Parola</label><br>
                    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalidated @enderror" id="password_confirmation" placeholder="Confirmare Parola" value="{{ old('password_confirmation') }}"><br>
                    @error('password_confirmed')<span class="text-danger small">{{ $message }}</span>@enderror
                </div>

                <div class="form-check mt-3 text-danger">
                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="verified">
                    <label class="form-check-label" for="defaultCheck1">
                      Email verificat
                    </label>
                  </div>
                </div><br><br>

                <div class="row">
                    <div class="form-group col-md-3"><br>
                        <div id="img-preview">
                            <img id="photo-preview" src="/images/users/34343.png" alt="" style="max-width: 120px; display:inline-block;"><br>
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
