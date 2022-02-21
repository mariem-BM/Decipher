<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221093711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD id INT AUTO_INCREMENT NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE mail_utilisateur mail_utilisateur VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9A9C31E6E ON users (mail_utilisateur)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1483A5E9A9C31E6E ON users');
        $this->addSql('ALTER TABLE users DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE users DROP id, DROP roles, CHANGE mail_utilisateur mail_utilisateur INT NOT NULL, CHANGE password password INT NOT NULL');
    }
}
