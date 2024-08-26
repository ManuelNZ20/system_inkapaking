<?php
require_once('Pdf_Controller.php');
require_once('OrderDateController.php');

$order_date_controller = new OrderDateController();

$pdfController = new PdfController();

$date = date('Y-m-d');

if (isset($_GET['order_date_id']) && $_GET['order_date_id'] != -1) {
  $order_date_id = $_GET['order_date_id'];
  $date_order_filter = $order_date_controller->getOrderDateById($order_date_id)['date_order'];
} else {
  $order_date_id = $order_date_controller->getOrderDate($date, $area_id);
  $date_order_filter = $date;
}
// $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');


$pdfController->generatePdfByDate($date_order_filter);
?>