<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210524150210 extends AbstractMigration
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
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE compte');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63F100910 FOREIGN KEY (uncompte_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556123F100910 FOREIGN KEY (uncompte_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE theme ADD libelle VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, unlicencie_id INT DEFAULT NULL, uneinscription_id INT DEFAULT NULL, username INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_CFF65260BD987352 (uneinscription_id), UNIQUE INDEX UNIQ_CFF65260B7264A9B (unlicencie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260B7264A9B FOREIGN KEY (unlicencie_id) REFERENCES licencie (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260BD987352 FOREIGN KEY (uneinscription_id) REFERENCES inscription (id)');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63F100910 FOREIGN KEY (uncompte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556123F100910 FOREIGN KEY (uncompte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE theme DROP libelle');
    }
}
