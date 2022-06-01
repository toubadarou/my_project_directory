<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601011911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module_professeur (module_id INT NOT NULL, professeur_id INT NOT NULL, INDEX IDX_82407904AFC2B591 (module_id), INDEX IDX_82407904BAB22EE9 (professeur_id), PRIMARY KEY(module_id, professeur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE module_professeur ADD CONSTRAINT FK_82407904AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module_professeur ADD CONSTRAINT FK_82407904BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annee_scolaire CHANGE etats etats TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE classe ADD libelle VARCHAR(255) NOT NULL, ADD filiere VARCHAR(255) NOT NULL, ADD niveau VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE inscription ADD annnee_scolaire_id INT NOT NULL, ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6F3DEB4D5 FOREIGN KEY (annnee_scolaire_id) REFERENCES annee_scolaire (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6F3DEB4D5 ON inscription (annnee_scolaire_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6DDEAB1A3 ON inscription (etudiant_id)');
        $this->addSql('ALTER TABLE professeur ADD grade VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module_professeur DROP FOREIGN KEY FK_82407904AFC2B591');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE module_professeur');
        $this->addSql('ALTER TABLE annee_scolaire CHANGE etats etats VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE classe DROP libelle, DROP filiere, DROP niveau');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6F3DEB4D5');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DDEAB1A3');
        $this->addSql('DROP INDEX IDX_5E90F6D6F3DEB4D5 ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D6DDEAB1A3 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP annnee_scolaire_id, DROP etudiant_id');
        $this->addSql('ALTER TABLE professeur DROP grade');
    }
}
