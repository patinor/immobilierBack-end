<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item sidebar-category">
        <p>Navigation</p>
        <span></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-view-quilt menu-icon"></i>
          <span class="menu-title">Dashboard</span>
          <div class="badge badge-info badge-pill">2</div>
        </a>
      </li>
      <li class="nav-item sidebar-category">
        <p>Components</p>
        <span></span>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('proprio.index')}}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Propriétaire</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('categorie.index')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Catégorie</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('bienImmobilier.index')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Bien-immobilier</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Client</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Contract</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="pages/icons/mdi.html">
          <i class="mdi mdi-emoticon menu-icon"></i>
          <span class="menu-title">Ventes</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
          </ul>
        </div>
      </li>
      
     
    
    </ul>
  </nav>