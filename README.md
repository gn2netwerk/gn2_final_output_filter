# gn2_shutdown_filter
Wordpress plugin that provides the custom filter `gn2_shutdown`. 

## Installation
Download *gn2_shutdown_filter.zip* from the current [Release](https://github.com/gn2netwerk/gn2_shutdown_filter/releases/latest) and upload via WordPress admin.

## Usage
```
add_filter('gn2_shutdown', function ($html) {
     
     // $html is the html sent to browser
     // your code
     
     return $html;
});
```