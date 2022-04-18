<?php

namespace App\DataFixtures;

use App\Entity\Item;
use App\Entity\Category;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private $categoryRepository;
    private $userRepository;

    public function __construct(CategoryRepository $categoryRepository, UserRepository $userRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $lorem_description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tristique enim et ornare sagittis. Ut nec semper erat, quis sagittis libero. Mauris id gravida turpis, ut tempor orci. Donec in ornare elit, id porttitor neque. Curabitur pellentesque nec dui sit amet aliquam. Duis ut efficitur augue, id egestas dolor. Nam porta pellentesque faucibus. Donec leo erat, pellentesque a tempus volutpat, dignissim id massa. Nunc eu lorem tempus, bibendum ipsum vel, sodales nibh. Curabitur lacinia varius metus, id viverra urna ultrices ac. Ut dapibus ipsum elit, non sollicitudin nulla vestibulum vitae. Nulla a imperdiet mi. Aliquam nec arcu vitae elit varius commodo eu quis lacus. Curabitur ultrices tristique ligula nec mattis. Maecenas ac auctor diam.';

        $user = [
            'email' => 'johndoe@mail.com',
            'password' => 'JohnDoe',
            'firstname' => 'John',
            'lastname' => 'Doe',
        ];

        $categories = [
            'Consoles',
            'Jeux',
            'Accessoires',
        ];

        $items = [
            [
                'title' => 'PS5 - Digital Edition',
                'description' => $lorem_description,
                'photo' => 'ps5.jpg',
                'published' => new \DateTime("2022-04-18 14:30"),
                'category' => 'Consoles',
                'owner' => 'John',
            ],
            [
                'title' => 'Jurassic World Evolution 2 - PS4',
                'description' => $lorem_description,
                'photo' => 'jurassic-world-evolution-2.jpg',
                'published' => new \DateTime("2022-03-15 18:37"),
                'category' => 'Jeux',
                'owner' => 'John',
            ],
            [
                'title' => 'Razer Huntsman Mini Analog',
                'description' => $lorem_description,
                'photo' => 'Razer-Huntsman-Mini-Analog.jpg',
                'published' => new \DateTime("2022-04-15 08:21"),
                'category' => 'Accessoires',
                'owner' => 'John',
            ],
            [
                'title' => 'Xbox Series X',
                'description' => $lorem_description,
                'photo' => 'Xbox-Series-X.jpg',
                'published' => new \DateTime("2022-04-13 21:29"),
                'category' => 'Consoles',
                'owner' => 'John',
            ],
            [
                'title' => 'Planet Zoo',
                'description' => $lorem_description,
                'photo' => 'Planet-Zoo.jpg',
                'published' => new \DateTime("2022-04-16 07:23"),
                'category' => 'Jeux',
                'owner' => 'John',
            ],
            [
                'title' => 'Capteur Wii',
                'description' => $lorem_description,
                'photo' => 'Capteur-Wii.jpg',
                'published' => new \DateTime("2022-04-15 23:25"),
                'category' => 'Accessoires',
                'owner' => 'John',
            ],
            [
                'title' => 'Wii U',
                'description' => $lorem_description,
                'photo' => 'Wii-U.jpg',
                'published' => new \DateTime("2022-04-17 05:04"),
                'category' => 'Consoles',
                'owner' => 'John',
            ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            // [
            //     'title' => '',
            //     'description' => $lorem_description,
            //     'photo' => '',
            //     'published' => new \DateTime("2022-04-18 14:30"),
            //     'category' => '',
            //     'owner' => 'John',
            // ],
            [
                'title' => 'Annonce de Test',
                'description' => $lorem_description,
                'photo' => '_Image-Test.jpg',
                'published' => new \DateTime("2022-04-13 01:56"),
                'category' => 'Accessoires',
                'owner' => 'John',
            ],
        ];

        // Populating database with 1 User
        $toDatabase = new User();
        $toDatabase->setEmail($user['email']);
        $toDatabase->setPassword($user['password']);
        $toDatabase->setFirstname($user['firstname']);
        $toDatabase->setLastname($user['lastname']);
        $manager->persist($toDatabase);

        $manager->flush();

        // Populating database with Categories
        foreach ($categories as $category) {
            $toDatabase = new Category();
            $toDatabase->setTitle($category);
            $manager->persist($toDatabase);
        }

        $manager->flush();

        // Populating database with Items
        foreach ($items as $item) {
            $toDatabase = new Item();

            $toDatabase->setTitle($item['title']);
            $toDatabase->setDescription($item['description']);
            $toDatabase->setPublished($item['published']);
            $toDatabase->setPhoto($item['photo']);

            $tmp_category = $this->categoryRepository->findOneBy(['title' => $item['category']]);
            $toDatabase->setCategory($tmp_category);

            $tmp_user = $this->userRepository->findOneBy(['firstname' => $item['owner']]);
            $toDatabase->setOwner($tmp_user);

            $manager->persist($toDatabase);
        }

        $manager->flush();
    }
}
