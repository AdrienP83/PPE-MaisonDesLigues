<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506114514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD nom VARCHAR(255) NOT NULL, ADD adresse2 VARCHAR(255) DEFAULT NULL, ADD cp INT NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD tel INT DEFAULT NULL, ADD adresse1 VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE licencie ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD adresse1 VARCHAR(255) NOT NULL, ADD adresse2 VARCHAR(255) DEFAULT NULL, ADD cp VARCHAR(5) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD tel INT DEFAULT NULL, ADD date_adhesion DATE NOT NULL');
        $this->addSql('ALTER TABLE qualite ADD libelle VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP nom, DROP adresse2, DROP cp, DROP ville, DROP tel, DROP adresse1');
        $this->addSql('ALTER TABLE licencie DROP nom, DROP prenom, DROP adresse1, DROP adresse2, DROP cp, DROP ville, DROP tel, DROP date_adhesion');
        $this->addSql('ALTER TABLE qualite DROP libelle');
    }
}
