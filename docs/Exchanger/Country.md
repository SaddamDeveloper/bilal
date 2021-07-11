# EXCHANGER / COUNTRY

## LIST CURRENCIES BY COUNTRY

**Endpoint :** `/api/exchanger/country?published=1&offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |                       
| limit  | 20    | *Limit the data of records.*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20.* |
| published | 1     | *Get list currencies by country with status published, `1` means published, and `0` unpublished, if no `published` param it will show a list of currencies with all statuses* |

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |

**Payload :** `N/A`

#### **Validation Rules :** 

##### **Request Params**

| Key    | Rules               |
| ------ | ------------------- |
| limit  | *required, numeric* |
| offset | *required, numeric* |
| published | *required, numeric*|

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 200 OK`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 OK`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 200 - OK                        | Status Success                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "meta_data": {
        "page": 1,
        "total_count": 17
    },
    "data": [
        {
            "country": "AFGHANISTAN",
            "currency": "Afghani",
            "currency_code": "AFN",
            "published": 1
        },
        {
            "country": "ALBANIA",
            "currency": "Lek",
            "currency_code": "ALL",
            "published": 1
        },
        {
            "country": "ALGERIA",
            "currency": "Algerian Dinar",
            "currency_code": "DZD",
            "published": 1
        },
        {
            "country": "AMERICAN SAMOA",
            "currency": "US Dollar",
            "currency_code": "USD",
            "published": 1
        },
        {
            "country": "ANDORRA",
            "currency": "Euro",
            "currency_code": "EUR",
            "published": 1
        },
        {
            "country": "ANGOLA",
            "currency": "Kwanza",
            "currency_code": "AOA",
            "published": 1
        },
        {
            "country": "ANGUILLA",
            "currency": "Caribbean Dollar",
            "currency_code": "XCD",
            "published": 1
        },
        {
            "country": "ANTARTICA",
            "currency": "N/A",
            "currency_code": "N/A",
            "published": 1
        },
        {
            "country": "ANTIGUA AND BARBUDA",
            "currency": "East Caribbean Dollar",
            "currency_code": "XCD",
            "published": 1
        },
        {
            "country": "ARGENTINA",
            "currency": "ARGENTINA",
            "currency_code": "ARS",
            "published": 1
        },
        {
            "country": "ARMENIA",
            "currency": "Armenian Dram",
            "currency_code": "AMD",
            "published": 1
        },
        {
            "country": "ARUBA",
            "currency": "Aruban Florin",
            "currency_code": "AWG",
            "published": 1
        },
        {
            "country": "AUSTRALIA",
            "currency": "Australian Dollar",
            "currency_code": "AUD",
            "published": 1
        },
        {
            "country": "AUSTRIA",
            "currency": "Euro",
            "currency_code": "EUR",
            "published": 1
        },
        {
            "country": "EUROPEAN UNION",
            "currency": "Euro",
            "currency_code": "EUR",
            "published": 1
        },
        {
            "country": "INDONESIA",
            "currency": "Rupiah",
            "currency_code": "IDR",
            "published": 1
        },
        {
            "country": "UNITED STATES OF AMERICA",
            "currency": "US Dollar",
            "currency_code": "USD",
            "published": 1
        }
    ],
    "message": "Succesfully get currencies"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/Exchanger/Country.png)