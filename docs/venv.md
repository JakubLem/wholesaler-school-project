### --------------------------------------------------------------------------------------------------------------------
# Environment config
### --------------------------------------------------------------------------------------------------------------------


# Download repo and creating local directory

To download a project, go to the directory in the console `htdocs/` in the directory `xampp/`.
Execute the command `git clone https://github.com/JakubLem/wholesaler-school-project.git`

Then enter the folder `wholesaler-school-project/` using: 
```cd wholesaler-school-project```

# Creating a virtual Django environment

At this point, make sure that python is installed by executing the command: `python --version`
If you using Unix Environment propably you should use `python3 --version`
If there is no error in the console, only the python version will be shown, we can move on

Execute the command: `python -m venv venv` or if you're using Unix `python3 -m venv venv`
Then start the virtual environment:

MAC/Linux: `source venv/bin/activate`
Windows: `venv\Scripts\activate`

After starting the environment, its name should appear before the path `(venv)`, 
Then install the needed packages with the command:

`pip install -r requirements.txt`

Then you should go to the directory `/core/pycore/`
The next step is database migration, run command: `python manage.py migrate`

Then for the transport price list to work properly and the integration of the main application with the django application to work properly, the appropriate data must be loaded. There are two ways to do this

- api request:
you must run a get query: `localhost:8000/api/loaddata_startdata/`


- load dump data: 
run: `python manage.py loaddata startdata`

# Creating a code audit Django environment

You should go to the directory `/core/pycore/`

Execute the command: `python -m venv audit` or if you're using Unix `python3 -m venv audit`
Then start the virtual environment:

MAC/Linux: `source audit/bin/activate`
Windows: `audit\Scripts\activate`

After starting the environment, its name should appear before the path `(audit)`, 
Then install the needed packages with the command:

`pip install -r requirements.txt` ! Important --> audit requirements is located in `/core/pycore/`

If you want to test code audit run: `pylama`

# Testing Django App

In directory `/core/pycore/` run `pytest -x -vv`

# Setting up PHP application

Make sure you have installed composer in computer
In command line run command: `composer install`

After creating the vendor folder, make sure it is in `/core/main/db_connector/`
If not, move this folder there

# Setting up DATABASE

After entering the `localhost/phpmyadmin/` website, import the database using the `/docs/database.sql`

# ADMIN PANEL
`http://localhost/wholesaler-school-project/core/main/admin.php`
e-mail: `jakub.lemiesiewicz@wsp.pl`
password: `admin`

# Setting up dotenv

In directory `/core/main/db_connector/` create `.env` file
Specific variables should be assigned appropriately in this file:

```bash
HOST=your_host
USERNAME=your_username
PASSWORD=your_db_password
DBNAME=your_db_name
```

# Starting the application

!!! IMPORTANT !!!

For the application to work properly, both services must be running: the djano application and the php application

!!! IMPORTANT !!!

To run the Django application, execute the command:

`python core/pycore/manage.py runsesrver`

To run the PHP application, you should:
You must start the services in the `XAMPP Control Panel`:
- Apache
- MySQL

In the browser, enter the link: `localhost/wholesaler-school-project/`

# Application closing:

Services must be disabled:
- disable Apache and MySQL services in XAMPP Control Panel
- execute `CTRL + C` or `CTRL + D` in the console to stop the application and `deactivate` to disable the virtual environment

### --------------------------------------------------------------------------------------------------------------------
