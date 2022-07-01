<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220701085102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statistique (id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, nb_but_champ SMALLINT NOT NULL, nb_but_coupe SMALLINT NOT NULL, nb_passe_champ SMALLINT NOT NULL, nb_passe_coupe SMALLINT NOT NULL, nb_carton_jaune SMALLINT NOT NULL, INDEX IDX_73A038ADA9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADA9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE joueur CHANGE poste_id_id poste_id_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE statistique');
        $this->addSql('ALTER TABLE joueur CHANGE poste_id_id poste_id_id INT DEFAULT NULL');
    }
}
