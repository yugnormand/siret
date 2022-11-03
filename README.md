# siret
Consulter les numéros SIREN et SIRET depuis Laravel

# Siret

Ce package est un outil Laravel permettant de consulter les numéros SIREN et SIRET des entreprises et associations à but non lucratif françaises, attribués par [Insee](https://insee.fr/en/accueil) (Institut national de la statistique et des études économiques).

Siret utilise le [Sirene V3](https://api.insee.fr/catalogue/site/themes/wso2/subthemes/insee/pages/item-info.jag?name=Sirene&version=V3&provider=insee) API.

## Installation

Vous pouvez installer ce paquet via Composer :

``` bash
composer require todocoding/siret
```


## Configuration

Pour commencer, inscrivez-vous sur [https://api.insee.fr](https://api.insee.fr) et créez une nouvelle application. Dans l'onglet "Production Keys", vous pourrez générer votre Consumer Key et votre Consumer Secret.

Veillez à abonner votre nouvelle application à l'API Sirene V3 pour lui donner accès.

Ensuite, vous pouvez ajouter vos clés de production en tant que variables d'environnement dans votre système. `.env`:
```
INSEE_CONSUMER_KEY=
INSEE_CONSUMER_SECRET=
```

En option, vous pouvez modifier le nom de ces variables en publiant le fichier de configuration:
```
php artisan vendor:publish --provider="Todocoding\Siret\InseeServiceProvider" --tag="config"
```

## Usage

Utilisez le `Insee` facade pour rechercher un numéro SIREN ou SIRET :

``` php
Insee::siren('840 745 111');
Insee::siret('840 745 111 00012');
```


## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
