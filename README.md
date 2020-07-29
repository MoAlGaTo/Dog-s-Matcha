# Dog's Matcha

### Français:



**Dog's Matcha** est un projet qui a pour but de concevoir une application de site de rencontres pour chiens. 

L'application permet à un utilisateur représentant son chien de s’inscrire et de renseigner ses détails personnels et ses préférences dans l’autre, en vue de pouvoir matcher un autre utilisateur ayant un profil plus ou moins correspondant, parmi une sélection de profils d’autres utilisateurs que le site proposera.

Une fois qu’ils se sont réciproquement matchés (en l'occurrence se sont mutuellement "liké"), ces deux profils pourront échanger via un chat privé.

Un script (faker_seeds.php) fournit une "seed" hydratant la base de données avec un ensemble d'environ 1000 faux profils, correctement renseignés qui servira à tester l’optimisation du site.

**Dog's Matcha** a été dévellopé en:

>- PHP pour le back-end
>- HTML, CSS, Bootstrap, Javascript pour le front-end, ainsi que Twig pour moteur de template.
>- Javascript pour le chat et notification en temps réel.

L’application permet à un utilisateur de s’inscrire, et une fois l’inscription validée, un e-mail de confirmation comportant un lien unique est envoyé sur l’adresse e-mail renseignée afin de valider son inscription.  Il peut recevoir un mail de réinitialisation de son mot de passe en cas d’oubli.

Une fois inscrit et connecté, l'utilisateur est invité à compléter le profil de son chien, en rajoutant des informations telles qu'une photo de profil, son nom, que son âge, sa race, son adresse (afin d'être géolocalisé via une API), ses caractéristiques (illustrés par des hashtags), etc...

Une fois connecté, l'utilisateur se voit proposer via un algorithme une liste de suggestions de profils qui lui correspondent, du match total au match plus ou moins partiel.

la liste des suggestions est triable par âge (ordre croissant), localisation (du plus proche géographiquement au moins proche), popularité (du plus liké au moins liké) et tags en commun (du plus correspondant au moins correspondant). 

Elle est aussi filtrable par intervalle d’âge, localisation (ville en particulier), intervalle de popularité et par un tag en particulier.
L’utilisateur peut effectuer une recherche avancée en sélectionnant un ou plusieurs critères tels que :

>- Un intervalle d’âge.
>- Une race.
>- Un intervalle de score de popularité (illustré par les likes).
>- La localisation (ville en particulier).
>- Un tag en particulier.

Tout comme la liste de suggestion, la liste de résultats est triable et filtrable par âge, localisation, popularité et par tags.

Un utilisateur peut consulter le profil des autres utilisateurs, et peut également :

>- "Liker" ou "unliker" un autre utilisateur
>- Voir que le profil visité a déjà "liké" l’utilisateur
>- Consulter le score de popularité (nombre de likes).
>- Voir si l’utilisateur est en ligne, et si ce n’est pas le cas, afficher la date de sa dernière visite.
>- Reporter l’utilisateur comme étant un "faux compte".
>- Bloquer l’utilisateur. Un utilisateur bloqué n'apparaît ensuite plus dans les résultats de recherche, et ne génère plus de notifications. 

Si les deux uilisateurs se sont mutuellement likés, ils sont considérés comme avoir "matché" et peuvent ainsi échanger via un chat en temps réel.
Si l'un des deux "unlike" l'autre, ou le bloque, ils ne matchent plus.

Un utilisateur est notifié, en temps réel des évènements suivants :

>- L’utilisateur a reçu un "like".
>- L’utilisateur a reçu une visite.
>- L’utilisateur a reçu un message.
>- Un utilisateur "liké" a "liké" en retour.
>- Un utilisateur matché ne vous “like” plus.

L’utilisateur peut voir, de n’importe quelle page, qu’une notification n’a pas été lue.

Quand un utilisateur regarde un profil, il apparaît dans l’historique des visites de ce dernier.

Tout le site est responsive.
