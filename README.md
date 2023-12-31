To generate barcode images in Laravel, you can use the simple-qrcode package. Let's go through the process of installing and configuring it for your Laravel project.
Install the simple-qrcode Package:
Open a terminal and navigate to your Laravel project's root directory. Run the following command to install the simple-qrcode package:

composer require simplesoftwareio/simple-qrcode




Publish the Configuration File:
After installation, you need to publish the configuration file. Run the following command:

php artisan vendor:publish --provider="SimpleSoftwareIO\QrCode\QrCodeServiceProvider"




Check Composer Autoload:
Make sure that the simple-qrcode package is correctly autoloaded. In your Laravel project's root directory, open the composer.json file and ensure the following section is present:

"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/",
        "SimpleSoftwareIO\\QrCode\\": "vendor/simplesoftwareio/simple-qrcode/src/"
    }
},

Save the file and run the following command in your terminal to regenerate the autoload files:

composer dump-autoload




Update your produk.blade.php view file to include the barcode for each product. Replace the existing <td></td> for the "Barcode" column with the following code:

{!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate($pdk->kode); !!}





Check ServiceProvider Registration:
Confirm that the QrCodeServiceProvider is registered in your Laravel application. Open the config/app.php file, and check if the following line is present in the providers array:

SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,

If it's not there, add it to the providers array.
Check Facade Alias:
Open the config/app.php file, and ensure that the following alias is present in the aliases array:

'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,




Open the file located at vendor/simplesoftwareio/simple-qrcode/src/QrCodeServiceProvider.php.
Find the register method in the QrCodeServiceProvider class.
Update the method as follows:

public function register()
{
    $this->app->singleton('qrcode', function ($app) {
        return new BaconQrCodeGenerator;
    });
}

Replace the bindShared method with singleton.