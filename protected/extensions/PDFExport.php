<?php
/**
 * Komponent zabezpecuje exportovanie do PDF suborou
 * @author V.Jurenka, K Ivanyiova
 */


class PDFExport
{    /**
     * Vytvori PDF dokument z daneho testu
     * @param $html - html
     * @param bool $display zobrazit pdf v browsery
     * @return string pdf dokument
     */
    public static function createPDF($html, $display = true){
        $pdf = new TCPDF();
        $pdf->SetFont('dejavuserif', '', 10);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $css='<style type="text/css">
        img { clear: both;

       }
        </style>';
        //$html = $css . $html;
        //$pdf->writeHtmlCell( 0, 10, 10, 10, $html);
        $pdf->writeHTML($html, true, false, true, false, '');
        return $display ? $pdf->output('example.pdf', 'I') :  $pdf->output('example.pdf', 'S');
        //echo $html;
    }
}
