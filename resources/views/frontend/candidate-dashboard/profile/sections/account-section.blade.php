<div class="tab-pane fade show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab">
    <form action="{{ route('candidate.profile.account-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-12">
                <h4>Ubicación</h4>
                <div class="row mt-3">

                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">País *</label>

                            <select name="country" id="" class=" form-icons select-active {{ hasError($errors, 'country') }} country">
                                <option value="">Seleccione uno</option>
                                @foreach ($countries as $country)
                                <option @selected($country->id === $candidate?->country) value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Estado</label>

                            <select name="state" id="" class=" form-icons select-active {{ hasError($errors, 'state') }} state">
                                <option value="">Seleccione uno</option>
                                @foreach ($states as $state)
                                <option @selected($state->id === $candidate?->state) value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Ciudad</label>

                            <select name="city" id="" class=" form-icons select-active {{ hasError($errors, 'city') }} city">
                                <option value="">Seleccione uno</option>
                                @foreach ($cities as $city)
                                <option @selected($city->id === $candidate?->city) value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>

                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Dirección</label>
                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->address }}" name="address">
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-12">
                <h4>Su Información de Contacto</h4>
                <div class="row mt-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Teléfono</label>
                            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->phone_one }}" name="phone">
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Teléfono Secundario</label>
                            <input class="form-control {{ $errors->has('secondary_phone') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->phone_two }}" name="secondary_phone">
                            <x-input-error :messages="$errors->get('secondary_phone')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Correo Electrónico</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->email }}" name="email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                </div>
            </div>


        </div>
        <div class=" mt-15">
            <button class="btn btn-primary">Guardar Todos los Cambios</button>
        </div>
    </form>
    <hr class="">
    <div class="mt-4">
        <form action="{{ route('candidate.profile.account-email.update') }}" method="POST">
            @csrf
            <h4>Cambiar Correo Electrónico de la Cuenta</h4>
            <br>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Correo Electrónico de la Cuenta</label>
                    <input class="form-control {{ $errors->has('account_email') ? 'is-invalid' : '' }}" type="text"
                        value="{{ auth()->user()->email }}" name="account_email">
                    <x-input-error :messages="$errors->get('account_email')" class="mt-2" />
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Todo</button>
            </div>
        </form>
    </div>

    <hr class="">
    <div class="mt-4">
        <form action="{{ route('candidate.profile.account-password.update') }}" method="POST">
            @csrf
            <h4>Cambiar Contraseña</h4>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Contraseña</label>
                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                            value="" name="password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Confirmar Contraseña</label>
                        <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                            value="" name="password_confirmation">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Todo</button>
            </div>
        </form>
    </div>

</div>


@push('scripts')
<script>
    $(document).ready(function() {
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
    })
</script>
@endpush