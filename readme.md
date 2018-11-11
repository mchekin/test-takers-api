## Test Taker coding exercise

### Table of Contents

1. [Requirements](#requirments)
2. [Libraries Used](#librariesused)
3. [Installation](#installation)
4. [Running in local environment](#runningindevelopmentenvironment)
5. [Data Source Settings](#datasourcesettings)
6. [Setting Up MySQL as Data Source](#settingupmysqlasdatasource)
7. [Supported Routes](#supportedroutes)
8. [Things To Be Done](#thingstobedone)

<a name="requirements"></a>
### Requirements

- PHP 7.1.0 or Higher
- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.sqlite.org/) (Only if MySQL is used as data source)

<a name="librariesused"></a>
### Libraries Used
All of the source code in the repository was written from scratch.
But a number of libraries are used through Composer:

- `slim/slim` as basic web micro-framework
- `vlucas/phpdotenv` for environmental settings overwrite
- `illuminate/database` as a SQL query 
- `league/csv` for advanced CSV document parsing

<a name="installation"></a>
### Installation
- Clone the repo

        git clone https://github.com/mchekin/test-takers-api.git test-takers-api

- Navigate to the project folder

        cd test-takers-api

- Create .env file from the .env.example file

        cp .env.example .env
  
  On Windows:
  
        copy .env.example .env

- Run composer install to import the dependencies and enable auto-loading

        composer install
        
<a name="runningindevelopmentenvironment"></a>
### Running in local environment

- Run PHP build-in development server on the host machine

        php -S 127.0.0.1:8000 -t public/  

- Navigate to [http://127.0.0.1:8000/](http://127.0.0.1:8000/)
        
<a name="datasourcesettings"></a>
### Data Source Settings
The project leverages the `vlucas/dotenv` library to enable changing configuration without changing source code, 
having different configuration per each environment and avoiding storing credentials in version control.

The default data source is set to `csv` and can be changed by changing the following line in  `.env` file:

    DB_CONNECTION=csv

The other supported types are: `json` and `mysql`

<a name="settingupmysqlasdatasource"></a>
### Setting Up MySQL as Data Source
In order to successfully `work` with `mysql` database connection you need a running MySQL database server.
`DB_CONNECTION` should be set to `mysql` and database credentials should be set accordingly in the `.env` file.
MySQL script located in `/database/mysql` should be applied to the database in order to create the schema 
and seed the database with the records identical to the ones in `testakers.csv`.

<a name="supportedroutes"></a>
### Supported Routes

- Getting Users list:

    
    /v1/users?offset={{offset}}&limit={{limit}}&{{filter}}={{value}}
    
where `{{filter}}` could be one of the following 
    
    login
    title
    lastname
    firstname
    gender
    email
    
Example:

    /v1/users?limit=10&offset=1&gender=male

- Getting specific User by id:

    
    /v1/users/{{userId}}
    
Example:

    /v1/users/93
    
<a name="thingstobedone"></a>
### Things To Be Done

- Unit tests and Functional tests.
- Additional Input Validation.