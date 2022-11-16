<nav id="menucliente">
    <ul>
		<li class="first_child"><a href="#">Libros</a>
			<?php 
				foreach($categorias as $categoria){
				$id=$categoria['id'];
				$nombre=$categoria['nombre'];
				echo "<ul>";
				echo "<li><a href='index.php?controller=libro&action=infoCategorias&id=$id&nombre=$nombre'>".$categoria['nombre']."</a></li>";
				echo "</ul>";
				}
			?>
		
		<li class="second-child"><img class="perfil" src="pic/perfil.png" alt="">
			<ul>
				<li><a href="index.php?controller=libro&action=detalleLibro">Detalle libro</a></li>
				<li><a href="#">Modificar perfil</a></li>
				<li><a href="index.php?controller=libro&action=favoritos">Mis favoritos</a></li>
				<li><a href="#">Mis pedidos</a></li>
				<li><a href="index.php?controller=admin&action=salir">Cerrar sesión</a></li>
			</ul>
		</li>
	 </ul>
</nav>