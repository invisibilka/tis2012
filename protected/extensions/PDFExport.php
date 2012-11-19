<?php
/**
 * Komponent zabezpecuje exportovanie do PDF suborou
 * @author V.Jurenka, K Ivanyiova
 */
class PDFExport
{
    /**
     * Vytvori PDF dokument z daneho testu
     * @param $html - html
     */
    public static function createPDF($html){
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->writeHtmlCell( 0, 10, 10, 10, $html);
        $pdf->output('example.pdf', 'I');
    }
}
