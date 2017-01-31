behat-proof
===========

A working tutorial for setup behat with Symfony2 projects

# requirements

* install composer
* install all needed dependencices with: 

```shell
composer install --dev
```

* initialize the database :

```shell
composer doctrine:database:create
```

## Using with behat localy

* install java7-headless
* install google chrome
* install xvfb (if you want to run no gui tests)
* install chrome webdriver and unzip it in ./bin/ - (see https://chromedriver.storage.googleapis.com/)
* run it:

```shell
./bin/selenium-server (you can add --no-gui if you want to run it without seeing the browser)
./bin/behat -c ./behat.yml
```

## using with docker containers

* install docker + docker-compose
* run it:

```shell
docker-compose -f docker-compose.yml
```

* end it when behat run is complete with Ctrl+C

# Notes

* Support of selenium2 and Firefox seems to be quite broken, the last version of Firefox compatible with recent builds of selenium serveseems to be 32 (versions are 50 at the time of writting this)
  So not really worthing a try unless you except very big differences.


