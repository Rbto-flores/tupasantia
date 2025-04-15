@extends('frontend.layouts.master')
@section('contents')
<section class="section-box mt-75">
  <div class="breacrumb-cover">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-12">
          <h2 class="mb-20">Blog</h2>
          <ul class="breadcrumbs">
            <li><a class="home-icon" href="index.html">Home</a></li>
            <li>Blog</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pt-120 login-register">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
        <div class="login-register-cover">
          <div class="text-center">
            <h2 class="mb-5 text-brand-1">Crear Cuenta</h2>
            <p class="font-sm text-muted mb-30">¿Aun no tienes un cuenta? Crea la tuya ahora!</p>
          </div>

          <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">

              <div class="col-xl-12">
                <div class="form-group">
                  <label class="form-label" for="input-1">Nombre completo *</label>
                  <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="input-1" type="text" required="" name="name"
                    placeholder="Steven Job" value="{{ old('name') }}">

                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
              </div>

              <div class="col-xl-12">
                <div class="form-group">
                  <label class="form-label" for="input-2">Correo *</label>
                  <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="input-2" type="email" required="" name="email"
                    placeholder="stevenjob@gmail.com" value="{{ old('email') }}">

                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
              </div>

              <div class="col-xl-6">
                <div class="form-group">
                  <label class="form-label" for="input-4">Contraseña *</label>
                  <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="input-4" type="password" required="" name="password"
                    placeholder="************">

                  <x-input-error :messages="$errors->get('password')" class="mt-2" />

                </div>
              </div>
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="form-label" for="input-5">Confirm-Password *</label>
                  <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="input-5" type="password" required="" name="password_confirmation"
                    placeholder="************">
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
              </div>

              <div class="col-12 mb-3">
                <hr>
                <h6 for="" class="mb-2">Crear cuenta para:</h6>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="account_type" id="typeCandidate" value="candidate">
                  <label class="form-check-label" for="typeCandidate">Candidato</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="account_type" id="typeCompany" value="company">
                  <label class="form-check-label" for="typeCompany">Empresa</label>
                </div>

                @if ($errors->has('account_type'))
                <div class="invalid-feedback d-block">
                  {{ $errors->first('account_type') }}
                </div>
                @endif
              </div>
              <div class="form-group">
                <button class="btn btn-default hover-up w-100" type="submit" name="login">Crear</button>
              </div>
              <div class="text-muted text-center">¿Ya tienes una cuenta?
                <a href="{{ route('login') }}">Iniciar sesión</a>
              </div>
          </form>
          {{-- <div class="text-center mt-20">
              <div class="divider-text-center"><span>Or continue with</span></div>
              <button class="btn social-login hover-up mt-20"><img src="assets/imgs/template/icons/icon-google.svg"
                  alt="joblist"><strong>Sign up with Google</strong></button>
            </div> --}}
        </div>
      </div>
    </div>
  </div>
</section>
<div class="mt-120"></div>
@endsection