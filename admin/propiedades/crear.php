<?php 
//Base de Datos
require '../../includes/config/database.php';
conectarDB();

//Array con mensajes de errores
$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* echo "<pre>";
    var_dump($_POST['titulo']);
    echo "</pre>"; */

    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedor = $_POST['vendedor'];

    if(!$titulo) {
        $errores[] = "Debes añadir un título";
    }

    if(!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if(strlen($descripcion) <= 120) {
        $errores[] = "Debes añadir una descripción";
    }

    if(!$habitaciones) {
        $errores[] = "Debes añadir la cantidad de habitaciones deseadas";
    }

    if(!$wc) {
        $errores[] = "Debes añadir la cantidad de baños deseados";
    }

    if(!$estacionamiento) {
        $errores[] = "Debes añadir la cantidad de estacionamientos";
    }

    if(!$vendedor) {
        $errores[] = "Debes seleccionar un vendedor";
    }
    
}

//Insertar en la base de datos
$query = " INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$vendedorId')";
//echo $query;

$resultado = mysqli_query($db, $query);

require '../../includes/funciones.php';


incluirTemplate('header'); 

?>

    <main class="contenedor seccion">
        <h1>Crear Nueva Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php"> 
            <fieldset>
                <legend> Información General </legend>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedorId">
                <option value="">--Seleccione Vendedor--</option>
                    <option value="1">Roberto</option>
                    <option value="2">Patricia</option>
                    <option value="3">Mauricio</option>
                </select>

            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

   <?php incluirTemplate('footer');  ?>