<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230905142802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tarifs_categorie (tarifs_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_D98A6FDBF5F3287F (tarifs_id), INDEX IDX_D98A6FDBBCF5E72D (categorie_id), PRIMARY KEY(tarifs_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tarifs_categorie ADD CONSTRAINT FK_D98A6FDBF5F3287F FOREIGN KEY (tarifs_id) REFERENCES tarifs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarifs_categorie ADD CONSTRAINT FK_D98A6FDBBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarifs ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tarifs ADD CONSTRAINT FK_F9B8C496A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F9B8C496A76ED395 ON tarifs (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tarifs_categorie DROP FOREIGN KEY FK_D98A6FDBF5F3287F');
        $this->addSql('ALTER TABLE tarifs_categorie DROP FOREIGN KEY FK_D98A6FDBBCF5E72D');
        $this->addSql('DROP TABLE tarifs_categorie');
        $this->addSql('ALTER TABLE tarifs DROP FOREIGN KEY FK_F9B8C496A76ED395');
        $this->addSql('DROP INDEX IDX_F9B8C496A76ED395 ON tarifs');
        $this->addSql('ALTER TABLE tarifs DROP user_id');
    }
}
