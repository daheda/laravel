
## In brief

- It supposed that the file is already presents in resources/tmp.
- The app use CLI to interact with user.
- It Uses Queue (batchable) to process the data.
- Need to configure properly the service container to inject the different handler.
- Improvements : complete the filters / use Laravel container / ...

## Setup
```
composer install
php artisan migrate
```

## Execution
```
php artisan processData 
php artisan queue:work
```
