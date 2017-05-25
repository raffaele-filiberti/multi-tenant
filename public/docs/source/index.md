---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#AgencyController
<!-- START_5958d1208c8617e4544406f922a29556 -->
## Display a listing of the agencies.

> Example request:

```bash
curl -X GET "http://localhost//api/agencies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/agencies",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/agencies`

`HEAD /api/agencies`


<!-- END_5958d1208c8617e4544406f922a29556 -->

<!-- START_bb6eb0def52aa1a7c8a412a6394f3830 -->
## Display the specified agency.

> Example request:

```bash
curl -X GET "http://localhost//api/agencies/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/agencies/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/agencies/{id}`

`HEAD /api/agencies/{id}`


<!-- END_bb6eb0def52aa1a7c8a412a6394f3830 -->

<!-- START_a4a93d93184359a5b0067150b2f801dc -->
## Update the specified agency in storage.

> Example request:

```bash
curl -X PUT "http://localhost//api/agencies/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/agencies/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/agencies/{id}`


<!-- END_a4a93d93184359a5b0067150b2f801dc -->

#general
<!-- START_0ec0d404b2ae30e78e53a1946b2ca3f1 -->
## /api/auth/agency/signup

> Example request:

```bash
curl -X POST "http://localhost//api/auth/agency/signup" \
-H "Accept: application/json" \
    -d "name"="ut" \
    -d "email"="wendell.gusikowski@example.net" \
    -d "password"="ut" \
    -d "agency"="ut" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/auth/agency/signup",
    "method": "POST",
    "data": {
        "name": "ut",
        "email": "wendell.gusikowski@example.net",
        "password": "ut",
        "agency": "ut"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/agency/signup`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Maximum: `255`
    email | email |  required  | 
    password | string |  required  | Minimum: `6`
    agency | string |  required  | Maximum: `255`

<!-- END_0ec0d404b2ae30e78e53a1946b2ca3f1 -->

<!-- START_03d29f415a921367ef8611a608633ffb -->
## /api/auth/signup

> Example request:

```bash
curl -X POST "http://localhost//api/auth/signup" \
-H "Accept: application/json" \
    -d "name"="in" \
    -d "email"="anissa63@example.com" \
    -d "password"="in" \
    -d "agency_id"="9" \
    -d "customer_id"="9" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/auth/signup",
    "method": "POST",
    "data": {
        "name": "in",
        "email": "anissa63@example.com",
        "password": "in",
        "agency_id": 9,
        "customer_id": 9
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/signup`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Maximum: `255`
    email | email |  required  | 
    password | string |  required  | Minimum: `6`
    agency_id | integer |  required  | 
    customer_id | integer |  required  | 

<!-- END_03d29f415a921367ef8611a608633ffb -->

<!-- START_7ba029714012cd9c08cc50ae4dee9d7a -->
## /api/auth/login

> Example request:

