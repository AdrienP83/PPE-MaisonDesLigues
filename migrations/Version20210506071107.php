<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506071107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, unevacation_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, nbplacesmaxi INT NOT NULL, INDEX IDX_E1BB1823C4C95587 (unevacation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier_theme (atelier_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_AEB6D34382E2CF35 (atelier_id), INDEX IDX_AEB6D34359027487 (theme_id), PRIMARY KEY(atelier_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_chambre (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, unlicencie_id INT NOT NULL, uneinscription_id INT DEFAULT NULL, username INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CFF65260B7264A9B (unlicencie_id), UNIQUE INDEX UNIQ_CFF65260BD987352 (uneinscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, uncompte_id INT NOT NULL, UNIQUE INDEX UNIQ_5E90F6D63F100910 (uncompte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_atelier (inscription_id INT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_C86AEECF5DAC5993 (inscription_id), INDEX IDX_C86AEECF82E2CF35 (atelier_id), PRIMARY KEY(inscription_id, atelier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE licencie (id INT AUTO_INCREMENT NOT NULL, uncompte_id INT DEFAULT NULL, un_club_id INT NOT NULL, unequalite_id INT NOT NULL, numlicenceunique INT NOT NULL, mail VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3B7556123F100910 (uncompte_id), INDEX IDX_3B755612173848BA (un_club_id), INDEX IDX_3B755612DF6E17F (unequalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nuite (id INT AUTO_INCREMENT NOT NULL, uneinscription_id INT NOT NULL, unhotel_id INT NOT NULL, unecategoriechambre_id INT NOT NULL, datenuit DATE NOT NULL, INDEX IDX_8D4CB715BD987352 (uneinscription_id), INDEX IDX_8D4CB715302A18ED (unhotel_id), INDEX IDX_8D4CB7151D32E1DF (unecategoriechambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, unhotel_id INT NOT NULL, unechambre_id INT NOT NULL, tarifnuite INT NOT NULL, INDEX IDX_21866C15302A18ED (unhotel_id), INDEX IDX_21866C1530D21B5B (unechambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualite (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, desinscriptions_id INT DEFAULT NULL, daterepas DATE NOT NULL, typerepas VARCHAR(255) NOT NULL, INDEX IDX_42C84955A364BC17 (desinscriptions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacations (id INT AUTO_INCREMENT NOT NULL, dateheuredebut DATETIME NOT NULL, dateheurefin DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB1823C4C95587 FOREIGN KEY (unevacation_id) REFERENCES vacations (id)');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34382E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE atelier_theme ADD CONSTRAINT FK_AEB6D34359027487 FOREIGN KEY (theme_id) REFERENCES theme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B7264A9B FOREIGN KEY (unlicencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260BD987352 FOREIGN KEY (uneinscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63F100910 FOREIGN KEY (uncompte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF5DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556123F100910 FOREIGN KEY (uncompte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612173848BA FOREIGN KEY (un_club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612DF6E17F FOREIGN KEY (unequalite_id) REFERENCES qualite (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715BD987352 FOREIGN KEY (uneinscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715302A18ED FOREIGN KEY (unhotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7151D32E1DF FOREIGN KEY (unecategoriechambre_id) REFERENCES categorie_chambre (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15302A18ED FOREIGN KEY (unhotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C1530D21B5B FOREIGN KEY (unechambre_id) REFERENCES categorie_chambre (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A364BC17 FOREIGN KEY (desinscriptions_id) REFERENCES inscription (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34382E2CF35');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF82E2CF35');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7151D32E1DF');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C1530D21B5B');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612173848BA');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715302A18ED');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15302A18ED');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260BD987352');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF5DAC5993');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715BD987352');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A364BC17');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260B7264A9B');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612DF6E17F');
        $this->addSql('ALTER TABLE atelier_theme DROP FOREIGN KEY FK_AEB6D34359027487');
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB1823C4C95587');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE atelier_theme');
        $this->addSql('DROP TABLE categorie_chambre');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE inscription_atelier');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('DROP TABLE nuite');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE vacations');
    }
}
