<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="<?=base_url()?>/assets/images/avatar-4.jpg"
                    alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details"><?=ucfirst($userinfo['fullname'])?><i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search
                        Friend</label>
                </div>
            </form>
        </div>
        <div class="pcoded-navigation-label">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?=uri_string() === '/' ? 'active' : '';?>">
                <a href="/" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">Forms</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?=uri_string() === 'alternatif' ? 'active' : '';?>">
                <a href="/alternatif" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Alternatif</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?=uri_string() === 'kriteria' ? 'active' : '';?>">
                <a href="/kriteria" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Kriteria</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?=uri_string() === 'penilaian' ? 'active' : '';?>">
                <a href="/penilaian" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Penilaian</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?=uri_string() === 'metode' ? 'active' : '';?>">
                <a href="/metode" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext">Perhitungan Metode</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

    </div>
</nav>