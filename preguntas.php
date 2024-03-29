<?php
session_start(); // Inicia la sesión

// Verifica si hay una referencia en la solicitud HTTP
if (!isset($_SERVER['HTTP_REFERER'])) {
    // Si no hay referencia, redirige al usuario a index.html
    header("Location: index.html");
    exit; // Termina el script para evitar que se ejecute más código
}

// Establece el número de preguntas acertadas o inicialízalo a 0
$preguntas_acertadas = isset($_SESSION['preguntas_acertadas']) ? $_SESSION['preguntas_acertadas'] : 0;

// Define la imagen de fondo predeterminada
$imagen_fondo = "./img/imagen1.jpg";

// Si se envió el formulario
if (isset($_POST['submit'])) {
    // Si la respuesta es correcta, incrementa el contador
    if ($_POST['respuesta'] == $_POST['respuesta_correcta']) {
        $preguntas_acertadas++;
    }

    // Cambia la imagen de fondo en función del número de preguntas acertadas
    switch ($preguntas_acertadas) {
        case 0:
            $imagen_fondo = "./img/imagen1.jpg";
            break;
        case 1:
            $imagen_fondo = "./img/imagen2.jpg";
            break;
        case 2:
            $imagen_fondo = "./img/imagen3.jpg";
            break;
        case 3:
            $imagen_fondo = "./img/imagen4.jpg";
            break;
        case 4:
            $imagen_fondo = "./img/imagen5.jpg";
            break;
        case 5:
            $imagen_fondo = "./img/imagen6.jpg";
            break;
        case 6:
            $imagen_fondo = "./img/imagen7.jpg";
            break;
        case 7:
            // Redirige a fin.php si se han respondido correctamente más de 6 preguntas
            header('Location: fin.php');
            exit; // Importante para evitar que el script siga ejecutándose
            break;
    }

    // Actualiza el número de preguntas acertadas en la sesión
    $_SESSION['preguntas_acertadas'] = $preguntas_acertadas;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos/style.css">
    <title>Preguntas</title>
    <style>
        body {
            background-image: url('<?php echo $imagen_fondo; ?>');
            }
            
    </style>
</head>
<body class="bodypreguntas">
<div id="preguntas-container">
    <?php
    // Array de preguntas y respuestas
    $preguntas = array(
        array(
            "pregunta" => "¿Qué significa HTML?",
            "respuestas" => array("Hyper Text Markup Language", "Hyperlinks and Text Markup Language", "Home Tool Markup Language", "Hyper Texting Markup Language"),
            "respuesta_correcta" => 0,
            "ayuda" => 0
        ),
        array(
            "pregunta" => "¿Qué significa CSS?",
            "respuestas" => array("Computer Style Sheets", "Cascading Style Sheets", "Colorful Style Sheets", "Creative Style Sheets"),
            "respuesta_correcta" => 1,
            "ayuda" => 1
        ),
        array(
            "pregunta" => "¿Cuál es el lenguaje de programación más popular en la actualidad?",
            "respuestas" => array("Java", "Python", "C++", "JavaScript"),
            "respuesta_correcta" => 1,
            "ayuda" => 2
        ),
        array(
            "pregunta" => "¿Qué significa SQL?",
            "respuestas" => array("Strong Question Language", "Structured Query Language", "Stylish Query Language", "Structured Question Language"),
            "respuesta_correcta" => 1,
            "ayuda" => 3
        ),
        array(
            "pregunta" => "¿Qué es un algoritmo?",
            "respuestas" => array("Un tipo de base de datos", "Un conjunto de instrucciones para resolver un problema", "Un lenguaje de programación", "Una red de computadoras"),
            "respuesta_correcta" => 1,
            "ayuda" => 4
        ),
        array(
            "pregunta" => "¿Cuál es el fundador de Microsoft?",
            "respuestas" => array("Bill Gates", "Steve Jobs", "Mark Zuckerberg", "Larry Page"),
            "respuesta_correcta" => 0,
            "ayuda" => 5
        ),
        array(
            "pregunta" => "¿Qué es un firewall?",
            "respuestas" => array("Una herramienta para la edición de imágenes", "Una medida de seguridad para prevenir accesos no autorizados a una red", "Un componente de hardware para aumentar la velocidad de internet", "Un sistema operativo especializado en videojuegos"),
            "respuesta_correcta" => 1,
            "ayuda" => 6
        ),
        array(
            "pregunta" => "¿Qué es un router?",
            "respuestas" => array("Un dispositivo que conecta diferentes redes de computadoras", "Un programa para editar documentos", "Un tipo de lenguaje de programación", "Un dispositivo para imprimir documentos"),
            "respuesta_correcta" => 0,
            "ayuda" => 7
        ),
        array(
            "pregunta" => "¿Qué es un virus informático?",
            "respuestas" => array("Un programa que ayuda a mejorar la seguridad de una computadora", "Un tipo de memoria USB", "Un programa que realiza tareas repetitivas automáticamente", "Un programa malicioso que se propaga infectando otros programas"),
            "respuesta_correcta" => 3,
            "ayuda" => 8
        ),
        array(
            "pregunta" => "¿Qué es un servidor web?",
            "respuestas" => array("Una computadora que almacena sitios web y los distribuye a los usuarios a través de Internet", "Un tipo de software para la edición de imágenes", "Una herramienta para hacer llamadas telefónicas a través de internet", "Una base de datos en línea"),
            "respuesta_correcta" => 0,
            "ayuda" =>  9
        ),
        array(
            "pregunta" => "¿Qué significa PHP?",
            "respuestas" => array("Personal Hypertext Processor", "Preprocessed Hypertext Pages", "PHP: Hypertext Preprocessor", "Hypertext Preprocessor"),
            "respuesta_correcta" => 2,
            "ayuda" => 10
        ),
        array(
            "pregunta" => "¿Qué significa HTTP?",
            "respuestas" => array("Hypertext Transfer Protocol", "Hypertext Transport Protocol", "Hypertext Transmission Protocol", "Hypertext Text Protocol"),
            "respuesta_correcta" => 0,
            "ayuda" => 11
        ),
        array(
            "pregunta" => "¿Qué es un sistema operativo?",
            "respuestas" => array("Un programa para crear presentaciones", "El hardware principal de una computadora", "Un conjunto de reglas para programar", "Un software que gestiona los recursos y proporciona servicios a los programas de aplicación"),
            "respuesta_correcta" => 3,
            "ayuda" => 12
        ),
        array(
            "pregunta" => "¿Qué es un phishing?",
            "respuestas" => array("Una técnica de pesca", "Un software para crear gráficos en 3D", "Un intento de engañar a las personas para que revelen información personal", "Un término de programación"),
            "respuesta_correcta" => 2,
            "ayuda" => 13
        ),
        array(
            "pregunta" => "¿Qué es un IDE?",
            "respuestas" => array("Integrated Design Environment", "Integrated Development Environment", "Integrated Deployment Environment", "Integrated Documentation Environment"),
            "respuesta_correcta" => 1,
            "ayuda" => 14
        ),
        array(
            "pregunta" => "¿Qué es un bug en el contexto de la programación?",
            "respuestas" => array("Un insecto que se cuela en el ordenador", "Un error en el código que provoca un comportamiento no deseado", "Un proceso de depuración de código", "Un término coloquial para referirse a un programador novato"),
            "respuesta_correcta" => 1,
            "ayuda" => 15
        ),
        array(
            "pregunta" => "¿Qué es un algoritmo de búsqueda binaria?",
            "respuestas" => array("Un algoritmo para encontrar el doble de resultados en una búsqueda", "Un algoritmo que divide repetidamente una lista en dos partes iguales para encontrar un elemento", "Un algoritmo que busca en todas las posiciones posibles de una lista", "Un algoritmo que usa solo dos operadores aritméticos para realizar una búsqueda"),
            "respuesta_correcta" => 1,
            "ayuda" => 16
        ),
        array(
            "pregunta" => "¿Cuál es la diferencia entre un compilador y un intérprete?",
            "respuestas" => array("Un compilador es más rápido que un intérprete", "Un compilador traduce el código fuente a código máquina antes de su ejecución, mientras que un intérprete lo traduce línea por línea durante la ejecución", "Un intérprete es más usado en sistemas embebidos", "Un compilador es solo para lenguajes compilados mientras que un intérprete es para lenguajes interpretados"),
            "respuesta_correcta" => 1,
            "ayuda" => 17
        ),
        array(
            "pregunta" => "¿Qué significa la sigla API?",
            "respuestas" => array("Application Program Interface", "Application Programming Interface", "Application Process Interface", "Application Programmed Interface"),
            "respuesta_correcta" => 1,
            "ayuda" => 18
        ),
        array(
            "pregunta" => "¿Qué es un bucle en programación?",
            "respuestas" => array("Un error que hace que el programa quede atrapado en una sección infinita de código", "Una estructura que permite repetir un conjunto de instrucciones varias veces", "Una característica que permite al programador controlar el flujo de ejecución del programa", "Una función que permite dividir el código en secciones más pequeñas y manejables"),
            "respuesta_correcta" => 1,
            "ayuda" => 19
        ),
        array(
            "pregunta" => "¿Qué es una API REST?",
            "respuestas" => array("Una técnica de construcción de interfaces de usuario", "Una arquitectura para construir servicios web basados en el protocolo REST", "Un lenguaje de programación orientado a objetos", "Una API que solo funciona con el método POST"),
            "respuesta_correcta" => 1,
            "ayuda" => 20
        ),
        array(
            "pregunta" => "¿Qué es un script en programación?",
            "respuestas" => array("Un tipo de fuente para una obra de teatro", "Un conjunto de instrucciones que se ejecutan en un ordenador", "Un programa para la creación de guiones de cine", "Un lenguaje de programación avanzado"),
            "respuesta_correcta" => 1,
            "ayuda" => 21
        ),
        array(
            "pregunta" => "¿Qué es un argumento en programación?",
            "respuestas" => array("Una pelea entre dos programadores", "Una variable dentro de una función", "Un valor que se pasa a una función cuando se la llama", "Una característica de los lenguajes de programación orientados a objetos"),
            "respuesta_correcta" => 2,
            "ayuda" => 22
        ),
        array(
            "pregunta" => "¿Qué es la recursividad en programación?",
            "respuestas" => array("Un tipo de error en el código", "Un método de depuración de código", "Una técnica que consiste en llamar a una función desde sí misma", "Un tipo de lenguaje de programación"),
            "respuesta_correcta" => 2,
            "ayuda" => 23
        ),
        array(
            "pregunta" => "¿Qué significa el término 'debugging'?",
            "respuestas" => array("El proceso de añadir errores a un programa", "La fase final de desarrollo de un software", "El proceso de depurar y corregir errores en un programa", "Una técnica de programación avanzada"),
            "respuesta_correcta" => 2,
            "ayuda" => 24
        ),
        array(
            "pregunta" => "¿Qué es una variable en programación?",
            "respuestas" => array("Una constante que no puede cambiar su valor", "Una palabra clave reservada en un lenguaje de programación", "Un espacio de memoria que almacena datos y puede cambiar su valor", "Una función especial que devuelve un valor específico"),
            "respuesta_correcta" => 2,
            "ayuda" => 25
        ),
        array(
            "pregunta" => "¿Qué es un array en programación?",
            "respuestas" => array("Un conjunto de instrucciones para ejecutar un programa", "Un tipo de estructura de datos que almacena colecciones de elementos", "Una función que devuelve múltiples valores", "Una técnica de optimización de código"),
            "respuesta_correcta" => 1,
            "ayuda" => 26
        ),
        array(
            "pregunta" => "¿Qué es un método en programación orientada a objetos?",
            "respuestas" => array("Una técnica de resolución de problemas en programación", "Una función que pertenece a una clase y puede ser invocada en los objetos de esa clase", "Un algoritmo avanzado de búsqueda", "Un tipo de estructura de control de flujo"),
            "respuesta_correcta" => 1,
            "ayuda" => 27
        ),
        array(
            "pregunta" => "¿Qué es un constructor en programación orientada a objetos?",
            "respuestas" => array("Una persona que construye programas", "Una función especial de una clase que se llama automáticamente cuando se crea un objeto de esa clase", "Una técnica de optimización de código", "Una estructura de control de flujo"),
            "respuesta_correcta" => 1,
            "ayuda" => 28
        ),
        array(
            "pregunta" => "¿Qué es una excepción en programación?",
            "respuestas" => array("Un error grave en el código que provoca un fallo del sistema", "Un tipo especial de variable", "Una función que devuelve un resultado inesperado", "Un error que ocurre durante la ejecución de un programa y rompe el flujo normal de ejecución"),
            "respuesta_correcta" => 3,
            "ayuda" => 29
        )
    );
    
    $ayuda = array(
        "HTML es el lenguaje de marcado estándar para la creación de páginas web.",
        "CSS es un lenguaje usado para describir la presentación de un documento escrito en HTML.",
        "Python es uno de los lenguajes de programación más populares en la actualidad.",
        "SQL es un lenguaje de programación especializado en la gestión y consulta de bases de datos relacionales.",
        "Un algoritmo es un conjunto finito de instrucciones para resolver un problema.",
        "Bill Gates es el cofundador de Microsoft, una de las empresas más grandes de tecnología en el mundo.",
        "Un firewall es un sistema de seguridad que controla y monitoriza el tráfico de red.",
        "Un router es un dispositivo que interconecta redes de computadoras y encamina paquetes de datos entre ellas.",
        "Un virus informático es un programa malicioso que se propaga infectando otros programas.",
        "Un servidor web es un programa que almacena y distribuye contenido web a los clientes a través de Internet.",
        "PHP es un lenguaje de programación diseñado para el desarrollo web del lado del servidor.",
        "HTTP es un protocolo de comunicación usado para transferir datos en la World Wide Web.",
        "Un sistema operativo es un software que gestiona los recursos de hardware y proporciona servicios a los programas de aplicación.",
        "Phishing es una técnica utilizada para obtener información confidencial, como contraseñas y detalles de tarjetas de crédito, haciéndose pasar por una entidad confiable en una comunicación electrónica.",
        "Un IDE es un entorno de desarrollo integrado que proporciona herramientas para facilitar la programación.",
        "Un bug en programación es un error en el código que provoca un comportamiento no deseado.",
        "La búsqueda binaria es un algoritmo de búsqueda eficiente que divide repetidamente una lista en dos partes iguales.",
        "Un compilador traduce el código fuente a código máquina antes de su ejecución, mientras que un intérprete lo traduce línea por línea durante la ejecución.",
        "Una API (Interfaz de Programación de Aplicaciones) es un conjunto de reglas y protocolos que permiten a diferentes aplicaciones comunicarse entre sí.",
        "Un bucle en programación es una estructura que permite repetir un conjunto de instrucciones varias veces.",
        "Una API REST es una arquitectura para construir servicios web basados en el protocolo REST que utiliza métodos estándar HTTP.",
        "Un script en programación es un conjunto de instrucciones que se ejecutan en un ordenador.",
        "En programación, un argumento es un valor que se pasa a una función cuando se la llama.",
        "La recursividad en programación es una técnica que consiste en llamar a una función desde sí misma.",
        "El debugging es el proceso de depurar y corregir errores en un programa durante el desarrollo.",
        "En programación, una variable es un espacio de memoria que almacena datos y puede cambiar su valor durante la ejecución del programa.",
        "En programación, un array es una estructura de datos que almacena colecciones de elementos del mismo tipo.",
        "En programación orientada a objetos, un método es una función que pertenece a una clase y puede ser invocada en los objetos de esa clase.",
        "En programación orientada a objetos, un constructor es una función especial de una clase que se llama automáticamente cuando se crea un objeto de esa clase.",
        "En programación, una excepción es un error que ocurre durante la ejecución de un programa y rompe el flujo normal de ejecución."
    );
    // Inicializa el índice de la imagen actual
    $indiceImagen = 0;

    // Función para mostrar una pregunta
    function mostrarPregunta($preguntas, $indiceImagen) {
        // Selecciona una pregunta aleatoria
        $pregunta = $preguntas[array_rand($preguntas)];

        echo "<h2>{$pregunta['pregunta']}</h2>";
        echo "<form method='POST'>";
        foreach ($pregunta['respuestas'] as $index => $respuesta) {
            echo "<input type='radio' name='respuesta' value='$index'> $respuesta <br>";
        }
        echo "<input type='hidden' name='respuesta_correcta' value='{$pregunta['respuesta_correcta']}'>";
        echo "<input type='hidden' name='indice_imagen' value='$indiceImagen'>"; // Agregamos el índice de la imagen oculta
        echo "<input type='hidden' name='ayuda' value='{$pregunta['ayuda']}'>"; // Agregamos el número de ayuda
        echo "<input type='submit' name='submit' value='Responder'>";
        echo "</form>";

        // Muestra la imagen de ayuda con un tamaño reducido y posición fija
        echo "<img src='./img/imagen_ayuda.jpg' alt='Ayuda' onclick='mostrarAyuda(\"{$pregunta['ayuda']}\")' class='ayuda-imagen'>";
    }

    // Lógica para comprobar la respuesta
    if (isset($_POST['submit'])) {
        $respuesta = $_POST['respuesta'];
        $respuesta_correcta = $_POST['respuesta_correcta'];
        if ($respuesta == $respuesta_correcta) {
            echo "<p>¡Respuesta correcta!</p>";
        } else {
            // Respuesta incorrecta, redirigir a otra página
            header('Location: error.php');
            exit; // ¡Importante para evitar que el script siga ejecutándose!
        }
    }

    // Muestra la pregunta con el índice de la imagen actual
    mostrarPregunta($preguntas, $indiceImagen);
    ?>
    </div>

    <div id="ayuda-imagen-fullscreen">
        <img src="./img/imagen_ayuda.jpg" alt="Ayuda" style="width: 100%; height: 100%;">
    </div>

    <!-- Audio para reproducir cuando se pide ayuda -->
    <audio id="audio-ayuda" loop style="display: none;">
        <source src="./img/Jumpscare.mp3" type="audio/mp3">
        Tu navegador no soporta el elemento de audio.
    </audio>

    <script>
        function mostrarAyuda(numeroAyuda) {
            var ayuda = <?php echo json_encode($ayuda); ?>;
            alert(ayuda[numeroAyuda]); // Muestra la ayuda correspondiente al número proporcionado
            
            var ayudaImagenFullscreen = document.getElementById('ayuda-imagen-fullscreen');
            var audioAyuda = document.getElementById('audio-ayuda');

            // Muestra la imagen de ayuda a pantalla completa
            ayudaImagenFullscreen.style.display = 'block';

            // Reproduce el audio de ayuda
            audioAyuda.play();

            // Oculta la imagen de ayuda a pantalla completa y detiene el audio después de 5 segundos
            setTimeout(function() {
                ayudaImagenFullscreen.style.display = 'none';
                audioAyuda.pause();
            }, 5000);
        }
    </script>

</body>
</html>
