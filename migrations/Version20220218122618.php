<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218122618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP INDEX mail_utilisateur ON user');
        $this->addSql('ALTER TABLE user ADD post_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6494B89032C ON user (post_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, mail_utilisateur VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_1483A5E9A9C31E6E (mail_utilisateur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE categorie_equipement CHANGE nom_categorie_equipement nom_categorie_equipement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie_post CHANGE nom_categorie_post nom_categorie_post VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commentaire CHANGE msg_commentaire msg_commentaire LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE equipement CHANGE nom_equipement nom_equipement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_equipement etat_equipement VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_equipement description_equipement LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE localisation CHANGE position_depart_localisation position_depart_localisation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE position_arivee_planning position_arivee_planning VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fusee fusee VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE offre CHANGE nom_offre nom_offre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_offre description_offre LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE planinng CHANGE nom_planning nom_planning VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE destination_planning destination_planning VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE activites_planning activites_planning LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_planning description_planning LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE post CHANGE nom_post nom_post VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE img_post img_post VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_post description_post VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reclamation CHANGE description_reclamation description_reclamation LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_reclamation etat_reclamation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reservation CHANGE etat_reservation etat_reservation VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE role CHANGE nom_role nom_role VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_role description_role LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tacherole tacherole VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B89032C');
        $this->addSql('DROP INDEX IDX_8D93D6494B89032C ON user');
        $this->addSql('ALTER TABLE user DROP post_id, CHANGE nom_utilisateur nom_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom_utilisateur prenom_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse_utilisateur adresse_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail_utilisateur mail_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE sudo_utilisateur sudo_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mdp_utilisateur mdp_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE etat_compte etat_compte VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE numero_utilisateur numero_utilisateur VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE INDEX mail_utilisateur ON user (mail_utilisateur)');
    }
}
