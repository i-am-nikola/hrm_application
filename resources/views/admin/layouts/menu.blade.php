<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-header">QUẢN LÝ NHÂN SỰ</li>
    <li class="nav-item">
      <a href={{ route('workers.index') }} class="nav-link">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Quản lý nhân viên</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Quản lý phòng ban</p>
      </a>
    </li>
    <li class="nav-item">
      <a href={{ route('dashboard') }} class="nav-link">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Thống kê, báo cáo</p>
      </a>
    </li>
    <li class="nav-header">QUẢN TRỊ HỆ THỐNG</li>
    <li class="nav-item">
      <a href={{ route('users.index') }} class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>Quản lý người dùng</p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tree"></i>
        <p>
          Quản lý phân quyền
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href={{ route('roles.index') }} class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Vai trò</p>
          </a>
        </li>
        <li class="nav-item">
          <a href={{ route('permissions.index') }} class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Phân quyền</p>
          </a>
        </li>


      </ul>
    </li>
  </ul>
</nav>
