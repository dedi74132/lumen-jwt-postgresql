# Lumen REST API With JWT-AUTH & Postgresql

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

This project to create Authentication (Register & Login) Users using JWT-AUTH as authentication token and Postgresql as database
## Database Structure 
- open root app and run "npm install"
- custom .env file using this data
[code]
DB_CONNECTION="pgsql"
DB_HOST="localhost"
DB_PORT="5432"
DB_DATABASE=[your_db_name]
DB_USERNAME=[your_db_username]
DB_PASSWORD=[your_db_password]
[/code]

- Create new database Postgresql
- Running Migration "php artisan migrate"
- Running Server "php artisan serve"
- Open Postman and register new user :
    - url : http://127.0.0.1:8000/api/register
    - method : POST
    - choose Body -> form-data
    - fill this data
        - value : name, key : [your name]
        - value : email, key : [your email]
        - value : password, key : [your pasword]
        - value : password_confirmation, key : [your pasword]
    - response
    [code]
    {
    "code": 200,
    "status": "success",
    "data": {
        "name": "User Test",
        "phone": "1111111",
        "email": "test@gmail.com",
        "password": "$2y$10$o8su6QQfVBAiMsansGDDWelEQPNDFvsBVhN0HxgNinoUl4UFKgsBK",
        "code": "TEST-I18DVSZ-26185",
        "label": "6226185215761",
        "id": "e7fec6fb-2d4a-416c-966d-6f2c56226858",
        "updated_at": "2021-07-20T08:08:49.000000Z",
        "created_at": "2021-07-20T08:08:49.000000Z"
    },
    "message": "User Registered"
    }
    [/code]

    - if success register new user, then Login using email & password
    [code]
    {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYyNjc2ODczNSwiZXhwIjoxNjI2NzcyMzM1LCJuYmYiOjE2MjY3Njg3MzUsImp0aSI6IjZnbHlkUHpXcFFRZk1WTmkiLCJzdWIiOiJlN2ZlYzZmYi0yZDRhLTQxNmMtOTY2ZC02ZjJjNTYyMjY4NTgiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.LiJuXawsEXYmkzafYyps9FUePgHbIug1Zbl4emSVhxs",
        "token_type": "bearer",
        "expires_in": 3600
    }    
    [/code]
    - save the access_token
    - For example, try to access GET['http://127.0.0.1:8000/api/me']
    - response = Unautorized
    - then retry to access GET['http://127.0.0.1:8000/api/me'], but now with header params 
        - Authorization : bearer [your token from login]
    
## Features
- PHP >= v7.3
- Lumen v8
- Lumen Generator v8.2
- jwt-auth v1.0
- postgresql v13
