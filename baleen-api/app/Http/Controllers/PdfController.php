<?php

namespace App\Http\Controllers;

use PDF; // Assuming you have the PDF facade alias set up in config/app.php
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class PdfController extends Controller
{
    public function generatePdf($orderNumber)
    {
        try {
            // Fetch data from MySQL
            $data = Order::where('OrderNumber', $orderNumber)->firstOrFail();
            
            // Generate PDF using Dompdf
            $pdf = PDF::loadView('pdf.view', ['data' => $data]);

            // Save the PDF to the public/pdfs directory
            $pdfPath = 'pdfs/'.$orderNumber.'.pdf';
            $pdf->save(public_path($pdfPath));

            // To return the PDF as a response
            return $pdf->download($pdfPath);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error generating PDF: ' . $e->getMessage());

            // Return a more informative error response
            return response()->json(['error' => 'Failed to generate PDF. See logs for details.'], 500);
        }
    }
}
