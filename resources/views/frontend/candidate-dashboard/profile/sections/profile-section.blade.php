<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form action="{{ route('candidate.profile.profile-info.update') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Género *</label>
                            <select name="gender" id=""
                                class="{{ $errors->has('gender') ? 'is-invalid' : '' }} form-icons select-active">
                                <option value="">Seleccione uno</option>
                                <option @selected($candidate?->gender === 'male') value="male">Masculino</option>
                                <option @selected($candidate?->gender === 'female') value="female">Femenino</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Profesión *</label>
                            <select name="profession" id=""
                                class="{{ $errors->has('profession') ? 'is-invalid' : '' }} form-icons select-active">
                                <option value="">Seleccione uno</option>
                                @foreach ($professions as $profession)
                                <option @selected($profession->id === $candidate?->profession_id) value="{{ $profession->id }}">
                                    {{ $profession->name }}
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('profession')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Su disponibilidad *</label>
                            <select name="availability" id=""
                                class="{{ $errors->has('availability') ? 'is-invalid' : '' }} form-icons select-active">
                                <option value="">Seleccione uno</option>
                                <option @selected($candidate?->status === 'available') value="available">Disponible</option>
                                <option @selected($candidate?->status === 'not_available') value="not_available">No Disponible</option>
                            </select>
                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Habilidades que tiene *</label>
                            <select name="skill_you_have[]" id=""
                                class="{{ $errors->has('skill_you_have') ? 'is-invalid' : '' }} form-icons select-active" multiple="">
                                <option value="">Seleccione uno</option>
                                @foreach ($skills as $skill)
                                @php
                                $candidateSkills = $candidate?->skills->pluck('skill_id')->toArray() ?? [];
                                @endphp

                                <option @selected(in_array($skill->id, $candidateSkills)) value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach

                            </select>
                            <x-input-error :messages="$errors->get('skill_you_have')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Idiomas que conoce *</label>
                            <select name="language_you_know[]" id=""
                                class="{{ $errors->has('language_you_know') ? 'is-invalid' : '' }} form-icons select-active" multiple="">
                                <option value="">Seleccione uno</option>
                                @php
                                $candidateLanuages = $candidate?->languages->pluck('language_id')->toArray() ?? [];
                                @endphp
                                @foreach ($languages as $language)
                                <option @selected(in_array($language->id, $candidateLanuages)) value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('language_you_know')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Biografía *</label>
                            <textarea name="biography" id="editor" class="{{ hasError($errors, 'biography') }}">{!! $candidate?->bio !!}</textarea>
                            <x-input-error :messages="$errors->get('biography')" class="mt-2" />
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