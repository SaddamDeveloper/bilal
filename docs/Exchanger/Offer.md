# EXCHANGER / OFFER

## LIST OF OFFERS

**Note :** Only offers with status 10%

**Endpoint :** `/api/exchanger/list?platform_group=emoney&direction=buy&offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| platform_group  | emoney    | *Filter offer by group of platform type, Available option : `emoney`, `wire`, `card`, `crypto` and `cash`, This field is optional.*
| direction  | buy    | *Display offer by direction, Available option : `buy` and `sell`, This field is required.*
| limit  | 20    | *Limit the data of records.  This field is required.*                                  |
| offset | 1     | *Specifies jump to next page and must begin with number 1, For example, there are 100 data, if we want to go to page 2 with the assumption that the data is in the order of 21 to 40. Then fill the `offset` with 2 and `limit` 20.  This field is required.* |
| pair_id | 32     | *Filter list offers contain given `pair_id`* |
| currency_code | usd     | *Filter list offers contain given `currency_code`,  This field is optional.* |
| platform_name | paypal     | *Filter list offers contain given `platform_name`,  This field is optional.* |
| search | skrill     | *To search for `skrill` word from table and it's relation, This will search everything in offer table, username of publisher, currency code, platform name and group name,  This field is optional.* |

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
| platform_group  | *string, max:20* |
| direction  | *required, string, max:20* |
| limit  | *required, numeric* |
| offset | *required, numeric* |
| pair_id  | *numeric* |
| currency_code | *string, max:20* |
| platform_name | *string* |
| search | *string* |

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
        "total_count": 5
    },
    "data": [
        {
            "id":35610,
            "give": 1032.00,
            "get": 1000.00,
            "rate": "+0.00014",
            "platform": [
                {
                    "icon":"https://icon-icons.com/icons2/1455/PNG/32/skrill_99433.png",
                    "name": "Skrill"
                }
            ],
            "rating":{
                "value":509,
                "duration":2,
                "certificate":"any"
            },
            "information":{
                "min_certificate":"personal",
                "min_rating":5,
                "message": "Lorem ipsum dolor sit amet"
            }
        },
        {
            "id":35611,
            "give": 90000.00,
            "get": 95000.00,
            "rate": "+0.000145",
            "platform": [
                {
                    "icon":"https://icon-icons.com/icons2/1455/PNG/32/skrill_99433.png",
                    "name": "Skrill"
                }
            ],
            "rating":{
                "value":509,
                "duration":2,
                "certificate":"any"
            },
            "information":{
                "min_certificate":"personal",
                "min_rating":5,
                "message": "Lorem ipsum dolor sit amet"
            }
        },
        {
            "id":35612,
            "give": 103.59,
            "get": 100.00,
            "rate": "+0.000145",
            "platform": [
                {
                    "icon":"https://icon-icons.com/icons2/1455/PNG/32/skrill_99433.png",
                    "name": "Skrill"
                }
            ],
            "rating":{
                "value":509,
                "duration":2,
                "certificate":"any"
            },
            "information":{
                "min_certificate":"personal",
                "min_rating":5,
                "message": "Lorem ipsum dolor sit amet"
            }
        },
        {
            "id":35613,
            "give": 155.38,
            "get": 150.00,
            "rate": "+0.000145",
            "platform": [
                {
                    "icon":"https://icon-icons.com/icons2/1455/PNG/32/skrill_99433.png",
                    "name": "Skrill"
                }
            ],
            "rating":{
                "value":509,
                "duration":2,
                "certificate":"any"
            },
            "information":{
                "min_certificate":"personal",
                "min_rating":5,
                "message": "Lorem ipsum dolor sit amet"
            }
        },
        {
            "id":35614,
            "give": 258.97,
            "get": 250.00,
            "rate": "+0.000145",
            "platform": [
                {
                    "icon":"https://icon-icons.com/icons2/1455/PNG/32/skrill_99433.png",
                    "name": "Skrill"
                }
            ],
            "rating":{
                "value":509,
                "duration":2,
                "certificate":"any"
            },
            "information":{
                "min_certificate":"personal",
                "min_rating":5,
                "message": "Lorem ipsum dolor sit amet"
            }
        }
    ],
    "message": "Succesfully get offers"
}
```

## FAVORITED OFFER LIST

