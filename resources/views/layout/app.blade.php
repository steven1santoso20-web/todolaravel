<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Nexus ToDo')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet"
        href="{{ asset('css/app.css') }}">

</head>

<body>

<div class="app-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">N</div>

            <span>
                Nexus<span class="brand-light">ToDo</span>
            </span>
        </div>

        <div class="sidebar-label">
            MENU UTAMA
        </div>

        <nav class="sidebar-nav">

            <a href="{{ route('todos.index') }}"
               class="nav-link active">

                <span>▦</span>
                Dashboard

            </a>

        </nav>

        <div class="sidebar-bottom">

            <div class="sidebar-profile">

                <div class="profile-avatar">N</div>

                <div>
                    <strong>My Workspace</strong>
                    <small>Personal Tasks</small>
                </div>

            </div>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <header class="topbar">

            <div>
                <span class="topbar-label">
                    WORKSPACE
                </span>

                <h6>Nexus Productivity</h6>
            </div>

            <div class="topbar-date">
                {{ now()->translatedFormat('l, d F Y') }}
            </div>

        </header>

        <!-- PAGE CONTENT -->
        <section class="page-content">

            <!-- SUCCESS NOTIFICATION -->
            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif

            <!-- ERROR NOTIFICATION -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan!</strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            @yield('content')

        </section>

        <!-- FOOTER -->
        <footer class="footer">

            <span>
                Nexus ToDo &copy; {{ date('Y') }}
            </span>

            <span>
                Organize your day, achieve more.
            </span>

        </footer>

    </main>

</div>

<!-- Bootstrap JavaScript -->
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@yield('scripts')

</body>
</html>
