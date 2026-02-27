<?php
namespace App\Controllers;

use Dompdf\Dompdf;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class ServiciosController {
    
    
    public function generarPDF($contenidoHtml) {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($contenidoHtml);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Reporte_Mineria.pdf", ["Attachment" => true]);
    }

    
    public function enviarCorreo($destinatario, $mensaje) {
        try {
            
            $dsn = "smtp://5e83cdaa035ad8:cee581f9b01112@sandbox.smtp.mailtrap.io:2525";
            
            $transport = Transport::fromDsn($dsn);
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from('taller_mvc@jhoann.com')
                ->to($destinatario)
                ->subject('⛏️ Resultado de Minería Minecraft')
                ->html("
                    <div style='font-family: Arial; border: 2px solid #22c55e; padding: 20px; border-radius: 12px;'>
                        <h2 style='color: #15803d;'>¡Hola Minero!</h2>
                        <p>Se ha procesado tu información con éxito:</p>
                        <p style='background: #f0fdf4; padding: 15px; border-radius: 8px; color: #166534;'>
                            <strong>$mensaje</strong>
                        </p>
                        <p style='font-size: 12px; color: #666;'>Enviado mediante Symfony Mailer y Mailtrap Sandbox.</p>
                    </div>
                ");

            $mailer->send($email);
            return "✅ ¡Enviado! Revisa tu bandeja 'My Inbox' en Mailtrap.";
        } catch (\Exception $e) {
            return "❌ Error: " . $e->getMessage();
        }
    }
}