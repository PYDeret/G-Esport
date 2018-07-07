<?php

use Illuminate\Database\Seeder;

class JeusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jeus')->delete();
        
        \DB::table('jeus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'League of Legends',
                'description' => "League of Legends est un jeu compétitif en ligne bourré d'action, qui mélange l'intensité trépidante des jeux de stratégie en temps réel avec des éléments de jeu de rôle. Deux équipes de puissants champions, chacun avec un design et des compétences uniques, se heurtent de front sur de nombreux champs de bataille et dans des modes de jeu variés. Avec une liste de champions en expansion permanente, des mises à jour fréquentes et des événements compétitifs florissants, League of Legends offre des parties sans cesse renouvelées aux joueurs de tous niveaux. Combinez une pensée stratégique, des réflexes foudroyants et du jeu d'équipe coordonné pour écraser vos ennemis dans des escarmouches à petite échelle ou dans de vastes combats à 5 contre 5.Avec une League qui bénéficie de mises à jour constantes, de cartes multiples, de modes de jeu variés et de nouveaux champions qui la rejoignent constamment, la seule limite à votre succès, c'est votre talent. Que vous aimiez vous battre contre des bots ou grimper dans le classement des ligues, League of Legends dispose de la technologie nécessaire pour vous faire rencontrer des opposants de niveau équivalent. Combattez avec honneur et recevez des récompenses spéciales de vos pairs pour votre comportement sportif. League of Legends est la scène compétitive la plus active du monde, avec d'innombrables tournois dans le monde entier, dont les prestigieuses Championship Series dans lesquelles des pros salariés s'affrontent pour une cagnotte de plusieurs millions. Rejoignez la plus grande communauté de joueurs en ligne du monde : faites-vous des amis, formez des équipes et combattez des dizaines de millions d'adversaires de tous les pays du monde, puis échangez des stratégies sur reddit, YouTube, les forums, etc.",
                'slug' => 'leagueoflegends',
                'TypeJeuId' => 1,
                'created_at' => '2018-06-25 16:44:11',
                'updated_at' => '2018-06-25 16:44:11',
            ),
        ));

        \DB::table('jeus')->insert(array (
            0 => 
            array (
                'id' => 2,
                'libelle' => 'Fortnite',
                'description' => "Fortnite Battle Royale est un jeu de bataille royal gratuit développé et publié par Epic Games. Il a été publié en tant que titre d'accès anticipé pour Microsoft Windows, macOS, PlayStation 4 et Xbox One en Septembre 2017, pour iOS en Avril 2018, et le Nintendo Switch en Juin 2018, avec des plans pour une version Android au T3 2018. Il est un spin-off de Epic Fortnite, un jeu de survie coopératif avec des éléments de construction (souvent appelé son mode \"Save the World\"). En tant que jeu de bataille royale, Fortnite Battle Royale comprend jusqu'à 100 joueurs, seuls, en duo ou en équipes de quatre joueurs, essayant d'être le dernier joueur vivant en tuant d'autres joueurs ou en les évitant, tout en restant dans un zone de sécurité pour éviter de prendre des dommages létaux d'être à l'extérieur. Les joueurs doivent récupérer des armes et des armures pour prendre l'avantage sur leurs adversaires. Le jeu ajoute l'élément de construction de Fortnite; Les joueurs peuvent décomposer la plupart des objets dans le monde du jeu pour gagner des ressources qu'ils peuvent utiliser pour construire des fortifications dans le cadre de leur stratégie. Le jeu propose un jeu multiplateforme limité entre la PlayStation 4, la Xbox One, la Nintendo Switch, l'ordinateur personnel et les versions mobiles. L'idée de Fortnite Battle Royale est venue près de la sortie de Fortnite à la mi-2017. À la suite de la sortie anticipée des champs de bataille de PlayerUnknown en mars 2017 et de sa croissance rapide, Epic Games a vu l'opportunité de créer un mode bataille royale à partir de Fortnite. Initialement publié dans le cadre du jeu Fortnite payé, Epic a créé une version dédiée du jeu offert en free-to-play financé par des microtransactions, partageant la monnaie du jeu avec le jeu principal Fortnite.",
                'slug' => 'fortnite',
                'TypeJeuId' => 2,
                'created_at' => '2018-06-25 16:44:11',
                'updated_at' => '2018-06-25 16:44:11',
            ),
        ));
        
        
    }
}