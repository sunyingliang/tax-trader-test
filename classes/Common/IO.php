<?php

namespace TT\Common;

class IO
{
    public static function initResponseArray()
    {
        return [
            "status" => "success"
        ];
    }

    public static function formatResponseArray($responseArr)
    {
        return [
            "response" => $responseArr
        ];
    }

    public static function getQueryParameters()
    {
        return $_GET;
    }

    public static function getPostParameters()
    {
        $contentType = '';

        if (isset($_SERVER['CONTENT_TYPE'])) {
            $contentType = strtolower($_SERVER['CONTENT_TYPE']);
        }

        if (strpos($contentType, 'json') !== false) {
            $input = json_decode(file_get_contents('php://input'), true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $input = null;
            }
        } else {
            $input = $_POST;
        }

        return $input;
    }

    public static function required($data, $mandatory = null, $strict = false)
    {
        $retValue = [
            'valid'   => false,
            'message' => ''
        ];

        if (is_string($data)) {
            if (defined($data)) {
                $data = constant($data);
            } else {
                $retValue['message'] = 'The given data does not exist';
                return $retValue;
            }
        }

        $required = [];

        if (!isset($data) || !is_array($data)) {
            $retValue['message'] = 'The given data must be a valid array';
        }

        foreach ($mandatory as $item) {
            if (!isset($data[$item])) {
                $required[] = $item;
            } else if ($strict && empty($data[$item])) {
                $required[] = $item;
            }
        }

        if (empty($required)) {
            return ['valid' => true];
        } else {
            $retValue['message'] = 'Required parameters: ' . implode(', ', $required);
        }

        return $retValue;
    }

    public static function message($msg, $object = null, $die = false)
    {
        echo '[' .  date('Y-m-d H:i:s') . ']' . $msg . PHP_EOL;
        
        if (!empty($object)) {
            print_r($object);
            echo PHP_EOL;
        }

        if ($die) {
            exit();
        }
    }

    public static function writeFile($location, $mode, $data)
    {
        $handler = fopen($location, $mode) or self::message("Unable to open " . $location . " for writing", 0, true);
        fwrite($handler, $data);
        fclose($handler);
    }
}