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
[Get Postman Collection](http://beast.dedicateddevelopers.us/docs/collection.json)

<!-- END_INFO -->

#Assessment management


APIs for managing Assessment
<!-- START_88d0f6f7c857d9dc0577754d436771fe -->
## Assessment Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/assessment" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/assessment"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/user/assessment`


<!-- END_88d0f6f7c857d9dc0577754d436771fe -->

<!-- START_ad5f371af98b2752719416ab7c2348c3 -->
## Add New Assessment

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/add-assessment" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"name":"vel"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/add-assessment"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "vel"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Assessment Data Found successfully.",
    "data": [
        {
            "id": 28,
            "name": "test12",
            "user_id": 25,
            "status": 1,
            "created_at": "2020-07-28 10:25:25",
            "updated_at": "2020-07-28 10:25:25"
        },
        {
            "id": 24,
            "name": "Toe Touch",
            "user_id": null,
            "status": 1,
            "created_at": "2020-05-06 06:08:20",
            "updated_at": "2020-05-06 06:08:20"
        },
        {
            "id": 23,
            "name": "Toe Touch To Squat",
            "user_id": null,
            "status": 1,
            "created_at": "2020-05-06 06:08:05",
            "updated_at": "2020-05-06 06:08:05"
        },
        {
            "id": 22,
            "name": "Supine Hip Flexion - Left Hip",
            "user_id": null,
            "status": 1,
            "created_at": "2020-05-06 06:07:33",
            "updated_at": "2020-05-06 06:07:33"
        }
    ]
}
```

### HTTP Request
`POST api/user/add-assessment`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Email.
    
<!-- END_ad5f371af98b2752719416ab7c2348c3 -->

<!-- START_be13e230f8921edc0b98f6ff22066e19 -->
## Assessment Result Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/assessmentResult" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/assessmentResult"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Assessment Data Found successfully.",
    "data": [
        {
            "id": 24,
            "name": "Toe Touch",
            "user_id": 1,
            "status": 1,
            "slug": "toe_touch",
            "assessment_option_one": "Pass",
            "assessment_option_two": "Fail",
            "created_at": "2020-05-06 06:08:20",
            "updated_at": "2020-08-26 10:04:17"
        },
        {
            "id": 23,
            "name": "Toe Touch To Squat",
            "user_id": 1,
            "status": 1,
            "slug": "toe_touch_to_squat",
            "assessment_option_one": "Pass",
            "assessment_option_two": "Fail",
            "created_at": "2020-05-06 06:08:05",
            "updated_at": "2020-08-26 10:05:20"
        },
        {
            "id": 22,
            "name": "Supine Hip Flexion - Left Hip",
            "user_id": 1,
            "status": 1,
            "slug": "supine_hip_flexion_left_hip",
            "assessment_option_one": "Pass",
            "assessment_option_two": "Fail",
            "created_at": "2020-05-06 06:07:33",
            "updated_at": "2020-08-26 10:05:30"
        }
    ]
}
```

### HTTP Request
`GET api/user/assessmentResult`


<!-- END_be13e230f8921edc0b98f6ff22066e19 -->

#CMS management


APIs for managing CMS
<!-- START_f78f47d484de79817d75e0b92b0d8ed8 -->
## CMS Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/cms/1" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"slug":"voluptatum"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/cms/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "slug": "voluptatum"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Cms Page Data Found successfully.",
    "data": {
        "id": 3,
        "title": "Contact us",
        "slug": "contact-us",
        "short_description": "This is test Contact us",
        "long_description": "This is test Contact us",
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/user/cms/{slug}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `slug` | string |  required  | slug ['about-us'].
    
<!-- END_f78f47d484de79817d75e0b92b0d8ed8 -->

#Contact us management


APIs for managing Contact
<!-- START_acc703eee3e81e8a6e98d5bcf1202d6e -->
## Contact Page data

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/getcontactPage" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/getcontactPage"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Contact Data Found successfully.",
    "data": {
        "id": 1,
        "name": "Contact Us",
        "address": "4248 North River Rd. NE Warren, Ohio",
        "email": "info@bylerelitestrength.com",
        "phone": "330-989-0022",
        "short_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
        "long_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
        "created_at": null,
        "updated_at": null
    }
}
```

### HTTP Request
`GET api/user/getcontactPage`


<!-- END_acc703eee3e81e8a6e98d5bcf1202d6e -->

<!-- START_769ca39694e55ea058335ee940e62eeb -->
## Contact Details

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/contactUs" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"name":"earum","email":"enim","query":"quis","message":"aut"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/contactUs"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "name": "earum",
    "email": "enim",
    "query": "quis",
    "message": "aut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Contact Data Found successfully.",
    "data": {
        "name": "payal",
        "email": "payal@gmail.com",
        "query": "test",
        "message": "test",
        "updated_at": "2020-04-13 12:10:05",
        "created_at": "2020-04-13 12:10:05",
        "id": 1
    }
}
```

