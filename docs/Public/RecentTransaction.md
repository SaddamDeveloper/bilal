# PUBLIC / RECENT TRANSACTION

## RECENT TRANSACTION

**Endpoint :** `/api/public/recent_exchange?limit=20&offset=1`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| limit  | 20    | *Limit the data of records*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20.* |

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
| Status                | 200 - OK                        | Status Success                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 60                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 56                              | The number of the requests remaining in the current rate window. |
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
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "AFN",
            "platform": "ALIPAY",
            "rates": "+1%",
            "amount": "100.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "ALL",
            "platform": "APPLE PAY",
            "rates": "+2%",
            "amount": "200.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "DZD",
            "platform": "GOOGLE PAY",
            "rates": "+3%",
            "amount": "300.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "UYU",
            "platform": "SKRILL",
            "rates": "+4%",
            "amount": "400.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "AOA",
            "platform": "MONEYGRAM",
            "rates": "+5%",
            "amount": "500.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "XCD",
            "platform": "WESTERN UNION",
            "rates": "+6%",
            "amount": "600.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "ARS",
            "platform": "PAYPAL",
            "rates": "+7%",
            "amount": "700.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "AMD",
            "platform": "MASTERCARD",
            "rates": "+8%",
            "amount": "800.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "AWG",
            "platform": "BITCOIN",
            "rates": "+9%",
            "amount": "900.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "AUD",
            "platform": "REVOLUT",
            "rates": "+1%",
            "amount": "1000.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "EUR",
            "platform": "PAXUM",
            "rates": "+1%",
            "amount": "1100.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "IDR",
            "platform": "WECHAT PAY",
            "rates": "+1%",
            "amount": "1200.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "USD",
            "platform": "LINE",
            "rates": "+1%",
            "amount": "1300.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "CAD",
            "platform": "WHATSAPP",
            "rates": "+1%",
            "amount": "1400.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "CVE",
            "platform": "ETHEREUM",
            "rates": "+1%",
            "amount": "1500.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "KYD",
            "platform": "RIPPLE",
            "rates": "+1%",
            "amount": "1600.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "CLP",
            "platform": "USDT",
            "rates": "+1%",
            "amount": "1700.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "CNY",
            "platform": "MONERO",
            "rates": "+1%",
            "amount": "1800.00"
        },
        {
            "date": "22 January",
            "direction": "BUY",
            "currency_code": "COP",
            "platform": "VISA",
            "rates": "+1%",
            "amount": "1900.00"
        },
        {
            "date": "22 January",
            "direction": "SELL",
            "currency_code": "KMF",
            "platform": "AMEX",
            "rates": "+2%",
            "amount": "2000.00"
        }
    ],
    "message": "Succesfully get recent transaction"
}
```
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/RecentTransaction.png)