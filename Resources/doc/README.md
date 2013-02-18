# 3scaleBundle

Integration of the 3scale php library into Symfony2

## Installation

Install the bundle:

    php composer.phar require tonivdv/3scale-bundle
    
Register the bundle in `app/AppKernel.php`:

``` php
<?php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new ToniVdv\ThreeScaleBundle\ThreeScaleBundle(),
    );
}
```

Configure the 3scale provider key in `app/config/config.yml`

``` yaml
# app/config/config.yml
three_scale:
  provider_key: your3scaleproviderkey
```

## Usage

``` php
<?php

class SomeController extends Controller {

  public function someAction() {
  
    /** @var $client \ThreeScaleClient */
    $client = $this->get('three_scale.client');
    
    $response = $client->authrep_with_user_key('user_key');
    
    ...
  
  }

}
```

For more information regarding the usage of ThreeScaleClient check https://github.com/3scale/3scale_ws_api_for_php.
