## LaravelWhoopsCSS
[![Build Status](https://travis-ci.org/Crinsane/LaravelWhoopsCSS.svg?branch=master)](https://travis-ci.org/Crinsane/LaravelWhoopsCSS)

Would you, like me, like to have the old orange Whoops error page back in you Laravel 4.2 application? This is the package for you!

## Installation

Install the package through [Composer](http://getcomposer.org/). Edit your project's `composer.json` file by adding:

```php
"require": {
	"laravel/framework": "4.1.*",
	"gloudemans/laravel-whoops-css": "dev-master"
}
```

Next, run the Composer update command from the Terminal:

    composer update

Now all you have to do is add the service provider of the package and alias the package. To do this open your `app/config/app.php` file.

Add a new line to the `service providers` array:

	'Gloudemans\LaravelWhoopsCSS\LaravelWhoopsCSSServiceProvider'

Now you have access to a new Artisan command to copy the orange css styles back to the Whoops resources directory:

	php artisan whoops:copy
  
If you want to set your application up to update these styles every time Whoops is updated, add these commands to the `post-install-cmd` and `post-update-cmd`.

	"post-install-cmd": [
		"php artisan clear-compiled",
		"php artisan whoops:copy",
		"php artisan optimize"
	],
	"post-update-cmd": [
		"php artisan clear-compiled",
		"php artisan whoops:copy",
		"php artisan optimize"
	]
