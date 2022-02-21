<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221092102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD nom_role_id_id INT NOT NULL, CHANGE nom_role_id nom_role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989D7F60F FOREIGN KEY (nom_role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649238C2964 FOREIGN KEY (nom_role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64989D7F60F ON user (nom_role_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649238C2964 ON user (nom_role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989D7F60F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649238C2964');
        $this->addSql('DROP INDEX IDX_8D93D64989D7F60F ON user');
        $this->addSql('DROP INDEX IDX_8D93D649238C2964 ON user');
        $this->addSql('ALTER TABLE user DROP nom_role_id_id, CHANGE nom_role_id nom_role_id INT NOT NULL');
    }
}
