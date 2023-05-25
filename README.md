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


- This Laravel installation is with [Laravel Sail](https://laravel.com/docs/10.x/installation#choosing-your-sail-services).
  - It is the most powerful, but the first boot takes a couple of minutes.
  - This is because service images have to be pulled from Docker Hub and the base Sail container has to built.
- If you're looking for a light alternative, consider using [Gitpod Sample for Laravel and SQLite](https://github.com/gitpod-samples/template-php-laravel-sqlite)

## VITE HMR 

@todo - explain how this shit doesnt work.

1. install mkcert binary manually. 
```bash
curl -JLO "https://dl.filippo.io/mkcert/latest?for=linux/amd64"
chmod +x mkcert-v*-linux-amd64
sudo mv mkcert-v*-linux-amd64 mkcert
```

2. from workspace shell, login to container as root 

`sail root-shell`

3. as root in container - install local CA 

`bin/mkcert -install`

4. generate certs 

As root on container:
```bash
[host]> sail root-shell
# 
# create dir for certs
[container]> mkdir -p /home/sail/mkcert
[container]> chmod -R ug+rw /home/sail/mkcert
```

```bash
# on the host
# generate the vite url for the workspace, save the output
echo "5173-${GITPOD_WORKSPACE_ID}.${GITPOD_WORKSPACE_CLUSTER_HOST}"
# e.g.  5173-gitpodsampl-templatephp-s8213wyqqzn.ws-us98.gitpod.io


sail root-shell # to get root bash on container

# as root on container:
# install local CA
bin/mkcert -install \
    -key-file "/home/sail/mkcert/dev.pem" \
    -cert-file "/home/sail/mkcert/cert.pem" \
    localhost  127.0.0.1 \
    <your vite url from above> 
```
# also as root on container
chown -Rf sail:sail /home/sail/mkcert
