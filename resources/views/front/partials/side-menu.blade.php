<nav id="menu" style="margin-bottom: 400px;">
    <ul>
        <li>
            <a class="btn btn-secondary" type="button" href="{{ route('home') }}">
                <i class="fas fa-home"></i> Homepage</a>
        </li>
    </ul>
    <br>
            <ul>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Categories
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="padding-left: 207px;">
                        @foreach($menu_categories as $category)
                            <li style="text-align: center;">
                                <a href="{{ route('category', $category->slug) }}" style="color: #000; text-align: center;">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </div>
              </div>
            </ul>

  </nav>

