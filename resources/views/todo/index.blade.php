@extends('layout.app')

@section('title', 'Dashboard | Nexus ToDo')

@section('content')

<!-- PAGE HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <span class="text-primary fw-semibold small">
            OVERVIEW
        </span>

        <h2 class="fw-bold mt-2 mb-1">
            My Tasks
        </h2>

        <p class="text-secondary small mb-0">
            Kelola dan pantau semua aktivitasmu.
        </p>

    </div>

    <a href="{{ route('todos.create') }}"
       class="btn btn-primary px-4 py-2">

        + Tambah Tugas

    </a>

</div>


<!-- STATISTICS -->
<div class="row g-3 mb-4">

    <!-- TOTAL TASKS -->
    <div class="col-md-4">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <span class="text-secondary small">
                Total Tugas
            </span>

            <h2 class="fw-bold mt-2 mb-0">
                {{ $todos->count() }}
            </h2>

            <small class="text-secondary">
                Semua aktivitas
            </small>

        </div>

    </div>


    <!-- PENDING TASKS -->
    <div class="col-md-4">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <span class="text-secondary small">
                Belum Selesai
            </span>

            <h2 class="fw-bold mt-2 mb-0 text-warning">

                {{ $todos->where('is_done', false)->count() }}

            </h2>

            <small class="text-secondary">
                Tugas yang perlu dikerjakan
            </small>

        </div>

    </div>


    <!-- COMPLETED TASKS -->
    <div class="col-md-4">

        <div class="card border-0 shadow-sm rounded-4 p-3">

            <span class="text-secondary small">
                Selesai
            </span>

            <h2 class="fw-bold mt-2 mb-0 text-success">

                {{ $todos->where('is_done', true)->count() }}

            </h2>

            <small class="text-secondary">
                Tugas yang telah diselesaikan
            </small>

        </div>

    </div>

</div>


<!-- TODO LIST HEADER -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <h5 class="fw-bold mb-0">
        Daftar Tugas
    </h5>

    <span class="text-secondary small">
        {{ $todos->count() }} tugas
    </span>

</div>


<!-- CHECK TODO DATA -->
@if($todos->count() > 0)

    <div class="row g-3">

        @foreach($todos as $todo)

            <div class="col-12 col-lg-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4">

                        <!-- TITLE AND STATUS -->
                        <div class="d-flex justify-content-between align-items-start gap-2">

                            <div>

                                <h6 class="fw-bold mb-2
                                    {{ $todo->is_done ? 'text-decoration-line-through text-secondary' : '' }}">

                                    {{ $todo->title }}

                                </h6>

                                <p class="text-secondary small mb-3">

                                    {{ $todo->description ?: 'Tidak ada keterangan.' }}

                                </p>

                            </div>


                            <!-- STATUS BADGE -->
                            @if($todo->is_done)

                                <span class="badge rounded-pill bg-success-subtle text-success">
                                    Selesai
                                </span>

                            @else

                                <span class="badge rounded-pill bg-warning-subtle text-warning-emphasis">
                                    Belum selesai
                                </span>

                            @endif

                        </div>


                        <!-- FOOTER CARD -->
                        <div class="border-top pt-3 d-flex justify-content-between align-items-center flex-wrap gap-2">

                            <small class="text-secondary">

                                @if($todo->is_done && $todo->completed_at)

                                    Selesai:
                                    {{ $todo->completed_at->format('d M Y, H:i') }}

                                @else

                                    Dibuat:
                                    {{ $todo->created_at->format('d M Y') }}

                                @endif

                            </small>


                            <!-- ACTION BUTTONS -->
                            <div class="d-flex gap-2">

                                <a href="{{ route('todos.edit', $todo->id) }}"
                                   class="btn btn-sm btn-outline-primary">

                                    Edit

                                </a>


                                <form action="{{ route('todos.destroy', $todo->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>


@else

    <!-- EMPTY STATE -->
    <div class="card border-0 shadow-sm rounded-4 text-center p-5">

        <div class="display-4 mb-3">
            📝
        </div>

        <h5 class="fw-bold">
            Belum ada tugas
        </h5>

        <p class="text-secondary small">

            Mulai produktif dengan membuat tugas pertamamu.

        </p>

        <div>

            <a href="{{ route('todos.create') }}"
               class="btn btn-primary px-4">

                Buat Tugas Pertama

            </a>

        </div>

    </div>

@endif

@endsection
