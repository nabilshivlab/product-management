<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ url('/') }}" class="app-brand-link">            
      <span class="app-brand-text menu-text fw-bold ms-2">Project Management Task</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="change menu-inner py-1 ps ps--active-y">      
    <li class="menu-item">
      <a href="{{ url('/') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>Home</div>
      </a>      
    </li>
    <li class="menu-item ">
      <a href="{{ url('projects') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
        <div>Project Management</div>
      </a>
    </li>
  </ul>
</aside>
