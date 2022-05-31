<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-4 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="">
            <li class="nav-item">
                <a href="{{route('personal.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.favorites')}}" class="nav-link">
                    <i class="nav-icon far fa-heart"></i>
                    <p>Favorites Posts</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.comment')}}" class="nav-link">
                    <i class="nav-icon far fa-comment"></i>
                    <p>Comments</p>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
