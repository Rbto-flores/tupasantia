@extends('frontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Dashboard</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-120">
    <div class="container">
        <div class="row">

            @include('frontend.company-dashboard.sidebar')

            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                <div class="content-single">
                    <h3 class="mt-0 mb-0 color-brand-1">Dashboard</h3>
                    <div class="dashboard_overview">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="dash_overview_item bg-info-subtle">
                                    <h2>{{ $jobPosts }} <span>Publicaciones pendientes</span></h2>
                                    <span class="icon"><i class="fas fa-briefcase"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="dash_overview_item bg-danger-subtle">
                                    <h2>{{ $totalJobs }} <span>Publicaciones totales</span></h2>
                                    <span class="icon"><i class="fas fa-briefcase"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="dash_overview_item bg-warning-subtle">
                                    <h2>{{ $totalOrders }} <span>Ordenes totales</span></h2>
                                    <span class="icon"><i class="fas fa-cart-plus"></i></span>
                                </div>
                            </div>
                        </div>
                        @if (!isCompanyProfileComplete())
                        <div class="row">
                            <div class="col-12 mt-30">
                                <div class="dash_alert_box p-30 bg-danger rounded-4 d-flex flex-wrap">
                                    <span class="img">
                                        <img src="{{ asset(auth()->user()->image) }}" alt="alert">
                                    </span>
                                    <div class="text">
                                        <h4>RECORDATORIO: Debes completar tu perfil primero!</h4>
                                        <p>Por favor completa tu perfil para poder hacer tu primera publicaión.</p>
                                    </div>
                                    <a href="{{ route('company.profile') }}" class="btn btn-default rounded-1">Editar Perfil</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <table class="table">

                                    <tbody>
                                        <tr>
                                            <th scope="row">•</th>
                                            <td><b>Current Package</b></td>
                                            <td>{{ $userPlan?->plan?->label }} Package</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">•</th>
                                            <td>Job Post Available</td>
                                            <td>{{ $userPlan?->job_limit }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">•</th>
                                            <td>Featured Post Available</td>
                                            <td>{{ $userPlan?->featured_job_limit }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">•</th>
                                            <td>Highlight Post Available</td>
                                            <td>{{ $userPlan?->highlight_job_limit }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="mt-120"></div>
@endsection