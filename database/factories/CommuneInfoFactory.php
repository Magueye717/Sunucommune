<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Commune\CommuneInfo;
use Faker\Generator as Faker;

$factory->define(CommuneInfo::class, function (Faker $faker) {
    return [
        'maire' => 'Dr Serigne G. Diop',
        'date_creation' => \Carbon\Carbon::now(),
        'superficie' => 2567,
        'Population' => 34527,
        'delimitation' => 55,
        'collectivite_id' => 28, 
        'photo_maire' => 'default_photo_maire.jpeg',
        'mot_du_maire' => 'Au conseil municipal et à ses membres qui nous ont fait confiance ; au représentant de l\'Etat chargé
                        de suivre et de contrôler a posteriori notre action ; aux divers partenaires et amis dont la collaboration 
                        et l\'appui ne font l\'ombre d\'aucun doute ; aux populations de Sandiara enfin que nous devons servir et 
                        servons avec enthousiasme, voici un outil pratique pour mieux découvrir notre commune.
                        Cet outil est le Site Internet de la commune dont l\'adresse est www.commune de Sandiara.com.
                        Ce Site est organisé en différentes rubriques et se veut d\'être la vitrine de notre chère commune dans
                        ses aspects institutionnels, physiques, démographiques, sociaux, économiques, entre autres. Il a l\'avantage 
                        de vous faire découvrir la commune quelque soit votre position dans le monde.
                        Le Site fait la part belle au "Plan Sandiara Emergent" notre guide pour l\'action, avec des projets phares 
                        comme la zone industrielle, les Habitations à Loyer Modéré, sans oublier l\'éducation et la formation, notre pari
                        sur l\'homme. Le marché hebdomadaire de Sandiara,  l\'écovillage de Bakombelle ainsi que  d’autres sites mythiques
                        grâce aux visites virtuelles, ne sont plus un secret pour vous. Aussi, nos multiples vidéos vous rendent compte des 
                        activités de notre commune comme si vous y étiez. Chers Amis de tout bord, "mbadid yo fa jam Sandiara !" Bienvenue à Sandiara !\'',
        'historique' => 'Le président de la République, Macky Sall a signé le 22 novembre 2017 le décret portant 
                    création de la zone industrielle de Sadiara. Après la pose de la première pierre, en mars
                    2015, l’Agence pour la promotion des sites industriels (Aprosi) et la commune de Sadiara 
                    ont signé une convention de partenariat pour le financement de l’aménagement, la promotion 
                    et la gestion de la Zone industrielle pour un montant estimé à 250 millions de FCfa. Cette initiative, 
                    notamment le Plan Sandiara émergent (Pse-2035), s’inspire du Plan Sénégal émergent (Pse). Ce montant servira à 
                    l’électrification, à la construction des voies de circulation et à l’adduction d’eau de la zone d’une superficie 
                    de 50 hectares. 60 milliards de FCfa d’investissements et 10.000 emplois sont attendus à travers ce projet. 30 demandes 
                    d’implantation d’usines et de centres de recherche sont déjà enregistrées, autorisées ou en cours d’évaluation. Ces 
                    usines vont accueillir les 1.500 élèves du lycée professionnel de Sandiara dans le cadre de la formation par alternance. 
                    Les redevances industrielles, la patente et les impôts qui seront collectés serviront à financer le développement social, 
                    culturel et économique de la commune. Il s’agit d’une innovation majeure dans le financement des communes sénégalaises',
    ];
});
