<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630173113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur_saison (joueur_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_296BC50AA9E2D76C (joueur_id), INDEX IDX_296BC50AF965414C (saison_id), PRIMARY KEY(joueur_id, saison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recontre (id INT AUTO_INCREMENT NOT NULL, rencontre_week_end VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, annee VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE joueur_saison ADD CONSTRAINT FK_296BC50AA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur_saison ADD CONSTRAINT FK_296BC50AF965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE joueur_saison DROP FOREIGN KEY FK_296BC50AA9E2D76C');
        $this->addSql('ALTER TABLE joueur_saison DROP FOREIGN KEY FK_296BC50AF965414C');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE joueur_saison');
        $this->addSql('DROP TABLE recontre');
        $this->addSql('DROP TABLE saison');
    }
}
