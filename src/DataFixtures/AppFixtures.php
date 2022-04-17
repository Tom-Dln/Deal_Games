<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $categories = [
            'Consoles',
            'Jeux',
            'Accessoires',
        ];

        $items = [
            [
                'title' => 'Elden Ring',
                'description' => 'Elden Ring for PC is an action role playing game (ARPG) written by superstars George R R Martin (the author of the Song of Ice and Fire series of books which begat television show Game of Thrones) and Hidetaka Miyazake (who is famed for many popular video games: from the Souls series, to Bloodborne, to Sekiro amongst many others).',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2021-02-05"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'LEGO Star Wars: The Skywalker Saga ',
                'description' => 'About This Game Play through all nine Star Wars saga films in a brand-new LEGO video game unlike any other. Experience fun-filled adventures, whimsical humor, and the freedom to fully immerse yourself in the LEGO Star Wars galaxy. Want to play as a Jedi? A Sith? Rebel, bounty hunter, or droid? LEGO Star Wars: The Skywalker Saga features hundreds of playable characters from throughout the galaxy. ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2022-03-12"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'Planet Zoo: Wetlands Animal Pack ',
                'description' => 'About This Content Where there is water, there is life! Discover the richness of the wetlands with the Planet Zoo: Wetlands Animal Pack and embrace eight diverse new species. These highly requested animals comprise of seven habitat species and ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2022-01-23"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'Tiny Tina\'s Wonderlands: Chaotic Great Edition (Europe) ',
                'description' => 'About This Game Embark on an epic adventure full of whimsy, wonder, and high-powered weaponry! Bullets, magic, and broadswords collide across this chaotic fantasy world brought to life by the unpredictable Tiny Tina. Roll your own multiclass hero ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2022-03-25"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'Core Keeper',
                'description' => 'About This Game Drawn towards a mysterious relic, you are an explorer who awakens in an ancient cavern of creatures, resources and trinkets. Trapped deep underground will your survival skills be up to the task? Mine relics and resources to ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2017-06-18"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'Godfall Ultimate Edition',
                'description' => 'About This Game Smash through your enemies and seize ultimate power in this loot-powered action adventure set in a bright fantasy world. Godfall: Ultimate Edition is the best and most complete way to enjoy Godfall. Experience everything assembled ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2019-07-23"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'Risk of Rain 2: Survivors of the Void',
                'description' => 'About This Content The Gateway to The Void has opened! The corrupting power it contained has engulfed Petrichor V and plunged the planet into darkness. For millennia, The Void Creatures have grown dominant by taking artifacts from  ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2020-05-07"),
                'category' => 'Jeux'
            ],
            [
                'title' => 'Sony PlayStation 5 Édition Standard',
                'description' => 'PlayStation 5 avec lecteur Blu-ray. Une console révolutionnaire entièrement centrée sur le joueur pour des expériences encore plus immersives et connectées avec vos jeux PS5 et PS4 rétrocompatibles. ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2018-03-06"),
                'category' => 'Consoles'
            ],
            [
                'title' => ' Xbox Series X ',
                'description' => 'Découvrez la toute nouvelle Xbox dernière génération, la plus puissante et la plus rapide jamais conçue avec son lecteur Blu-ray 4K ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2015-07-14"),
                'category' => 'Consoles'
            ],
            [
                'title' => ' Console Nintendo Switch ',
                'description' => 'La Nintendo Switch (modèle OLED) possède des dimensions proches de celles de la Nintendo Switch Elle dispose d’un écran OLED plus grand aux couleurs intenses et aux contrastes élevés Elle dispose aussi d’un large support ajustable pour le jeu en mode sur table, d’une nouvelle station d’accueil.',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2019-09-01"),
                'category' => 'Consoles'
            ],
            [
                'title' => 'PDP Manette Filaire pour Xbox Series XIS Noir  ',
                'description' => 'Prise casque 3,5 mm avec commandes audio intégrées Double bouton texturé sur les gachettes droite et gauche Compatible avec Xbox One S/X, Xbox Series X/S et Windows Double moteur de vibration Câble détachable de 2m40.',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2019-09-01"),
                'category' => 'Accessoires'
            ],
            [
                'title' => 'Nintendo Paire de Manettes Joy-Con Gauche Violet Néon/Droite Orange Néon   ',
                'description' => '2 manettes avec support en violet et Orange',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2017-06-09"),
                'category' => 'Accessoires'
            ],
            [
                'title' => 'Casque de jeu filaire LucidSound LS10P pour Sony PlayStation',
                'description' => 'CONÇU POUR UN CONFORT OPTIMAL : confort supérieur durant les longues campagnes avec des oreillettes douces en mousse à mémoire et un casque léger et flexible. Les écouteurs spacieux pivotent à plat pour être posés confortablement sur votre cou entre deux parties. ',
                'photo' => 'photo.jpg',
                'published' => new \DateTime("2017-12-24"),
                'category' => 'Accessoires'
            ],
        ];
        
        // Populating database with categories
        foreach ($categories as $category) {
            $toDatabase = new Category();
            $toDatabase->setTitle($category);
            $manager->persist($toDatabase);
        }
        $manager->flush();

        // Populating database with items
        foreach ($items as $item) {
            $toDatabase = new Item();

            $toDatabase->setTitle($item['title']);
            $toDatabase->setDescription($item['description']);
            $toDatabase->setPublished($item['published']);
            $toDatabase->setPhoto($item['photo']);

            $category = $this->categoryRepository->findOneBy(['title'=>$item['category']]);

            $toDatabase->setCategory($category);

            $manager->persist($toDatabase);
        }

        $manager->flush();
    }
}
