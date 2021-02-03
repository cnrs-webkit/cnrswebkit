# Attention ce projet n'est plus maintenu 

Le kit web fourni par le CNRS s'est avéré être un outil non abouti comportant trop de bugs et par ailleurs peu adapté aux laboratoires sur certains aspects (annuaire, publications). 

J'ai mis cette version corrigée sur Github en 2019. Le kit web avait été mis en place pour le site web de notre laboratoire (IRCICA). La présente version corrige de nombreux bugs; elle enrichit le kit initial.

Après 2 ans de recul, je n'ai plus le temps de maintenir de faire évoluer et de documenter ma solution. Je n'en ai plus non plus la volonté car je reste seul sur ce projet et je sais combien l'open source nécessite une équipe.

Par ailleurs, nous avons à l'IRCICA pris la décision de migrer vers une solution proposée en interne à l'Université de Lille (solution proposée à l'ensemble des labos, gérée et maintenue par la DSI de notre Université, interfacée avec l'annuaire des personnels et HAL).

Les raisons en sont simples:
- il ne me semble pas que le CNRS ait les moyens humains et financiers pour faire évoluer le kit et le maintenir
- je me suis trouvé quasiment seul à faire ce travail, ce qui est très risqué (il faudrait au moins une communauté pour assurer un minimum de pérennité de l'outil)
- je n'ai plus le temps de maintenir de faire évoluer et de documenter ma solution. Je n'en ai plus non plus la volonté car je reste seul sur ce projet et je sais combien l'open source nécessite une équipe .
- je serait en retraite en 2022.

On me pose la question de savoir s'il existe des alternatives à ce kit. Je n'en connais pas, et c'est la raison de notre migration vers un outil interne. Il est regrettable que le communauté universitaire ne mutualise pas ce genre d'expérience, comme cela se faisait au sein de l'AMUE. A l'heure des fusions pour des soit disant économies d'échelle, comment ne pas voir que mutualiser des outils entre labos et Universités constitue une économie substantielle ! 
# Attention 
la présente version fonctionait sous Wordpress 5.1.3. Elle n'a pas été testée avec les dernières versions de Wordpress !

Utiliser une version ancienne de Wordpress expose votre site web à des failles de sécurité et ne doit pas être envisagé !

# cnrswebkit
Le dépôt *CNRSwebkit* héberge le Theme Wordpress du kit web CNRS. Le site web officiel du *CNRSwebkit* est https://kit-web.cnrs.fr/

## Branche Master
Seule la branche master contient (contiendra) une version installable du kit après [correction](https://github.com/cnrs-webkit/cnrswebkit/blob/develop/CHANGES.md) des [bugs initiaux](https://github.com/cnrs-webkit/cnrswebkit/blob/develop/TODO.md). Le developpement du thème se fait sur les autres branches, notamment [develop](https://github.com/cnrs-webkit/cnrswebkit/tree/develop) 
## Objectifs 
Ce projet a pour objectif de transformer le *kitweb* existant en un vrai thème Worpdress, instable sur la dernière version de Wordpress, et disposant d'une mise à jour automatisée. 

## Historique du projet
- 28 fév. 2018 : Création du dépôt par C. Seguinot
- bientôt: Mise en ligne d'une version de développement du thème *CNRSwebkit* 
- ?? : il reste beaucoup à faire avant de disposer d'une version utilisable du kit. Soyez patient! 

## Vers une première version stable
Voici une idée du travail à réaliser pour mettre en ligne une première version stable: 
- Séparer le kit actuel en 3 parties 
  - la partie thème (code) du kit (le cœur du kit) 
  - la partie configuration (le paramétrage indispensable pour faire fonctionner le kit) 
  - la partie données (les pages proposées par défaut), avec la possibilité d'installer ou de ne pas installer ces données
- Pour le thème (code)
  - corriger tous les bugs du kit, y apporter des améliorations compatibles avec le kit d'origine (problématique: chacun à déjà corrigé/modifié le kit à sa façon...)
  - ajouter quelques fonctionnalités
  - proposer la possibilité de mise à jour automatique du thème
  - proposer un thème enfant basique pour ceux qui veulent modifier/adapter le thème *CNRSwebkit* 
  - ...


## Contribuer au projet
Tout développeur et utilisateur du *kitweb* est cordialement invité à participer au projet (creéz votre compte Github, envoyez une demande de participation au projet en indiquant votre motivation à christophe Seguinot) 
