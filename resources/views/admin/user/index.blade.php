@extends('admin.layouts.master')

@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Usuarios</h1>
    </div>

    <div class="section-body">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Lista De Usuarios</h4>
                    <div class="card-header-form">
                        <form action="{{ route('admin.jobs.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                <div class="input-group-btn">
                                    <button type="submit" style="height: 40px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> Create new</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Estado</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <div>
                                            <b>{{ $user->name }}</b>
                                            <br>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <b>{{ $user->email }}</b>
                                            <br>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary text-dark">Activo</span>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" data-id="{{ $user->id }}" name="custom-switch-checkbox" class="custom-switch-input post_status">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No hay usuarios disponibles.</td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        @if ($users->hasPages())
                        {{ $users->withQueryString()->links() }}
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection