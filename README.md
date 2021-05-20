# PPE-MaisonDesLigues
## De la Recherche, au développement.

Outils, langages et logiciels :

* Synfony
* MySql
* Wamp
* VsCode
* Security Bundle

-----------------

# Chapiteaux
Les 5 chapiteaux sont organisés en huit espaces différenciés :

* Un espace accueil, avec un guichet doté d'un PC et une imprimante à badge
* Un espace restauration
* Un espace dédié aux organisateurs
* Un espace d'accueil pour les VIP
* Un espace dédié aux stands de vente des équipementiers de l'escrime
* Un espace conférence
* Un espace dédié à l'escrime sportive (démonstrations, expositions)
* Un espace dédié à l'escrime artistique, lieu des championnats.

# La mise en place des ateliers
Les ateliers doivent permettre à la ligue d'Escrime de mieux faire connaître ses différentes actions à ses licenciés. Lors de ces assises nationales de l'escrime, six ateliers sont prévus :
  
#Le club et son projet

Le fonctionnement du club
Les outils à disposition et remis aux clubs
Observatoire des métiers de l'escrime
I.F.F.E.  

# Développement durable

L'inscription des participants
Licenciés : président, vice président, secrétaire, trésorier des ligues, clubs et comités départementaux. Les licenciés qui veulent assister aux assises et participer à des ateliers doivent remplir et retourner une fiche d'inscription (document consultable à la fin de cette partie 2) où ils précisent, entre autres, les ateliers auxquels ils s'inscrivent.
Intervenants : Ils animent ou simplement interviennent sur des ateliers. Ils bénéficient de la gratuité.
Bénévoles : sur une journée ou deux, ils apportent leur aide (réception, enregistrement des participants aux différents ateliers...). Les bénévoles doivent avoir au moins 18 ans. Les frais d'inscription leur sont offerts.
La gestion des arrivées et des participations
Lorsqu'un participant se présente, son arrivée est enregistrée (date et heure). Une clé wifi doit être générée et lui est donnée pour qu'il puisse se connecter à Internet.

# Les applications et les utilisateurs
Les applications concernées vont toutes utilisées une même base de données Oracle implantée sur le serveur de base de données de M2L.

Les utilisateurs
Plusieurs utilisateurs avec des droits différents sont créés sous Oracle :

mdl : utilisateur principal sur la base de données, il est le propriétaire du schéma et possède tous les droits. Cet utilisateur ne sera utilisé que par l'administrateur de la base de données
employemdl : ne possède que le droit d'utiliser les procédures stockées (d'où l'importance que tous les accès pour mettre à jour la base se fassent par des procédures stockées (c'est une demande de l'informaticien)
benevolemdl (non encore créé) Les différentes applications utiliseront les utilisateurs adéquats (employemdl ou benevolemdl) pour accéder à la base de données.

# Les applications
Trois applications doivent être créées. La première, en client lourd C#, permet de gérer la création des ateliers et les inscriptions ainsi que la génération des statistiques. Cette application est en partie créée. Elle sera implantée sur le poste d'un administratif de M2L. La seconde application, aussi en client lourd C#, permet d'enregistrer les arrivées des participants. Elle sera implantée sur le poste de l'espace accueil du chapiteau. La troisième application, de type web en PHP, permet d'enregistrer les avis, de la part des bénévoles. L'accès pourra se faire à partir de n'importe quel poste, voire d'une tablette ou d'un mobile. L'application sera installée sur le serveur web de M2L et utilisera elle aussi la base de données Oracle.
