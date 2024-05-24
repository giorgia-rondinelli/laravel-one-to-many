<header>
    <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary d-flex justify-content-between navbar-sc " data-bs-theme="dark">


              <div class=" navbar ms-3 " id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.home ')}}"><i class="fa-solid fa-house"></i> </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Vai al sito </a>
                  </li>
                 </ul>
                </div>
              <div class="navbar me-3 " id="navbarNav">
                <ul class="navbar-nav">
                   <li class="nav-item">
                    <a class="nav-link" href="#">{{Auth::user()->name}}</a>
                  </li>
                </ul>

                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">Logout</button>
                    </form>






                </div>







    </nav>
</header>
