<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719141221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resevation DROP FOREIGN KEY FK_6E8E407B8B7E4006');
        $this->addSql('DROP INDEX IDX_6E8E407B8B7E4006 ON resevation');
        $this->addSql('ALTER TABLE resevation DROP booker_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resevation ADD booker_id INT NOT NULL');
        $this->addSql('ALTER TABLE resevation ADD CONSTRAINT FK_6E8E407B8B7E4006 FOREIGN KEY (booker_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6E8E407B8B7E4006 ON resevation (booker_id)');
    }
}
