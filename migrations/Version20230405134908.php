<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230405134908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` RENAME INDEX uniq_880e0d76d3728193 TO UNIQ_880E0D76217BBB47');
        $this->addSql('ALTER TABLE category ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE category RENAME INDEX idx_64c19c1df6e65ad TO IDX_64C19C1642B8210');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9B2E00B12');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED99D86650F');
        $this->addSql('DROP INDEX IDX_68C58ED99D86650F ON favorite');
        $this->addSql('DROP INDEX IDX_68C58ED9B2E00B12 ON favorite');
        $this->addSql('ALTER TABLE favorite ADD user_id_id INT NOT NULL, ADD song_id_id INT NOT NULL, DROP user_id, DROP song_id');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9B2E00B12 FOREIGN KEY (song_id_id) REFERENCES song (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED99D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_68C58ED99D86650F ON favorite (user_id_id)');
        $this->addSql('CREATE INDEX IDX_68C58ED9B2E00B12 ON favorite (song_id_id)');
        $this->addSql('ALTER TABLE song ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE song RENAME INDEX idx_33edeea1df6e65ad TO IDX_33EDEEA1642B8210');
        $this->addSql('ALTER TABLE song RENAME INDEX idx_33edeea19777d11e TO IDX_33EDEEA112469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D3728193');
        $this->addSql('DROP INDEX UNIQ_8D93D649D3728193 ON user');
        $this->addSql('ALTER TABLE user CHANGE person_id person_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D3728193 FOREIGN KEY (person_id_id) REFERENCES person (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D3728193 ON user (person_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` RENAME INDEX uniq_880e0d76217bbb47 TO UNIQ_880E0D76D3728193');
        $this->addSql('ALTER TABLE category DROP image');
        $this->addSql('ALTER TABLE category RENAME INDEX idx_64c19c1642b8210 TO IDX_64C19C1DF6E65AD');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED99D86650F');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9B2E00B12');
        $this->addSql('DROP INDEX IDX_68C58ED99D86650F ON favorite');
        $this->addSql('DROP INDEX IDX_68C58ED9B2E00B12 ON favorite');
        $this->addSql('ALTER TABLE favorite ADD user_id INT NOT NULL, ADD song_id INT NOT NULL, DROP user_id_id, DROP song_id_id');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED99D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9B2E00B12 FOREIGN KEY (song_id) REFERENCES song (id)');
        $this->addSql('CREATE INDEX IDX_68C58ED99D86650F ON favorite (user_id)');
        $this->addSql('CREATE INDEX IDX_68C58ED9B2E00B12 ON favorite (song_id)');
        $this->addSql('ALTER TABLE song DROP image');
        $this->addSql('ALTER TABLE song RENAME INDEX idx_33edeea1642b8210 TO IDX_33EDEEA1DF6E65AD');
        $this->addSql('ALTER TABLE song RENAME INDEX idx_33edeea112469de2 TO IDX_33EDEEA19777D11E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D3728193');
        $this->addSql('DROP INDEX UNIQ_8D93D649D3728193 ON user');
        $this->addSql('ALTER TABLE user CHANGE person_id_id person_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D3728193 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D3728193 ON user (person_id)');
    }
}
