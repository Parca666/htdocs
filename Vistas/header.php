
<nav id="menu">
    <ul class="ulMenu">
        <li class="liMenu">
            <button onClick="ClickBuscar()"> <img class="lupa" />Buscar</button>
            <div id="buscador">
                <form action="../index.php?accio=buscador" target="_self" method="post">
                    <input type="search" name="busqueda"
                           placeholder="Buscar ...">
                </form>
            </div>
        </li>
        <li class="liMenu">
            <a href="http://tdiw-m12.deic-docencia.uab.cat/index.php?accio=categorias">Categorias</a>
        </li>
        <?php  if(isset($_SESSION['usuario'])){?>
            <li class="liMenu">
                <a href="http://tdiw-m12.deic-docencia.uab.cat/index.php?accio=carrito">Carrito</a>
                <ul class="desplegable">
                    <li class="desplegable"> <p> Productos: <?=$_SESSION['totalproductos'] ?>u </p></li>
                    <li class="desplegable"> <p>Precio total: <?=$_SESSION['totalprecio'] ?>€</p></li>
                </ul>
            </li>
            <li class="desplegable"><a href="#">Usuario</a>
                <ul class="desplegable">
                    <li class="desplegable"><a href="http://tdiw-m12.deic-docencia.uab.cat/index.php?accio=perfil">Mi cuenta</a></li>
                    <li class="desplegable"><a href="http://tdiw-m12.deic-docencia.uab.cat/index.php?accio=pedidos">Mis productos</a></li>
                    <li class="desplegable">    <a href="?logout">Log out</a>
                        <?php
                        if(isset($_GET['logout'])) {
                            session_unset();
                            header('Refresh: 1; URL=index.php');
                        }
                        ?>
                </ul>
            </li>
        <?php
            //Acción que se ejecutaria en caso de que no estes logueado
        }else{
        ?>
        <li class="liMenu">
            <a href="http://tdiw-m12.deic-docencia.uab.cat/index.php?accio=registro">Registro</a>
        </li>
        <li class="liMenu">
            <a href="http://tdiw-m12.deic-docencia.uab.cat/index.php?accio=login">Iniciar Sesión</a>
        </li>
            <?php
        }
        ?>
    </ul>
</nav>

