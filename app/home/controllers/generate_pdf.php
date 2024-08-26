<?php
require_once('AreaController.php');
require_once('OrderDateController.php');
require_once('OrderUserController.php');
require_once(__DIR__.'/../../../vendor/autoload.php');// Asegúrate de que esta ruta sea correcta
session_start();
// Crear una instancia de TCPDF
$pdf = new TCPDF();

// Configuración del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Listado de Órdenes');
$pdf->SetSubject('Listado de Órdenes por Fecha');
$pdf->SetKeywords('PDF, ordenes, comida');

// Eliminar la cabecera y pie de página predeterminados
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Agregar una página
$pdf->AddPage();

// Configuración de la fuente
$pdf->SetFont('helvetica', '', 12);

// Obtener los datos necesarios
$area_controller = new AreaController();
$order_date_controller = new OrderDateController();
$order_user_controller = new OrderUserController();

$user_id = $_SESSION['user_id'];
$date = date('Y-m-d');
$area_id = $area_controller->getAreaByUser($user_id)['id'];

if (isset($_GET['order_date_id']) && $_GET['order_date_id'] != -1) {
    $order_date_id = $_GET['order_date_id'];
    $date_order_filter = $order_date_controller->getOrderDateById($order_date_id)['date_order'];
} else {
    $order_date_id = $order_date_controller->getOrderDate($date, $area_id);
    $date_order_filter = $date;
}

// Título del documento
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Listado de Órdenes para la Fecha: ' . $date_order_filter, 0, 1, 'C');
$pdf->Ln(5);

// Configuración de la fuente para el contenido
$pdf->SetFont('helvetica', '', 12);

// Obtener los usuarios y órdenes
$users = $order_user_controller->getUsersByOrder($order_date_id);

// Crear la tabla
$html = '
<table border="1" cellpadding="4">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Desayuno</th>
            <th>Almuerzo</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>';

foreach ($users as $index => $user) {
    $html .= '<tr>
                <td>' . ($index + 1) . '</td>
                <td>' . $user['fullname'] . '</td>
                <td>' . ($user['breakfast'] == 1 ? 'Sí' : 'No') . '</td>
                <td>' . ($user['lunch'] == 1 ? 'Sí' : 'No') . '</td>
                <td>' . ($user['dinner'] == 1 ? 'Sí' : 'No') . '</td>
              </tr>';
}

$html .= '</tbody></table>';

// Escribir el contenido de la tabla en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Salida del PDF
$pdf->Output('ordenes_' . $date_order_filter . '.pdf', 'I'); // El segundo parámetro 'I' es para mostrar el PDF en el navegador

?>
