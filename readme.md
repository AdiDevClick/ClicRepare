# Clic'Répare

Clic Répare est un site internet de réparation d'ordinateur à domicil, de montage PC et création de sites web.

## Environnement de développement

### Pré-requis

 * PHP 8.2
 * Composer
 * Symfony CLI
 * Docker
 * Docker-compose

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (de la CLI Symfony) :

'''bash
symfony check:requirements
'''

### Lancer l'environnement de développement

```bash
docker-compose up -d
symfony serve -d
```
### Lancer des tests
```bash
php bin/phpunit --tedox
```