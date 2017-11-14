Zorn_OptionalTelephone
===================
OptionalTelephone removes the telephone requirement in Magento 2

THIS IS NOT NEEDED IN MAGENTO 2.2 ANYMORE! There is an option in the backend to disable the telephone requirement.

When uninstalled the requirement will be re-established.

Installation
------------

### Via composer

Please go to the Magento2 root directory and run the following commands in the shell:

```
composer config repositories.zorn_optionaltelephone vcs git@github.com:zsoerenm/magento2-optionaltelephone.git
composer require zsoerenm/magento2-optionaltelephone
bin/magento module:enable Zorn_OptionalTelephone
bin/magento setup:upgrade
```
### Via manual install

Copy the source into
```
{Magento root}/app/code/Zorn/OptionalTelephone/
```
and run
```
bin/magento module:enable Zorn_OptionalTelephone
bin/magento setup:upgrade
```

Uninstall
------------

```
bin/magento module:uninstall Zorn_OptionalTelephone
bin/magento setup:upgrade
```
### Note
Currently there is known bug when uninstalling: [Magento2 - #3544](https://github.com/magento/magento2/issues/3544).
Instead remove the repository from your composer.json and run from root 
```
composer update
```

Also run this SQL statement:
```
UPDATE eav_attribute SET is_required=1 WHERE attribute_code='telephone';
```

Support
-------
If you encounter any problems or bugs, please create an issue on [GitHub](https://github.com/zsoerenm/magento2-optionaltelephone/issues).


Licence
-------
[GNU General Public License, version 3 (GPLv3)](http://opensource.org/licenses/gpl-3.0)

Copyright
---------
(c) 2017 Sören Zorn
