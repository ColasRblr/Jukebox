<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404114756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, UNIQUE INDEX UNIQ_880E0D76217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_64C19C1642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, song_id_id INT NOT NULL, INDEX IDX_68C58ED99D86650F (user_id_id), INDEX IDX_68C58ED9B2E00B12 (song_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, category_id INT NOT NULL, title VARCHAR(255) NOT NULL, artist VARCHAR(255) NOT NULL, duration INT NOT NULL, path_song VARCHAR(255) NOT NULL, INDEX IDX_33EDEEA1642B8210 (admin_id), INDEX IDX_33EDEEA112469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, person_id_id INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649D3728193 (person_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED99D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favorite ADD CONSTRAINT FK_68C58ED9B2E00B12 FOREIGN KEY (song_id_id) REFERENCES song (id)');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA1642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA112469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D3728193 FOREIGN KEY (person_id_id) REFERENCES person (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76217BBB47');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1642B8210');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED99D86650F');
        $this->addSql('ALTER TABLE favorite DROP FOREIGN KEY FK_68C58ED9B2E00B12');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA1642B8210');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA112469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D3728193');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
