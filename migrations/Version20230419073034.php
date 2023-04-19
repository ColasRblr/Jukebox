<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230419073034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` ADD is_admin TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE favorite RENAME INDEX idx_68c58ed99d86650f TO IDX_68C58ED9A76ED395');
        $this->addSql('ALTER TABLE favorite RENAME INDEX idx_68c58ed9b2e00b12 TO IDX_68C58ED9A0BDB2F3');
        $this->addSql('ALTER TABLE user ADD is_user TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649d3728193 TO UNIQ_8D93D649217BBB47');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP is_admin');
        $this->addSql('ALTER TABLE favorite RENAME INDEX idx_68c58ed9a76ed395 TO IDX_68C58ED99D86650F');
        $this->addSql('ALTER TABLE favorite RENAME INDEX idx_68c58ed9a0bdb2f3 TO IDX_68C58ED9B2E00B12');
        $this->addSql('ALTER TABLE user DROP is_user');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649217bbb47 TO UNIQ_8D93D649D3728193');
    }
}
