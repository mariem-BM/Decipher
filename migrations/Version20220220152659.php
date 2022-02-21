<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220220152659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX nom_role ON role');
        $this->addSql('ALTER TABLE role DROP nom_role_id');
        $this->addSql('ALTER TABLE user ADD nom_role_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649238C2964 FOREIGN KEY (nom_role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649238C2964 ON user (nom_role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE role ADD nom_role_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX nom_role ON role (nom_role)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649238C2964');
        $this->addSql('DROP INDEX IDX_8D93D649238C2964 ON user');
        $this->addSql('ALTER TABLE user DROP nom_role_id');
    }
}
