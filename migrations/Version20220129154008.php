<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220129154008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nnom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, description CLOB DEFAULT NULL, liste_creations CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('CREATE TABLE blog (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, auteur VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, contenu CLOB DEFAULT NULL, titre VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE utilisateurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, photo_profil BLOB DEFAULT NULL)');
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, category_id, title, content FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, content CLOB NOT NULL COLLATE BINARY, auteur VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, tags CLOB DEFAULT NULL --(DC2Type:array)
        , etat BOOLEAN DEFAULT NULL, CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO article (id, category_id, title, content) SELECT id, category_id, title, content FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE auteurs');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, category_id, title, content FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL)');
        $this->addSql('INSERT INTO article (id, category_id, title, content) SELECT id, category_id, title, content FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
    }
}
