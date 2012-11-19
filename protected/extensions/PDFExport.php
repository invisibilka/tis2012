<?php
/**
 * Komponent zabezpecuje exportovanie do PDF suborou
 * @author V.Jurenka
 */
class PDFExport
{
    /**
     * Vytvori PDF dokument z daneho testu
     * @param $test - test
     * @return vracia PDF dokument
     */
    public static  function createPDF($test){
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->writeHtmlCell( 0, 10, 10, 10, $test);
        $pdf->output('example.pdf', 'I');
    }
}
