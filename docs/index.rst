Response Builder
================

|Build Status| |Coverage Status|

Let's say, you're building an API for you application. You need to: \*
Return responses in few formats \* Want to have ability to version
reponse body schema \* have ability to version reponse headers schema \*
have simple Response Factory API and use predefined responses

Installation
------------

Installation is fairly simple. We recommend using *composer*.

Use composer
~~~~~~~~~~~~

If you don't have Composer yet, download it following the instructions
on http://getcomposer.org/ or just run the following command:

.. code:: bash

    curl -s http://getcomposer.org/installer | php

After composer is installed add package running following in root dir of
your project:

.. code:: bash

    # Composer will automaticaly download & install & modify your composer.json
    composer require wotek/response-builder:dev-master

Clone repository
~~~~~~~~~~~~~~~~

If you're not fan of composer. You can just *clone* repository.

.. code:: bash

    # Clones repository to settings folder
    git clone git@github.com:wotek/response-builder.git .

Documentation
-------------

-  `Installation <doc/installation.md>`__
-  `Usage <doc/usage.md>`__
-  `Creating Factories <doc/creating_factories.md>`__
-  `Response Prototypes <doc/response_prototypes.md>`__
-  `Response Serialiers <doc/creating_serializers.md>`__
-  `Complete Example <doc/complete_example.md>`__
-  `Howto's <doc/howto.md>`__

License
-------

The MIT License (MIT)

Copyright (c) 2014 Wojciech Zalewski

Permission is hereby granted, free of charge, to any person obtaining a
copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

.. |Build Status| image:: https://travis-ci.org/wotek/response-builder.png?branch=master
   :target: https://travis-ci.org/wotek/response-builder
.. |Coverage Status| image:: https://coveralls.io/repos/wotek/response-builder/badge.png?branch=master
   :target: https://coveralls.io/r/wotek/response-builder?branch=master
