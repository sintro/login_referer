login_referer
===============
___
#### Roundcube Webmail Plugin Login Referer.

## Description
Plugin to redirect to referer url, presented in query param `referer` on login page (like `http://example.com/roundcubemail?referer=http://localhost`)
If current login page url has no `referer` param, nothing special will happen.
This plugin can be usefull if you use Roundcube's to authenticate in some other system. 
## Installation
Download and install via http://plugins.roundcube.net
Just add 
```
"sintro/login_referer": "~1.0.0"
```
to your `composer.json` require section in Roundcube directory and then launch `composer.phar install`. You can take template composer.json [here](https://github.com/roundcube/roundcubemail/blob/master/composer.json-dist) if you don't have it already.
## Configuration
You can set optional referer param name directly in Roundcube's main config file or via [host-specific](http://trac.roundcube.net/wiki/Howto_Config/Multidomains) configurations:

```php
$config['login_referer_param'] = 'referer';
```
Homepage: https://plugins.roundcube.net/packages/sintro/login_referer