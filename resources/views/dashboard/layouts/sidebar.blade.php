<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('profile.edit') }}">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library Admin</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('books.index') }}">
            <i class="fa-solid fa-book"></i>
            <span>All Books</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('books.index', ['borrowed' => true]) }}">
            <i class="fa-solid fa-book"></i>
            <span>Borrowed Books</span>
        </a>
    </li>

    @can('viewAny', \App\Models\Student::class)
        <hr class="sidebar-divider">

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('students.index') }}">
                <i class="fa-solid fa-person"></i>
                <span>All Students</span>
            </a>
        </li>
    @endcan
</ul>
