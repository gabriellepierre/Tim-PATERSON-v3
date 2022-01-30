<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220130220731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, category_id, title, content, auteur, date, tags, etat, resume FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, content CLOB NOT NULL COLLATE BINARY, auteur VARCHAR(255) DEFAULT NULL COLLATE BINARY, date DATE DEFAULT NULL, tags CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:array)
        , etat BOOLEAN DEFAULT NULL, resume CLOB DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO article (id, category_id, title, content, auteur, date, tags, etat, resume) SELECT id, category_id, title, content, auteur, date, tags, etat, resume FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
        $this->addSql('DROP INDEX IDX_6DD7D42A7294869C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__auteurs AS SELECT id, article_id, nnom, prenom, description, liste_creations, pseudo FROM auteurs');
        $this->addSql('DROP TABLE auteurs');
        $this->addSql('CREATE TABLE auteurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, article_id INTEGER DEFAULT NULL, nnom VARCHAR(255) NOT NULL COLLATE BINARY, prenom VARCHAR(255) DEFAULT NULL COLLATE BINARY, description CLOB DEFAULT NULL COLLATE BINARY, liste_creations CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:array)
        , pseudo VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_6DD7D42A7294869C FOREIGN KEY (article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO auteurs (id, article_id, nnom, prenom, description, liste_creations, pseudo) SELECT id, article_id, nnom, prenom, description, liste_creations, pseudo FROM __temp__auteurs');
        $this->addSql('DROP TABLE __temp__auteurs');
        $this->addSql('CREATE INDEX IDX_6DD7D42A7294869C ON auteurs (article_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_23A0E6612469DE2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, category_id, title, content, auteur, date, tags, etat, resume FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL, auteur VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, tags CLOB DEFAULT NULL --(DC2Type:array)
        , etat BOOLEAN DEFAULT NULL, resume CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO article (id, category_id, title, content, auteur, date, tags, etat, resume) SELECT id, category_id, title, content, auteur, date, tags, etat, resume FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
        $this->addSql('CREATE INDEX IDX_23A0E6612469DE2 ON article (category_id)');
        $this->addSql('DROP INDEX IDX_6DD7D42A7294869C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__auteurs AS SELECT id, article_id, nnom, prenom, description, liste_creations, pseudo FROM auteurs');
        $this->addSql('DROP TABLE auteurs');
        $this->addSql('CREATE TABLE auteurs (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, article_id INTEGER DEFAULT NULL, nnom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, description CLOB DEFAULT NULL, liste_creations CLOB DEFAULT NULL --(DC2Type:array)
        , pseudo VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO auteurs (id, article_id, nnom, prenom, description, liste_creations, pseudo) SELECT id, article_id, nnom, prenom, description, liste_creations, pseudo FROM __temp__auteurs');
        $this->addSql('DROP TABLE __temp__auteurs');
        $this->addSql('CREATE INDEX IDX_6DD7D42A7294869C ON auteurs (article_id)');
    }
}
