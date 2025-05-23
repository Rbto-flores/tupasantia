<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action="{{ route('candidate.profile.basic-info.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-3">
                <x-image-preview :height="200" :width="200" :source="$candidate?->image" />
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Foto de Perfil *</label>
                    <input class="form-control {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}" type="file"
                        value="" name="profile_picture">
                    <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                </div>
                {{-- <x-image-preview :height="200" :width="200" :source="" /> --}}
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">CV <span class="text-primary">( {{ $candidate?->cv ? 'Tiene CV adjunto' : '' }} )</span></label>
                    <input class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}" type="file"
                        value="" name="cv">
                    <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                </div>
            </div>



            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Nombre Completo *</label>
                            <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->full_name }}" name="full_name">
                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Título/Eslogan</label>
                            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->title }}" name="title">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Sitio Web</label>
                            <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->website }}" name="website">
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Fecha de Nacimiento</label>
                            <input class="form-control datepicker {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text"
                                value="{{ $candidate?->birth_date }}" name="date_of_birth">
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="box-button mt-15">
            <button class="btn btn-apply-big font-md font-bold">Guardar Todos los Cambios</button>
        </div>
    </form>
</div>