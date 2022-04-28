<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426181631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP idimg');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784188805AB2F');
        $this->addSql('DROP INDEX IDX_14B784188805AB2F ON photo');
        $this->addSql('ALTER TABLE photo ADD id_annonce_id INT DEFAULT NULL, DROP annonce_id, CHANGE idimg idimg VARCHAR(255) NOT NULL, CHANGE pathimg path VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784182D8F2BF8 FOREIGN KEY (id_annonce_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_14B784182D8F2BF8 ON photo (id_annonce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce ADD idimg INT NOT NULL');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784182D8F2BF8');
        $this->addSql('DROP INDEX IDX_14B784182D8F2BF8 ON photo');
        $this->addSql('ALTER TABLE photo ADD annonce_id INT NOT NULL, DROP id_annonce_id, CHANGE idimg idimg INT NOT NULL, CHANGE path pathimg VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784188805AB2F FOREIGN KEY (annonce_id) REFERENCES photo (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_14B784188805AB2F ON photo (annonce_id)');
    }
}
