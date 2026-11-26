@extends('layout.app')

@section('title', 'Edit Tugas | Nexus ToDo')

@section('content')

<!-- PAGE HEADER -->
<div class="mb-4">

    <a href="{{ route('todos.index') }}"
       class="text-decoration-none text-secondary small">

        ← Kembali ke Dashboard

    </a>

    <h2 class="fw-bold mt-3">
        Edit Tugas
    </h2>

    <p class="text-secondary small">

        Perbarui informasi tugasmu.

    </p>

</div>


<!-- FORM CARD -->
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4 p-md-5">

        <form action="{{ route('todos.update', $todo->id) }}"
              method="POST">

            @csrf

            @method('PUT')


            <!-- TITLE -->
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Judul Tugas
                </label>

                <input type="text"
                       name="title"
                       class="form-control form-control-lg"
                       value="{{ old('title', $todo->title) }}"
                       required>

                @error('title')

                    <div class="text-danger small mt-2">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- DESCRIPTION -->
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Keterangan
                </label>

                <textarea name="description"
                          class="form-control"
                          rows="5">{{ old('description', $todo->description) }}</textarea>

                @error('description')

                    <div class="text-danger small mt-2">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- COMPLETION STATUS -->
            <div class="form-check form-switch mb-4">

                <input class="form-check-input"
                       type="checkbox"
                       name="is_done"
                       value="1"
                       id="is_done"
                       {{ old('is_done', $todo->is_done) ? 'checked' : '' }}>

                <label class="form-check-label fw-semibold"
                       for="is_done">

                    Tandai sebagai selesai

                </label>

                <div class="form-text">

                    Aktifkan jika tugas sudah diselesaikan.

                </div>

            </div>


            <!-- BUTTONS -->
            <div class="d-flex gap-2 flex-wrap">

                <button type="submit"
                        class="btn btn-primary px-4">

                    Simpan Perubahan

                </button>

                <a href="{{ route('todos.index') }}"
                   class="btn btn-light px-4">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
