# ⛏️ Taller PHP Avanzado - Sistema de Gestión de Minería (MVC)

Este proyecto es una aplicación web desarrollada en PHP que implementa una arquitectura **MVC (Modelo-Vista-Controlador)**, utiliza gestión de dependencias con **Composer**, y se integra con librerías externas para reportes y notificaciones.

## 🚀 Requisitos Cumplidos

### 1. Arquitectura y Autocarga (PSR-4)
* **Composer**: Se utiliza para la gestión de librerías y la carga automática de clases.
* **PSR-4**: Configurado en `composer.json` para mapear el namespace `App\` a la carpeta `app/`.
* **Comando clave**: `composer dump-autoload`.

### 2. Patrón de Diseño MVC
El proyecto está organizado de la siguiente manera:
* **Models**: 
  - `Personaje.php`: Gestiona la entidad del minero.
  - `CalculadoraModel.php`: Contiene la lógica matemática para deducciones.
* **Controllers**: 
  - `MinecraftController.php`: Orquestador de la lógica de negocio.
  - `ServiciosController.php`: Gestor de servicios externos (Email y PDF).
* **Vistas**: `talleravanzado2.php` actúa como la interfaz de usuario.

### 3. Operaciones Matemáticas (Lógica de Negocio)
Se implementó el cálculo de **Salario Neto** para un minero en Colombia:
* Se recibe una cantidad bruta de diamantes/oro.
* Se aplica una deducción de ley del **10%** mediante métodos encapsulados en la clase `CalculadoraModel`.

### 4. Integración de Librerías Externas (Packagist)
Se instalaron y configuraron mediante Composer:
1.  **dompdf/dompdf**: Para la generación dinámica de reportes en formato PDF.
2.  **symfony/mailer**: Para el envío de resultados vía correo electrónico.
    * *Nota: Configurado con Mailtrap Sandbox para pruebas de entorno de desarrollo.*

### 5. Interfaz de Usuario (UI)
* **Tailwind CSS**: Se utilizó para el diseño, logrando una interfaz moderna, responsiva y funcional con una estética inspirada en Minecraft.
* **Captura de Datos**: Uso de formularios HTML y la superglobal `$_POST` para el procesamiento de información en tiempo real.

## 🛠️ Instalación y Uso

1. Clonar el repositorio.
2. Asegurarse de tener instalado [Composer](https://getcomposer.org/).
3. Ejecutar el comando para instalar dependencias:
   ```bash
   composer install