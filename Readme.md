## Static starter [![Dependency Status](https://david-dm.org/lr-agenceweb/static-starter.svg?style=flat-square)](https://david-dm.org/lr-agenceweb/static-starter) [![devDependency Status](https://david-dm.org/lr-agenceweb/static-starter/dev-status.svg?style=flat-square)](https://david-dm.org/lr-agenceweb/static-starter#info=devDependencies)

Deposit containing a base for development of static website (frontend).  

### Requirements
Install [NodeJS](https://nodejs.org/en/)  
Install [Composer](https://getcomposer.org/download/)  

### Usage
Clone it: `git clone git@github.com:lr-agenceweb/static-starter.git`  
Go to the application folder: `cd static-starter`  
Install node modules: `npm install`  
Install php packages: `composer install`  
Install capistrano: `bundle install` (Optional if you don't need to deploy)  
Run `gulp`  
Visit `http://localhost:8080`  
That's it !  

### Stack
`Sass` as css preprocessor  
`Coffeescript` as javascript preprocessor  
`Foundation 6` as frontend framework  

### Deploy
[Capistrano](https://capistranorb.com) is configured as deployment tool. Both `staging` and `production` environment are available.  
To start deployment, duplicate `capistrano.example.yml` and rename it to `capistrano.yml`.  
Then, set informations about your VPS and your application.  
You are now ready to deploy !

* **Uploads**  
  * `cap <env> upload:config` : Upload .yml and .php configuration files
  * `cap <env> upload:dkim` : Upload DKIM private key
  * `cap <env> upload:htpasswd` : Upload htpasswd file for staging environment (nginx friendly)
  * `cap <env> upload:all` : Execute all previous commands in one task

* **Nginx**  
  * `cap <env> nginx:upload:vhost` : Upload vhost config file to remote server (create file in conf.d)
  * `cap <env> nginx:upload:symlink` : Symlink uploaded folder path to /var/www/<env>/<application>
  * `cap <env> nginx:vhost:disable` : Disable vhost (rename extension to .disabled)
  * `cap <env> nginx:vhost:enable` : Enable vhost (rename extension to .conf)
  * `cap <env> nginx:vhost:remove` : Remove uploaded vhost to conf.d folder

### Thanks
A big thanks to [Grafikart](http://grafikart.fr) from where this boilerplate starter come from