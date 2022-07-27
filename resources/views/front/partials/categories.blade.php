<section class="services">
    <div class="container-fluid">
      <div class="row">

        @foreach($categories as $category)
        <div class="col-md-4" style="margin-bottom: 3px; ">
          <div class="service-item" style="height: 100%; ">
            <div><img src="images/categories/{{ $category->photo }}" height="300"/></div>
            <h4>{{ $category->title }}</h4>
            <p>{{ $category->subtitle }}</p>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>
