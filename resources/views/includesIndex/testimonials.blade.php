<section class="section-padding" id="section_5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2 class="mb-4">What Our Clients Say?</h2>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if($testimonials->isEmpty())
                    <div class="carousel-item active">
                        <div class="row mx-md-5">
                            <div class="col-md-12 text-center">
                                <p>No testimonials available.</p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($testimonials as $key => $testimonial)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <div class="row mx-md-5">
                                <div class="col-md-4 testimonials">
                                    <img class="d-block rounded-3"
                                        src="{{ asset('assets/images/testimonials/' . $testimonial->image) }}"
                                        alt="Testimonial from {{ $testimonial->name }}">
                                </div>
                                <div class="col-md-8 px-md-5 d-flex flex-column justify-content-center">
                                    <h3>{{ $testimonial->name }}<br>
                                        <strong class="date">{{ \Carbon\Carbon::parse($testimonial->created_at)->format('d/m/Y') }}</strong>
                                    </h3>
                                    <p class="text-muted">{{ $testimonial->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
