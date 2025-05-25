<nav class="page-sidebar" id="sidebar" style="background-color: #0c91be">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="./assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->name }}</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('home') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Home</span>
                </a>
            </li>
            <li class="heading">Data Pegawai</li>
            <li>
                <a href="{{ route('pegawai') }}"><i class="sidebar-item-icon fa fa-solid fa-users"></i>
                    <span class="nav-label">Pegawai</span>
                </a>
            </li>
            <li class="heading">Data Tamu</li>
            <li>
                <a style="display: flex; justify-content: space-between;align-items: center;" href="javascript:;">
                    <div>
                        <i class="sidebar-item-icon fa fa-regular fa-user-plus"></i>
                        <span class="nav-label">Tamu</span>
                    </div>
                    <i class="ti-menu"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admintamu') }}"></i>Tamu Berkunjung</a>
                    </li>
                    <li>
                        <a href="{{ route('adminreservasi') }}"></i>Tamu Reservasi</a>
                    </li>
                </ul>
            </li>
            <li class="heading">Data User</li>
            <li>
            <li>
                <a style="display: flex; justify-content: space-between;align-items: center;" href="javascript:;">
                    <div>
                        <i class="sidebar-item-icon fa a-solid fa-user"></i>
                        <span class="nav-label">User</span>
                    </div>
                    <i class="ti-menu"></i>
                </a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('useradmin') }}"><i class="sidebar-item-icon fa a-solid fa-user"></i>Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('userpetugas') }}"><i
                                class="sidebar-item-icon fa a-solid fa-user"></i>Petugas</a>
                    </li>
                </ul>
            </li>
            </li>
        </ul>
    </div>
</nav>