@extends('frontend.layouts.master')

@section('contents')
<!-- Hero Section Start -->
@include('frontend.home.sections.hero-section')
<!-- Hero Section End -->

<div class="mt-100"></div>

<!-- Featured Job Section Start -->
@include('frontend.home.sections.featured-job-section')
<!-- Featured Job Section End -->



<!-- Por que elegirnos Section Start -->
@include('frontend.home.sections.why-choose-us-section')
<!-- Por que elegirnos Section End -->

<!-- Learn More Section Start -->
@include('frontend.home.sections.learn-more-section')
<!-- Learn More Section End -->

<!-- Counter Section Start -->
@include('frontend.home.sections.counter-section')
<!-- Counter Section End -->

<!-- Job By Location Section Start -->
@include('frontend.home.sections.job-by-location-section')
<!-- Job By Location Section End -->

<!-- Category Section Start -->
@include('frontend.home.sections.category-section')
<!-- Category Section End -->

<!-- Top Recruiters Section Start -->
@include('frontend.home.sections.top-recruiters-section')
<!-- Top Recruiters Section End -->


<!-- Review Section Start -->
@include('frontend.home.sections.review-section')
<!-- Review Section End -->

<!-- Price Plan Section Start -->
@if (auth()->user()?->role != 'candidate')
@include('frontend.home.sections.price-plan-section')
@endif

<!-- Price Plan Section End -->

<!-- Blog Section Start -->
@include('frontend.home.sections.blog-section')
<!-- Blog Section Start -->

@endsection