PHP Alay Converter
===================

A simple class to convert normal text to "annoying" alay text 
Ported from [Alay Text Generator](http://alay.tk/s.js)

## Usage Example:

```php
<?php
include 'Alay.php';
$alay = new Alay('Masukkan kalimat yang ingin dijadikan Text ALAY disini.');

echo $alay->makeAlay();
```