<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121143306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classes DROP CONSTRAINT filiere');
        $this->addSql('DROP INDEX fki_filiere1');
        $this->addSql('ALTER TABLE cours DROP CONSTRAINT classe');
        $this->addSql('ALTER TABLE cours DROP CONSTRAINT matiere');
        $this->addSql('DROP INDEX fki_matiere');
        $this->addSql('DROP INDEX fki_classe1');
        $this->addSql('ALTER TABLE courspublics DROP CONSTRAINT public');
        $this->addSql('DROP INDEX fki_public');
        $this->addSql('ALTER TABLE filieres DROP CONSTRAINT section');
        $this->addSql('DROP INDEX fki_sections');
        $this->addSql('ALTER TABLE section DROP CONSTRAINT compagnie');
        $this->addSql('DROP INDEX fki_compagnie');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT role');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT section');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT filiere');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT classe');
        $this->addSql('DROP INDEX fki_filiere');
        $this->addSql('DROP INDEX fki_section');
        $this->addSql('DROP INDEX fki_role');
        $this->addSql('DROP INDEX fki_classe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT compagnie FOREIGN KEY (compagnie_id) REFERENCES compagnies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX fki_compagnie ON section (compagnie_id)');
        $this->addSql('ALTER TABLE filieres ADD CONSTRAINT section FOREIGN KEY (section_id) REFERENCES section (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX fki_sections ON filieres (section_id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT filiere FOREIGN KEY (filiere_id) REFERENCES filieres (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX fki_filiere1 ON classes (filiere_id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT classe FOREIGN KEY (classe_id) REFERENCES classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT matiere FOREIGN KEY (matiere_id) REFERENCES matieres (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX fki_matiere ON cours (matiere_id)');
        $this->addSql('CREATE INDEX fki_classe1 ON cours (classe_id)');
        $this->addSql('ALTER TABLE courspublics ADD CONSTRAINT public FOREIGN KEY (matierepublic_id) REFERENCES cours (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX fki_public ON courspublics (matierepublic_id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT role FOREIGN KEY (role_id) REFERENCES roles (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT section FOREIGN KEY (section_id) REFERENCES section (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT filiere FOREIGN KEY (filiere_id) REFERENCES filieres (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT classe FOREIGN KEY (classe_id) REFERENCES classes (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX fki_filiere ON users (filiere_id)');
        $this->addSql('CREATE INDEX fki_section ON users (section_id)');
        $this->addSql('CREATE INDEX fki_role ON users (role_id)');
        $this->addSql('CREATE INDEX fki_classe ON users (classe_id)');
    }
}
