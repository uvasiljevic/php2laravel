
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="{{asset('adminassets/images/icon/logo.png')}}" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active has-sub">
                        <a class="js-arrow" href="{{url('/admin')}}">
                            <i class="fas fa-shopping-cart"></i>Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/users')}}">
                            <i class="fas fa-users"></i>Users
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/categories')}}">
                            <i class="fas fa-table"></i>Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/products')}}">
                            <i class="far fa-check-square"></i>Products
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/messages')}}">
                            <i class="far fa-comments"></i>Messages
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/slider')}}">
                            <i class="fas fa-picture-o"></i>Slider
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/baners')}}">
                            <i class="fas fa-picture-o"></i>Baners
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/admin/logs')}}">
                            <i class="fas fa-list"></i>Logs
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </aside>

