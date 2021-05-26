<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526083924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('DROP TABLE compte');
        $this->addSql('ALTER TABLE atelier CHANGE unevacation_id unevacation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63F100910 FOREIGN KEY (uncompte_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556123F100910 FOREIGN KEY (uncompte_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715BD987352 FOREIGN KEY (uneinscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715302A18ED FOREIGN KEY (unhotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7151D32E1DF FOREIGN KEY (unecategoriechambre_id) REFERENCES categorie_chambre (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15302A18ED FOREIGN KEY (unhotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C1530D21B5B FOREIGN KEY (unechambre_id) REFERENCES categorie_chambre (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A364BC17 FOREIGN KEY (desinscriptions_id) REFERENCES inscription (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, unlicencie_id INT DEFAULT NULL, uneinscription_id INT DEFAULT NULL, username INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_CFF65260BD987352 (uneinscription_id), UNIQUE INDEX UNIQ_CFF65260B7264A9B (unlicencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B7264A9B FOREIGN KEY (unlicencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260BD987352 FOREIGN KEY (uneinscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE atelier CHANGE unevacation_id unevacation_id INT NOT NULL');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63F100910 FOREIGN KEY (uncompte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556123F100910 FOREIGN KEY (uncompte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715BD987352');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715302A18ED');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7151D32E1DF');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15302A18ED');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C1530D21B5B');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A364BC17');
    }
}
