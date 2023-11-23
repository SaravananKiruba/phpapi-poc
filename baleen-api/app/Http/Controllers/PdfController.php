<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Order;

class PdfController extends Controller
{
    public function generatePdf($orderNumber)
    {
        // Fetch data from MySQL
        $data = Order::where('OrderNumber', $orderNumber)->first();
        
        if (!$data) {
            // Generate PDF using Dompdf
            $pdf = PDF::loadView('pdf.view', ['data' => $data]);

            // Save or return the PDF as needed
            // For example, to save the PDF:
            // $pdf->save(public_path('pdfs/your_file.pdf'));

            // To return the PDF as a response
            return $pdf->download($orderNumber . '.pdf');
        }

        return response()->json(['error' => 'Order not found.'], 404);
    }
}
