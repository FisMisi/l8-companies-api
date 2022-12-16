# Laravel8-Companies-API

[![Testing](https://github.com/FisMisi/l8-companies-api/actions/workflows/test.yaml/badge.svg?branch=main)](https://github.com/FisMisi/l8-companies-api/actions/workflows/test.yaml)
[![Static code analysis](https://github.com/FisMisi/l8-companies-api/actions/workflows/static-code.yml/badge.svg?branch=main)](https://github.com/FisMisi/l8-companies-api/actions/workflows/static-code.yml)

## INSTALL

#### DATABASE

```php
php artisan migrate
```

#### IMPORT RECORDS FROM CSV

```php
php artisan import:companies
```

## Queries

Készíts egy olyan lekérdezést amely visszaadja, hogy 2001.01.01 napjától kezdve egészen a mai napig az adott napon mely cégek alakultak meg. (azon a napon ahol nem volt cég alapítás ott null értéket vegyen fel).

`postgresql`

```postgresql
WITH stats AS (
	select 
		date_trunc('day', foundation_date) AS created, 
		string_agg(name, ', ') AS companies
	from companies
	group by date_trunc('day', foundation_date)
)
SELECT 
	TO_CHAR(day::date, 'yyyy.mm.dd') as date, 
	stats.companies
FROM generate_series('2001.01.01' , now(), interval  '1 day') AS day
LEFT JOIN stats ON stats.created = day
ORDER BY day;
```

## REST API

### Get companies

---

Retrieve companies.

`GET /api/companies`

`GET /api/companies?companyId[]=1&companyId[]=3`

##### Fields

The input is **optional**

| Field        | Type              | Description |
|--------------|-------------------|-------------|
| companyId    | null &#124; array | You can pass company id one or more with query string.|

##### Request

```shell
curl --request GET \
  --url 'http://localhost:8088/api/companies?companyId%5B%5D=1&companyId%5B%5D=3' \
  --header 'Content-Type: application/json'
```

##### Response

```shell
< HTTP/1.1 200 OK
< Host: localhost:8088
< Date: Thu, 15 Dec 2022 13:02:31 GMT
< Connection: close
< X-Powered-By: PHP/8.1.13
< Cache-Control: no-cache, private
< Date: Thu, 15 Dec 2022 13:02:31 GMT
< Content-Type: application/json
< X-RateLimit-Limit: 60
< X-RateLimit-Remaining: 59
< Access-Control-Allow-Origin: *

{
"data": [
    {
        "id": 1,
        "name": "Mauris PC",
        "registration_number": "177874-5578",
        "foundation_date": "1990-05-01",
        "country": "Belarus",
        "zip_code": "71137",
        "city": "Villa Verde",
        "street_address": "P.O. Box 391, 1457 Sed St.",
        "latitude": "50.67063",
        "longitude": "-75.377",
        "owner": "Travis Elliott",
        "employees": 11,
        "activity": "Car",
        "active": 0,
        "email": "Donec.sollicitudin@Duisacarcu.com"
    },
    {
        "id": 3,
        "name": "Egestas Hendrerit Neque LLP",
        "registration_number": "615308-4733",
        "foundation_date": "1994-06-10",
        "country": "Western Sahara",
        "zip_code": "442580",
        "city": "Lagundo\/Algund",
        "street_address": "P.O. Box 857, 1455 Nullam Street",
        "latitude": "89.75893",
        "longitude": "-125.99941",
        "owner": "Todd Douglas",
        "employees": 230,
        "activity": "Building Industry",
        "active": 1,
        "email": "lacus.Quisque@posuerecubiliaCurae.org"
    }
]
}
```

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

### TESTS

Automated tests were made by [PEST testing framework](https://pestphp.com/).


```php
php artisan test
```
