# Processor Playground

A quick app that allowsyou to easily test payments to processor sandboxes


## Deployment

To deploy this project run

```bash
  composer install
  php artisan serve
```

One important thing you may need to do is install a cacert.pem file and attach it to your php.ini file

[Instruction to fix curl60](https://stackoverflow.com/questions/48971125/ssl-certificate-on-laravel-development/48974427#48974427)

Download the linked cacert.pem file
Use a full path reference to it in your php.ini file
```
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
curl.cainfo = "C:\tools\cacert.pem"
```
You may need to restart the server


## Installation

In the `storage/app/config/` folder there are example configuration files. These files are json and look like this


    {
        "gateway"				: "FirstData_Payeezy",
        "config"				: {
            ...
        },
        "transaction"			: {
            "description"   	: "Payment",
            "amount"     		: "12.00",
            "clientIp" 			: "127.0.0.1",
            "card"   			: {
                "name"			: "John Doe",
                "number"		: "4111111111111111",
                "expiryMonth"	: "12",
                "expiryYear"	: "22",
                "cvv"			: "411"
            }
        },
        "links": {
            ...
        }
    }

## How to use

You can copy these files and create new ones in this folder in order to execute test payments

Create as many files as you would like in this folder and keep track of the name.

go to `<url>/<name-of-file>` to view the output
#### Example

 `127.0.0.1/xfd ` will use the xfd.json file to send a payment

 `127.0.0.1/custom-ten-dollars` will use the custom-ten-dollars.json file credentials

The output will have a Laravel dump of the Request Data and the response object that is returned


### Gateway

The name of the gateway to make payments to

### Config

The test credentials for the gateway you want to pay to.

### Transaction

This is where you can enter in the deatils of a payment. The card info, amount, if its card or ach, etc.

### Links (Optional)

This section is a storage for links that are related to the processor



