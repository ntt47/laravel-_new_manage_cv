<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid px-md-4	">
        <a class="navbar-brand" href="index.html">Skillhunt</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('employer.index') }}" class="nav-link">Home</a></li>
                {{-- <li class="nav-item active"><a href="{{ route('employer.candidate') }}" class="nav-link">Candidate</a>
                </li> --}}
                <li class="nav-item"><a href="{{ route('profileEmployer.index') }}" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="{{ route('employer.list_candidate') }}" class="nav-link">List
                        Candidate</a></li>
                <li class="nav-item cta mr-md-1"><a href="{{ route('employer.post_job') }}" class="nav-link">Post
                        Jobs</a></li>
                <li class="nav-item cta mr-md-1"><a href="{{ route('employer.recharge') }}" class="nav-link">Recharge
                        </a></li>
                @if (!Auth::check())
                    <li class="nav-item cta cta-colored"><a href="{{ route('show_form.login') }}"
                            class="nav-link">Login</a></li>
                @else
                    <li class="nav-item cta cta-colored"><a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
