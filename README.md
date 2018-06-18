#G-esport

##What is G-esport?

*G-esport* is a community project, which aims to bring together a community of *gamers* around a *competition*.
It is a platform for administering *videos games tournaments* for a community.
Indeed, this platform wants to be "*on demand only*", the *administrators* must invite the new members and they will be able to *create teams* and *participate* in the tournaments, the *administrators* must also *create the tournaments* and can also set up a *system of reward*.

##What do I need to install it?

*G-esport* is 100% compatible with the three largest OS, *Linux*, *Mac* and even *Windows*!
Currently you just need *Docker* and access to the *command prompt*.

##How to install it?

You can install *G-esport* in only *3 commands*!

The first is to *clone the projet* : 

	git clone https://github.com/Skumb/G-Esport.git

Go to the *root* of the project and launch the second command to launch the *docker containers* (may take a little time)

	docker-compose up -d

Now, still at the *root* of the project, launched the third and last command to add the *database* to the project.

	docker exec -ti g-esport-php-fpm php artisan migrate

Congratulations you have just installed G-esport!

##Important information after installation

If you want to access the *application* and have it *installed on your PC*, open your *web browser* and type this *address*:
	
	http://localhost/

So if you want to access to the *back office*, go to this *address*:

	http://localhost/admin/


On the other hand you can log into the *platform* as a *user* with the following credentials:

-Username : user
-Password : user

Or as an *administrator*:

-Username : admin
-Password : admin

Of course you can *change these values* in our back office, which we *strongly* recommend!

##Contact

You can contact us through *GitHub*


Have fun with or our platform and let the competition ignite the community!

The G-esport build team.





