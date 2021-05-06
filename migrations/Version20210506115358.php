<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210506115358 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B755612173848BA');
        $this->addSql('DROP INDEX IDX_3B755612173848BA ON licencie');
        $this->addSql('ALTER TABLE licencie CHANGE un_club_id unclub_id INT NOT NULL');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B7556126529F5F1 FOREIGN KEY (unclub_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_3B7556126529F5F1 ON licencie (unclub_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licencie DROP FOREIGN KEY FK_3B7556126529F5F1');
        $this->addSql('DROP INDEX IDX_3B7556126529F5F1 ON licencie');
        $this->addSql('ALTER TABLE licencie CHANGE unclub_id un_club_id INT NOT NULL');
        $this->addSql('ALTER TABLE licencie ADD CONSTRAINT FK_3B755612173848BA FOREIGN KEY (un_club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_3B755612173848BA ON licencie (un_club_id)');
    }
}
