<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250323103419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__projet AS SELECT id, title, etudiant1_firstname, etudiant2_firstname FROM projet');
        $this->addSql('DROP TABLE projet');
        $this->addSql('CREATE TABLE projet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, etudiant1_firstname VARCHAR(255) DEFAULT NULL, etudiant2_firstname VARCHAR(255) DEFAULT NULL, etudiant1_email VARCHAR(255) DEFAULT NULL, etudiant2_email VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO projet (id, title, etudiant1_firstname, etudiant2_firstname) SELECT id, title, etudiant1_firstname, etudiant2_firstname FROM __temp__projet');
        $this->addSql('DROP TABLE __temp__projet');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__projet AS SELECT id, title, etudiant1_firstname, etudiant2_firstname FROM projet');
        $this->addSql('DROP TABLE projet');
        $this->addSql('CREATE TABLE projet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, etudiant1_firstname VARCHAR(255) DEFAULT NULL, etudiant2_firstname VARCHAR(255) DEFAULT NULL, etudiant1_lastname VARCHAR(255) DEFAULT NULL, etudiant2_lastname VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO projet (id, title, etudiant1_firstname, etudiant2_firstname) SELECT id, title, etudiant1_firstname, etudiant2_firstname FROM __temp__projet');
        $this->addSql('DROP TABLE __temp__projet');
    }
}
