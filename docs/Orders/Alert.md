
# ORDER / ALERT

## GET ALERT LIST

**Endpoint :** `/api/order/alert/list?offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| platform  | paypal    | *Filter the data by platform name.  This field is optional.*|
| currency_code  | usd    | *Filter the data by currency code.  This field is optional.*|
| limit  | 20    | *Limit the data of records.  This field is required.*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20.  This field is required.* |

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** `N/A`

#### **Validation Rules :** 

##### **Request Params**

| Key    | Rules               |
| ------ | ------------------- |
| platform  | *string* |
| currency_code  | *string* |
| limit  | *required, numeric* |
| offset | *required, numeric* |

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
        "total_count": 20
    },
    "data": [
        {
            "id": 1,
            "platform": "ALIPAY",
            "currency_code": "AFN",
            "currency": "Afghani"
        },
        {
            "id": 2,
            "platform": "APPLE PAY",
            "currency_code": "ALL",
            "currency": "Lek"
        },
        {
            "id": 3,
            "platform": "GOOGLE PAY",
            "currency_code": "DZD",
            "currency": "Algerian Dinar"
        },
        {
            "id": 4,
            "platform": "SKRILL",
            "currency_code": "UYU",
            "currency": "Uruguayan Peso"
        },
        {
            "id": 5,
            "platform": "MONEYGRAM",
            "currency_code": "AOA",
            "currency": "Kwanza"
        },
        {
            "id": 6,
            "platform": "WESTERN UNION",
            "currency_code": "XCD",
            "currency": "Caribbean Dollar"
        },
        {
            "id": 7,
            "platform": "PAYPAL",
            "currency_code": "ARS",
            "currency": "ARGENTINA"
        },
        {
            "id": 8,
            "platform": "MASTERCARD",
            "currency_code": "AMD",
            "currency": "Armenian Dram"
        },
        {
            "id": 9,
            "platform": "BITCOIN",
            "currency_code": "AWG",
            "currency": "Aruban Florin"
        },
        {
            "id": 10,
            "platform": "REVOLUT",
            "currency_code": "AUD",
            "currency": "Australian Dollar"
        },
        {
            "id": 11,
            "platform": "PAXUM",
            "currency_code": "EUR",
            "currency": "Euro"
        },
        {
            "id": 12,
            "platform": "WECHAT PAY",
            "currency_code": "IDR",
            "currency": "Rupiah"
        },
        {
            "id": 13,
            "platform": "LINE",
            "currency_code": "USD",
            "currency": "US Dollar"
        },
        {
            "id": 14,
            "platform": "WHATSAPP",
            "currency_code": "CAD",
            "currency": "Canadian Dollar"
        },
        {
            "id": 15,
            "platform": "ETHEREUM",
            "currency_code": "CVE",
            "currency": "Cape Verdean Escudo"
        },
        {
            "id": 16,
            "platform": "RIPPLE",
            "currency_code": "KYD",
            "currency": "Cayman Islands Dollar"
        },
        {
            "id": 17,
            "platform": "USDT",
            "currency_code": "CLP",
            "currency": "Chilean Peso"
        },
        {
            "id": 18,
            "platform": "MONERO",
            "currency_code": "CNY",
            "currency": "Chinese Yuan"
        },
        {
            "id": 19,
            "platform": "VISA",
            "currency_code": "COP",
            "currency": "Colombian Peso"
        },
        {
            "id": 20,
            "platform": "AMEX",
            "currency_code": "KMF",
            "currency": "Comoro Franc"
        }
    ],
    "message": "Succesfully get alerts"
}
```

## DELETE ALERT

**Endpoint :** `/api/order/alert/delete`

**Method :** `DELETE` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 
```json
{
    "id":36523
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| id  | *required, numeric* |

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
    "data": [],
    "message": "Succesfully deleted alert"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/Orders/Alert.png)