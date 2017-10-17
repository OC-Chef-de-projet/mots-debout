<?php
/**
 * Created by PhpStorm.
 * User: Pierre-Sylvain
 * Date: 30-07-17
 * Time: 22:04.
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Pagesection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadPagesectionData extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    public function load(ObjectManager $manager)
    {
        // bin/console doctrine:fixtures:load -n --env=test

        /**
         * Formation.
         *
         * @var Pagesection
         */
        $section = new Pagesection();
        $section->setImagelink('etmd.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Quel que soit votre métier, s\'exprimer clairement à l\'oral est nécessaire.
Régulièrement, vous devez : présenter les résultats de votre équipe ; exprimer votre point de vue et prendre en compte celui des autres ; valoriser votre activité, votre entreprise… ; promouvoir un projet ; faire part de vos contraintes…</li>
<br>
Pourtant, vous envisagez ces exercices avec appréhension : vous n\'êtes pas à l\'aise, vous craignez "le blanc" ; vous ne vous sentez pas en confiance lors de vos prestations et ne percevez pas leur impact.
<br>
Vous êtes décidé aujourd\'hui à perfectionner vos prises de parole en toutes circonstances : cette formation à la prise de parole en public est faite pour vous. ');
        $section->setTitle('Prise de parole en public');
        $section->setSortorder(1);
        $section->setPage($this->getReference('training'));
        $manager->persist($section);

        // Titre Cours collectifs
        $section = new Pagesection();
        $section->setImagelink('pasperdus.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Le travail de l\'année est sur la pièce "Les pas perdus" de Denise Bonal
Destins, solitudes, séparations, arrachements, amours palpitantes, impossibles, laissés pour compte.');
        $section->setTitle('Niveau 1 & 2');
        $section->setSortorder(1);
        $section->setPage($this->getReference('workshop'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('comme_s_il_en_pleuvait.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Lectures accomplies, réflexions faites, vote collectif exprimé:
le travail de l\'année est sur la pièce "Comme s\'il en pleuvait" de Sébastien Thiéry. Farce cruelle où l\'argent bouscule et révèle nos natures humaines. Une adaptation, j\'y travaille, pour une situation entre colocataires et non au sein d\'un couple.');
        $section->setTitle('Niveau 3');
        $section->setSortorder(1);
        $section->setPage($this->getReference('workshop'));
        $manager->persist($section);

        // Titre Cours particuliers
        $section = new Pagesection();
        $section->setImagelink('coursp.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Si vous êtes chanteurs, artistes lyriques, comédiens professionnels ou même amateurs et si vous voulez perfectionner votre interprétation, vous préparer à des castings ou à des auditions, notre professeur est là pour répondre à vos attentes et concocter avec vous un programme sur mesure.');
        $section->setTitle('Coaching théâtral');
        $section->setSortorder(1);
        $section->setPage($this->getReference('tutoring'));
        $manager->persist($section);

        // Titre Résidences
        $section = new Pagesection();
        $section->setImagelink('residence.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Beaux jeunes artistes, Exigeants, humbles, curieux infiniment !! en résidence à l\'ECOLE THEATRE MOTS DEBOUT à La Rochelle Alex Cdr, Marie Surget, Garance Nina Morel, Paul Fraysse, Sabine Rance, Maud Lnd pendant leur travail sur "NOVECENTO" d\'Alessandro Baricco venus de Paris - ECOLE CLAUDE MATHIEU');
        $section->setTitle('Novecento');
        $section->setSortorder(1);
        $section->setPage($this->getReference('residency'));
        $manager->persist($section);

        // Titre Expositions
        $section = new Pagesection();
        $section->setImagelink('geisha.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('MA GEISHA<br>Une geisha (芸者), plus souvent appelée geiko (芸妓) à Kyōto, est au Japon une artiste et une dame de compagnie, qui consacre sa vie à la pratique artistique raffinée des arts traditionnels japonais pour des prestations d\'accompagnement et de divertissement, pour une clientèle très aisée. Elle a été entierement crée en papier mâché, et pâte à papier mâché. Ses épingles dans les cheveux ont été recouverte à la feuille d\' or, ainsi que la large ceinture de soie, nommée obi .<br ><a href = "http://lapierouge.canalblog.com" > http://lapierouge.canalblog.com</a>');
        $section->setTitle('La Pie Rouge');
        $section->setSortorder(1);
        $section->setPage($this->getReference('exhibition'));
        $manager->persist($section);

        // Spectcales
        $section = new Pagesection();
        $section->setImagelink('Mojo.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('Dans la pièce de théâtre Mojo Mickybo, l\'auteur Owen McCafferty met en scène deux petits garçons d’une dizaine d’années vivant dans deux quartiers populaires de Belfast au début des années 1970 et nous donne à voir la construction de leur identité à plusieurs niveaux.
La place du cinéma est déterminante dans l\'élaboration de leur identité masculine. En effet, fascinés par le film Butch Cassidy and the Sundance Kid, dont ils connaissent des morceaux par cœur, ils cherchent à construire une amitié solide, voire éternelle et universelle.
Dans la pièce, les enfants vivent dans l’imaginaire et l’innocence et
se rêvent en héros, mais ils sont vite rattrapés par la réalité des
adultes qui, eux, construisent leur identité sur des récits mensongers
et des exclusions. ');
        $section->setTitle('Mojo Mickybo, une histoire d\'amitié entre enfants');
        $section->setSortorder(1);
        $section->setPage($this->getReference('entertainment'));
        $manager->persist($section);

        $section = new Pagesection();
        $section->setImagelink('Lavandieres.jpg');
        $section->setCreatedAt(new \DateTime());
        $section->setContent('La Maison Georges Brassens (rue du 8 mai 19445) accueille la pièce "Les Lavandières" le samedi 14 octobre à 20h30.
Titine, vieille fille, âpre et persiffleuse, badine à ses heures, boit son chagrin, l\'air de rien.
Andrée, matrone, fière entre toutes de sa tribu, cancane et se signe plus souvent qu\'à son tour.
Chloé, (la brune) mange son pain noir avec le courage des exilés et chante un ailleurs avec la rage au cœur.
Autour des lessiveuses, cernées par le linge blanc tendu sur les fils, Titine, Andrée et Chloé lavent, rincent, essorent le linge et leurs histoires. Chacune d\'elles cachent leurs secrets comme des braises sous la cendre.');
        $section->setTitle('Les Lavandières');
        $section->setSortorder(1);
        $section->setPage($this->getReference('entertainment'));
        $manager->persist($section);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LoadPageData::class,
        ];
    }
}