### HTTP Request
`POST api/user/contactUs`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Name.
        `email` | string |  required  | Email.
        `query` | string |  required  | Query.
        `message` | string |  required  | Message.
    
<!-- END_769ca39694e55ea058335ee940e62eeb -->

#Homepage management


APIs for managing Homepage
<!-- START_1f9741111a4c42fdb5c3d797ea6b51c7 -->
## Home Page Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/homepage" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/homepage"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Home Page Data Found successfully.",
    "cms": [
        {
            "id": 4,
            "title": "Get Started Today!",
            "slug": "get-started-today",
            "short_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
            "long_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 1,
            "title": "About Us",
            "slug": "about-us",
            "short_description": "<p>At BEST we are lifelong students of movement, nutrition, and strength and conditioning. BEST began training the first BESTies in 2012, and from the beginning, one of the driving passions behind opening BEST is the LONG TERM development of athletes and the general population.<\/p>",
            "long_description": "At BEST we are lifelong students of movement, nutrition, and strength and conditioning. BEST began training the first BESTies in 2012, and from the beginning, one of the driving passions behind opening BEST is the LONG TERM development of athletes and the general population.",
            "created_at": null,
            "updated_at": "2020-04-08 09:44:50"
        }
    ],
    "training": [
        {
            "id": 1,
            "title": "BEAST UNIVERSITY \/\/Youth Training",
            "image": "20200408092837.jpg",
            "short_description": "<p>Looking to get recruited at your favorite college, or just trying to excel in your middle school sport? For athletes ages 6 to 18, BEAST University could be the best solution for you. Classes are separated by age bracket and programs and individualized to your needs.<\/p>",
            "long_description": "Looking to get recruited at your favorite college, or just trying to excel in your middle school sport? For athletes ages 6 to 18, BEAST University could be the best solution for you. Classes are separated by age bracket and programs and individualized to your needs.",
            "created_at": null,
            "updated_at": "2020-04-08 09:28:37"
        },
        {
            "id": 2,
            "title": "BEST FIT CAMP \/\/Adult Training",
            "image": "20200408092958.jpg",
            "short_description": "<p>For adults of all ages, Coach Byler starts all program-designs off with a thorough assessment of your movement patterns, nutrition habits and more. This interval training, where we pay very close attention to detail and form, could be for you!<\/p>",
            "long_description": "For adults of all ages, Coach Byler starts all program-designs off with a thorough assessment of your movement patterns, nutrition habits and more. This interval training, where we pay very close attention to detail and form, could be for you!",
            "created_at": null,
            "updated_at": "2020-04-08 09:29:58"
        }
    ]
}
```

### HTTP Request
`GET api/user/homepage`


<!-- END_1f9741111a4c42fdb5c3d797ea6b51c7 -->

#Master data management


APIs for managing Master Data
<!-- START_a04b271299d5df2af23880187fd178c9 -->
## Days List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/day" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/day"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Days data found.",
    "data": [
        {
            "id": 1,
            "name": "1",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/day`


<!-- END_a04b271299d5df2af23880187fd178c9 -->

