<?php
/**
 * Created by PhpStorm.
 * User: psa
 * Date: 11/01/18
 * Time: 19:43
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTrainingData extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $t = new Training();
        $t->setTitle('Conter sur le zinc');
        $t->setContent('Atelier animé par Raphaël LE MAUVE, conteur');
        $t->setImageLink('lemauve.png');
        $t->setStartAt(new \DateTime('2017-12-18 19:30:00'));
        $manager->persist($t);

        $t = new Training();
        $t->setTitle('Caricature');
        $t->setContent('Atelier animé par Élodie LABERLU comédienne - Cie Les quatre chapeaux');
        $t->setImageLink('laberlu.png');
        $t->setStartAt(new \DateTime('2018-01-29 19:30:00'));
        $manager->persist($t);

        $t = new Training();
        $t->setTitle('A la rencontre de la femme clown');
        $t->setContent('Atelier animé par Sabrina MAILLÉ comédienne, clown - Cie Terre Sauvage');
        $t->setImageLink('maillé.png');
        $t->setStartAt(new \DateTime('2018-02-19 19:30:00'));
        $manager->persist($t);

        $t = new Training();
        $t->setTitle('Chanter en polyphonie');
        $t->setContent('Atelier animé par Anne MOUREY-BAMAS choriste - Association Oremi');
        $t->setImageLink('inconnu.png');
        $t->setStartAt(new \DateTime('2018-03-26 19:30:00'));
        $manager->persist($t);

        $t = new Training();
        $t->setTitle('Engagement du corps au théâtre');
        $t->setContent('Atelier animé par Camille GEOFFROY danseuse, comédienne, metteuse en scène - Cie La vie est ailleurs');
        $t->setImageLink('geoffroy.png');
        $t->setStartAt(new \DateTime('2018-04-16 19:30:00'));
        $manager->persist($t);

        $t = new Training();
        $t->setTitle('Le neutre');
        $t->setContent('Atelier animé par Lucile BARRÉ comédienne, metteuse en scène - Cie Planche Famille');
        $t->setImageLink('inconnu.png');
        $t->setStartAt(new \DateTime('2018-05-28 19:30:00'));
        $manager->persist($t);


        $manager->flush();
    }
}
