<title>Cliente</title>

<div id="container">
    <nav>
      <img src="pic/book.png" alt="">
      <div id="logo">
        <a href="index.php">LibreríaBDN</a>
      </div>
      <ul>
        <li class="element1"><a href="index.php">Home</a></li>
        <li class="element2"><a href="">Libros &nbsp;</a>
			<div class="dd">
				<div id="desplegable"></div>
					<ul>
						<?php
							foreach($categorias as $categoria){
								$id=$categoria['id'];
								$nombre=$categoria['nombre'];
								echo "<li><a href='index.php?controller=libro&action=infoCategorias&id=$id&nombre=$nombre'>".$categoria['nombre']."</li></a>";
							}
						?>
					</ul>
			</div>
        </li>
        <li class="element3"><a href="index.php">Novedades</a></li>
        <li class="element2">
			<a href=""><img src="pic/perfil.png" alt="" class="perfil">.</a>
			<!-- <a href="#"><img src="pic/carrito.png" alt=""></a> -->
			<div class="dd">
				<div id="desplegable"></div>
					<ul>
						<li><a href="index.php?controller=cliente&action=miPerfil">Mi perfil</a></li>
						<li><a href="index.php?controller=libro&action=favoritos">Mis favoritos</a></li>
						<li><a href="#">Mis pedidos</a></li>
						<li><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></li>
					</ul>
			</div>
        </li>
      </ul>
    </nav>
</div>