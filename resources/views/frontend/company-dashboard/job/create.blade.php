@extends('frontend.layouts.master')

@section('contents')
<section class="section-box mt-75">
    <div class="breacrumb-cover">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h2 class="mb-20">Orders</h2>
                    <ul class="breadcrumbs">
                        <li><a class="home-icon" href="index.html">Home</a></li>
                        <li>Orders</li>
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
                <div class="card-body">
                    <form action="{{ route('company.jobs.store') }}" method="POST">
                        @csrf

                        <div class="card mb-3">
                            <div class="card-header">
                                Job Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'title') }}"
                                                name="title" value="{{ old('title') }}">
                                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Categoria <span class="text-danger">*</span></label>
                                            <select name="category" id="" class="form-control form-icons select-active {{ hasError($errors, 'category') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Total de vacantes <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'vacancies') }}"
                                                name="vacancies" value="{{ old('vacancies') }}">
                                            <x-input-error :messages="$errors->get('vacancies')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Fecha limite <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker {{ hasError($errors, 'deadline') }}"
                                                name="deadline" value="{{ old('deadline') }}">
                                            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                Ubicacion
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Pais </label>
                                            <select name="country" id="" class="form-control form-icons select-active country {{ hasError($errors, 'country') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Estado </label>
                                            <select name="state" id="" class="form-control form-icons select-active state {{ hasError($errors, 'state') }}">
                                                <option value="">Seleccionar</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label for="">Ciudad </label>
                                            <select name="city" id="" class="form-control form-icons select-active city {{ hasError($errors, 'city') }}">
                                                <option value="">Seleccionar</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="text" class="form-control {{ hasError($errors, 'address') }}" name="address" value="{{ old('address') }}">
                                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                Salario total
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" onclick="salaryModeChnage('salary_range')" type="radio" id="salary_range" class="from-control {{ hasError($errors, 'salary_mode') }}" name="salary_mode" checked value="range">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="salary_range">Salary Range </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" onclick="salaryModeChnage('custom_salary')" type="radio" id="custom_salary" class="from-control {{ hasError($errors, 'salary_mode') }}" name="salary_mode" value="custom">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="custom_salary">Custom Salary </label>
                                                    <x-input-error :messages="$errors->get('salary_mode')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 salary_range_part">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Minimo <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control {{ hasError($errors, 'min_salary') }}"
                                                        name="min_salary" value="{{ old('min_salary') }}">
                                                    <x-input-error :messages="$errors->get('min_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Maximo <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control {{ hasError($errors, 'max_salary') }}"
                                                        name="max_salary" value="{{ old('max_salary') }}">
                                                    <x-input-error :messages="$errors->get('max_salary')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 custom_salary_part d-none">
                                        <div class="form-group">
                                            <label for="">Personalizado <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control {{ hasError($errors, 'custom_salary') }}"
                                                name="custom_salary" value="{{ old('custom_salary') }}">
                                            <x-input-error :messages="$errors->get('custom_salary')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Tipo de pago <span class="text-danger">*</span> </label>
                                            <select name="salary_type" id="" class="form-control form-icons select-active {{ hasError($errors, 'salary_type') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($salaryTypes as $salaryType)
                                                <option value="{{ $salaryType->id }}">{{ $salaryType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('salary_type')" class="mt-2" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                Atributos
                            </div>
                            <div class="card-body">
                                <div class="row">



                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Education <span class="text-danger ">*</span></label>
                                            <select name="education" id="" class="form-control form-icons select-active {{ hasError($errors, 'education') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($educations as $education)
                                                <option value="{{ $education->id }}">{{ $education->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group select-style">
                                            <label for="">Job Type <span class="text-danger ">*</span></label>
                                            <select name="job_type" id="" class="form-control form-icons select-active {{ hasError($errors, 'job_type') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($jobTypes as $jobType)
                                                <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>

                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('job_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Tags <span class="text-danger ">*</span></label>
                                            <select name="tags[]" id="" multiple class="form-control form-icons select-active {{ hasError($errors, 'tags') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach

                                            </select>
                                            <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label for="">Beneficios <span class="text-danger ">*</span></label>
                                            <input type="text" class="form-control inputtags {{ hasError($errors, 'benefits') }}"
                                                name="benefits" value="{{ old('benefits') }}">
                                            <x-input-error :messages="$errors->get('benefits')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Skills <span class="text-danger ">*</span></label>
                                            <select name="skills[]" id="" multiple class="form-control form-icons select-active {{ hasError($errors, 'skills') }}">
                                                <option value="">Seleccionar</option>
                                                @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                Opciones de aplicacion
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group select-style">
                                            <label for="">Recibir aplicaciones <span class="text-danger">*</span> </label>
                                            <select name="receive_applications" id="" class="form-control form-icons select-active {{ hasError($errors, 'receive_applications') }}">
                                                <option value="app">En nuestra plataforma</option>
                                                <option value="email">En tu direccion de correo</option>
                                                <option value="custom_url">En un link personalizado</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('receive_applications')" class="mt-2" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                Promocionar
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" type="checkbox" id="featured" class="from-control {{ hasError($errors, 'featured') }}" name="featured" value="1">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="featured">Promocionado </label>
                                                    <x-input-error :messages="$errors->get('featured')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group d-flex">
                                                    <input style="height: 18px;width: 18px;" type="checkbox" id="highlight" class="from-control {{ hasError($errors, 'highlight') }}" name="highlight" value="1">
                                                    <label style="margin-left: 5px;
                                                    margin-top: -4px;" for="highlight">Destacado </label>
                                                    <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                Descripcion
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Descripcion <span class="text-danger">*</span> </label>
                                            <textarea id="editor" name="description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    $(".inputtags").tagsinput('items');

    function salaryModeChnage(mode) {
        if (mode == 'salary_range') {
            $('.salary_range_part').removeClass('d-none')
            $('.custom_salary_part').addClass('d-none')
        } else if (mode == 'custom_salary') {
            $('.salary_range_part').addClass('d-none')
            $('.custom_salary_part').removeClass('d-none')
        }
    }

    $('.country').on('change', function() {
        let country_id = $(this).val();
        // remove all previous cities
        $('.city').html("");

        $.ajax({
            mehtod: 'GET',
            url: '{{ route("get-states", ":id") }}'.replace(":id", country_id),
            data: {},
            success: function(response) {
                let html = '';

                $.each(response, function(index, value) {
                    html += `<option value="${value.id}" >${value.name}</option>`
                });

                $('.state').html(html);
            },
            error: function(xhr, status, error) {}
        })
    })

    // get cities
    $('.state').on('change', function() {
        let state_id = $(this).val();

        $.ajax({
            mehtod: 'GET',
            url: '{{ route("get-cities", ":id") }}'.replace(":id", state_id),
            data: {},
            success: function(response) {
                let html = '';

                $.each(response, function(index, value) {
                    html += `<option value="${value.id}" >${value.name}</option>`
                });

                $('.city').html(html);
            },
            error: function(xhr, status, error) {}
        })
    })
</script>
@endpush