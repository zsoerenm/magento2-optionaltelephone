<?php
namespace Zorn\OptionalTelephone\Model\Order\Address;

/**
 * Class Validator
 */
class Validator extends \Magento\Sales\Model\Order\Address\Validator
{
    /**
     * Validate address attribute for customer creation
     *
     * @return bool|array
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     *
     * @param Address $address
     */
    public function validateForCustomer(Address $address)
    {
        if ($address->getShouldIgnoreValidation()) {
            return true;
        }

        $errors = [];

        if ($this->isEmpty($address->getFirstname())) {
            $errors[] = __('Please enter the first name.');
        }
        if ($this->isEmpty($address->getLastname())) {
            $errors[] = __('Please enter the last name.');
        }
        if ($this->isEmpty($address->getStreetLine(1))) {
            $errors[] = __('Please enter the street.');
        }
        if ($this->isEmpty($address->getCity())) {
            $errors[] = __('Please enter the city.');
        }

        $countryId = $address->getCountryId();

        if ($this->isZipRequired($countryId) && $this->isEmpty($address->getPostcode())) {
            $errors[] = __('Please enter the zip/postal code.');
        }
        if ($this->isEmpty($countryId)) {
            $errors[] = __('Please enter the country.');
        }
        if ($this->isStateRequired($countryId) && $this->isEmpty($address->getRegionId())) {
            $errors[] = __('Please enter the state/province.');
        }

        return empty($errors) ? true : $errors;
    }
}
