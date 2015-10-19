<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU PRINCIPAL</li>
            <li class="active treeview">
                <a href="#">
                <i class="fa fa-dashboard"></i> <span>Inicio</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                    <li><a href="index2.html"><i class="fa fa-circle-o"></i>Bitácoras</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/usuarios">
                    <i class="fa fa-users"></i>
                    <span>Admin. Usuarios</span>
                </a>
            </li>
            <li>
                <a href="/roles">
                <i class="fa fa-level-up"></i> <span>Admin. Roles</span> 
                </a>
            </li>
            <li>
                <a href="/estados">
                <i class="fa fa-certificate"></i> <span>Admin. Estados</span> 
                </a>
            </li>
            <li>
                <a href="/clientes">
                <i class="fa fa-male "></i> <span>Admin. Clientes</span> 
                </a>
            </li>
            <li>
                <a href="/proyectos">
                <i class="fa fa-building"></i> <span>Admin. Proyectos</span> 
                </a>
            </li>
            <li>
                <a href="/comentarios">
                <i class="fa fa-comments-o"></i> <span>Admin. Comentarios</span> 
                </a>
            </li>
            <li>
                <a href="/bitacoras">
                <i class="fa fa-history"></i> <span>Admin. Bitácoras</span> 
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>