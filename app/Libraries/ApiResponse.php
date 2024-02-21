<?php

namespace App\Libraries;

ini_set("precision", 14);
ini_set("serialize_precision", -1);


class ApiResponse
{
    private function _set_header($header)
    {
        switch ($header) {
            case 'json': {
                    return header('Content-Type: application/json');
                }
        }
    }
    private function _json_encode($data, $header = 'json')
    {
        $this->_set_header($header);
        return json_encode($data);
    }


    public function error($message = 'ERROR', $response = NULL, $array = NULL)
    {
        if ($response !== false && is_array($message)) {
            $data = [
                'error' => true,
                'message' => $this->strip_tags_array($response),
                'response' => (is_array($message)) ? $message : false
            ];
        } else {
            $data = [
                'error' => true,
                'message' => $this->strip_tags_array($message),
                'response' => $this->strip_tags_array($response)
            ];
        }

        $data = ($array) ? array_merge($data, $array) : $data;
        return $this->_json_encode($data);
    }
    public function success($message = 'SUCCESS', $response = NULL, $array = NULL)
    {
        if ($response !== false && is_array($message)) {
            $data = [
                'error'     => false,
                'message'   => ($response) ? $this->strip_tags_array($response) : false,
                'response'  => ($response) ? ((is_array($message)) ? $message : false) : false
            ];
        } else {
            $data = [
                'error'     => false,
                'message'   => ($message) ? $this->strip_tags_array($message) : false,
                'response'  => ($response) ? $this->strip_tags_array($response) : false,
            ];
        }

        $data = ($array) ? array_merge($data, $array) : $data;
        return $this->_json_encode($data);
    }

    private function strip_tags_array($array)
    {
        $array = json_decode(json_encode($array), true);

        if ($array == null)
            return $this->_json_encode($array);

        $result = array();
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $result[$key] = $this->strip_tags_array($value);
                } else if (is_string($value)) {
                    $result[$key] = strip_tags($value);
                } else if (is_numeric($value)) {
                    $result[$key] = $value;
                } else {
                    $result[$key] = $value;
                }
            }
        } else if (is_numeric($array)) {
            return $array;
        } else {
            return strip_tags($array);
        }
        return $result;
    }
}
