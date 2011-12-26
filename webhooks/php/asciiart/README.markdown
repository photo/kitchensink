OpenPhoto / Webhook / ASCII Art Email
=======================
#### A webhook script to email ASCII art of your photos

### About this hack

This is a hack to show what can be done with the [OpenPhoto webhook API][webhookapi].

By subscribing to the _photo.upload_ topic you can specify a callback URL which gets POSTed to each time a new photo is uploaded.

### About the files

* [index.php][index], This is a static file that gets the user's email address and directs the user to create an OAuth application on their OpenPhoto site.
* [oauth.php][oauth], This handles the OAuth flow and stores a few pieces of information.
    * Exchanges unauthorized OAuth token for an authorized one. [Source][accessexchange]
    * Stores the user's email address in the database so we know where to send the email. [Source][storeemail]
    * Creates a webhook subscription to the `photo.upload` topic with a callback url. [Source][webhooksubscribe]
* [callback.php][callback], This is the callback URL for the webhook and performs two actions.
    * If the request is a `GET` then it [validates the original subscription request][webhookvalidation].
    * If the request is a `POST` then it gets the photo data and passes it to a web service that returns ASCII and emails it to the user.
* [schema.sql][mysqlschema], A simple one table database to store the user's email address and associated UUID.

[webhookapi]: https://github.com/openphoto/frontend/blob/master/documentation/api/PostWebhookSubscribe.markdown
[index]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/index.php
[oauth]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/oauth.php
[callback]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/callback.php
[mysqlschema]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/schema.sql
[webhookvalidation]: https://github.com/openphoto/frontend/blob/master/documentation/api/PostWebhookSubscribe.markdown#verification
[accessexchange]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/oauth.php#L24
[storeemail]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/oauth.php#L28
[webhooksubscribe]: https://github.com/openphoto/kitchensink/blob/master/webhooks/asciiart/oauth.php#L33