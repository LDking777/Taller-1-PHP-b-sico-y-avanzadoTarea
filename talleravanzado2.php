<?php
require_once 'vendor/autoload.php';

use App\Controllers\MinecraftController;
use App\Controllers\ServiciosController;
$resultado = "";
$mensajeServicio = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre_minero'] ?? 'Invitado';
    $cantidad = $_POST['cantidad_bruta'] ?? 0;
    $accion = $_POST['accion'] ?? 'calcular';

    $controlador = new MinecraftController();
    $servicios = new ServiciosController();


    $resultado = $controlador->mostrar($nombre, $cantidad);


    if ($accion === 'descargar_pdf') {
        $html = "
            <h1 style='color:green;'>Reporte de Minería Minecraft</h1>
            <p style='font-size:18px;'>$resultado</p>
            <hr>
            <p>Generado por el Sistema MVC de Jhoann</p>
        ";
        $servicios->generarPDF($html);
        exit;
    }


    if ($accion === 'enviar_email') {
        $mensajeServicio = $servicios->enviarCorreo("minero@ejemplo.com", $resultado);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minería Minecraft Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-gray-800 rounded-xl shadow-2xl overflow-hidden border border-gray-700">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-center text-green-400 mb-6 flex items-center justify-center gap-2">
                ⛏️ Panel de Minería Pro
            </h2>

            <form method="POST" action="" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-1">Nombre del Personaje</label>
                    <input type="text" name="nombre_minero" value="<?php echo $_POST['nombre_minero'] ?? ''; ?>"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none transition-all"
                        placeholder="Ej: Steve o Alex" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-1">Diamantes Extraídos</label>
                    <input type="number" name="cantidad_bruta" value="<?php echo $_POST['cantidad_bruta'] ?? ''; ?>"
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none transition-all"
                        placeholder="0" required>
                </div>

                <button type="submit" name="accion" value="calcular"
                    class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-lg transform transition active:scale-95">
                    Calcular Salario Neto
                </button>

                <?php if ($resultado): ?>
                    <div class="mt-8 p-4 bg-green-900/30 border border-green-500/50 rounded-lg">
                        <p class="text-green-400 text-sm font-semibold uppercase tracking-wider mb-1">Resultado:</p>
                        <p class="text-lg mb-4"><?php echo $resultado; ?></p>

                        <div class="flex gap-2">
                            <button type="submit" name="accion" value="descargar_pdf"
                                class="flex-1 bg-blue-600 hover:bg-blue-500 text-xs text-white font-bold py-2 px-2 rounded transition">
                                📄 Generar PDF
                            </button>
                            <button type="submit" name="accion" value="enviar_email"
                                class="flex-1 bg-purple-600 hover:bg-purple-500 text-xs text-white font-bold py-2 px-2 rounded transition">
                                📧 Enviar Email
                            </button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($mensajeServicio): ?>
                    <p class="text-center text-xs mt-4 text-yellow-400 font-mono italic">
                        <?php echo $mensajeServicio; ?>
                    </p>
                <?php endif; ?>
            </form>
        </div>
    </div>

</body>

</html>