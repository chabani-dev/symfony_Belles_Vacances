<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220719133446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_equipment (annonce_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_A61F3E118805AB2F (annonce_id), INDEX IDX_A61F3E11517FE9FE (equipment_id), PRIMARY KEY(annonce_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce_equipment ADD CONSTRAINT FK_A61F3E118805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_equipment ADD CONSTRAINT FK_A61F3E11517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce ADD author_id INT NOT NULL, ADD comments_id INT NOT NULL, ADD destinations_id INT NOT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E563379586 FOREIGN KEY (comments_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5912C90D4 FOREIGN KEY (destinations_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5F675F31B ON annonce (author_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E563379586 ON annonce (comments_id)');
        $this->addSql('CREATE INDEX IDX_F65593E5912C90D4 ON annonce (destinations_id)');
        $this->addSql('ALTER TABLE category ADD advert_id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1D07ECCB6 FOREIGN KEY (advert_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1D07ECCB6 ON category (advert_id)');
        $this->addSql('ALTER TABLE resevation ADD booker_id INT NOT NULL, ADD users_id INT NOT NULL, ADD annonces_id INT NOT NULL');
        $this->addSql('ALTER TABLE resevation ADD CONSTRAINT FK_6E8E407B8B7E4006 FOREIGN KEY (booker_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resevation ADD CONSTRAINT FK_6E8E407B67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resevation ADD CONSTRAINT FK_6E8E407B4C2885D7 FOREIGN KEY (annonces_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_6E8E407B8B7E4006 ON resevation (booker_id)');
        $this->addSql('CREATE INDEX IDX_6E8E407B67B3B43D ON resevation (users_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6E8E407B4C2885D7 ON resevation (annonces_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce_equipment');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5F675F31B');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E563379586');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5912C90D4');
        $this->addSql('DROP INDEX IDX_F65593E5F675F31B ON annonce');
        $this->addSql('DROP INDEX UNIQ_F65593E563379586 ON annonce');
        $this->addSql('DROP INDEX IDX_F65593E5912C90D4 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP author_id, DROP comments_id, DROP destinations_id');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1D07ECCB6');
        $this->addSql('DROP INDEX IDX_64C19C1D07ECCB6 ON category');
        $this->addSql('ALTER TABLE category DROP advert_id');
        $this->addSql('ALTER TABLE resevation DROP FOREIGN KEY FK_6E8E407B8B7E4006');
        $this->addSql('ALTER TABLE resevation DROP FOREIGN KEY FK_6E8E407B67B3B43D');
        $this->addSql('ALTER TABLE resevation DROP FOREIGN KEY FK_6E8E407B4C2885D7');
        $this->addSql('DROP INDEX IDX_6E8E407B8B7E4006 ON resevation');
        $this->addSql('DROP INDEX IDX_6E8E407B67B3B43D ON resevation');
        $this->addSql('DROP INDEX UNIQ_6E8E407B4C2885D7 ON resevation');
        $this->addSql('ALTER TABLE resevation DROP booker_id, DROP users_id, DROP annonces_id');
    }
}
