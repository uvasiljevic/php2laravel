
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">


                    </form>
                    <div class="header-button">
                        <div class="noti-wrap">
                            <div class="noti__item js-item-menu">


                            </div>
                            <div class="noti__item js-item-menu">


                            </div>
                            <div class="noti__item">
                                <a href="{{url('/')}}">
                                    <i class="fas fa-forward" title="Show site"></i>
                                </a>
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('adminassets/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{session()->get('user')->firstName}} {{session()->get('user')->lastName}}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{asset('adminassets/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{session()->get('user')->firstName}} {{session()->get('user')->lastName}}</a>
                                            </h5>
                                            <span class="email">{{session()->get('user')->email}}</span>
                                        </div>
                                    </div>

                                    <div class="account-dropdown__footer">
                                        <a href="{{url('/logout')}}">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
