## Heroicons for Laravel Blade

Beautiful hand-crafted SVG icons, by the makers of Tailwind CSS, available as Laravel Blade components: 

![heroicons.com](docs/screen-capture.png)

## Installation

Add the Composer package to your project using the following command:

```shell
composer require osmianski/laravel-heroicons
```

## Usage

Find an icon at [heroicons.com](https://heroicons.com) under Outline, Solid or Mini category and add it to your Laravel Blade template using the following syntax:

```php
<div class="text-gray-400 hover:text-gray-500">
    <x-heroicons::outline.bell class="h-6 w-6" />
    <x-heroicons::solid.user class="h-8 w-8" />
</div>
```  

Here, the first word after `::` is the category (`outline`, `solid` or `mini`), the second is the name of the icon.

## Credits

All the Heroicons are originally created by [@tailwindlabs](https://github.com/tailwindlabs). They are later wrapped into Laravel Blade components by [@osmianski](https://github.com/osmianski).
   
## License

This package is open-sourced software licensed under the [MIT](LICENSE.md) license.
