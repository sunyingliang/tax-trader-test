# Tax Trader test

## Prerequisite
1. php version(>=7.0) is installed

## Test
### Windows
1. run the bat file `web-server.bat` by double click.
2. open chrome(or any other browsers), and key in the url `localhost` to see the page.

### Linux
1. deploy all these folders & files in web server.
2. configure 'public' folder as web server's document root, or change 'public' folder name to web server's document root.
3. open chrome(or any other browsers), and key in the url `localhost` to see the page.

## Notices:
1. This project is just for development environment, do NOT use it as live environment.
2. The js files including third part libraries are not minimised nor obfuscated. For live environment, they can be done to
    speed up the page loading.
3. The third part libraries, e.g.: jquery, bootstrap etc, are used CDN links.  For live environment, it is better to download them into
    our own server in case those CDN servers are down.
4. The file `config/common.php` is not really used for configuration in this test, the configurable items if needed should go there in future.
5. The `tests` directory is created for holding all the PHPUnit tests, which are not implemented at this time.

## Integer Calculator API
1. Calculate integer digits according to types
    * URI: /api/integer/calculate
    * Method: POST
    * Content-Type: application/json
    * Params:
    ~~~
        {
        	"type":"sum",
        	"value":2
        }
    ~~~
    * Return:
    ~~~
        {
            "response": {
                "status": "success",
                "data": {
                    "value": 3
                }
            }
        }
    ~~~
    * Notes: Parameters can be passed by application/x-www-form-urlencoded as well.