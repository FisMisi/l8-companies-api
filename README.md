# Laravel8-Companies-API

## INSTALL

#### DATABASE

```php
php artisan migrate
```

#### IMPORT RECORDS FROM CSV

```php
php artisan import:companies
```

## REST API

### Get companies

---

Retrieve all companies.

`GET /api/companies`

You can pass company id one or more with query string. 
E.g.:

`GET /api/companies?companyId[]=1&companyId[]=3`

### Create company

---

`POST /api/companies`

##### Fields

| Field               | Type                 |
|---------------------|----------------------|
| name                | string               |
| registration_number | string               |
| foundation_date     | date                 |
| country             | string               |
| zip_code            | string               |
| city                | string               |
| street_address      | string               |
| latitude            | string               |
| longitude           | string               |
| owner               | string               |
| employees           | integer              |
| activity            | string               |
| active              | boolean              |
| email               | string               |
| password            | string               |

##### Request

```shell
curl --request POST \
  --url http://localhost:8088/api/companies \
  --header 'Accept: application/json' \
  --header 'Content-Type: multipart/form-data' \
  --form name=Foo \
  --form registration_number=123456-123 \
  --form foundation_date=2011-11-21 \
  --form country=Hungary \
  --form zip_code=6200 \
  --form 'city=Kiskőrös' \
  --form 'street_address=Petőfi tér 7.' \
  --form latitude=46.62092901870049 \
  --form longitude=19.2847688278822 \
  --form owner=owner \
  --form employees=12 \
  --form activity=bar \
  --form active=1 \
  --form email=foo@bar.com \
  --form password=password \
  --form =
```

##### Response

```shell
< HTTP/1.1 201 Created
< Host: localhost:8088
< Date: Thu, 15 Dec 2022 11:05:18 GMT
< Connection: close
< X-Powered-By: PHP/8.1.13
< Cache-Control: no-cache, private
< Date: Thu, 15 Dec 2022 11:05:18 GMT
< Content-Type: application/json
< X-RateLimit-Limit: 60
< X-RateLimit-Remaining: 58
< Access-Control-Allow-Origin: *

 {}
```

### Update company

---

`PATCH /api/companies/{company}`

##### Fields

| Field               | Type                 |
|---------------------|----------------------|
| name                | string               |
| registration_number | string               |
| country             | string               |
| zip_code            | string               |
| city                | string               |
| street_address      | string               |
| latitude            | string               |
| longitude           | string               |
| owner               | string               |
| employees           | integer              |
| activity            | string               |
| active              | boolean              |
| email               | string               |
| password            | null &#124; string   |

##### Request

```shell
curl --request POST \
  --url 'http://localhost:8088/api/companies/1?_method=PATCH' \
  --header 'Accept: application/json' \
  --header 'Content-Type: multipart/form-data' \
  --form name=NewFoo \
  --form registration_number=123456-123 \
  --form country=Hungary \
  --form zip_code=6200 \
  --form 'city=Kiskőrös' \
  --form 'street_address=Petőfi tér 7.' \
  --form latitude=46.62092901870049 \
  --form longitude=19.2847688278822 \
  --form owner=owner \
  --form employees=12 \
  --form activity=bar \
  --form active=1 \
  --form email=foo@bar.com \
  --form password=newpassword
```

##### Response

```shell
< HTTP/1.1 200 OK
< Host: localhost:8088
< Date: Thu, 15 Dec 2022 11:00:22 GMT
< Connection: close
< X-Powered-By: PHP/8.1.13
< Cache-Control: no-cache, private
< Date: Thu, 15 Dec 2022 11:00:22 GMT
< Content-Type: application/json
< X-RateLimit-Limit: 60
< X-RateLimit-Remaining: 59
< Access-Control-Allow-Origin: *

{}
```
