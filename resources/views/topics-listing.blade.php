@extends('layouts.maintwo')

@section('show')


            <section class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Popular Topics</h3>
                        </div>

                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                        @foreach($popularTopics as $popularTopic)
                            <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                <div class="d-flex">
                                    <img src="{{ asset('assets/images/topics/' . $popularTopic->image) }}" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-topics-listing-info d-flex">
                                        <div>
                                            <h5 class="mb-2">{{ $popularTopic->topicTitle }}</h5>

                                            <p class="mb-0">{{ Str::limit($popularTopic->content, 30, '...') }}</p>

                                            <a href="{{ route('topic.detail', $popularTopic->id) }}" class="btn custom-btn mt-3 mt-lg-4">Learn More</a>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">14</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-lg-12 col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </section>


            <section class="section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Trending Topics</h3>
            </div>

            @foreach($trendingTopics as $index => $trendingTopic)
                @if ($index == 0)
                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <a href="{{ route('topic.detail', $trendingTopic->id) }}">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="mb-2">{{ $trendingTopic->topicTitle }}</h5>
                                        <p class="mb-0">{{ Str::limit($trendingTopic->content, 30, '...') }}</p>
                                    </div>
                                    <span class="badge bg-finance rounded-pill ms-auto">30</span>
                                </div>
                                <img src="{{ asset('assets/images/topics/' . $trendingTopic->image) }}" class="custom-block-image img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                @elseif ($index == 1)
                    <div class="col-lg-6 col-12">
                        <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                <img src="{{ asset('assets/images/topics/' . $trendingTopic->image) }}" class="custom-block-image img-fluid" alt="">
                                <div class="custom-block-overlay-text d-flex">
                                    <div>
                                        <h5 class="text-white mb-2">{{ $trendingTopic->topicTitle }}</h5>
                                        <p class="text-white">{{ Str::limit($trendingTopic->content, 30, '...') }}</p>
                                        <a href="{{ route('topic.detail', $trendingTopic->id) }}" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                    </div>
                                    <span class="badge bg-finance rounded-pill ms-auto">25</span>
                                </div>
                                <div class="social-share d-flex">
                                    <p class="text-white me-4">Share:</p>
                                    <ul class="social-icon">
                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-twitter"></a></li>
                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-facebook"></a></li>
                                        <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>
                                    </ul>
                                    <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                </div>
                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>


            @endsection