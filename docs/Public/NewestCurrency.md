# PUBLIC / NEWEST CURRENCY

## NEWEST CURRENCY

**Endpoint :** `/api/public/newest_currency?limit=20`

**Method :** `GET`

**Params :**

| Key   | Value | Description                     |
| ----- | ----- | ------------------------------- |
| limit | 20     | *Limit the display of row data* |

**Headers :** 

| Key          | Value            | Description                                           |
| ------------ | ---------------- | ----------------------------------------------------- |
| Content-Type | application/json | *Tell the server what type of data is actually sent.* |
| Accept       | application/json | *Tell the server what type of data is accept.*        |

**Payload :** `N/A`

#### **Validation Rules :** 

**Request Params**

| Key    | Rules               |
| ------ | ------------------- |
| limit  | *required, numeric* |
| offset | *required, numeric* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 200 OK`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 OK`
`X-RateLimit-Limit: 60`
`X-RateLimit-Remaining: 56`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 200 - OK                        | Status Success.                                              |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed.                                               |
| X-RateLimit-Limit     | 60                              | The maximum number of requests you're permitted to make per hour. |
| X-RateLimit-Remaining | 56                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "meta_data": {
        "total_count": 20
    },
    "data": [
        {
            "currency_code": "AFN",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Afghanistan.svg/35px-Flag_of_Afghanistan.svg.png"
        },
        {
            "currency_code": "ALL",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Flag_of_Albania.svg/32px-Flag_of_Albania.svg.png"
        },
        {
            "currency_code": "DZD",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_Algeria.svg/35px-Flag_of_Algeria.svg.png"
        },
        {
            "currency_code": "UYU",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/35px-Flag_of_Uruguay.svg.png"
        },
        {
            "currency_code": "AOA",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Flag_of_Angola.svg/35px-Flag_of_Angola.svg.png"
        },
        {
            "currency_code": "XCD",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Anguilla.svg/35px-Flag_of_Anguilla.svg.png"
        },
        {
            "currency_code": "ARS",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/35px-Flag_of_Argentina.svg.png"
        },
        {
            "currency_code": "AMD",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Flag_of_Armenia.svg/35px-Flag_of_Armenia.svg.png"
        },
        {
            "currency_code": "AWG",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Aruba.svg/35px-Flag_of_Aruba.svg.png"
        },
        {
            "currency_code": "AUD",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_Australia_%28converted%29.svg/35px-Flag_of_Australia_%28converted%29.svg.png"
        },
        {
            "currency_code": "EUR",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/35px-Flag_of_Europe.svg.png"
        },
        {
            "currency_code": "IDR",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/35px-Flag_of_Indonesia.svg.png"
        },
        {
            "currency_code": "USD",
            "flag": "https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/35px-Flag_of_the_United_States.svg.png"
        },
        {
            "currency_code": "CAD",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Canada_%28Pantone%29.svg/35px-Flag_of_Canada_%28Pantone%29.svg.png"
        },
        {
            "currency_code": "CVE",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Cape_Verde.svg/35px-Flag_of_Cape_Verde.svg.png"
        },
        {
            "currency_code": "KYD",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_the_Cayman_Islands.svg/35px-Flag_of_the_Cayman_Islands.svg.png"
        },
        {
            "currency_code": "CLP",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/35px-Flag_of_Chile.svg.png"
        },
        {
            "currency_code": "CNY",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/35px-Flag_of_the_People%27s_Republic_of_China.svg.png"
        },
        {
            "currency_code": "COP",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/35px-Flag_of_Colombia.svg.png"
        },
        {
            "currency_code": "KMF",
            "flag": "https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Flag_of_the_Comoros.svg/35px-Flag_of_the_Comoros.svg.png"
        }
    ],
    "message": "Succesfully get newest currency"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/NewestCurrencies.png)