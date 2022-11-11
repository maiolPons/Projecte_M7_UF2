<?php
    //Session Admin
    function LogAdmin(){
        ?>
        <script>alert("Tienes que logearte primero para ver esta página!")</script>
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?controller=admin&action=logear"> 
        <?php
    }

    //Session Cliente
    function LogCliente(){
        ?>
        <script>alert("Tienes que logearte primero para ver esta página!")</script>
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php"> 
        <?php
    }
?>