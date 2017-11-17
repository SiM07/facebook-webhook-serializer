facebook-webhook-serializer
===========================

This library simplify deserialization of Facebook webhook content request.

Usage
-----

```php

$serializer = new \SiM07\WebhookSerializer();
$request = file_get_contents('php://input');

$webhook = $serializer->deserialize($request);

```

