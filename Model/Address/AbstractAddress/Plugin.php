<?php
namespace Zorn\OptionalTelephone\Model\Address\AbstractAddress;

class Plugin
{
    public function afterValidate($subject, $result) {
        if(!is_array($result)) {
            return $result;
        }
        $key = array_search(__('Please enter the phone number.'), $result);
        if ($key !== false) {
            unset($result[$key]);
        }
        if(empty($result)) {
            return true;
        }
        return array_values($result);
    }
}