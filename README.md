# bookstore

PHP Laravel 9.x project for bookstore website including user view and api; use authentication & authorization for four types of users (guest - user - admin - manager)

* All users can view books and categories
* All users expect guest can add/edit books and categories
* only admin and manager can delete books and categories
* manager manage others' roles and can delete thier accounts

# Postman

```
{
	"info": {
		"_postman_id": "",
		"name": "Bookstore",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "AUTH",
			"item": [
				{
					"name": "Registeration",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "name",
									"value": "Adel Shakal",
									"type": "text"
								},
								{
									"key": "email",
									"value": "adel@shakal.com",
									"type": "text"
								},
								{
									"key": "password",
									"value": "123456789",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/register",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"register"
							]
						}
					},
					"response": []
				},
				{
					"name": "Login",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "email",
									"value": "islamhani433@gmail.com",
									"type": "text"
								},
								{
									"key": "password",
									"value": "123456789",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/login",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"login"
							]
						}
					},
					"response": []
				},
				{
					"name": "Logout",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "2|TC3spxQVzKTD9kUzLWbo1Bmv0SweNiRZujsNlKiu",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/logout",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"logout"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Books",
			"item": [
				{
					"name": "All Books",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/books/",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"books",
								""
							]
						}
					},
					"response": []
				},
				{
					"name": "Book",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/books/show/1",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"books",
								"show",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create Book",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "name",
									"value": "Quran",
									"description": "min:5",
									"type": "text"
								},
								{
									"key": "author",
									"value": "Allah",
									"description": "min:5",
									"type": "text"
								},
								{
									"key": "desc",
									"value": "",
									"description": "min:75",
									"type": "text"
								},
								{
									"key": "cat_id",
									"value": "2",
									"description": "number",
									"type": "text"
								},
								{
									"key": "img",
									"description": "jpg - jpeg - png - jfif",
									"type": "file",
									"src": []
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/books/store/",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"books",
								"store",
								""
							]
						}
					},
					"response": []
				},
				{
					"name": "Edit Book",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "name",
									"value": "Quran",
									"description": "min:5",
									"type": "text"
								},
								{
									"key": "author",
									"value": "Allah",
									"description": "min:5",
									"type": "text"
								},
								{
									"key": "desc",
									"value": "",
									"description": "min:75",
									"type": "text"
								},
								{
									"key": "cat_id",
									"value": "2",
									"description": "number",
									"type": "text"
								},
								{
									"key": "img",
									"description": "jpg - jpeg - png - jfif",
									"type": "file",
									"src": []
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/books/update/12",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"books",
								"update",
								"12"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete Book",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/books/delete/12",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"books",
								"delete",
								"12"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Categories",
			"item": [
				{
					"name": "All Categories",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/cats/",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"cats",
								""
							]
						}
					},
					"response": []
				},
				{
					"name": "Category",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/cats/show/1",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"cats",
								"show",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create Category",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "2|TC3spxQVzKTD9kUzLWbo1Bmv0SweNiRZujsNlKiu",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "name",
									"value": "Mo salah",
									"description": "min:3",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/cats/store/",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"cats",
								"store",
								""
							]
						}
					},
					"response": []
				},
				{
					"name": "Edit Category",
					"request": {
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "name",
									"value": "",
									"description": "min:3",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/cats/update/14",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"cats",
								"update",
								"14"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete Category",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "2|TC3spxQVzKTD9kUzLWbo1Bmv0SweNiRZujsNlKiu",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/cats/delete/15",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"cats",
								"delete",
								"15"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Users",
			"item": [
				{
					"name": "All Users",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "4|LkOaVVW1ShtHu8ZqP8kD9WEbqbEGVYcRO3K9tv6s",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/users",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"users"
							]
						}
					},
					"response": []
				},
				{
					"name": "Edit User Role",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "4|LkOaVVW1ShtHu8ZqP8kD9WEbqbEGVYcRO3K9tv6s",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "role",
									"value": "admin",
									"description": "{manager, admin, user}",
									"type": "text"
								}
							]
						},
						"url": {
							"raw": "http://127.0.0.1:8000/api/users/role/update/4",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"users",
								"role",
								"update",
								"4"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete User",
					"request": {
						"auth": {
							"type": "bearer",
							"bearer": [
								{
									"key": "token",
									"value": "4|LkOaVVW1ShtHu8ZqP8kD9WEbqbEGVYcRO3K9tv6s",
									"type": "string"
								}
							]
						},
						"method": "GET",
						"header": [],
						"url": {
							"raw": "http://127.0.0.1:8000/api/users/delete/4",
							"protocol": "http",
							"host": [
								"127",
								"0",
								"0",
								"1"
							],
							"port": "8000",
							"path": [
								"api",
								"users",
								"delete",
								"4"
							]
						}
					},
					"response": []
				}
			]
		}
	]
}
```
