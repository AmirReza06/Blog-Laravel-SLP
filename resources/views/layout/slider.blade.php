<!-- Slider Section -->
<section>
    <div id="carousel" class="carousel slide mb-3">
        <div class="carousel-inner rounded">
            @foreach($sliders as $slider)
                <div class="carousel-item overlay carousel-height {{ ($slider->active) ? 'active' : '' }}">
                    <img src="{{ asset('./assets/images/posts/' . $slider->post->image)}}" height="600px" class="d-block w-100" alt="post-image"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->post->title }}</h5>
                            <p>{{ substr($slider->post->body, 0, 300) . '...' }}</p>
                            <a href="{{ route('index.single', ['id' => $slider->post->id]) }}" class="btn btn-dark">جزعیات</a>
                        </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" name="sliderNext" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
