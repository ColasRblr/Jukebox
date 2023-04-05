<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405134440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9A76ED395');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9A0BDB2F3');
        $this->addSql('DROP INDEX IDX_68C58ED9A76ED395 ON favorite');
        $this->addSql('DROP INDEX IDX_68C58ED9A0BDB2F3 ON favorite');
        $this->addSql('ALTER TABLE favorite ADD user_id_id INT NOT NULL, ADD song_id_id INT NOT NULL, DROP user_id, DROP song_id');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED99D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9B2E00B12 FOREIGN KEY (song_id_id) REFERENCES song (id)');
        $this->addSql('CREATE INDEX IDX_68C58ED99D86650F ON favorite (user_id_id)');
        $this->addSql('CREATE INDEX IDX_68C58ED9B2E00B12 ON favorite (song_id_id)');
        $this->addSql('ALTER TABLE song ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649217BBB47');
        $this->addSql('DROP INDEX UNIQ_8D93D649217BBB47 ON user');
        $this->addSql('ALTER TABLE user CHANGE person_id person_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D3728193 FOREIGN KEY (person_id_id) REFERENCES person (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D3728193 ON user (person_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP image');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED99D86650F');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9B2E00B12');
        $this->addSql('DROP INDEX IDX_68C58ED99D86650F ON favorite');
        $this->addSql('DROP INDEX IDX_68C58ED9B2E00B12 ON favorite');
        $this->addSql('ALTER TABLE favorite ADD user_id INT NOT NULL, ADD song_id INT NOT NULL, DROP user_id_id, DROP song_id_id');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id)');
        $this->addSql('CREATE INDEX IDX_68C58ED9A76ED395 ON favorite (user_id)');
        $this->addSql('CREATE INDEX IDX_68C58ED9A0BDB2F3 ON favorite (song_id)');
        $this->addSql('ALTER TABLE song DROP image');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D3728193');
        $this->addSql('DROP INDEX UNIQ_8D93D649D3728193 ON user');
        $this->addSql('ALTER TABLE user CHANGE person_id_id person_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649217BBB47 ON user (person_id)');
    }
}