```bash
curl -X POST "http://localhost//api/auth/login" \
-H "Accept: application/json" \
    -d "email"="runolfsson.werner@example.com" \
    -d "password"="corrupti" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/auth/login",
    "method": "POST",
    "data": {
        "email": "runolfsson.werner@example.com",
        "password": "corrupti"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    password | string |  required  | 

<!-- END_7ba029714012cd9c08cc50ae4dee9d7a -->

<!-- START_b706911fc2143359a27a47586522c8c7 -->
## /api/auth/recovery

> Example request:

```bash
curl -X POST "http://localhost//api/auth/recovery" \
-H "Accept: application/json" \
    -d "email"="delfina.blanda@example.net" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/auth/recovery",
    "method": "POST",
    "data": {
        "email": "delfina.blanda@example.net"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/recovery`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 

<!-- END_b706911fc2143359a27a47586522c8c7 -->

<!-- START_bac19b6778c34ade7c9006a863aed43c -->
## /api/auth/reset

> Example request:

```bash
curl -X POST "http://localhost//api/auth/reset" \
-H "Accept: application/json" \
    -d "token"="quia" \
    -d "email"="richie.christiansen@example.net" \
    -d "password"="quia" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/auth/reset",
    "method": "POST",
    "data": {
        "token": "quia",
        "email": "richie.christiansen@example.net",
        "password": "quia"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/reset`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 

<!-- END_bac19b6778c34ade7c9006a863aed43c -->

<!-- START_3de94d7108d8671d231b70e9cd2a5911 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost//api/templates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/templates`

`HEAD /api/templates`


<!-- END_3de94d7108d8671d231b70e9cd2a5911 -->

<!-- START_660326cda556bbb834d16212d8c82ef5 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost//api/templates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/templates`


<!-- END_660326cda556bbb834d16212d8c82ef5 -->

<!-- START_7c57cf9476c7428205bc4831509ed69b -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost//api/templates/{template}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/templates/{template}`

`HEAD /api/templates/{template}`


<!-- END_7c57cf9476c7428205bc4831509ed69b -->

<!-- START_ee9eb60f4efb2c85abfb658f484f0185 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost//api/templates/{template}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/templates/{template}`

`PATCH /api/templates/{template}`


<!-- END_ee9eb60f4efb2c85abfb658f484f0185 -->

<!-- START_fd3217855da3f25ca5f6e9604fa6cd87 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost//api/templates/{template}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/templates/{template}`


<!-- END_fd3217855da3f25ca5f6e9604fa6cd87 -->

<!-- START_1921adff0d2ac1a887af2f27e043a050 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost//api/templates/{template_id}/steps" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/templates/{template_id}/steps`

`HEAD /api/templates/{template_id}/steps`


<!-- END_1921adff0d2ac1a887af2f27e043a050 -->

<!-- START_fecad0cf82953da6d34996bad0b412f7 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost//api/templates/{template_id}/steps" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/templates/{template_id}/steps`


<!-- END_fecad0cf82953da6d34996bad0b412f7 -->

<!-- START_b89cc2448e15febae1e138788185238f -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost//api/templates/{template_id}/steps/{step}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/templates/{template_id}/steps/{step}`

`HEAD /api/templates/{template_id}/steps/{step}`


<!-- END_b89cc2448e15febae1e138788185238f -->

<!-- START_c77f374dcc03fcd35913862b4787122b -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost//api/templates/{template_id}/steps/{step}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/templates/{template_id}/steps/{step}`

`PATCH /api/templates/{template_id}/steps/{step}`


<!-- END_c77f374dcc03fcd35913862b4787122b -->

<!-- START_6194f41b3c17ca3d260847df14befeaf -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost//api/templates/{template_id}/steps/{step}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/templates/{template_id}/steps/{step}`


<!-- END_6194f41b3c17ca3d260847df14befeaf -->

<!-- START_c06a018f77b688ad2725b16bfea498ec -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost//api/templates/{template_id}/steps/{step_id}/details" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step_id}/details",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/templates/{template_id}/steps/{step_id}/details`

`HEAD /api/templates/{template_id}/steps/{step_id}/details`


<!-- END_c06a018f77b688ad2725b16bfea498ec -->

<!-- START_26cfc958f1d607c2f7277587809c6d24 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost//api/templates/{template_id}/steps/{step_id}/details" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step_id}/details",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/templates/{template_id}/steps/{step_id}/details`


<!-- END_26cfc958f1d607c2f7277587809c6d24 -->

<!-- START_5c14e9397c2d395e39cd9aa4794cad39 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "http://localhost//api/templates/{template_id}/steps/{step_id}/details/{detail}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step_id}/details/{detail}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/templates/{template_id}/steps/{step_id}/details/{detail}`

`HEAD /api/templates/{template_id}/steps/{step_id}/details/{detail}`


<!-- END_5c14e9397c2d395e39cd9aa4794cad39 -->

<!-- START_013faf1cfaec57110520325067741ea6 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost//api/templates/{template_id}/steps/{step_id}/details/{detail}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step_id}/details/{detail}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/templates/{template_id}/steps/{step_id}/details/{detail}`

`PATCH /api/templates/{template_id}/steps/{step_id}/details/{detail}`


<!-- END_013faf1cfaec57110520325067741ea6 -->

<!-- START_1459a7a5f01aaccce8850fa5b04d5c82 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost//api/templates/{template_id}/steps/{step_id}/details/{detail}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/templates/{template_id}/steps/{step_id}/details/{detail}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/templates/{template_id}/steps/{step_id}/details/{detail}`


<!-- END_1459a7a5f01aaccce8850fa5b04d5c82 -->

<!-- START_c56bf3f0154e200bf3fbdc1cff300920 -->
## /api/subscriber

> Example request:

```bash
curl -X GET "http://localhost//api/subscriber" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/subscriber",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/subscriber`

`HEAD /api/subscriber`


<!-- END_c56bf3f0154e200bf3fbdc1cff300920 -->

<!-- START_6208d6124c362d045b9ee2d8e1331b0a -->
## /api/{user_id}/confirm

> Example request:

```bash
curl -X POST "http://localhost//api/{user_id}/confirm" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/{user_id}/confirm",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/{user_id}/confirm`


<!-- END_6208d6124c362d045b9ee2d8e1331b0a -->

<!-- START_96e2e79fc624a8e723c840a85751453c -->
## /api/{user_id}/subscription

> Example request:

```bash
curl -X POST "http://localhost//api/{user_id}/subscription" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/{user_id}/subscription",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/{user_id}/subscription`


<!-- END_96e2e79fc624a8e723c840a85751453c -->

<!-- START_37dc591ac898f67b61b4d630bcc7a776 -->
## /api/users

> Example request:

```bash
curl -X GET "http://localhost//api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/users`

`HEAD /api/users`


<!-- END_37dc591ac898f67b61b4d630bcc7a776 -->

<!-- START_105ec9a65e7bc0a1aeccf3057b069abb -->
## /api/users

> Example request:

```bash
curl -X POST "http://localhost//api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/users",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/users`


<!-- END_105ec9a65e7bc0a1aeccf3057b069abb -->

<!-- START_7de043413aa414eb2c000a21cd09069e -->
## /api/users/{user_id}

> Example request:

```bash
curl -X PUT "http://localhost//api/users/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/users/{user_id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/users/{user_id}`


<!-- END_7de043413aa414eb2c000a21cd09069e -->

<!-- START_cc7b8d7e75d1f1295313aa466a7fc4db -->
## /api/users/{user_id}

> Example request:

```bash
curl -X DELETE "http://localhost//api/users/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/users/{user_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/users/{user_id}`


<!-- END_cc7b8d7e75d1f1295313aa466a7fc4db -->

<!-- START_316c63dcc983770bf5fe94c14223804e -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost//api/customers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/customers`

`HEAD /api/customers`


<!-- END_316c63dcc983770bf5fe94c14223804e -->

<!-- START_cb810db56df598e9aeff682f04b2a543 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost//api/customers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers`


<!-- END_cb810db56df598e9aeff682f04b2a543 -->

<!-- START_cd9d586192d2df12043aef2c82bf1879 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost//api/customers/{customer_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/customers/{customer_id}`


<!-- END_cd9d586192d2df12043aef2c82bf1879 -->

<!-- START_55fe25c3e55e585e1ed2357d7fa07baf -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost//api/customers/{customer_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/customers/{customer_id}`


<!-- END_55fe25c3e55e585e1ed2357d7fa07baf -->

<!-- START_26b047961e60cb8e23f04f186b1e2bd5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost//api/customers/{customer_id}/projects" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/customers/{customer_id}/projects`

`HEAD /api/customers/{customer_id}/projects`


<!-- END_26b047961e60cb8e23f04f186b1e2bd5 -->

<!-- START_27c4cdd18e987b807312464eece2431d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects`


<!-- END_27c4cdd18e987b807312464eece2431d -->

<!-- START_52f81152e48a8d89bb9f1a5ce179f3ec -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "http://localhost//api/customers/{customer_id}/projects/{project_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/customers/{customer_id}/projects/{project_id}`


<!-- END_52f81152e48a8d89bb9f1a5ce179f3ec -->

<!-- START_b6bfab8784a6a93b2d20b342078f2bcd -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost//api/customers/{customer_id}/projects/{project_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/customers/{customer_id}/projects/{project_id}`


<!-- END_b6bfab8784a6a93b2d20b342078f2bcd -->

<!-- START_d5be342dce29765f92374bb5938cba8d -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/customers/{customer_id}/projects/{project_id}/tasks`

`HEAD /api/customers/{customer_id}/projects/{project_id}/tasks`


<!-- END_d5be342dce29765f92374bb5938cba8d -->

<!-- START_2d4b788ce3d192888a7fc89f8f4d2b3d -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks`


<!-- END_2d4b788ce3d192888a7fc89f8f4d2b3d -->

<!-- START_f0a9d1516241bfc9964498c30527a25e -->
## TODO: implementare modifica template

> Example request:

```bash
curl -X PUT "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}`


<!-- END_f0a9d1516241bfc9964498c30527a25e -->

<!-- START_0d4e9dc72abd71bd894ac48fc60fb548 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}`


<!-- END_0d4e9dc72abd71bd894ac48fc60fb548 -->

<!-- START_0b2edf32ba9ce403b4ae01e405842621 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files`


<!-- END_0b2edf32ba9ce403b4ae01e405842621 -->

<!-- START_867d90c1163b856a1eb57a4a0d328fea -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/download

> Example request:

```bash
curl -X GET "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/download" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/download",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/download`

`HEAD /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/download`


<!-- END_867d90c1163b856a1eb57a4a0d328fea -->

<!-- START_3cfbd50de3a38883b9715332f36fde69 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}

