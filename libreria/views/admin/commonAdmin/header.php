<title>LibreriaBDN</title>
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
        <li class="element4"><a href="index.php?controller=cliente&action=logearCliente">Iniciar sesión</a></li>
      </ul>
    </nav>
</div>