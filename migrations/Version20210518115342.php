<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210518115342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D63F100910 FOREIGN KEY (uncompte_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556123F100910 FOREIGN KEY (uncompte_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D63F100910');
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556123F100910');
    }
}
