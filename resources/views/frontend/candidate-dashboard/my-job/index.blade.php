@extends('frontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Vacantes Aplicadas</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="index.html">Inicio</a></li>
                        <li>Vacantes Aplicadas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-box mt-120">
    <div class="container">
        <div class="row">
            @include('frontend.candidate-dashboard.sidebar')
            <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                <div class="mb-3">
                    <h4>Trabajos Aplicados ({{ count($appliedJobs) }})</h4>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Salario</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th style="width: 15%">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="experience-tbody">
                        @forelse ($appliedJobs as $appliedJob)
                        <tr>
                            <td>
                                <div class="d-flex ">
                                    <img style="width: 50px; height: 50px; object-fit:cover;"
                                        src="{{ asset($appliedJob->job->company->logo) }}" alt="">
                                    <div style="padding-left: 15px">
                                        <h6>{{ $appliedJob->job->company->name }}</h6>
                                        <b>{{ $appliedJob->job?->company?->companyCountry->name }}</b>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($appliedJob->job->salary_mode === 'range')
                                {{ $appliedJob->job->min_salary }} - {{ $appliedJob->job->max_salary }}
                                {{ config('settings.site_default_currency') }}
                                @else
                                {{ $appliedJob->job->custom_salary }}
                                @endif
                            </td>
                            <td>{{ formatDate($appliedJob->created_at) }}</td>
                            <td>
                                @if($appliedJob->job->deadline < date('Y-m-d'))
                                    <span class="badge bg-danger">Expirado</span>
                                    @else
                                    <span class="badge bg-success">Activo</span>

                                    @endif
                            </td>
                            <td>
                                @if($appliedJob->job->deadline < date('Y-m-d'))
                                    <a href="javascript:;"
                                    class="btn-sm btn btn-secondary"><i class="fas fa-eye"
                                        aria-hidden="true"></i></a>
                                    @else
                                    <a href="{{ route('jobs.show', $appliedJob->job->slug) }}"
                                        class="btn-sm btn btn-primary"><i class="fas fa-eye"
                                            aria-hidden="true"></i></a>

                                    @endif

                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">¡No se encontraron datos!</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
@endsection