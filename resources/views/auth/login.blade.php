<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Client Project Tracker">
    <title>Login | Client Project Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f8fc;
        }

        .left-panel {
            background: linear-gradient(135deg, #0b2f66, #0d63b8);
        }

        .brand-icon {
            width: 64px;
            height: 64px;
        }

        .feature-icon {
            width: 46px;
            height: 46px;
        }

        .login-card {
            max-width: 500px;
        }

        .form-control,
        .input-group-text,
        .password-toggle {
            min-height: 52px;
        }

        .password-toggle {
            border: 1px solid #dee2e6;
            border-left: 0;
            background: #fff;
        }

        @media (max-width: 991.98px) {
            .left-panel {
                display: none !important;
            }
        }
    </style>
</head>

<body>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow"
         style="z-index: 2000; min-width: 320px;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3 shadow"
         style="z-index: 2000; min-width: 320px;">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif


<div class="container-fluid min-vh-100">
    <div class="row min-vh-100">

        <!-- LEFT SIDE -->
        <div class="col-lg-6 left-panel text-white d-flex align-items-center">
            <div class="px-5 py-5 w-100">
                <div class="d-flex align-items-center gap-3 mb-5">
                    <div class="brand-icon bg-white text-primary rounded-4 d-flex align-items-center justify-content-center shadow">
                        <i class="bi bi-clipboard2-check-fill fs-2"></i>
                    </div>
                    <div>
                        <h3 class="fw-bold mb-1">
                            Client Project Tracker
                        </h3>
                        <small class="text-info fw-semibold text-uppercase">
                            Plan · Track · Deliver
                        </small>
                    </div>
                </div>


                <p class="text-info fw-bold small text-uppercase mb-2">
                    Simple Project Management
                </p>

                <h1 class="display-4 fw-bold lh-sm mb-4">
                    Keep your clients,<br>
                    projects and progress<br>
                    in <span class="text-info">one place.</span>
                </h1>

                <p class="lead text-white-50 mb-5">
                    A simple and efficient way to manage client projects,
                    monitor progress, organize priorities, and stay on top
                    of important deadlines.
                </p>


                <!-- Features -->

                <div class="d-flex flex-column gap-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="feature-icon rounded-circle bg-success d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill fs-5"></i>
                        </div>

                        <div>
                            <div class="fw-bold">
                                Manage Client Projects
                            </div>

                            <small class="text-white-50">
                                Keep all your project information organized.
                            </small>
                        </div>

                    </div>


                    <div class="d-flex align-items-center gap-3">

                        <div class="feature-icon rounded-circle bg-primary d-flex align-items-center justify-content-center">
                            <i class="bi bi-bar-chart-fill fs-5"></i>
                        </div>

                        <div>
                            <div class="fw-bold">
                                Track Progress
                            </div>

                            <small class="text-white-50">
                                Monitor project status and priorities.
                            </small>
                        </div>

                    </div>


                    <div class="d-flex align-items-center gap-3">

                        <div class="feature-icon rounded-circle bg-warning d-flex align-items-center justify-content-center text-dark">
                            <i class="bi bi-calendar-check-fill fs-5"></i>
                        </div>

                        <div>
                            <div class="fw-bold">
                                Meet Deadlines
                            </div>

                            <small class="text-white-50">
                                Stay organized with start and due dates.
                            </small>
                        </div>

                    </div>


                    <div class="d-flex align-items-center gap-3">

                        <div class="feature-icon rounded-circle bg-info d-flex align-items-center justify-content-center">
                            <i class="bi bi-check2-circle fs-5"></i>
                        </div>

                        <div>
                            <div class="fw-bold">
                                Work Smarter
                            </div>

                            <small class="text-white-50">
                                Maintain a cleaner and more productive workflow.
                            </small>
                        </div>

                    </div>

                </div>


                <div class="border-start border-2 border-info ps-3 mt-5 text-white-50 small">
                    “Good projects build business.<br>
                    Great projects build relationships.”
                </div>

            </div>
        </div>


        <!-- RIGHT SIDE -->
        <div class="col-lg-6 bg-light d-flex align-items-center justify-content-center px-3 py-5">

            <div class="login-card card border-0 shadow-lg rounded-4 w-100">

                <div class="card-body p-4 p-md-5">


                    <!-- Brand -->

                    <div class="d-flex align-items-center gap-3 pb-4 mb-4 border-bottom">

                        <div class="brand-icon bg-primary text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm">
                            <i class="bi bi-clipboard2-check-fill fs-2"></i>
                        </div>

                        <div>
                            <h4 class="fw-bold mb-1">
                                Client Project Tracker
                            </h4>

                            <p class="text-muted mb-0">
                                Project Management Made Simple
                            </p>
                        </div>

                    </div>


                    <h2 class="fw-bold mb-1">
                        Welcome back
                    </h2>

                    <p class="text-muted mb-4">
                        Sign in to continue managing your projects.
                    </p>


                    <form action="{{ route('login-user') }}" method="POST">

                        @csrf


                        <!-- Username -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Username
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-person"></i>
                                </span>

                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control border-start-0"
                                    value="{{ old('username') }}"
                                    placeholder="Enter your username"
                                    autocomplete="username"
                                    required
                                    autofocus
                                >

                            </div>

                            @error('username')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        <!-- Password -->

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control border-start-0 border-end-0"
                                    placeholder="Enter your password"
                                    autocomplete="current-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle px-3 rounded-end"
                                    id="passwordToggle"
                                >
                                    <i class="bi bi-eye"></i>
                                </button>

                            </div>

                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        <!-- Remember -->

                        <div class="form-check mb-4">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                            >

                            <label class="form-check-label text-muted"
                                   for="remember">
                                Remember me
                            </label>

                        </div>


                        <!-- Login -->

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg w-100 fw-semibold shadow-sm"
                        >
                            Sign in
                            <i class="bi bi-arrow-right ms-2"></i>
                        </button>

                    </form>


                    <!-- Security -->

                    <div class="bg-light rounded-3 p-3 mt-4 d-flex align-items-center gap-3">

                        <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center"
                             style="width: 42px; height: 42px;">

                            <i class="bi bi-shield-lock-fill"></i>

                        </div>

                        <div>
                            <div class="fw-semibold small">
                                Authorized access only
                            </div>

                            <small class="text-muted">
                                This system is intended for approved users only.
                            </small>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const passwordToggle = document.getElementById('passwordToggle');
    const password = document.getElementById('password');

    passwordToggle.addEventListener('click', function () {

        const visible = password.type === 'text';

        password.type = visible ? 'password' : 'text';

        this.innerHTML = visible
            ? '<i class="bi bi-eye"></i>'
            : '<i class="bi bi-eye-slash"></i>';

    });

    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (alertEl) {
            bootstrap.Alert.getOrCreateInstance(alertEl).close();
        });
    }, 4500);
</script>

</body>
</html>