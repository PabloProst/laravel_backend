# LARAVEL CHAT APP

<details>
  <summary>Content 📝</summary>
  <ol>
    <li><a href="#about-the-project">About the project</a></li>
    <li><a href="#stack">Stack</a></li>
    <li><a href="#database-diagram">Database diagram</a></li>
    <li><a href="#local-installation">Local installation</a></li>
    <li><a href="#endpoints">Endpoints</a></li>
    <li><a href="#future-features">Future features</a></li>
    <li><a href="#errors">Errors</a></li>
    <li><a href="#developer">Developer</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

## About the project
This project consists of a backend for a chatting app using the framework of PHP Laravel, working with a MySQL database.

## Stack
Technologies used:
<div align="center">
<a href="https://www.mysql.com/">
    <img src= "https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white"/>
</a>
<a href="https://www.php.net/">
    <img src= "https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
</a>
<a href="https://laravel.com/">
    <img src= "https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
</a>
<a href="https://getcomposer.org/">
    <img src= "https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white"/>
</a>
  <a href="https://git-scm.com/">
    <img src="https://img.shields.io/badge/GIT-E44C30?style=for-the-badge&logo=git&logoColor=white"/>
</a>
  <a href="https://www.postman.com/">
    <img src="https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=Postman&logoColor=white"/>
</a>
</div>


## Database diagram
![db_laravel](https://github.com/PabloProst/laravel_backend/assets/139993876/3ff4fa6d-cdde-449e-8bc0-9a069aac70b0)

## Local installation
1. Clone the repository
2. ` $ php artisan install `
3. We connect our repository with the database
4. ``` $ php artisan migrate ```
5. ``` $ php artisan db:seed "here put the name of the seed" ``` 
6. ``` $ php artisan serve ``` 
7. ...

## Endpoints
<details>
<summary>Endpoints</summary>

- USERS
    - REGISTER

            POST http://localhost:8000/api/register
        body:
        ``` json
            {
                "name": "Alex",
                "nickname": "VALDITOR"
                "email": "alex@gmail.com",
                "password": "Alex!"
            }
        ```

    - LOG IN

            POST http://localhost:8000/api/login 
        body:
        ``` json
            {
                "email": "alex@gmail.com",
                "password": "Alex!"
            }
        ```
    - LOG OUT

            POST http://localhost:8000/api/logout

    - PROFILE (Requires Auth: user)

            GET http://localhost:8000/api/profile

    - UPDATE (Requires Auth: user)

            PUT http://localhost:8000/api/user/update 
   body:
  ``` json
               {
                  "name": "Alejandro",
                  "nickname": "Torvaldi"
              }
   ```

  - GET ROOMS CREATED BY USER BY (Requires Auth)

            GET http://localhost:8000/api/users/3

  - GET ALL GAMES

            GET http://localhost:8000/api/getallgames
        
- ROOMS
    - NEW ROOM (Requires Auth: user)

            POST http://localhost:8000/api/newroom
        body:
        ``` json
            {
                "name": "freaks",
                "game_id": "2"
            }
        ```

    - UPDATE ROOM (Requires Auth: user)

            PUT http://localhost:8000/api/update/4
      body:
        ``` json
            {
                "name": "cs2",
            }
        ```

    - DELETE ROOM (Requires Auth: user)

            DELETE http://localhost:8000/api/deleteroom/5

- ROOMS USERS
    - NEW MEMBER (Requires Auth: user)

            POST http://localhost:8000/api/newmember/:id
    body:
        ``` json
            {
                "room_id": "1",
            }
        ```
  
    - DELETE MEMBER (Requires Auth: user)

            DELETE http://localhost:8000/api/deletemember
    body:
        ``` json
            {
                "room_id": "1",
            }
        ```

    - GET ALL PARTIES (Requires Auth: user)

            GET http://localhost:8000/api/getallparties

    - GET ALL MEMBERS BY ID (Requires Auth: super admin)

            GET http://localhost:8000/api/getallmembers/:id

- CHAT

    - CREATE MESSAGE (Requires Auth: user)

            POST http://localhost:8000/api/message 
   body:
  ``` json
               {
                  "message": "Hello There",
                  "room_id": 4
              }
   ```
  
    - DELETE MESSAGE (Requires Auth: user)

            DELETE http://localhost:8000/api/delete/:id

     - UPDATE MESSAGE (Requires Auth: user)

            PUT http://localhost:8000/api/update/:id
       
        body:
        ``` json
            {
                "message": "Bye There",
            }
        ```

    - GET ALL MESSAGE (Requires Auth: user)

            GET http://localhost:8000/api/getallmessage

- SUPERADMIN
    - GET ALL USERS (Requires Auth: super admin)

            GET http://localhost:8000/api/users

    - DELETE USER (Requires Auth: super admin)

            DELETE http://localhost:8000/api/delete/:id
  

    - CREATE GAME (Requires Auth: super admin)

            POST http://localhost:8000/api/creategame
  body:
   ``` json
            {
               "tittle": "Counter Strike 2",
               "image": "url image"
            }
    ```
   - UPDATE GAME (Requires Auth: super admin)

            POST http://localhost:8000/api/updategame/:id
  body:
   ``` json
            {
               "image": "url image new"
            }
    ```
   
   - DELETE GAME (Requires Auth: super admin)

            POST http://localhost:8000/api/deletegame/:id
</details>

## Future features
- That the endpoints bring the nickname of the users instead the users id´s.
- Add more validators 
- Formart the response of the endpoints 

## Errors
- The endpoints only can get the numbers of the id instead the nicknames.

## Developer

``` js
 const developers = "valditor ", "pvblo ", "BGMiralles;

 console.log("Developed by Alex Valdivielso, Pablo Prost and Borja Gutierrez a.k.a: " + developers);
```  

## Acknowledgments

We would like to thanks our classmates and teachers from the Geekshub FSD Bootcamp for their collaboration helping us me complete this project.

## Contact
<p>
    Alex Valdivielso
</p>
<a href="https://www.linkedin.com/in/alejandro-valdivielso-tortosa-9b2154273/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a>
<a href="https://github.com/VALDITOR" target="_blank"><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>
</p>
<p>
<p>
    Pablo Prost
</p>
<a href="https://www.linkedin.com/in/pablo-ezequiel-prost-926ab6297/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a>
<a href="https://github.com/PabloProst" target="_blank"><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>
</p>
<p>
    Borja Gutierrez
</p>
<a href="https://www.linkedin.com/in/borjagutierrezmiralles/" target="_blank"><img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank"></a> 
<a href="https://github.com/BGMiralles" target="_blank"><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>
</p>
