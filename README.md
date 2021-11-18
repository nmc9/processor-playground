
# Processor Playground

A quick app that allowsyou to easily test payments to processor sandboxes


## Deployment

To deploy this project run

```bash
  composer install
  php artisan serve
```

One important thing you may need to do is install a cacert.pem file and attach it to your php.ini file

[Instructions](https://stackoverflow.com/questions/48971125/ssl-certificate-on-laravel-development/48974427#48974427)

Download the linked cacert.pem file
Use a full path reference to it in your php.ini file
```
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
curl.cainfo = "C:\tools\cacert.pem"
```
You may need to restart the server
