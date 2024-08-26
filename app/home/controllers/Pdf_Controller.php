<?php

require_once(__DIR__.'/../model/Area.php');
require_once(__DIR__.'/../model/OrderDate.php');
require_once(__DIR__.'/../model/OrderUser.php');
require_once(__DIR__.'/../../../vendor/autoload.php');// Asegúrate de que esta ruta sea correcta

class PdfController {

    private $areaModel;
    private $orderDateModel;
    private $orderUserModel;

    public function __construct() {
        $this->areaModel = new AreaModel();
        $this->orderDateModel = new OrderDateModel();
        $this->orderUserModel = new OrderUserModel();
    }

    public function generatePdfByDate($date) {
        $areas = $this->areaModel->getAllAreas();
        $data = [];

        foreach ($areas as $area) {
            $area_id = $area['id'];
            $order_date_id = $this->orderDateModel->getOrderDate($date, $area_id);
            $users = $this->orderUserModel->getUsersByOrder($order_date_id);
            $data[] = [
                'area_name' => $area['name_area'],
                'orders' => $users
            ];
        }

        // Ahora que tienes los datos, crea el PDF
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, "Listado de Ordenes por Area - Fecha: $date", 0, 1, 'C');

        foreach ($data as $area_data) {
            $pdf->SetFont('helvetica', 'B', 12);
            $pdf->Cell(0, 10, "Area: " . $area_data['area_name'], 0, 1);
            $pdf->SetFont('helvetica', 'B', 10);
            $pdf->Cell(10, 10, '#', 1);
            $pdf->Cell(70, 10, 'Nombre Completo', 1);
            $pdf->Cell(30, 10, 'Desayuno', 1);
            $pdf->Cell(30, 10, 'Almuerzo', 1);
            $pdf->Cell(30, 10, 'Cena', 1);
            $pdf->Ln();

            $pdf->SetFont('helvetica', '', 10);
            foreach ($area_data['orders'] as $index => $user) {
                $pdf->Cell(10, 10, $index + 1, 1);
                $pdf->Cell(70, 10, $user['fullname'], 1);
                $pdf->Cell(30, 10, $user['breakfast'] == 1 ? 'Sí' : 'No', 1);
                $pdf->Cell(30, 10, $user['lunch'] == 1 ? 'Sí' : 'No', 1);
                $pdf->Cell(30, 10, $user['dinner'] == 1 ? 'Sí' : 'No', 1);
                $pdf->Ln();
            }
            $pdf->Ln();
        }

        $pdf->Output('ordenes_por_area_' . $date . '.pdf','I');
    }
}
