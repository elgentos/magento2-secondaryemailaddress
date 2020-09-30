# Elgentos SecondaryEmailAddress

`elgentos/magento2-secondaryemailaddress`

This extension adds a customer attribute called `secondary_email`, which can be filled during account creation. This email address can then (in addition to the normal customer email address) be used for logging in. The extension is configurable under System > Config > Customer > Secondary Email Address.

When the secondary email address has been configured for a customer, all emails (order confirmation, invoice, shipments, credits, etc) will be sent to that email address instead of the main email address.

## License & attribution

This extension is licensed under OSL-3.0. It uses code from [semaio/magento2-advancedlogin](https://github.com/semaio/Magento2-AdvancedLogin).

## Todo

- Add input field in checkout (plus configuration yes/no)
- Add config options to enable/disable re-routing email to secondary email per email type (order, invoice, etc)
