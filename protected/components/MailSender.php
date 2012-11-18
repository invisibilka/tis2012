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

    /**
     * @author M Blascak, V.Jurenka
     * @param $email - komu poslat pozvanku
     * @param $hash - jedinecny hash pre kazdu pozvnaku
     */
    public static function sendInvitation($email, $hash){
        $to      = $email;
        $subject = 'Gumkacik pozvanka';
        $message = 'Boli ste pozvaný do systému Gumkáčik. Pomocou nasledujúceho odkazu sa môžete zaregistrovať: <br />' .
                   '<a href="'.Yii::app()->baseUrl.'/user/register/hash/' . $hash . '">'.Yii::app()->baseUrl.'/user/register/hash/' . $hash .  '</a>';
        $headers="From: ".Yii::app()->params['adminEmail']."\r\nReply-To:".Yii::app()->params['adminEmail']."\r\nContent-Type: text/html; charset=utf-8";

        mail($to, $subject, $message, $headers);
    }
}
