# url-shortener-microservice

URL Shortener Microservice API for [FCCs Apis And Microservices Certification](https://www.freecodecamp.com)

## Usage

Clone this repository to your server's public folder

`git clone https://github.com/EmanuilNikolov/url-shortener-microservice`

Use the provided `url-shortener-microservice.sql` SQL file to import the database structure to your own database.

Edit the `db_config.ini` file located in the `config` folder to the credentials of your own database.

Run your server, visit `localhost` and navigate to the folder where you cloned the repository

*If running for the first time, you must first submit a URL through the form because the database will be empty.*

### Pre-Requisites needed
- Apache Server, PHP & MySQL/MariaDB Server installed (I personally use the XAMPP bundle).

### User Requirements:
- I can POST a URL to `[project_url]/api/shorturl/new` and I will receive a shortened URL in the JSON response. Example: `{"original_url":"www.google.com","short_url":1}`

- If I pass an invalid URL that doesn't follow the `http(s)://www.example.com(/more/routes)` format, the JSON response will contain an error like `{"error":"invalid URL"}`

- When I visit the shortened URL, it will redirect me to my original link.

---

## License

Copyright (c) 2018 [Emanuil Nikolov](https://github.com/EmanuilNikolov)
