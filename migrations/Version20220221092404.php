<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221092404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, mail_utilisateur VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9A9C31E6E (mail_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billet ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6B83297E7 ON billet (reservation_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495544973C78');
        $this->addSql('DROP INDEX IDX_42C8495544973C78 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP billet_id');
        $this->addSql('ALTER TABLE user ADD nom_role_id_id INT NOT NULL, ADD nom_role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989D7F60F FOREIGN KEY (nom_role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649238C2964 FOREIGN KEY (nom_role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64989D7F60F ON user (nom_role_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649238C2964 ON user (nom_role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6B83297E7');
        $this->addSql('DROP INDEX IDX_1F034AF6B83297E7 ON billet');
        $this->addSql('ALTER TABLE billet DROP reservation_id');
        $this->addSql('ALTER TABLE reservation ADD billet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495544973C78 FOREIGN KEY (billet_id) REFERENCES billet (id)');
        $this->addSql('CREATE INDEX IDX_42C8495544973C78 ON reservation (billet_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989D7F60F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649238C2964');
        $this->addSql('DROP INDEX IDX_8D93D64989D7F60F ON user');
        $this->addSql('DROP INDEX IDX_8D93D649238C2964 ON user');
        $this->addSql('ALTER TABLE user DROP nom_role_id_id, DROP nom_role_id');
    }
}
