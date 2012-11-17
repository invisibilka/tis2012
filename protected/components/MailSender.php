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
        $message = 'hello' . $hash;
        $headers="From: blascak.milos@gmail.com\r\nReply-To:blascak.milos@gmail.com";

        mail($to, $subject, $message, $headers);
    }
}
