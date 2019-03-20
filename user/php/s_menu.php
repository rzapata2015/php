<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="fm_index.php"><i class="glyphicon glyphicon-th-large"></i> - HojaVidaPc</a>
        </div>
        <?php
            if($cli->getTbl_perfil_id_perfil()==1){
        ?>
        <div class="collapse navbar-collapse" id="defaultNavbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Registro<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="fm_tbl_clientes.php">Usuarios</a></li>
                        <li><a href="fm_tbl_dependencias.php">Dependencias</a></li>
                        <li class="divider"></li>
                        <li><a href="fm_tbl_hoja_vida.php">Hoja Vida Pc</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configuración<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="fm_tbl_perfil.php">Perfil Usuario</a></li>
                        <li class="divider"></li>
                        <li><a href="fm_tbl_marcas.php">Marcas Pc</a></li>
                        <li><a href="fm_tbl_tipo_board.php">Tipo Board</a></li>
                        <li><a href="fm_tbl_tipo_dd.php">Tipo Disco Duro</a></li>
                        <li><a href="fm_tbl_tipo_fuente.php">Tipo Fuente</a></li>
                        <li><a href="fm_tbl_tipo_monitor.php">Tipo Monitor</a></li>
                        <li><a href="fm_tbl_tipo_pc.php">Tipo Pc</a></li>
                        <li><a href="fm_tbl_tipo_pc_distribucion.php">Tipo Distribución Pc</a></li>
                        <li><a href="fm_tbl_tipo_ram.php">Tipo Ram</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $cli->getNombre_completo(); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                          <li><a href="fm_tbl_clientesCambiarClave.php">Cambiar mi clave</a></li>
                          <li><a href="fm_tbl_clientesPerfilActualizar.php">Actualizar mis datos</a></li>
                          <li class="divider"></li>
                          <li><a href="op_SesionCerrar.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php
            if($cli->getTbl_perfil_id_perfil()==2){
        ?>
        <div class="collapse navbar-collapse" id="defaultNavbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Registro<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="fm_tbl_dependencias.php">Dependencias</a></li>
                        <li class="divider"></li>
                        <li><a href="fm_tbl_hoja_vida.php">Hoja Vida Pc</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configuración<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="fm_tbl_marcas.php">Marcas Pc</a></li>
                        <li><a href="fm_tbl_tipo_board.php">Tipo Board</a></li>
                        <li><a href="fm_tbl_tipo_dd.php">Tipo Disco Duro</a></li>
                        <li><a href="fm_tbl_tipo_fuente.php">Tipo Fuente</a></li>
                        <li><a href="fm_tbl_tipo_monitor.php">Tipo Monitor</a></li>
                        <li><a href="fm_tbl_tipo_pc.php">Tipo Pc</a></li>
                        <li><a href="fm_tbl_tipo_pc_distribucion.php">Tipo Distribución Pc</a></li>
                        <li><a href="fm_tbl_tipo_ram.php">Tipo Ram</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $cli->getNombre_completo(); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                          <li><a href="fm_tbl_clientesCambiarClave.php">Cambiar mi clave</a></li>
                          <li><a href="fm_tbl_clientesPerfilActualizar.php">Actualizar mis datos</a></li>
                          <li class="divider"></li>
                          <li><a href="op_SesionCerrar.php">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?php } ?>
    </div>
</nav>