**Endpoint :** `/api/exchanger/list/favorite`

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
    "offer_list":"/list?platform_group=emoney&direction=buy&offset=1&limit=20"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| link_page  | *required, string, valid url* |

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
    "message": "Succesfully favorited offers list"
}
```

## UNFAVORITED OFFER LIST

**Endpoint :** `/api/exchanger/list/remove_favorite`

**Method :** `PUT` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 
```json
{
    "offer_list":"/list?platform_group=emoney&direction=buy&offset=1&limit=20"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| link_page  | *required, string, valid url* |

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
    "message": "Succesfully unfavorited offers list"
}
```
## SAVED OFFERS LIST

**Endpoint :** `/api/exchanger/list/saved`

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
    "offer_list":"/list?platform_group=emoney&direction=buy&offset=1&limit=20"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| link_page  | *required, string, valid url* |

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
    "message": "Succesfully saved offers list"
}
```

## UNSAVED OFFERS LIST

**Endpoint :** `/api/exchanger/list/remove_saved`

**Method :** `PUT` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 
```json
{
    "offer_list":"/list?platform_group=emoney&direction=buy&offset=1&limit=20"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| link_page  | *required, string, valid url* |

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
    "message": "Succesfully unsaved offers list"
}
```

## DETAIL OFFERS

**Endpoint :** `/api/exchanger/offer/detail?id=354610`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
| id  | 354610    | *Unique identity id of the offer, Id from list offer API,  This field is required.*                                 

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
    "data": {
        "platform": "Skrill",
        "platform_icon": "https://icon-icons.com/icons2/1455/PNG/32/skrill_99433.png",
        "direction":"BUY/DEPOSIT",
        "get":"1000 USD",
        "give":"1030.5 USD",
        "insurance":"20.00 USD",
        "account":"abcd@gmail.com",
        "currency":"AFN",
        "rate":"+3.05%",
        "publisher":{},
        "certificate": "personal",
        "min_rating":"5 or above",
        "information":{
            "min_certificate":"personal",
            "min_rating":5,
            "message": "Lorem ipsum dolor sit amet"
         },
        "status":"10%"
     },
    "message": "Succesfully get detail offer"
}
```

## NEW OFFER

**Note** : If offer save as draft status will be 0%

**Endpoint :** `/api/exchanger/offer/create_new`

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
    "platform":"Skrill",
    "exchange":{
        "currency":"usd",
        "direction":"sell"
    },
    "give":1000,
    "get":1050,
    "insurance":200,
    "account":"jerry@gmail.com",
    "min_certificate":"formal",
    "min_rating":232,
    "information":"Lorem ipsum dolor sit amet"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| platform  | *required, string* |
| exchange.currency  | *required, string* |
| exchange.direction  | *required, string* |
| give  | *required, numeric* |
| get  | *required, numeric* |
| insurance  | *required, numeric* |
| account  | *required, string, valid email* |
| min_certificate  | *required, string, in list [`any`, `formal`, `personal`,`merchant`]* |
| min_rating  | *required, numeric* |
| information  | *string* |

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
| Status                | 201 - CREATED                        | Status Created                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "data": [],
    "message": "Succesfully added offer"
}
```

## COPY TO NEW OFFER

**Endpoint :** `/api/exchanger/offer/copy_to_new`

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
    "offer_id":32
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| offer_id  | *required, valid offer_id* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 201 CREATED`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 CREATED`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 201 - CREATED                        | Status Created                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "data": [],
    "message": "Succesfully added offers"
}
```

## UPDATE OFFERS

**Note :** For update offer, Offer status must be 0%. Please check it in detail API offer first for status.

**Endpoint :** `/api/exchanger/offer/update`

**Method :** `PUT` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 
```json
{
    "offer_id":222012,
    "platform":"Skrill",
    "exchange":{
        "currency":"usd",
        "direction":"sell"
    },
    "give":1000,
    "get":1050,
    "insurance":200,
    "account":"jerry@gmail.com",
    "min_certificate":"formal",
    "min_rating":232,
    "information":"Lorem ipsum dolor sit amet"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| offer_id  | *required, numeric* |
| platform  | *required, string* |
| exchange.currency  | *required, string* |
| exchange.direction  | *required, string* |
| give  | *required, numeric* |
| get  | *required, numeric* |
| insurance  | *required, numeric* |
| account  | *required, string, valid email* |
| min_certificate  | *required, string, in list [`any`, `formal`, `personal`,`merchant`]* |
| rating  | *required, numeric* |
| information  | *string* |

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
    "message": "Succesfully updated offers"
}
```

#### **Sample Not Modified Response :**

- ##### Headers

`HTTP/1.1 304 NOT MODIFIED`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 304 NOT MODIFIED`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 304 - NOT MODIFIED                        | Status Not Modified                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "data": [],
    "message": "Please use different value"
}
```

## UNPUBLISH OFFER 

**Note :** Only if offer status 10%.

**Endpoint :** `/api/exchanger/offer/to_draft`

**Method :** `PUT` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 
```json
{
    "id":36521,
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| id  | *required, numeric, valid offer id* |

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
    "message": "Succesfully move the offers to draft"
}
```

## DELETE OFFERS

**Note** : Offer only can be deleted if offer status 0% and 10%.

**Endpoint :** `/api/exchanger/offer/delete`

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
| id  | *required, numeric, valid offer id* |

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
    "message": "Succesfully deleted offers"
}
```

