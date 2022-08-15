<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Administrator</div>
                @if(auth()->user()->role=='admin')

                    <a class="nav-link" href="{{ route('users') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                    </a>

                @endif

                <div class="sb-sidenav-menu-heading">Content</div>

                    <a class="nav-link" href="{{ route('admin.categories') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Categories
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>

                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.pages') }}">All Pages</a>
                        <a class="nav-link" href="#">Published</a>
                    </nav>


            </div>
        </div>
            <div class="sb-sidenav-footer" style="font-size: 20px; ">
                <div class="small">Logged in as: {{ auth()->user()->name }}</div>
                <div class="small">User role: {{ auth()->user()->role }}</div>

            </div>
    </nav>
</div>
