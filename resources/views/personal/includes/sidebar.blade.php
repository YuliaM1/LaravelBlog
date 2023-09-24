<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('main.index') }}" class="brand-link">
        <span class="brand-text font-weight-light ml-4">Главная</span>
    </a>
    <!-- Sidebar -->
    <nav class="mt-2">
        <div class="sidebar">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('personal.main.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Профиль
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.likes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Понравившиеся посты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personal.comments.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Комментарии
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /.sidebar -->
</aside>