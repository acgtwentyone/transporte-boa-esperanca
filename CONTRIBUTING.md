## Thank for taking the time to check out the repo and be willing to contribute!

If you have found an issue or would like to request a new feature, simply create a new issue. Be sure to fill out as much information as possible.

If this is your first open source contribution, please take a look at this [guide](https://github.com/freeCodeCamp/how-to-contribute-to-open-source).

Reporting Bugs & Feature Requests If you would like to submit a feature request or report a bug, we encourage you to first look through the [issues](https://github.com/acgtwentyone/boa-esperanca-db/issues) and [pull requests](https://github.com/acgtwentyone/boa-esperanca-db/pulls) before filing a new issue.

Submitting a Pull Request If you wish to submit a pull request for a new feature or issue, you should start by forking this repository first. This should get you setup on your local machine:

Make sure you have [Node.js](https://nodejs.org/en/) installed on your machine. (We suggest you to use node v16.x.x). 

Fork the repo by running 

```
git clone https://github.com/acgtwentyone/transporte-boa-esperanca.git
``` 

Then navigate to the project by running the following command 

```
cd boa-esperanca-db 
```

Go ahead and run the following command

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Note that we assume that you have docker installed on your local machine and running. If not, please download it [here](https://www.docker.com/get-started/). This command let you be able to run sail, bacause there is no vendor directory yet in your project, so will not be able to execute sail command yet. See [here](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects).


To start sail run the following command:

```
./vendor/bin/sail up
```

And then trype the following command to install the node modules, compile and listen for js and css changes.

```
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
```

Create a file name ```.env``` on your project root directory. Copy and paste the content from ```.env.example```.

And than run the following command in order clear laravel cache

```
./vendor/bin/sail atisan config:cache
```

Please see the sail [docs](https://laravel.com/docs/9.x/sail) for more information. Please note that you may wish to configure a Bash alias that allows you to execute Sail's commands more easily. Please see [here](https://laravel.com/docs/9.x/sail#configuring-a-bash-alias). 
