# Laravel with MySQL [![Gitpod ready-to-code](https://img.shields.io/badge/Gitpod-ready--to--code-908a85?logo=gitpod)](https://gitpod.io/#https://gitpod.io/from-referrer/)

# About this template

Here is a template that fully-automates the dev setup of Laravel with MySQL on Gitpod, providing anyone with a pre-built, browser-based development environment in one click:

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://gitpod.io/#https://gitpod.io/from-referrer/)

![Gitpod](https://user-images.githubusercontent.com/127353/121526330-9d400880-ca3c-11eb-881a-bac157cdbc14.png)

## What it does

* Comes with all Laravel dependencies pre-installed (including PHP & Node.js)
* Creates the database and runs `composer install && npm install` ahead-of-time (so you don't need to wait).
* Gives anyone immediate access to the a pre-initalised development environment that enables a fast and productive inner development loop.


## Notes & caveats

* The template was generated using `curl -s "https://laravel.build/example-app" | bash` then moving the contents down to the root directory.
* [./gitpod.yml](./.gitpod.yml) updates `APP_URL` in the `.env` with the workspace address.
* [./gitpod.yml](./.gitpod.yml) launches the Laravel server bound to `0.0.0.0` so that the server is accessible in Gitpod. 

# What is Gitpod?

![Gitpod](https://user-images.githubusercontent.com/127353/121505345-15e79a80-ca26-11eb-8a95-10ab62c80bf3.png)

[Gitpod](https://www.gitpod.io/?utm_source=github&utm_medium=referral&utm_campaign=template-php-laravel-mysql) is an open source developer platform automating the provisioning of ready-to-code development environments. 

Designed for applications running in the cloud, Gitpod frees engineering teams from the friction of manually setting-up local dev environments, saving dozens of hours and enabling a new level of collaboration to create applications much more quickly than ever before.

Natively integrated with GitLab, GitHub, and Bitbucket, Gitpod automatically and continuously prebuilds dev environments for all your branches. As a result team members can instantly start coding with fresh dev environments for each new task - no matter if you are building a new feature, want to fix a bug, or work on a code review.

See also:

- [Gitpod's Direction](https://www.notion.so/Gitpod-s-Direction-be35d064c0704fbda61c542b84e07ef6)
- [Gitpod's Roadmap](https://www.notion.so/gitpod/Collaborations-with-Gitpod-541ed215197145f1a02f0cd93f8d9f64#30faa38309df4dd0b50535406ed11a70)
- [Gitpod's Values & Differentiators](https://www.notion.so/Values-Differentiators-2ed4c2f93c84499b98e3b5389980992e)

## Why Gitpod?

Developers are automating the world, yet they waste a lot of precious energy manually setting up and maintaining development environments. Millions of developers are slowed down on a daily basis with tedious tasks to get into a productive state while also facing annoying "works-on-my-machine" problems.

**Think CI/CD for dev environments**

Gitpod invented prebuilds so application code, configuration and infrastructure can all be stored as machine-executable code in your git repositories and applied to dev environments automatically and continuously.


![Use the prebuild feature so you don't wait for software to compile or install.](https://user-images.githubusercontent.com/127353/121505536-42031b80-ca26-11eb-9dae-1354b324dbc5.png)

**Remote-first. Secure by design.**

You no longer need an over-powered laptop to code, Gitpod works just as smoothly on a Chromebook or iPad. All you need is a browser. Gitpod centralizes all source code and never stores it on insecure machines and networks.

![Screenshot of development in Gitpod](https://user-images.githubusercontent.com/127353/121505433-2dbf1e80-ca26-11eb-8033-35cf56fea445.jpeg)
