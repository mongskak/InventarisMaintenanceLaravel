<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="user-panel my-1 d-flex mr-3">
            <div class="info d-flex flex-row justify-content-center gap-2 align-items-center">
                <div class="fw-bold">{{ auth()->user()->name }}</div>

            </div>
            {{-- <div class="image">
                <img src="{{ asset('templates/dist/img/user2-160x160.jpg') }}" class="img-circle border-1"
                    alt="User Image">
            </div> --}}
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Logout</button>
            </form>
        </div>



    </ul>
</nav>
