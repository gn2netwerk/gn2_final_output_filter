# gn2_shutdown_filter
Wordpress plugin that provides the custom filter `gn2_shutdown`. 

## Usage
```
add_filter('gn2_shutdown', function ($html) {
     
     // $html is the html sent to browser
     // your code
     
     return $html;
});
```