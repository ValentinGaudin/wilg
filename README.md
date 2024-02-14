<div align="center">
  <a href="https://github.com/ValentinGaudin/wilg">
    <h3 align="center">Wilg 💲</h3>
  </a>
  <p align="center">
    1st French solution for investments and payments in cryptos or euros
  </p>
</div>

## Table of Contents

- [About the Project](#about-the-project)
    - [Built With](#built-with)
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
    - [Additional Configuration](#Additional-Configuration)
- [Contact](#contact)

## About The Project

Wigl has the mission to offer an intuitive environment allowing users to benefit from the
opportunities offered by cryptocurrencies, in complete security, Wigl is a mobile application based on a REST API built with Laravel.

### Built With

- [Laravel](https://laravel.com/)
- [Fortify](https://laravel.com/docs/10.x/fortify)

## Getting Started

### Prerequisites

Make sure you have the following tools installed on your machine:
- [🐳 Docker (engine > 20 and compose > 2)](https://www.docker.com/)

## Installation

```shell
git clone git@github.com:ValentinGaudin/wilg.git
cp .env.example .env
```

### Additional Configuration

Now you can build and start the project :

```shell
docker compose up --build -d
```

Import the postman collection in your own postman; once it's done, you will be able to use the application.

Remember to fill the env with your mailtrap account.
You will have to do this if you want to use the register route

To be sure if your application is running good you can go to  :

- [Welcome](https://wilg.localhost)

The api route base is : 

- [API-V1](https://wilg.localhost/api/v1)

## Contact

- Valentin Gaudin : valentingaudin@gmail.com


