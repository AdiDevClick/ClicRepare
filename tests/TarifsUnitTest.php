<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Tarifs;
use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class TarifsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $tarifs     = new Tarifs();
        $categorie  = new Categorie();
        $user       = new User();
        
        $tarifs ->setNom('nom')
                #->setFile('file')
                ->setDescription('description')
                ->setPrix(20.20)
                ->setSlug('slug')
                ->addCategorie($categorie)
                ->setFilter(true)
                ->setUser($user);
        
        $this->assertTrue($tarifs->getNom() === 'nom');
        $this->assertTrue($tarifs->getDescription() === 'description');
        $this->assertTrue($tarifs->getSlug() === 'slug');
        $this->assertTrue($tarifs->isFilter() === true);
        $this->assertContains($categorie, $tarifs->getCategorie());
        $this->assertTrue($tarifs->getUser() === $user);
    }

    public function testIsFalse()
    {
        $tarifs     = new Tarifs();
        $categorie  = new Categorie();
        $user       = new User();

        $tarifs ->setNom('')
                ->setDescription('description')
                ->setPrix(20.20)
                ->setSlug('slug')
                ->addCategorie($categorie)
                ->setFilter(true)
                ->setUser($user);
        
        $this->assertFalse($tarifs->getNom() === 'false');
        $this->assertFalse($tarifs->getDescription() === 'false');
        $this->assertFalse($tarifs->getSlug() === 'false');
        $this->assertNotContains(new Categorie(), $tarifs->getCategorie());
        $this->assertFalse($tarifs->getPrix() === 22.20);
        $this->assertFalse($tarifs->isFilter() === False);
        $this->assertFalse($tarifs->getUser() === new $user());
    }

    public function testIsEmpty()
    {
        $tarifs = new Tarifs();

        $this->assertEmpty( $tarifs->getCategorie() );	
        $this->assertEmpty( $tarifs->getSlug() );
        $this->assertEmpty( $tarifs->isFilter() );
        $this->assertEmpty( $tarifs->getUser() );
        $this->assertEmpty( $tarifs->getNom() );
        $this->assertEmpty( $tarifs->getDescription() );
        $this->assertEmpty( $tarifs->getPrix() );
    }
}