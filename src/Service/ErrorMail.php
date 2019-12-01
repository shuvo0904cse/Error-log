<?php

namespace Shuvo\Errorlog\Service;

use Illuminate\Support\Facades\Mail;
use Shuvo\Errorlog\Mail\ErrorLog;
use Shuvo\Errorlog\models\Errorlog as ErrorlogModel;

class ErrorMail
{

    /**
     * Mail Send
     *
     * @param $message
     * @param $view
     * @param $controller
     * @param $method
     * @param $line_number
     * @param $file_path
     * @param $object
     * @param $type
     * @param $argument
     * @param $email
     */
    public static function mailSend($message,
                                    $view,
                                    $controller,
                                    $method,
                                    $line_number,
                                    $file_path,
                                    $object,
                                    $type,
                                    $argument,
                                    $email)
    {

        $domain = $_SERVER['HTTP_HOST'];

        $data = array(
            'exception_message' => $message,
            'method_name' => $method,
            'line_number' => $line_number,
            'file_path' => $file_path,
            'class' => $controller,
            'object' => $object,
            'type' => $type,
            'argument' => $argument,
            'email' => $email,
            'client' => 'client',
            'subject' => 'Error Notification',
            'prefix' => "",
            'domain' => $domain
        );

        //Mail Send
        Mail::to(config('errorlog.send_to_email'))
            ->cc(config('errorlog.send_cc_email'))
            ->bcc(config('errorlog.send_bcc_email'))->send(new ErrorLog($data));

        /*Save error to database*/
        $screenshot = '';
        $page_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        self::saveErrorLog(
            $controller . "  -  " . $method,
            $line_number,
            $file_path,
            $message,
            $object,
            $type,
            $screenshot,
            $page_url,
            $argument,
            "",
            $domain
        );
    }

    /**
     * Save Error Log in Database
     *
     * @param $method
     * @param $line_number
     * @param $file_path
     * @param $message
     * @param $object
     * @param $type
     * @param $screen_shot
     * @param $page_url
     * @param $argument
     * @param $prefix
     * @param $domain
     */
    private static function saveErrorLog(
        $method,
        $line_number,
        $file_path,
        $message,
        $object,
        $type,
        $screen_shot,
        $page_url,
        $argument,
        $prefix,
        $domain
    )
    {
        /*Save error to database*/
        ErrorlogModel::insert([
            "method_name" => $method,
            "line_number" => $line_number,
            "file_path" => $file_path,
            "exception_message" => $message,
            "object" => $object,
            "type" => $type,
            "screen_shot" => $screen_shot,
            "page_url" => $page_url,
            "arguments" => $argument,
            "prefix" => $prefix,
            "domain" => $domain,
        ]);
    }
}
