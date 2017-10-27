<?php

class Stas_Info_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isEmpty($array, $field)
    {
        if (empty($array[$field])) {
            return ucfirst($field)." is required";
        }
        return false;
    }

    public function emailValidate($array, $field)
    {
        $emptyMessage = $this->isEmpty($array, $field);
        if ($emptyMessage) {
            return $emptyMessage;
        }
        if (!filter_var($array[$field], FILTER_VALIDATE_EMAIL)) {
            return "Email must be written in correct way";
        }
        return false;
    }

    public function phoneValidate($array, $field)
    {
        $emptyMessage = $this->isEmpty($array, $field);
        if ($emptyMessage) {
            return $emptyMessage;
        }
        if (!ctype_digit(strval($array[$field])) && mb_strlen($array[$field]) != 10) {
            return "Invalid phone";
        }
        return false;
    }

    public function nameValidate($array, $field)
    {
        $emptyMessage = $this->isEmpty($array, $field);
        if ($emptyMessage) {
            return $emptyMessage;
        }
        if (!ctype_alnum(strval($array[$field]))) {
            return "Name can contain letters and digits only and can not be longer than 20 characters";
        }

        if (mb_strlen($array[$field]) > 20) {
            return "Name can contain letters and digits only and can not be longer than 20 characters";
        }
        return false;
    }
}
