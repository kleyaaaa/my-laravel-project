<nav class="navbar navbar-expand-lg py-2" style="background-color: #2C8975;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h4 class="m-0 fw-bold" style="display: inline-block; vertical-align: middle; color: #fff;">
                <i class="bi bi-cart3 me-2"></i>Shop n' List
            </h4>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <div class="navbar-nav gap-2">
                <a href="{{ route('user') }}" class="btn btn-sm fw-semibold" style="background-color:#6BB2A0; color:#fff; border:none;">Users</a>
                <a href="{{ route('todo') }}" class="btn btn-sm fw-semibold" style="background-color:#6BB2A0; color:#fff; border:none;">Product List</a>
                <a href="{{ route('displayProfile') }}" class="btn btn-sm fw-semibold" style="background-color:#6BB2A0; color:#fff; border:none;">Profile</a>
                <a href="/logout" class="btn btn-sm fw-semibold" style="background-color:#dc3545; color:#fff; border:none;">Logout</a>
            </div>
        </div>
    </div>
</nav>