<h1>Modificar imagen</h1>
<form action="index.php?controller=libro&action=editarFoto" method="POST" enctype="multipart/form-data">  
    <div>
        <label for="archivo">Imagen </label>
        <input type="file" name="archivo" required/><br>
        <input type="hidden" name="isbn" value="<?php echo $isbn ?>">
    </div>
    <input type="submit" name="Modificar" value="Modificar"/>
</form> 