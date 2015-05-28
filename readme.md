# Laravel PHP Framework 4.2 

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

# Instructions

## For ubuntu users

1. Install composer:<br/>
	You must get Composer first: "https://getcomposer.org/download/"
	<br/>
	Run Terminal, or press Ctrl + Alt + T, go to app folder with "cd path_to_your/php_4.2" then run "composer install". 

2. Install migrate to create database:<br/>
	php artisan migrate:reset && php artisan migrate
	
3. Run seed to get some values:<br/>
	php artisan db:seed 

4. Run php server:<br/>
	php artisan serve

5. Now, go to this link: "http://localhost:8000" in browser.<br/>
	You can login with test user:<br/>
		email: sa1234@gmail.com<br/>
		password: sa12345<br/>
	Have fun !!

## Queue with Redis

1. Install redis: http://redis.io/download<br />

2. Run redis server: sudo service redis-server start<br />

3. Test queue with send Mails:
<br />
	Go to MailController method auto(), change $mail = "YourEmail"<br />
	Run: php artisan queue:work or php artisan queue:listen

# Homestead
1. Install VirtualBox:<br /> 
	sudo apt-get install virtualbox<br />

2. Install Vagrant:
	sudo apt-get install vagrant<br />

3. Add Homestead box:<br />
	vagrant box add laravel/homestead<br />

4. Install homestead command:<br />
	composer global require "laravel/homestead=~2.0"<br />

	And add this PATH to your systerm:<br />
	export PATH=~/.composer/vendor/bin:$PATH
5. Create Homestead.yaml<br />
	homestead init<br/>

	if Homestead.yaml already exits, you need to remove first:<br />
	rm -rf ~/.homestead<br />

6. Config homestead:<br />
	Run: homestead edit<br />

	When gedit show display:<br />
	<br />
	* authorize and key
	  * authorize: ~/path_to_your/php_4.2/sa1234.pub<br />
	  * keys:
    		- ~/path_to_your/php_4.2/sa1234<br />

	Or you can create by your own:<br />
	  ssh-keygen -t rsa -C "you@homestead"<br />

	* Folders and sites
	  * folders:<br />
	    *- map: ~/path_to_your/php_4.2 &emsp;&emsp;&emsp; <============ Folder contain php4.2
		<br />
	       to: /home/vagrant/Code	&emsp;&emsp;&emsp;		<========== Folder contain php_4.2 in VirtualBox
		<br />
	  * sites:<br />
	    *- map: homestead.app<br />
	       to: /home/vagrant/Code/php_4.2/public<br />

7. Setup homestead:
	homestead up<br />

	While homestead setup, add this to tour /etc/hosts:<br />
	192.168.10.10  homestead.app<br />

Now you can connect to app in homestead by url: "homestead.app" <br />
To remote homestead through ssh: homestead ssh
<br />
#End
