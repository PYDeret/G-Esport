##G-esport

G-esport est un site regroupant une communauté de "Gamers" autour de tournois.

#Comment l'installer ? 

Tout d'abord il faut cloner le projet

Puis une fois dedans il faut éxécuter la commande suivante:
docker-compose up -d

Puis il faut migréer la Base de Donnée: 
docker exec -ti g-esport-php-fpm php artisan migrate

Le site est maintenant disponible, pour accéder au Back Office il faut Créer un utilisateur et le placer au rang d'admin.
Aller sur localhost/ pour créer un utilisateur.

Éxécuter cette commande pour passer l'utilisateur en Admin en remplacant <adress_user> par le mail de l'utilisateur créé:
docker exec -ti g-esport-php-fpm php artisan voyager:admin <adress_user>

Pour accéder à la page d'accueil aller à l'adresse suivante:
localhost/

Pour accéder au Back Office aller à l'adresse suivante:
localhost/admin

commande pour utiliser Xethron generator:

- docker exec -ti g-esport-php-fpm php artisan migrate:generate

commande pour utiliser Iseed OrangeHill:
 
- docker exec -ti g-esport-php-fpm php artisan iseed my_table

commande pour utiliser krlove/eloquent-model-generator:

- docker exec -ti g-esport-php-fpm php artisan krlove:generate:model User --table-name=user


