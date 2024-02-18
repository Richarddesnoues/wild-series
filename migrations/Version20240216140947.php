<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216140947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, number INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, season_id INT DEFAULT NULL, INDEX IDX_F0E45BA94EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA94EC001D1 FOREIGN KEY (season_id) REFERENCES program (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA94EC001D1');
        $this->addSql('DROP TABLE season');
    }
}
