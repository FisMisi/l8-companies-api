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
