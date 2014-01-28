Response Builder
========

Let's say, you're building an API for you application.
You need to:
* Return responses in few formats
* Want to have ability to version reponse body schema
*  ... have ability to version reponse headers schema
*  ... have simple Response Factory API and use predefined responses

... then this library might come useful. All implemented in OO manner. Have fun.

## Installation
Installation is fairly simple. We recommend using *composer*.

### Use composer

If you don't have Composer yet, download it following the instructions on http://getcomposer.org/ or just run the following command:

```
curl -s http://getcomposer.org/installer | php
```
After composer is installed add package running following in root dir of your project:

```
# Composer will automaticaly download & install & modify your composer.json
composer require wotek/response-builder:dev-master
```

### Clone repository

If you're not fan of composer. You can just *clone* repository.

```
# Clones repository to settings folder
git clone git@github.com:wotek/response-builder.git .
```