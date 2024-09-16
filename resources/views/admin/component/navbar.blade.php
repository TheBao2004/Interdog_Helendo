<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button class="btn btn-dark d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i
                    class="fa fa-align-justify"></i></button>
            <a class="text-decoration-none text-light" href="{{ route('admin.dashboard') }}">Helendo</a>
        </div>
        <div class="d-flex justify-content-center">
            <div class="d-flex align-items-center">
                {{-- <form role="search" class="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ..."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-success" type="button" id="button-addon2"><i
                                class="fa fa-search"></i></button>
                    </div>
                </form> --}}


                <div class="ms-3">
                    <div class="btn-group">
                        <span class="" type="button" data-bs-toggle="dropdown">
                            <img style="border-radius: 50%; width: 50px; height: 50px;"
                                src="https://i.pinimg.com/originals/14/4e/fe/144efe8431b2609557210610900ab129.jpg"
                                alt="Avatar">
                        </span>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-dark">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
        <button type="button" class="btn" data-bs-dismiss="offcanvas"><i
                class="fa fa-times text-light"></i></button>
    </div>
    <div class="offcanvas-body bg-dark">
        @include('admin.component.sidebar')
    </div>
</div>
