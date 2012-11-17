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
     */
    public static function sendEmails($studentList, $user, $test){

    }
    public static function sendInvitation($email, $hash){
        $to      = $email;
        $subject = 'the subject';
        $message = 'Boli ste pozvaný do systému Gumkáčik. Pomocou nasledujúceho odkazu sa môžete zaregistrovať: <br />' .
                   '<a href="localhost/tis2012/user/invite/hash/' . $hash . '">localhost/tis2012/user/invite/hash/' . $hash .  '</a>';
        $headers="From: webmaster@example.com\r\nReply-To:webmaster@example.com\r\nContent-Type: text/html; charset=utf-8";

        mail($to, $subject, $message, $headers);
    }
}
