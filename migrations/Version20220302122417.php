<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302122417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post CHANGE user_id user_id INT NOT NULL, CHANGE categorie_post_id categorie_post_id INT NOT NULL, CHANGE description_post description_post LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post CHANGE user_id user_id INT DEFAULT NULL, CHANGE categorie_post_id categorie_post_id INT DEFAULT NULL, CHANGE description_post description_post TEXT NOT NULL');
    }
}
