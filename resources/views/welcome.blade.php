<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-briefcase me-1"></i>{{ config('app.name') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#features">Features</a> -->
                    </li>
                </ul>
                <div class="ms-3">
                    <a href="{{ route('login') }}" class="btn btn-auth btn-signin me-2">
                        <i class="fas fa-sign-in-alt me-1"></i>Sign In
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-auth btn-signup">
                        <i class="fas fa-user-plus me-1"></i>Sign Up
                    </a>
                </div>
            </div>
        </div>
    </nav>


    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 x">
                    <div class="hero-content">
                        <h2  >
                            Find your <span class="highlight">Job</span>
                        </h2>
                        <p class="subtitle ">
                            Connect with top employers and discover meaningful career opportunities that match your skills and passion.
                        </p>

                        <!-- <div class="search-bar animate-fade-in-up animate-delay-2">
                            <div class="row g-0 align-items-center">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Search for jobs, companies, or keywords..." />
                                </div>
                                <div class="col-auto">

                                    <a class="btn" href="{{ route('login') }}">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </div> -->

                        <div class="hero-buttons">
                            <a href="{{ route('register') }}" class="btn-hero btn-primary-hero">
                                <i class="fas fa-rocket"></i> Get Started
                            </a>
                            <a href="#features" class="btn-hero btn-secondary-hero">
                                <i class="fas fa-play"></i> Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center ">
                    <div class="hero-illustration bodyicon" style="color:rgba(220, 209, 183, 0.699);">
                        <i class="fas fa-briefcase " style="font-size: 13rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features" id="features">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 class="display-5 fw-bold mb-3">Features</h2>
                    <p class="lead text-muted">A platform designed for both job seekers and employers with intuitive tools and seamless experience.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card ">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Smart Search</h3>
                        <p>Find perfect opportunities using advanced filters for location, salary, experience, and skills.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Easy Applications</h3>
                        <p>Apply with one click or upload your resume. Track applications and get instant notifications.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-card ">
                        <div class="feature-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>For Employers</h3>
                        <p>Post jobs quickly, review applications, and connect with top talent through our verified platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">
                        <i class="fas fa-briefcase me-2"></i>{{ config('app.name') }}
                    </h5>
                    <p class="opacity-75 mb-3">Connecting talented professionals with amazing career opportunities worldwide.</p>
                    <div class="social-links d-flex">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="mb-3">For Candidates</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1"><a href="#">Find Jobs</a></li>
                        <li class="mb-1"><a href="#">Resume Tips</a></li>
                        <li><a href="#">Career Advice</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="mb-3">For Employers</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1"><a href="#">Post a Job</a></li>
                        <li class="mb-1"><a href="#">Talent Search</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h6 class="mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li class="mb-1"><a href="#">Help Center</a></li>
                        <li class="mb-1"><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 opacity-25">
            <div class="text-center opacity-75">
                <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>