## PLACE ORDER

**Endpoint :** `/api/exchanger/offer/place_order`

**Note :**
- Not exceed user daily, monthly, total volume limit
- Not exceed available balance
- In active status

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
    "offer_id":36523,
    "account":"sally@gmail.com"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| id  | *required, numeric, valid offer id* |
| account  | *required, string, valid email* |

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
    "message": "Succesfully placed order"
}
```

## NEW REQUESTS

**Note :** 
- For new request currency, if currency is published Status offer will be 10%, If not, Status offer will be 2%
- If offer save as draft status will be 0%

**Endpoint :** `/api/exchanger/offer/new_request`

**Method :** `POST` 

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** 

- New request currency :

```json
{
    "platform":"Skrill",
    "exchange":{
        "currency":"usd",
        "direction":"sell"
    },
    "give":1000,
    "get":1050,
    "insurance":200,
    "account":"jerry@gmail.com",
    "min_certificate":"formal",
    "min_rating":232,
    "information":"Lorem ipsum dolor sit amet"
}
```

- New request platform :

```json
{
    "platform":{
        "name":"PaySri - Payment Server Indonesia",
        "link":"https://play.google.com/store/apps/details?id=co.paysri.id",
        "doc_link":"https://paysri.id",
        "base_country_id":22
    },
    "exchange":{
        "currency":"usd",
        "direction":"sell"
    },
    "give":1000,
    "get":1050,
    "insurance":200,
    "account":"jerry@gmail.com",
    "min_certificate":"formal",
    "min_rating":232,
    "information":"Lorem ipsum dolor sit amet"
}
```

#### **Validation Rules - New request currency :** 
##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| platform  | *required, string* |
| exchange.currency  | *required, string* |
| exchange.direction  | *required, string* |
| give  | *required, numeric* |
| get  | *required, numeric* |
| insurance  | *required, numeric* |
| account  | *required, string, valid email* |
| min_certificate  | *required, string, in list [`any`, `formal`, `personal`,`merchant`]* |
| min_rating  | *required, numeric* |
| information  | *string* |

#### **Validation Rules - New request platform :** 
##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
|platform.name|*required, string*|
|platform.link|*required, string, valid url*|
|platform.doc_link|*required, string, valid url*|
|platform.base_country_id|*required, numeric, relation countries*|
| exchange.currency  | *required, string* |
| exchange.direction  | *required, string* |
| give  | *required, numeric* |
| get  | *required, numeric* |
| insurance  | *required, numeric* |
| account  | *required, string, valid email* |
| certificate  | *required, string, in list [`any`, `formal`, `personal`,`merchant`]* |
| min_rating  | *required, numeric* |
| information  | *string* |

#### **Sample Success Response :**

- ##### Headers

`HTTP/1.1 201 CREATED`
`Date: Thu, 14 Jan 2021 17:27:06 GMT`
`Status : 200 CREATED`
`X-RateLimit-Limit: 500`
`X-RateLimit-Remaining: 456`

Description of response headers : 

| Key                   | Value                           | Description                                                  |
| --------------------- | ------------------------------- | ------------------------------------------------------------ |
| Status                | 201 - CREATED                        | Status Created                                               |
| Date                  | Thu, 14 Jan 2021 17:27:06 GMT   | Date accessed                                                |
| X-RateLimit-Limit     | 500                              | The maximum number of requests you're permitted to make per hour |
| X-RateLimit-Remaining | 456                              | The number of the requests remaining in the current rate window. |
| Content-Type          | application/json; charset=utf-8 | Content type that server return.                             |

- ##### Body

```json
{
    "data": [],
    "message": "Succesfully added request"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/Exchanger/Offer.png)