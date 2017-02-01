<?php
namespace Zorn\OptionalTelephone\Model\Order\Address\Validator;

class Plugin
{
    public function afterValidateForCustomer($subject, $result) {
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
