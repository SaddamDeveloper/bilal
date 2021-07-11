
# ORDER / BINDINGS

## GET BINDINGS LIST

**Endpoint :** `/api/order/binding/list?offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| platform  | paypal    | *Filter bindings by group of platform name, This field is optional.*
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
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 2,
            "platform": "APPLE PAY",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 3,
            "platform": "GOOGLE PAY",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 4,
            "platform": "SKRILL",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 5,
            "platform": "MONEYGRAM",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 6,
            "platform": "WESTERN UNION",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 7,
            "platform": "PAYPAL",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 8,
            "platform": "MASTERCARD",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 9,
            "platform": "BITCOIN",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 10,
            "platform": "REVOLUT",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 11,
            "platform": "PAXUM",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 12,
            "platform": "WECHAT PAY",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 13,
            "platform": "LINE",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 14,
            "platform": "WHATSAPP",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 15,
            "platform": "ETHEREUM",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 16,
            "platform": "RIPPLE",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 17,
            "platform": "USDT",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 18,
            "platform": "MONERO",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 19,
            "platform": "VISA",
            "account_info": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 20,
            "platform": "AMEX",
            "account_info": "Lorem ipsum dolor sit amet"
        }
    ],
    "message": "Succesfully get bindings"
}
```

## ADD NEW BINDINGS

**Note** : Will add new platform, But if platform exists will override current platform with new input platform.

**Endpoint :** `/api/order/bindings/create_new`

**Method :** `POST` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 
```json
{
    "platform_id": 33,
    "account_info":"Lorem ipsum dolor sit amet"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| platform_id  | *required, numeric, unique* |
| account_info  | *required, text* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 201 CREATED`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 201 CREATED`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 201 - CREATED                        | Status Success                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "data": [],
    "message": "Succesfully added bindings"
}
```


## DELETE BINDINGS

**Endpoint :** `/api/order/bindings/delete`

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
    "message": "Succesfully deleted bindings"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/Orders/Bindings.png)