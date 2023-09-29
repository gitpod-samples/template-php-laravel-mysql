# A Laravel with MySQL template on Gitpod

This is a [Laravel with MySQL](https://laravel.com) template configured for ephemeral development environments on [Gitpod](https://www.gitpod.io/).

## Next Steps

Click the button below to start a new development environment:

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://github.com/gitpod-io/template-php-laravel-mysql)

## Get Started With Your Own Project

### A new project

Click the above "Open in Gitpod" button to start a new workspace. Once you're ready to push your first code changes, Gitpod will guide you to fork this project so you own it.

### An existing project

To get started with Laravel with MySQL on Gitpod, add a [`.gitpod.yml`](./.gitpod.yml) file which contains the configuration to improve the developer experience on Gitpod. To learn more, please see the [Getting Started](https://www.gitpod.io/docs/getting-started) documentation.

## Notes & caveats

The database does not get automatically migrated. Once started, we should run `php artisan migrate`, after the DB service is ready. It should be a few moments.

If you want to try a Laravel Breeze scaffolding, then you should be aware that files will be changed, and you will to revert some content.

You will have to do these steps:

```
composer require laravel/breeze --dev

php artisan breeze:install blade # or vue or react

# Revert changes on `vite.config.js` file, as accordingly on the next code block

# Then you can again recompile
npm run dev

# Go the the browser URL of port 8000. Make sure to open browser inspector, to reload all assets.
```


This is the look `vite.config.js` should be after installing the `Blade` flavour of Breeze.
If you chose another one, let's look at what should be replaced back in:

- The `dotenv` import and its configuration invoke.
- The definition of `extendedViteDevServerOptions`, plus conditionally change it, plus adding it to the vite config object.

Here it is the final look:

```
import {defineConfig} from 'vite'
import laravel from 'laravel-vite-plugin'
import dotenv from 'dotenv'

dotenv.config()

const extendedViteDevServerOptions = {}

if (process.env.GITPOD_VITE_URL) {
    extendedViteDevServerOptions.hmr = {
        protocol: 'wss',
        host: new URL(process.env.GITPOD_VITE_URL).hostname,
        clientPort: 443
    }
}

export default defineConfig({
server: {
        ...extendedViteDevServerOptions
    },
plugins: [
    laravel({
        input: [
            'resources/css/app.css',
            'resources/js/app.js',
        ],
        refresh: true,
    }),
],
})

```
