

# ORDER / BLACKLIST

## GET BLACKLIST LIST

**Endpoint :** `/api/order/blacklist/list?offset=1&limit=20`

**Method :** `GET`

**Params :**

| Key    | Value | Description                                                  |
| ------ | ----- | ------------------------------------------------------------ |
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
            "blacklisted_username": "unamegen0",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 2,
            "blacklisted_username": "unamegen1",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 3,
            "blacklisted_username": "unamegen2",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 4,
            "blacklisted_username": "unamegen3",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 5,
            "blacklisted_username": "unamegen4",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 6,
            "blacklisted_username": "unamegen5",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 7,
            "blacklisted_username": "unamegen6",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 8,
            "blacklisted_username": "unamegen7",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 9,
            "blacklisted_username": "unamegen8",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 10,
            "blacklisted_username": "unamegen9",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 11,
            "blacklisted_username": "unamegen10",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 12,
            "blacklisted_username": "unamegen11",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 13,
            "blacklisted_username": "unamegen12",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 14,
            "blacklisted_username": "unamegen13",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 15,
            "blacklisted_username": "unamegen14",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 16,
            "blacklisted_username": "unamegen15",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 17,
            "blacklisted_username": "unamegen16",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 18,
            "blacklisted_username": "unamegen17",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 19,
            "blacklisted_username": "unamegen18",
            "comments": "Lorem ipsum dolor sit amet"
        },
        {
            "id": 20,
            "blacklisted_username": "unamegen19",
            "comments": "Lorem ipsum dolor sit amet"
        }
    ],
    "message": "Succesfully get blacklists"
}
```

## ADD NEW BLACKLIST

**Endpoint :** `/api/order/blacklist/create_new`

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
    "blacklisted_username": "odie1",
    "comments":"Lorem ipsum dolor sit amet"
}
```

#### **Validation Rules :** 

##### **Request Json Body**

| Key    | Rules               |
| ------ | ------------------- |
| username  | *required, string* |
| comments  | *required, text* |

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
    "message": "Succesfully added blacklist"
}
```


## DELETE BLACKLIST

**Endpoint :** `/api/order/blacklist/delete`

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
    "message": "Succesfully deleted blacklist"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/Orders/Blacklisted.png)