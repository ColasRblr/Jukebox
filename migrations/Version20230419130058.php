<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419130058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` CHANGE IsAdmin is_admin TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED99D86650F');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9B2E00B12');
        $this->addSql('DROP INDEX IDX_68C58ED99D86650F ON favorite');
        $this->addSql('DROP INDEX IDX_68C58ED9B2E00B12 ON favorite');
        $this->addSql('ALTER TABLE person ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE isUser is_user TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649217BBB47 ON user (person_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` CHANGE is_admin IsAdmin TINYINT(1) NOT NULL');
        $this->addSql('CREATE INDEX IDX_68C58ED99D86650F ON favorite (user_id)');
        $this->addSql('CREATE INDEX IDX_68C58ED9B2E00B12 ON favorite (song_id)');
        $this->addSql('ALTER TABLE person DROP roles');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649217BBB47');
        $this->addSql('DROP INDEX UNIQ_8D93D649217BBB47 ON user');
        $this->addSql('ALTER TABLE user CHANGE is_user isUser TINYINT(1) NOT NULL');
    }
}
