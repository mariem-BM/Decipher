<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220214094006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE billet (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, localisation_id INT DEFAULT NULL, chair_billet INT NOT NULL, voyage_num INT NOT NULL, terminal INT NOT NULL, portail INT NOT NULL, embarquement DATE NOT NULL, INDEX IDX_1F034AF6B83297E7 (reservation_id), INDEX IDX_1F034AF6C68BE09C (localisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_equipement (id INT AUTO_INCREMENT NOT NULL, nom_categorie_equipement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_post (id INT AUTO_INCREMENT NOT NULL, nom_categorie_post VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, date_commentaire DATE NOT NULL, msg_commentaire LONGTEXT NOT NULL, INDEX IDX_67F068BC4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, categorie_equipement_id INT DEFAULT NULL, nom_equipement VARCHAR(255) NOT NULL, etat_equipement VARCHAR(255) NOT NULL, description_equipement LONGTEXT NOT NULL, INDEX IDX_B8B4C6F383A0EE16 (categorie_equipement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localisation (id INT AUTO_INCREMENT NOT NULL, heure_depart_localisation TIME NOT NULL, heure_arrivee_loacalisation TIME NOT NULL, position_depart_localisation VARCHAR(255) NOT NULL, position_arivee_planning VARCHAR(255) NOT NULL, fusee VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, nom_offre VARCHAR(255) NOT NULL, description_offre LONGTEXT NOT NULL, prix_offre DOUBLE PRECISION NOT NULL, duree_offre DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planinng (id INT AUTO_INCREMENT NOT NULL, nom_planning VARCHAR(255) NOT NULL, date_debut_planning DATE NOT NULL, date_fin_planning DATE NOT NULL, destination_planning VARCHAR(255) NOT NULL, activites_planning LONGTEXT NOT NULL, description_planning LONGTEXT NOT NULL, periode_planning DOUBLE PRECISION NOT NULL, prix_planning DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, categorie_post_id INT DEFAULT NULL, nom_post VARCHAR(255) NOT NULL, img_post VARCHAR(255) NOT NULL, description_post VARCHAR(255) NOT NULL, INDEX IDX_5A8A6C8D140AAD8E (categorie_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, description_reclamation LONGTEXT NOT NULL, date_reclamation DATE NOT NULL, etat_reclamation VARCHAR(255) NOT NULL, INDEX IDX_CE606404A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_reservation DATE NOT NULL, nbrebillet INT NOT NULL, etat_reservation VARCHAR(255) NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, nom_role VARCHAR(255) NOT NULL, description_role LONGTEXT NOT NULL, tacherole VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, nom_utilisateur VARCHAR(255) NOT NULL, prenom_utilisateur VARCHAR(255) NOT NULL, adresse_utilisateur VARCHAR(255) NOT NULL, mail_utilisateur VARCHAR(255) NOT NULL, sudo_utilisateur VARCHAR(255) NOT NULL, mdp_utilisateur VARCHAR(255) NOT NULL, etat_compte VARCHAR(255) NOT NULL, numero_utilisateur VARCHAR(255) NOT NULL, date_n_utilisateur DATE NOT NULL, INDEX IDX_8D93D6494B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6C68BE09C FOREIGN KEY (localisation_id) REFERENCES localisation (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F383A0EE16 FOREIGN KEY (categorie_equipement_id) REFERENCES categorie_equipement (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D140AAD8E FOREIGN KEY (categorie_post_id) REFERENCES categorie_post (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F383A0EE16');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D140AAD8E');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6C68BE09C');
        $this->addSql('ALTER TABLE planinng DROP FOREIGN KEY FK_4C0191CAC68BE09C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC4B89032C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494B89032C');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6B83297E7');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('DROP TABLE billet');
        $this->addSql('DROP TABLE categorie_equipement');
        $this->addSql('DROP TABLE categorie_post');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE localisation');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE planinng');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
    }
}
