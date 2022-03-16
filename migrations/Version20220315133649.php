<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220315133649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE classes_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE compagnies_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE courpublics_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cours_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE filieres_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE matierepublics_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE matieres_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE roles_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sections_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE classes (id INT NOT NULL, filiere_id INT NOT NULL, name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2ED7EC5180AA129 ON classes (filiere_id)');
        $this->addSql('CREATE TABLE compagnies (id INT NOT NULL, name TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE courpublics (id INT NOT NULL, matierepublic_id INT NOT NULL, name TEXT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3343C6DD2F1C5649 ON courpublics (matierepublic_id)');
        $this->addSql('CREATE TABLE cours (id INT NOT NULL, matiere_id INT NOT NULL, classe_id INT DEFAULT NULL, name TEXT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FDCA8C9CF46CD258 ON cours (matiere_id)');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C8F5EA509 ON cours (classe_id)');
        $this->addSql('CREATE TABLE filieres (id INT NOT NULL, section_id INT NOT NULL, name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C97A115D823E37A ON filieres (section_id)');
        $this->addSql('CREATE TABLE matierepublics (id INT NOT NULL, name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE matieres (id INT NOT NULL, name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE roles (id INT NOT NULL, name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sections (id INT NOT NULL, compagnie_id INT NOT NULL, name TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2B96439852FBE437 ON sections (compagnie_id)');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, role_id INT NOT NULL, section_id INT NOT NULL, classe_id INT NOT NULL, filiere_id INT DEFAULT NULL, login TEXT NOT NULL, passwd TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1483A5E9D60322AC ON users (role_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9D823E37A ON users (section_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E98F5EA509 ON users (classe_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9180AA129 ON users (filiere_id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5180AA129 FOREIGN KEY (filiere_id) REFERENCES filieres (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE courpublics ADD CONSTRAINT FK_3343C6DD2F1C5649 FOREIGN KEY (matierepublic_id) REFERENCES matierepublics (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CF46CD258 FOREIGN KEY (matiere_id) REFERENCES matieres (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C8F5EA509 FOREIGN KEY (classe_id) REFERENCES classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE filieres ADD CONSTRAINT FK_C97A115D823E37A FOREIGN KEY (section_id) REFERENCES sections (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sections ADD CONSTRAINT FK_2B96439852FBE437 FOREIGN KEY (compagnie_id) REFERENCES compagnies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9D60322AC FOREIGN KEY (role_id) REFERENCES roles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9D823E37A FOREIGN KEY (section_id) REFERENCES sections (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E98F5EA509 FOREIGN KEY (classe_id) REFERENCES classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9180AA129 FOREIGN KEY (filiere_id) REFERENCES filieres (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cours DROP CONSTRAINT FK_FDCA8C9C8F5EA509');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E98F5EA509');
        $this->addSql('ALTER TABLE sections DROP CONSTRAINT FK_2B96439852FBE437');
        $this->addSql('ALTER TABLE classes DROP CONSTRAINT FK_2ED7EC5180AA129');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9180AA129');
        $this->addSql('ALTER TABLE courpublics DROP CONSTRAINT FK_3343C6DD2F1C5649');
        $this->addSql('ALTER TABLE cours DROP CONSTRAINT FK_FDCA8C9CF46CD258');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9D60322AC');
        $this->addSql('ALTER TABLE filieres DROP CONSTRAINT FK_C97A115D823E37A');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9D823E37A');
        $this->addSql('DROP SEQUENCE classes_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE compagnies_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE courpublics_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cours_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE filieres_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE matierepublics_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE matieres_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE roles_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sections_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE compagnies');
        $this->addSql('DROP TABLE courpublics');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE filieres');
        $this->addSql('DROP TABLE matierepublics');
        $this->addSql('DROP TABLE matieres');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE sections');
        $this->addSql('DROP TABLE users');
    }
}
