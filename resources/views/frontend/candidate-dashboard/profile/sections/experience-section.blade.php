<div class="tab-pane fade show" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
    <div>
        <div class="d-flex justify-content-between">
            <h4>Experiencia</h4>
            <button class="btn btn-primary" onclick="$('#ExperienceForm').trigger('reset'); editId = ''; editMode=false" data-bs-toggle="modal" data-bs-target="#experienceModal">Agregar Experiencia</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Departamento</th>
                    <th>Cargo</th>
                    <th>Período</th>
                    <th style="width: 15%">Acción</th>
                </tr>
            </thead>
            <tbody class="experience-tbody">
                @forelse ($candidateExperiences as $experience)
                <tr>
                    <td>{{ $experience->company }}</td>
                    <td>{{ $experience->department }}</td>
                    <td>{{ $experience->designation }}</td>
                    <td>{{ $experience->start }} - {{ $experience->currently_working === 1 ? 'Current' : $experience->end }}</td>
                    <td>
                        <a href="{{ route("candidate.experience.edit", $experience->id) }}" class="btn-sm btn btn-primary edit-experience" data-bs-toggle="modal"
                            data-bs-target="#experienceModal"><i class="fas fa-edit"></i></a>
                        <a href="{{ route("candidate.experience.destroy", $experience->id) }}" class="btn-sm btn btn-danger delete-experience"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron datos</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div>
        <div class="d-flex justify-content-between">
            <h4>Educación</h4>
            <button class="btn btn-primary" onclick="$('#EducationForm').trigger('reset'); editId = ''; editMode=false" data-bs-toggle="modal" data-bs-target="#educationModal">Agregar Educación</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nivel</th>
                    <th>Título</th>
                    <th>Año</th>
                    <th style="width: 15%">Acción</th>
                </tr>
            </thead>
            <tbody class="education-tbody">
                @forelse ($candidateEducation as $education)
                <tr>
                    <td>{{ $education->level }}</td>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->year }}</td>
                    <td>
                        <a href="{{ route("candidate.education.edit", $education->id) }}" class="btn-sm btn btn-primary edit-education" data-bs-toggle="modal"
                            data-bs-target="#educationModal"><i class="fas fa-edit"></i></a>
                        <a href="{{ route("candidate.education.destroy", $education->id) }}" class="btn-sm btn btn-danger delete-education"><i class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron datos</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>

</div>