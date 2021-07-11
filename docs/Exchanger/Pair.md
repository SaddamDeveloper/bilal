# EXCHANGER / PAIR

## LIST PAIRS

**Endpoint :** `/api/exchanger?group=currency&alpha=a&offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| group  | currency    | *Display all currency of pairs.*                                  |
| alpha | a     | *Sort the list of pairs starting with the letter `a`, Choices from letters `a` to `z`.* |
| limit  | 20    | *Limit the data of records.*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20.* |

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent.*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |

**Payload :** `N/A`

#### **Validation Rules :** 

##### **Request Params**

| Key    | Rules               |
| ------ | ------------------- |
| group  | *required, string, max:20* |
| alpha | *string, min:1, max:1* |
| limit  | *required, numeric* |
| offset | *required, numeric* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 200 OK`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 OK`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`
`X-RateLimit-Reset: 1372700873`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 200 - OK                        | Status Success.                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed.                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour. |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| X-RateLimit-Reset     | 1372700873                      | The time at which the current rate limit window resets in UTC epoch seconds. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "meta_data": {
        "page": 1,
        "total_count": 4
    },
    "data": [
        {
            "platform": "ALIPAY",
            "currency": "Afghani",
            "currency_code": "AFN"
        },
        {
            "platform": "APPLE PAY",
            "currency": "Lek",
            "currency_code": "ALL"
        },
        {
            "platform": "AMEX",
            "currency": "Comoro Franc",
            "currency_code": "KMF"
        },
        {
            "platform": "APIRONE",
            "currency": "Hong Kong Dollar",
            "currency_code": "HKD"
        }
    ],
    "message": "Succesfully get pairs"
}
```

## LIST PAIRS BY CURRENCY

**Endpoint :** `/api/exchanger?group=currency&code=usd&offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| group  | currency    | *Display pairs by currency code section*                                  |
| code | usd     | *Display pairs by given currency code* |
| limit  | 20    | *Limit the data of records*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20* |

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent.*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |

**Payload :** `N/A`

#### **Validation Rules :** 

##### **Request Params**

| Key    | Rules               |
| ------ | ------------------- |
| group  | *required, string, max:20* |
| code  | *string, max:10* |
| limit  | *required, numeric* |
| offset | *required, numeric* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 200 OK`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 OK`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`
`X-RateLimit-Reset: 1372700873`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 200 - OK                        | Status Success                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| X-RateLimit-Reset     | 1372700873                      | The time at which the current rate limit window resets in UTC epoch seconds |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "meta_data": {
        "page": 1,
        "total_count": 1
    },
    "data": [
        {
            "platform": "LINE",
            "currency": "US Dollar",
            "currency_code": "USD"
        }
    ],
    "message": "Succesfully get pairs"
}
```

## LIST PAIRS BY GROUP
**Endpoint :** `/api/exchanger?group=card&offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| group  | card    | *Display pairs by type, Available option : `wire`, `emoney`, `cash`,`card` and `crypto` *                                 
| limit  | 20    | *Limit the data of records*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20* |

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
| group  | *required, string, max:20* |
| limit  | *required, numeric* |
| offset | *required, numeric* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 200 OK`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 OK`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`
`X-RateLimit-Reset: 1372700873`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 200 - OK                        | Status Success                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| X-RateLimit-Reset     | 1372700873                      | The time at which the current rate limit window resets in UTC epoch seconds |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "meta_data": {
        "page": 1,
        "total_count": 4
    },
    "data": [
        {
            "platform": "MASTERCARD",
            "currency": "Armenian Dram",
            "currency_code": "AMD"
        },
        {
            "platform": "VISA",
            "currency": "Colombian Peso",
            "currency_code": "COP"
        },
        {
            "platform": "AMEX",
            "currency": "Comoro Franc",
            "currency_code": "KMF"
        },
        {
            "platform": "UNION PAY",
            "currency": "Congolese Franc",
            "currency_code": "CDF"
        }
    ],
    "message": "Succesfully get pairs"
}
```

## SEARCH PAIRS

**Endpoint :** `/api/exchanger?q=visa%20dollar&offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| q  | visa dollar    | *Display pair by search query, this will search to data by multiple keyword, example if we search for `visa dollar` this will get the data that match with `visa` and `dollar` word in all table data including its relation*                                 
| limit  | 20    | *Limit the data of records*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20* |

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
| q  | *required, string* |
| limit  | *required, numeric* |
| offset | *required, numeric* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 200 OK`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 OK`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`
`X-RateLimit-Reset: 1372700873`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 200 - OK                        | Status Success                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| X-RateLimit-Reset     | 1372700873                      | The time at which the current rate limit window resets in UTC epoch seconds |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "meta_data": {
        "page": 1,
        "total_count": 10
    },
    "data": [
        {
            "name": "WESTERN UNION",
            "currency": "Caribbean Dollar",
            "currency_code": "XCD"
        },
        {
            "name": "REVOLUT",
            "currency": "Australian Dollar",
            "currency_code": "AUD"
        },
        {
            "name": "LINE",
            "currency": "US Dollar",
            "currency_code": "USD"
        },
        {
            "name": "WHATSAPP",
            "currency": "Canadian Dollar",
            "currency_code": "CAD"
        },
        {
            "name": "RIPPLE",
            "currency": "Cayman Islands Dollar",
            "currency_code": "KYD"
        },
        {
            "name": "VISA",
            "currency": "Colombian Peso",
            "currency_code": "COP"
        },
        {
            "name": "PAXOS STANDARD",
            "currency": "Fiji Dollar",
            "currency_code": "FJD"
        },
        {
            "name": "GOCOIN",
            "currency": "Guyanese Dollar",
            "currency_code": "GYD"
        },
        {
            "name": "APIRONE",
            "currency": "Hong Kong Dollar",
            "currency_code": "HKD"
        },
        {
            "name": "XAPO",
            "currency": "Jamaican Dollar",
            "currency_code": "JMD"
        }
    ],
    "message": "Succesfully get pairs"
}
```

## ERD
![Pair ERD](https://github.com/idigotech/ages96/blob/master/docs/erd/Exchanger/Pair.png)