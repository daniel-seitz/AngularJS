# Sample AngularJS project with Zend Expressive Backend

This is a sample appointment app. Feel free to get ideas from it.

## Installation
1. Install php packages 
```bash
composer install
```

2. Install front end dependencies 
```bash
npm install
```

3. Compile front end 
```bash
npm run build
```


## Run a webserver
```bash
composer run --timeout=0 serve
```

## Open your browser
```bash
http://localhost:8080
```


## Development
You can run the command `npm run webpack` in development. This will set webpack to watch over your changes and build automatically. There is NO hot reload so just refresh your browser to see your changes.


### !!! There is no database attached, hence no persistence so if you check this project out. You won't experience a 'full' functionality. Rather observe the XHR response which will give you a temporary expected result.


