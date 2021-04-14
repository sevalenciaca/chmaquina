<?php
session_start();
$message = '';
// Valida si es una solicitud por metodo POST
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Cargar'){
    // Se verifica que la carga del archivo se realizó correctamente
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){ // Si hay un error durante la carga del archivo, esta variable se rellena con el mensaje de error correspondiente. En el caso de que se cargue correctamente el archivo, contiene 0, que puede comparar utilizando la constante UPLOAD_ERR_OK
        // $_FILES es un arreglo multidimencional y se llena con toda la información del archivo. Se inicializa como un arreglo
        // Si la carga del archivo es exitosa, inicializamos algunas variables con información sobre el archivo cargado.
        // tmp_name: La ruta temporal donde se carga el archivo se almacena en esta variable
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        // name: El nombre real del archivo se almacena en esta variable
        $fileName = $_FILES['uploadedFile']['name'];
        // size: Indica el tamaño del archivo cargado en bytes
        $fileSize = $_FILES['uploadedFile']['size'];
        // type: Contiene el tipo mime del archivo cargado
        $fileType = $_FILES['uploadedFile']['type'];
        // Funcion para dividir una cadena, el primer argumento es el delimitador y el segundo es la cadena. Separa el nombre del archivo y el nombre de la extension
        $fileNameCmps = explode(".", $fileName);
        // Extesion del archivo cargado, que mas adelante se valida, se extrae la ultima cadena, es decir (.extension)
        $fileExtension = strtolower(end($fileNameCmps));
        // Como el archivo cargado puede contener espacios y otros caracteres especiales, es mejor limpiar el nombre del archivo
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        // Restricción del tipo de archivo, arreglo con todos las extensiones permitidas, en este caso solo (.ch)
        // Este script evita subir otro tipo de archivos
        $allowedfileExtensions = array('ch');
        if (in_array($fileExtension, $allowedfileExtensions)){
            // Ruta y nombre del directorio donde se almacena el archivo
            $uploadFileDir = './carpeta_archivo/';
            // Ruta completa incluyendo el nombre del nuevo archivo
            $dest_path = $uploadFileDir . $fileName;
            // Mover el archivo cargado a la ubicación específica, en este caso a (carpeta_archivo)
            // Esta función toma dos argumentos. El primer argumento es el nombre de archivo del archivo cargado, y el segundo argumento es la ruta de destino a la que desea mover el archivo.
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                $message ='El archivo con extensión .ch se cargó correctamente';
            }
            else{
                $message = 'Hubo algún error al mover el archivo al directorio de carga. Asegúrese de que el servidor web pueda escribir en el directorio de carga.';
            }
        }
        else{
            $message = 'Subida fallida. Solo se permiten archivos con extensión ' . implode(',', $allowedfileExtensions);
        }
    }
    else{
        $message = 'Hay algún error en la carga del archivo';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
}

$_SESSION['message'] = $message;
header("Location: index.php");