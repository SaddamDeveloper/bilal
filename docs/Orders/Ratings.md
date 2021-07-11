
# ORDER / RATINGS

## GET RATINGS

**Endpoint :** `/api/order/ratings`

**Method :** `GET`

**Headers :** 

| Key          | Value            | Description                                    |
| ------------ | ---------------- | ---------------------------------------------- |
| Content-Type | application/json | *Tell the server content is actually sent*     |
| Accept       | application/json | *Tell the server what type of data is accept.* |
| Authorization | Bearer { token } | *Bearer token from login API*

**Payload :** `N/A`

**Validation Rules :** : `N/A`

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
            "completed":487,
            "activy": 505,
            "average_transfer": 16,
            "average_confirm": 28,
            "limit_offers": 907,
            "active_offers": 71
     },
    "message": "Succesfully get ratings"
}
```

## ERD
![enter image description here](https://github.com/idigotech/ages96/blob/master/docs/erd/Orders/Ratings.png)