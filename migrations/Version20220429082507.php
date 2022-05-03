<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429082507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E55258F8E6');
        $this->addSql('DROP INDEX UNIQ_F65593E55258F8E6 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP id_annonce, DROP title, DROP description, DROP price, DROP created_at, DROP city, CHANGE id_vehicule_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5A76ED395 ON annonce (user_id)');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784182D8F2BF8');
        $this->addSql('DROP INDEX IDX_14B784182D8F2BF8 ON photo');
        $this->addSql('ALTER TABLE photo DROP id_annonce_id');
        $this->addSql('ALTER TABLE publier DROP FOREIGN KEY FK_596E80EC2D8F2BF8');
        $this->addSql('DROP INDEX UNIQ_596E80EC2D8F2BF8 ON publier');
        $this->addSql('ALTER TABLE publier DROP id_annonce_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A76ED395');
        $this->addSql('DROP INDEX IDX_F65593E5A76ED395 ON annonce');
        $this->addSql('ALTER TABLE annonce ADD id_annonce INT NOT NULL, ADD title VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD price INT NOT NULL, ADD created_at DATE NOT NULL, ADD city VARCHAR(255) NOT NULL, CHANGE user_id id_vehicule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E55258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicule (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E55258F8E6 ON annonce (id_vehicule_id)');
        $this->addSql('ALTER TABLE photo ADD id_annonce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784182D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_14B784182D8F2BF8 ON photo (id_annonce_id)');
        $this->addSql('ALTER TABLE publier ADD id_annonce_id INT NOT NULL');
        $this->addSql('ALTER TABLE publier ADD CONSTRAINT FK_596E80EC2D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_596E80EC2D8F2BF8 ON publier (id_annonce_id)');
    }
}