> Example request:

```bash
curl -X DELETE "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}`


<!-- END_3cfbd50de3a38883b9715332f36fde69 -->

<!-- START_53ae7fc06384bf4d242f87acada693f6 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files

> Example request:

```bash
curl -X GET "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files`

`HEAD /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files`


<!-- END_53ae7fc06384bf4d242f87acada693f6 -->

<!-- START_5d3d046b5cd46dfd3a296d2ff7ed87b1 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/approve

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/approve" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/approve",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/approve`


<!-- END_5d3d046b5cd46dfd3a296d2ff7ed87b1 -->

<!-- START_db7a54fc3d5ca55a8bda60e5ad6e201d -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/disapprove

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/disapprove" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/disapprove",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/files/{file_id}/disapprove`


<!-- END_db7a54fc3d5ca55a8bda60e5ad6e201d -->

<!-- START_d0c334942add507de53d1309faf75f95 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates`


<!-- END_d0c334942add507de53d1309faf75f95 -->

<!-- START_f138a01bec2ce685c05903f263559c36 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates

> Example request:

```bash
curl -X GET "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates`

`HEAD /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates`


<!-- END_f138a01bec2ce685c05903f263559c36 -->

<!-- START_5506f4198d4100923750401fac0199e2 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/approve

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/approve" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/approve",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/approve`


<!-- END_5506f4198d4100923750401fac0199e2 -->

<!-- START_0a07a28f9d6807d6107b87063556888f -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/disapprove

> Example request:

```bash
curl -X POST "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/disapprove" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/disapprove",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}/disapprove`


<!-- END_0a07a28f9d6807d6107b87063556888f -->

<!-- START_3e483455e2451a7c05bad1d8c4947b20 -->
## /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}

> Example request:

```bash
curl -X DELETE "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/customers/{customer_id}/projects/{project_id}/tasks/{task_id}/details/{detail_step_task_id}/dates/{date_id}`


<!-- END_3e483455e2451a7c05bad1d8c4947b20 -->

