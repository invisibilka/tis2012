<?php
/**
 * Komponent zabezpecuje posielanie emailov
 * @author V.Jurenka
 */
class MailSender extends CApplicationComponent
{
    /**
     * Posle emailom pisomku
     * @param $studentList - zoznam studentov
     * @param $user - od koho je email
     * @param $test - pisomka
     * @param $subject - predmet spravy
     * @param $_body - telo spravy
     */
    public static function sendEmails($studentList, $user, $test, $subject, $_body)
    {
        $html = Yii::app()->controller->renderPartial('_testpdf', array('model' => $test), true);
        //echo $html;
        $pdf =  PDFExport::createPDF($html, false);
        $data = chunk_split(base64_encode($pdf));

        $separator = md5(time());
        $eol = PHP_EOL;
        $filename = $test->name . '.pdf';


        //http://stackoverflow.com/a/4357828
        $headers = "From: " . $user->email . $eol;
        $headers .= "MIME-Version: 1.0" . $eol;
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"";

        $body = "--" . $separator . $eol;
        $body .= "Content-Transfer-Encoding: 7bit" . $eol . $eol;

        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
        $body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
        $body .= $_body . $eol;

        $body .= "--" . $separator . $eol;
        $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $body .= "Content-Transfer-Encoding: base64" . $eol;
        $body .= "Content-Disposition: attachment" . $eol . $eol;
        $body .= $data . $eol;
        $body .= "--" . $separator . "--";

        foreach($studentList->students as $student){
            mail($student->email, $subject, $body, $headers);
            //echo 'mail send to '.$student->email.'<br/>';
        }
    }

    /**
     * Zasle pozvanku
     * @author M Blascak, V.Jurenka
     * @param $email - komu poslat pozvanku
     * @param $hash - jedinecny hash pre kazdu pozvnaku
     */
    public static function sendInvitation($email, $hash)
    {
        $to = $email;
        $subject = 'Gumkacik pozvanka';
        $message = 'Boli ste pozvaný do systému Gumkáčik. Pomocou nasledujúceho odkazu sa môžete zaregistrovať: <br />' .
            '<a href="' . Yii::app()->baseUrl . '/user/register/hash/' . $hash . '">' . Yii::app()->baseUrl . '/user/register/hash/' . $hash . '</a>';
        $headers = "From: " . Yii::app()->params['adminEmail'] . "\r\nReply-To:" . Yii::app()->params['adminEmail'] . "\r\nContent-Type: text/html; charset=utf-8";

        mail($to, $subject, $message, $headers);
    }
}
