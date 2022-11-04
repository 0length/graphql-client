Graphql-Client is a graphql client package for Laravel that you can use to consume Graphql API.

## How to use

This package is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "0length/graphql-client": "^2.0"
    }
}
```

and run composer to update the dependencies `composer update`.

Then open your Laravel config file config/app.php and in the `$providers` array add the service provider for this package.

```php
\Zerolength\Graphql\GraphqlServiceProvider::class
```

Finally generate the configuration file running in the console:
```
php artisan vendor:publish --tag=config
```

## Example
```php
<?php

namespace App\Graphql\Queries;

use App\Graphql\GraphqlQueries;
use App\Models\CS;

class CSQueries extends GraphqlQueries
{


    /**
     * Generate privately subscription session key for CS.
     */
    public function createSession(CS $cs)
    {
        $this->setPayload(
            __FUNCTION__,
            [
                'data' => $cs
            ],
            '
                query ' . __FUNCTION__ . 'Operation($data: SessionDataInput!){
                    ' . __FUNCTION__ . '(data: $data)
                }
            '
        );
        return $this->execute();
    }
}
```
