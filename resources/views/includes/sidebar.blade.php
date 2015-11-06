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
            <li class="header"LARAVEL</li>
            <li>
                <a href="/home">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li>
                <a href="/opcionMenus">
                    <i class="fa fa-bars"></i><span>Admin. Menú</span>
                </a>
            </li>
            <li>
                <a href="/aplications">
                    <i class="fa fa-desktop"></i><span>Aplicación</span>
                </a>
            </li>
            <li>
                <a href="/diaFestivos">
                    <i class="fa fa-sun-o"></i><span>Día Festivo</span>
                </a>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Admin. Usuarios</span></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/users"><i class="fa fa-users"></i>Usuarios</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/roles"><i class="fa fa-users"></i>Roles</a></li>
                </ul>
               <ul class="treeview-menu">
                    <li><a href="/usuarioRols"><i class="fa fa-users"></i> Usuario/Role</a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Catàlogos</span> </i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/tipoPersonas"><i class="fa fa-stack-overflow"></i>Tipo Persona</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/tipoResolucions"><i class="fa fa-stack-overflow"></i>Tipo Resolución</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/motivoLlamadas"><i class="fa fa-stack-overflow"></i><span>Motivo Llamada</span></a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="/motivoIngresos"><i class="fa fa-stack-overflow"></i><span>Motivo Ingreso</span></a></li>
                </ul>
            </li>   
            <li>
                <a href="/auth/logout">
                <i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span> 
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>