<!-- START_1dc6a97d344ff7b19749d40b00199092 -->
## Assessment Category List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/assessmentCategory" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/assessmentCategory"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Assessment Category List found.",
    "data": [
        {
            "id": 1,
            "name": "1",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/assessmentCategory`


<!-- END_1dc6a97d344ff7b19749d40b00199092 -->

<!-- START_cadd5581b6492967d95db297419bec3f -->
## Country List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/country" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/country"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Country data found.",
    "data": [
        {
            "id": 1,
            "name": "Afghanistan",
            "status": "1",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/country`


<!-- END_cadd5581b6492967d95db297419bec3f -->

<!-- START_b4b25b5400e72b03bb9cfb1b51f490ca -->
## BestDescription List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/bestDescription" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/bestDescription"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Best Description data found.",
    "data": [
        {
            "id": 1,
            "name": "Personal Trainer\/Fitness Professional",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/bestDescription`


<!-- END_b4b25b5400e72b03bb9cfb1b51f490ca -->

<!-- START_859e99a75b6a4f41ac276193a7c82115 -->
## Business Description List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/businessDescription" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/businessDescription"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Business Description data found.",
    "data": [
        {
            "id": 1,
            "name": "Independent Fitness Professional",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/businessDescription`


<!-- END_859e99a75b6a4f41ac276193a7c82115 -->

<!-- START_a0b68060e3117237401e9976ce13a6df -->
## Block Focus List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/blockFocusList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/blockFocusList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Block Focus list found.",
    "data": [
        {
            "id": 1,
            "name": "Accumulation 1",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Accumulation 2",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Accumulation 3",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "name": "Intensification 1",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "name": "Intensification 2",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 6,
            "name": "Intensification 3",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 7,
            "name": "Realization 1",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/blockFocusList`


<!-- END_a0b68060e3117237401e9976ce13a6df -->

<!-- START_832d679ac34f3b99197bf8765c1ae614 -->
## Athlete Profile List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/athleteProfileList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/athleteProfileList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Athlete Profile list found.",
    "data": [
        {
            "id": 1,
            "name": "Gorilla",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 2,
            "name": "Kangaroo",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        }
    ]
}
```

### HTTP Request
`GET api/user/athleteProfileList`


<!-- END_832d679ac34f3b99197bf8765c1ae614 -->

<!-- START_7b34f2cc9962077b2f0b41430cd27847 -->
## Season List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/seasonList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/seasonList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Season list found.",
    "data": [
        {
            "id": 1,
            "name": "In-Season",
            "created_at": "2020-04-22 15:09:32",
            "updated_at": "2020-04-22 15:09:32"
        },
        {
            "id": 2,
            "name": "Off-Season",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 3,
            "name": "Post-Season",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        }
    ]
}
```

### HTTP Request
`GET api/user/seasonList`


<!-- END_7b34f2cc9962077b2f0b41430cd27847 -->

<!-- START_7ee4e84887f78b2846fbe439f3e0ec28 -->
## Sport List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/sportList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/sportList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Sport list found.",
    "data": [
        {
            "id": 1,
            "name": "Baseball",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 2,
            "name": "Volleyball",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 3,
            "name": "Basketball",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 4,
            "name": "Swimming",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 5,
            "name": "Tennis",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 6,
            "name": "Soccer",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 7,
            "name": "Hockey",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 8,
            "name": "Football",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        }
    ]
}
```

### HTTP Request
`GET api/user/sportList`


<!-- END_7ee4e84887f78b2846fbe439f3e0ec28 -->

<!-- START_3e5c6306b6762b12bc73bc879d191d04 -->
## Training Age/Level List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/trainingAgeList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/trainingAgeList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Training Age list found.",
    "data": [
        {
            "id": 1,
            "name": "0",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 2,
            "name": "1",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 3,
            "name": "2",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 4,
            "name": "3",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        },
        {
            "id": 5,
            "name": "4",
            "created_at": "2020-04-22 15:09:33",
            "updated_at": "2020-04-22 15:09:33"
        }
    ]
}
```

### HTTP Request
`GET api/user/trainingAgeList`


<!-- END_3e5c6306b6762b12bc73bc879d191d04 -->

<!-- START_28182eabde324fcf274cc5b39be7a7f1 -->
## Program Goal List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/programGoalList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/programGoalList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Goal list found.",
    "data": [
        {
            "id": 1,
            "name": "Weight Loss",
            "template_type_id": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Strength",
            "template_type_id": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Muscle",
            "template_type_id": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/user/programGoalList`


<!-- END_28182eabde324fcf274cc5b39be7a7f1 -->

#Plan management


APIs for managing Plans
<!-- START_d2c9f7910b3600e54493e3d78d84cf10 -->
## Plan List

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/plans" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/plans"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Plans fetched successfully.",
    "data": [
        {
            "id": 1,
            "name": "Basic Plan",
            "no_of_user": 10,
            "price": "10",
            "status": 1,
            "created_at": "2020-04-02 12:53:09",
            "updated_at": "2020-04-02 12:53:09"
        }
    ]
}
```

### HTTP Request
`GET api/user/plans`


<!-- END_d2c9f7910b3600e54493e3d78d84cf10 -->

#Program Template Pdf Mangement


APIs for managing Program Template manage
<!-- START_c94246c26625f0ad0a243923135410cf -->
## Add Guest

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/ProgramTemplatePdf" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"program_controls_id":"recusandae","email":[],"notes":"incidunt","name":"id","pdf":"et"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/ProgramTemplatePdf"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "program_controls_id": "recusandae",
    "email": [],
    "notes": "incidunt",
    "name": "id",
    "pdf": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user/ProgramTemplatePdf`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `program_controls_id` | string |  required  | Program Control Id.
        `email` | array |  required  | Email.
        `notes` | string |  required  | Notes.
        `name` | string |  required  | Name.
        `pdf` | file |  required  | pdf.
    
<!-- END_c94246c26625f0ad0a243923135410cf -->

#ProgramTemplate management


APIs for managing ProgramTemplate
<!-- START_deda699288152e8ef18c4d8477238c38 -->
## ProgramTemplate Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/getTemplate" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/getTemplate"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template Data Found successfully.",
    "data": [
        {
            "id": 1,
            "name": "Individual Templates",
            "created_at": null,
            "updated_at": null,
            "programtemplate": [],
            "programgoal": [
                {
                    "id": 1,
                    "name": "Weight Loss",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "goaltemplate": [
                        {
                            "id": 3,
                            "name": "FLStrength2",
                            "user_id": 1,
                            "template_type_id": 1,
                            "program_goal_id": 1,
                            "status": 1,
                            "added_by": "admin",
                            "created_at": "2020-04-09 12:55:46",
                            "updated_at": "2020-04-09 12:55:46"
                        }
                    ]
                },
                {
                    "id": 2,
                    "name": "Strength",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "goaltemplate": []
                },
                {
                    "id": 3,
                    "name": "Muscle",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "goaltemplate": []
                }
            ]
        },
        {
            "id": 2,
            "name": "SGPT Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": [],
            "programtemplate": [
                {
                    "id": 11,
                    "name": "TrisetsDescending",
                    "user_id": 1,
                    "template_type_id": 2,
                    "program_goal_id": 0,
                    "status": 1,
                    "added_by": "admin",
                    "created_at": "2020-04-09 13:00:45",
                    "updated_at": "2020-04-09 13:00:45"
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET api/user/getTemplate`


<!-- END_deda699288152e8ef18c4d8477238c38 -->

<!-- START_24746c84f027447719bdc43081d46ea8 -->
## Program Template Type

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/getTemplateType" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/getTemplateType"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template Data Found successfully.",
    "data": [
        {
            "id": 1,
            "name": "Individual Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": [
                {
                    "id": 1,
                    "name": "Weight Loss",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 2,
                    "name": "Strength",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 3,
                    "name": "Muscle",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null
                }
            ]
        },
        {
            "id": 2,
            "name": "SGPT Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": []
        },
        {
            "id": 3,
            "name": "Beast U Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": []
        }
    ]
}
```

### HTTP Request
`GET api/user/getTemplateType`


<!-- END_24746c84f027447719bdc43081d46ea8 -->

<!-- START_5ab9a4556ce1ab184f559dd5d929a9db -->
## Program Template Type Create

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/createTemplate" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"template_type_id":"voluptatum","program_goal_id":"tenetur","day_id":"quia","name":"eaque"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/createTemplate"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "template_type_id": "voluptatum",
    "program_goal_id": "tenetur",
    "day_id": "quia",
    "name": "eaque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template added Successfully.",
    "data": {
        "user_id": 6,
        "template_type_id": "1",
        "program_goal_id": "1",
        "name": "test",
        "added_by": "coach",
        "updated_at": "2020-04-10 09:46:15",
        "created_at": "2020-04-10 09:46:15",
        "id": 3
    }
}
```

### HTTP Request
`POST api/user/createTemplate`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `template_type_id` | string |  required  | Main Template Type Id.
        `program_goal_id` | string |  optional  | Child Program Goal Id.
        `day_id` | string |  optional  | Day Id.
        `name` | string |  required  | Name.
    
<!-- END_5ab9a4556ce1ab184f559dd5d929a9db -->

<!-- START_59418236b1a4f026828861cc364253f2 -->
## Template Type Get by id

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/editTemplate/1" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/editTemplate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template Data Found Successfully.",
    "data": {
        "user_id": 6,
        "template_type_id": "1",
        "program_goal_id": "1",
        "name": "test",
        "added_by": "coach",
        "updated_at": "2020-04-10 09:46:15",
        "created_at": "2020-04-10 09:46:15",
        "id": 3
    }
}
```

### HTTP Request
`GET api/user/editTemplate/{id}`


<!-- END_59418236b1a4f026828861cc364253f2 -->

<!-- START_de1662937768ff434d18b95e7f39dcd5 -->
## Program Template Type Update

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/updateTemplate" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"template_type_id":"et","program_goal_id":"ut","name":"beatae","id":18}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/updateTemplate"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "template_type_id": "et",
    "program_goal_id": "ut",
    "name": "beatae",
    "id": 18
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template Update Successfully.",
    "data": {
        "user_id": 6,
        "template_type_id": "1",
        "program_goal_id": "1",
        "name": "test",
        "added_by": "coach",
        "updated_at": "2020-04-10 09:46:15",
        "created_at": "2020-04-10 09:46:15",
        "id": 3
    }
}
```

### HTTP Request
`POST api/user/updateTemplate`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `template_type_id` | string |  required  | Main Template Type Id.
        `program_goal_id` | string |  optional  | Child Program Goal Id.
        `name` | string |  required  | Name.
        `id` | integer |  required  | Id.
    
<!-- END_de1662937768ff434d18b95e7f39dcd5 -->

<!-- START_848d91eb8cf1cd7e6056265fefa81544 -->
## Template Type Deleted by id

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/deleteTemplate/1" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/deleteTemplate/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template Deleted Successfully."
}
```

### HTTP Request
`GET api/user/deleteTemplate/{id}`


<!-- END_848d91eb8cf1cd7e6056265fefa81544 -->

<!-- START_c5267d8664c946bc9e373e6fdc5d6ac4 -->
## Program Template List

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/programTemplateList" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"template_type_id":"perferendis","program_goal_id":"quia","day_id":"sed"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/programTemplateList"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "template_type_id": "perferendis",
    "program_goal_id": "quia",
    "day_id": "sed"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Template list found.",
    "data": [
        {
            "id": 3,
            "name": "FLStrength2 Updated",
            "user_id": 1,
            "template_type_id": 1,
            "program_goal_id": 1,
            "status": 1,
            "added_by": "admin",
            "created_at": "2020-04-09 18:25:46",
            "updated_at": "2020-04-24 16:08:41"
        }
    ]
}
```

### HTTP Request
`POST api/user/programTemplateList`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `template_type_id` | string |  required  | Main Template Type.
        `program_goal_id` | string |  optional  | Program goal id under main template id.
        `day_id` | string |  optional  | Day Id.
    
<!-- END_c5267d8664c946bc9e373e6fdc5d6ac4 -->

#User Program management


APIs for managing User Programs
<!-- START_f43495656f8d3bea69a7ddbcc283ab7a -->
## User Program Create

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/saveUserProgram" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"assessment":[],"traiining_age":"autem","traiining_block":"et","type":"debitis","athlete_type":"voluptatibus","what_based":"magni","what_season":"est"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/saveUserProgram"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "assessment": [],
    "traiining_age": "autem",
    "traiining_block": "et",
    "type": "debitis",
    "athlete_type": "voluptatibus",
    "what_based": "magni",
    "what_season": "est"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "User Program saved Successfully."
}
```

### HTTP Request
`POST api/user/saveUserProgram`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `assessment` | array |  required  | Assessment.
        `traiining_age` | numeric |  required  | Traiining Age.
        `traiining_block` | string |  required  | Traiining Block.
        `type` | string |  required  | Type.
        `athlete_type` | string |  required  | Athlete Type.
        `what_based` | string |  required  | Athlete Profile.
        `what_season` | string |  required  | Season.
    
<!-- END_f43495656f8d3bea69a7ddbcc283ab7a -->

<!-- START_88a67c6e952b3c57dec70a5fe438ea80 -->
## User Fetch Last Program

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/fetchLastProgram/1" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"id":"unde"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/fetchLastProgram/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "id": "unde"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Last Program fetched Successfully.",
    "data": [
        {
            "id": 10,
            "user_id": 29,
            "aslr": "Inhaled",
            "forthis": "individual",
            "infrasternal_angle": "Narrow",
            "shoulder_extension": "Inhaled",
            "shoulder_external": "Exhaled",
            "shoulder_flexion": "Inhaled",
            "supine_hip": "Inhaled",
            "template": null,
            "toe_touch": "Inhaled",
            "toe_touch_to_squat": "Exhaled",
            "traiining_age": 4,
            "traiining_block": "Accumulation Block",
            "type": "athlete",
            "athlete_type": "basketball",
            "what_based": "Kangaroo",
            "what_season": "Off-Season",
            "created_at": "2020-04-23 05:22:40",
            "updated_at": "2020-04-23 05:22:40"
        }
    ]
}
```

### HTTP Request
`GET api/user/fetchLastProgram/{id}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | string |  required  | Program ID.
    
<!-- END_88a67c6e952b3c57dec70a5fe438ea80 -->

<!-- START_01056d5ca4393941370a7eb31a172cf5 -->
## User Program Control Create

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/saveProgramControl" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"block_focus":6,"training_level":4,"assessment_results":15,"athlete_profile":2,"season":18,"sport":2,"program_name":"quis","last_program_id":18,"programChartData":"ad"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/saveProgramControl"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "block_focus": 6,
    "training_level": 4,
    "assessment_results": 15,
    "athlete_profile": 2,
    "season": 18,
    "sport": 2,
    "program_name": "quis",
    "last_program_id": 18,
    "programChartData": "ad"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "User Program Control saved Successfully."
}
```

### HTTP Request
`POST api/user/saveProgramControl`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `block_focus` | integer |  required  | Block Focus.
        `training_level` | integer |  required  | Training Level.
        `assessment_results` | integer |  required  | Assessment Results.
        `athlete_profile` | integer |  required  | Athlete Profile.
        `season` | integer |  required  | Season.
        `sport` | integer |  required  | Sport.
        `program_name` | string |  required  | Program Name.
        `last_program_id` | integer |  required  | Program ID.
        `programChartData` | string |  required  | Program Chart Data.
    
<!-- END_01056d5ca4393941370a7eb31a172cf5 -->

<!-- START_33d20a347af3fbbfc490e42300370889 -->
## User Fetch Program Chart Details

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/fetchProgramChartDetails" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"main_template_id":"dolor","program_goal_id":"eveniet","template_id":"possimus","what_season":"repudiandae","traiining_block":"quia","what_based":"sunt","training_age":"quaerat"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/fetchProgramChartDetails"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "main_template_id": "dolor",
    "program_goal_id": "eveniet",
    "template_id": "possimus",
    "what_season": "repudiandae",
    "traiining_block": "quia",
    "what_based": "sunt",
    "training_age": "quaerat"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Chart Details fetched Successfully.",
    "data": [
        {
            "template": 1,
            "first_portion": [
                {
                    "R1": [
                        {
                            "subcategory": "Postural Resets",
                            "frequency": "\r\n",
                            "time": "\r\n",
                            "sets_reps": "2x5 breaths\r\n",
                            "exercises": []
                        }
                    ]
                }
            ],
            "second_portion": [
                {
                    "day1": [
                        {
                            "R4": [
                                {
                                    "id": 3,
                                    "main_template_id": 1,
                                    "program_goal_id": 1,
                                    "template_id": 37,
                                    "category_id": 24,
                                    "subcategory_id": 98,
                                    "tempo": "",
                                    "rest": "",
                                    "week1": "3x5",
                                    "week2": "3x5",
                                    "week3": "3x5",
                                    "week4": "3x5",
                                    "day": "1",
                                    "sequence": "",
                                    "frequency": null,
                                    "time": null,
                                    "sets_reps": null,
                                    "status": 1,
                                    "created_at": null,
                                    "updated_at": null,
                                    "exercises": [
                                        {
                                            "id": 512,
                                            "name": "Snap Down + Lateral Broad Jump",
                                            "category_id": 24,
                                            "subcategory_id": 98,
                                            "training_age": 1,
                                            "athlete_option": "Gorilla",
                                            "status": 1,
                                            "created_at": "2020-04-16 05:25:05",
                                            "updated_at": "2020-04-16 05:25:05"
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
}
```

### HTTP Request
`POST api/user/fetchProgramChartDetails`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `main_template_id` | string |  required  | Main Template Id.
        `program_goal_id` | string |  optional  | Program Goal Id.
        `template_id` | string |  optional  | Template Id.
        `what_season` | string |  optional  | What Season.
        `traiining_block` | string |  optional  | Traiining Block.
        `what_based` | string |  optional  | What Based.
        `training_age` | string |  optional  | Training Age.
    
<!-- END_33d20a347af3fbbfc490e42300370889 -->

<!-- START_d6efc53cf0be4edb0f828b9fd4083d91 -->
## User Get All Program Chart Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/getAllProgram" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/getAllProgram"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/user/getAllProgram`


<!-- END_d6efc53cf0be4edb0f828b9fd4083d91 -->

<!-- START_3c5f410737863a50011b1ced78e408ef -->
## User Edit Program Chart Details

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/editProgramChartDetails/1" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/editProgramChartDetails/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Chart Details fetched Successfully.",
    "data": [
        {
            "template": 1,
            "first_portion": [
                {
                    "R1": [
                        {
                            "subcategory": "Postural Resets",
                            "frequency": "\r\n",
                            "time": "\r\n",
                            "sets_reps": "2x5 breaths\r\n",
                            "exercises": []
                        }
                    ]
                }
            ],
            "second_portion": [
                {
                    "day1": [
                        {
                            "R4": [
                                {
                                    "id": 3,
                                    "main_template_id": 1,
                                    "program_goal_id": 1,
                                    "template_id": 37,
                                    "category_id": 24,
                                    "subcategory_id": 98,
                                    "tempo": "",
                                    "rest": "",
                                    "week1": "3x5",
                                    "week2": "3x5",
                                    "week3": "3x5",
                                    "week4": "3x5",
                                    "day": "1",
                                    "sequence": "",
                                    "frequency": null,
                                    "time": null,
                                    "sets_reps": null,
                                    "status": 1,
                                    "created_at": null,
                                    "updated_at": null,
                                    "exercises": [
                                        {
                                            "id": 512,
                                            "name": "Snap Down + Lateral Broad Jump",
                                            "category_id": 24,
                                            "subcategory_id": 98,
                                            "training_age": 1,
                                            "athlete_option": "Gorilla",
                                            "status": 1,
                                            "created_at": "2020-04-16 05:25:05",
                                            "updated_at": "2020-04-16 05:25:05"
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET api/user/editProgramChartDetails/{id}`


<!-- END_3c5f410737863a50011b1ced78e408ef -->

<!-- START_5bd23046283f2c58fea42de3e8678c17 -->
## Program Deleted by id

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/deleteProgram/1" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/deleteProgram/1"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Program Deleted Successfully."
}
```

### HTTP Request
`GET api/user/deleteProgram/{id}`


<!-- END_5bd23046283f2c58fea42de3e8678c17 -->

<!-- START_cb240ee8a12b6e36dde965d8e800fcfe -->
## User Program Control Update

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/updateProgramControl" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"program_id":19,"block_focus":16,"training_level":3,"assessment_results":15,"athlete_profile":20,"season":3,"sport":11,"program_name":"impedit","programChartData":"eaque"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/updateProgramControl"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "program_id": 19,
    "block_focus": 16,
    "training_level": 3,
    "assessment_results": 15,
    "athlete_profile": 20,
    "season": 3,
    "sport": 11,
    "program_name": "impedit",
    "programChartData": "eaque"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "User Program Control updated Successfully."
}
```

### HTTP Request
`POST api/user/updateProgramControl`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `program_id` | integer |  required  | Program ID.
        `block_focus` | integer |  required  | Block Focus.
        `training_level` | integer |  required  | Training Level.
        `assessment_results` | integer |  required  | Assessment Results.
        `athlete_profile` | integer |  required  | Athlete Profile.
        `season` | integer |  required  | Season.
        `sport` | integer |  required  | Sport.
        `program_name` | string |  required  | Program Name.
        `programChartData` | string |  required  | Program Chart Data.
    
<!-- END_cb240ee8a12b6e36dde965d8e800fcfe -->

#User management


APIs for managing User
<!-- START_638687f1aca2f1e69b360d1516c7c1f9 -->
## Register

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/register" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"totam","password":"molestias","business_name":"possimus","step":"quae","role":"molestiae"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/register"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "email": "totam",
    "password": "molestias",
    "business_name": "possimus",
    "step": "quae",
    "role": "molestiae"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user/register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email.
        `password` | string |  required  | Password.
        `business_name` | string |  required  | Business Name.
        `step` | string |  required  | Step.
        `role` | string |  required  | Role.
    
<!-- END_638687f1aca2f1e69b360d1516c7c1f9 -->

<!-- START_57e3b4272508c324659e49ba5758c70f -->
## Login

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/login" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"alias","password":"ad"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/login"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "email": "alias",
    "password": "ad"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "You have successfully logged in.",
    "data": {
        "id": 6,
        "first_name": "User",
        "last_name": "api",
        "email": "user@gmail.com",
        "status": 1,
        "email_verified_at": null,
        "business_name": null,
        "created_at": "2020-04-01 10:56:58",
        "updated_at": "2020-04-01 10:56:58",
        "role": "coach"
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTI1N2U5NTczNzY3NWI5MmFjYjY2YjZmY2Y1MmFlZWViZTRhZTA0NDk0Yjg3Yjg4MjYxMzYxMDZkY2U5NTQ1YzY0Njg4OTYxNWVkMzdmZTEiLCJpYXQiOjE1ODU3Mzg4ODQsIm5iZiI6MTU4NTczODg4NCwiZXhwIjoxNjE3Mjc0ODgzLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.pcQEFY-E_Ydwa9jJux70PqOomzs7YE_cbBOGe-f0HoSswrjpDx-cuoUrw7TsqM_FA9B85DkGSOBO0PWUG0-Vzg0YA8kuP6Ie5QMg6KEkibPHYqVmJgtAucLtqFJVTfa4_qc6ps8WlX3v2Zg05MlMtiYH3yO6EUkmKlIYh-42Xg3vT8hWCpx76WTVrOIA1ZWc3ubsRNJ12yCRD5LXBzMZpjrGmf0Xwoaqoned9liZJiZlfUnyp17-bmXwGvHrHhGq4lOOJehLeWdh2mdvp4pGKGQIYe0VHevI08xbiADMBxHIeiVk_n7JN5brcGnZZD8dGS0JOEO-LmBhu7C2-on1xDC84uaSzontyOEEYb0fS9pHT_DOGS7E0bEgTcnQsz1efnZjoPs8opYir9DLx1pNfYQKqrE3kjqxMMTa4zp1U0rpoJKyU9ujV1OTxiP_mZLjaen7baY0dMD8BZQJUMBrEVgs5nKfrfRRC1bA1IgMotwqgonbsmwRYnHO_ipKPAxxRi5SESe1MTbfTp-Lg-kZIGto0ENOGEy5SFK_OXdjLXcxImDOsKDa3nIQa4qVMra9fR47srDLYWKiA2qdaxaAE6k5vH6ranHrsXE7yxnurZng7sAzGHRx8VsDUF9LoIb7o9pAE_ld50u4pYDUUD02CF9Fm5J3zWn1AnSkVUtQUMg"
}
```

### HTTP Request
`POST api/user/login`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email.
        `password` | string |  required  | Password.
    
<!-- END_57e3b4272508c324659e49ba5758c70f -->

<!-- START_18aaa2416e9ae8a6fb4ed285345a6953 -->
## Forgot Password

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/forgotPassword" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"email":"hic"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/forgotPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "email": "hic"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`POST api/user/forgotPassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `email` | string |  required  | Email.
    
<!-- END_18aaa2416e9ae8a6fb4ed285345a6953 -->

<!-- START_b655d0266f75fadab1fcfb9a5ae65675 -->
## Logout user (Revoke the token)

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/logout" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/user/logout`


<!-- END_b655d0266f75fadab1fcfb9a5ae65675 -->

<!-- START_a4251b7143964e3f7d9fb181a7b86ba5 -->
## Profile

> Example request:

```bash
curl -X GET \
    -G "https://beast.dedicateddevelopers.us/api/user/profile" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Profile fetched successfully.",
    "data": {
        "id": 6,
        "first_name": "User",
        "last_name": "api",
        "email": "user@gmail.com",
        "status": 1,
        "email_verified_at": null,
        "business_name": null,
        "created_at": "2020-04-01 10:56:58",
        "updated_at": "2020-04-01 10:56:58"
    }
}
```

### HTTP Request
`GET api/user/profile`


<!-- END_a4251b7143964e3f7d9fb181a7b86ba5 -->

<!-- START_407404878bf31488b51bf1c86a71d7b3 -->
## Change Password

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/changePassword" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"old_password":"ea","new_password":"doloremque","confirm_new_password":"voluptatem"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/changePassword"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "old_password": "ea",
    "new_password": "doloremque",
    "confirm_new_password": "voluptatem"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "message": "Password changed successfully.",
    "data": {
        "id": 6,
        "first_name": "User",
        "last_name": "api",
        "email": "user@gmail.com",
        "status": 1,
        "email_verified_at": null,
        "business_name": null,
        "created_at": "2020-04-01 10:56:58",
        "updated_at": "2020-04-01 10:56:58"
    }
}
```

### HTTP Request
`POST api/user/changePassword`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `old_password` | string |  required  | old_password.
        `new_password` | string |  required  | new_password.
        `confirm_new_password` | string |  required  | confirm_new_password.
    
<!-- END_407404878bf31488b51bf1c86a71d7b3 -->

<!-- START_8b84282b32206ee1d09231f1da675a2a -->
## Profile Update

> Example request:

```bash
curl -X POST \
    "https://beast.dedicateddevelopers.us/api/user/profileUpdate" \
    -H "Content-Type: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"first_name":"consequatur","last_name":"iure","email":"velit","business_name":"omnis","country_id":"quos","city":"tempora","time_zone":"vel","business_descriptions_id":"non","business_phoneno":"dolor","business_other_details":"error","best_descriptions_id":"necessitatibus","best_other_details":"a","step":"eius","profile_image":"earum"}'

```

```javascript
const url = new URL(
    "https://beast.dedicateddevelopers.us/api/user/profileUpdate"
);

let headers = {
    "Content-Type": "application/json",
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
};

let body = {
    "first_name": "consequatur",
    "last_name": "iure",
    "email": "velit",
    "business_name": "omnis",
    "country_id": "quos",
    "city": "tempora",
    "time_zone": "vel",
    "business_descriptions_id": "non",
    "business_phoneno": "dolor",
    "business_other_details": "error",
    "best_descriptions_id": "necessitatibus",
    "best_other_details": "a",
    "step": "eius",
    "profile_image": "earum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`POST api/user/profileUpdate`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `first_name` | string |  required  | First Name.
        `last_name` | string |  required  | Last Name.
        `email` | string |  required  | Email.
        `business_name` | string |  required  | Business Name.
        `country_id` | string |  required  | Conuntry Id.
        `city` | string |  required  | City.
        `time_zone` | string |  required  | Time Zone.
        `business_descriptions_id` | string |  required  | Business description Id.
        `business_phoneno` | string |  required  | Business Phoneno.
        `business_other_details` | string |  required  | Business other details.
        `best_descriptions_id` | string |  required  | Best descriptions id.
        `best_other_details` | string |  required  | Best other details.
        `step` | string |  required  | Step.
        `profile_image` | string |  required  | Profile Image.
    
<!-- END_8b84282b32206ee1d09231f1da675a2a -->


