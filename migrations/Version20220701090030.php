<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220701090030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE statistique ADD saison_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADCB7B5AFE FOREIGN KEY (saison_id_id) REFERENCES saison (id)');
        $this->addSql('CREATE INDEX IDX_73A038ADCB7B5AFE ON statistique (saison_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038ADCB7B5AFE');
        $this->addSql('DROP INDEX IDX_73A038ADCB7B5AFE ON statistique');
        $this->addSql('ALTER TABLE statistique DROP saison_id_id');
    }
}
