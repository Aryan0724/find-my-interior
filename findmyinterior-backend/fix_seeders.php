<?php
$content = file_get_contents('database/seeders/SupplierSeeder.php');
$content = preg_replace('/\'email\' => \'supplier(\d+)@example\.com\'/', "'email' => 'market_supplier$1@example.com'", $content);
file_put_contents('database/seeders/SupplierSeeder.php', $content);
echo "Fixed SupplierSeeder.php\n";
