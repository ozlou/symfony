<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426211215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E58805AB2F');
        $this->addSql('DROP INDEX IDX_F65593E58805AB2F ON annonce');
        $this->addSql('ALTER TABLE annonce ADD id_vehicule_id INT DEFAULT NULL, DROP annonce_id');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E55258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E55258F8E6 ON annonce (id_vehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E55258F8E6');
        $this->addSql('DROP INDEX UNIQ_F65593E55258F8E6 ON annonce');
        $this->addSql('ALTER TABLE annonce ADD annonce_id INT NOT NULL, DROP id_vehicule_id');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E58805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F65593E58805AB2F ON annonce (annonce_id)');
    }
}
