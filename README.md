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
### Update company

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
