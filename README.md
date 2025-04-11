# RCE Fix

This plugin mitigates the critical RCE vulnerability found in Craft CMS by automatically blocking any request that includes __class 
in the request body. Designed for Craft CMS >= 3.9.4 and >= 4.4.15, 
it prevents malicious controllers from executing arbitrary code, offering an essential 
security layer until you can upgrade to the official fixed versions (3.9.15, 4.14.15, and 5.6.17).

## Requirements

This plugin requires Craft CMS 3, 4 or 5 and PHP 8.0

## Installation with DDEV

```bash
ddev composer require fredmansky/craft-rce-fix && ddev craft plugin/install rce-fix
```

## Installation with PHP

```bash
composer require fredmansky/craft-rce-fix && php craft plugin/install rce-fix
```
